<?php

namespace App\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Catho\Authentication\ActiveDirectory\ActiveDirectoryFactory;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class ActiveDirectoryAuthProvider
 * @package App\Providers
 */
class ActiveDirectoryUserProvider implements UserProvider
{
    protected $authenticatorFactory;
    protected $auth;

    public function __construct(
        ActiveDirectoryFactory $authenticatorFactory
    ) {
        $this->authenticatorFactory = $authenticatorFactory;
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        if ($identifier === null) {
            return;
        }

        return User::find($identifier);
    }

    /**
     * Retrieve a user by by their unique identifier and "remember me" token.
     *
     * @param  mixed   $identifier
     * @param  string  $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        if ($identifier !== null) {
            return $this->createGenericUser(['id' => $identifier]);
        }
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string  $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        $user->setRememberToken($token);
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        $auth = $this->authenticatorFactory->factory(
            'catho',
            \Config::get('auth.activeDirectory')
        );

        $acl = $auth->authenticate($credentials['login'], $credentials['password']);

        if (!$acl->authenticated) {
            return;
        }
        
        try {
            return User::where(['login' => $credentials['login']])
            ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return User::create(
                [
                    'login' => $credentials['login'],
                    'email' => $credentials['login'] . '@catho.com',
                    'password' => bcrypt($credentials['password']),
                    'name' => $credentials['login'],
                    'role' => 'reporter'
                ]
            );
        }
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return true;
    }

    private function createGenericUser(array $data)
    {
        return new \Illuminate\Auth\GenericUser($data);
    }
}

