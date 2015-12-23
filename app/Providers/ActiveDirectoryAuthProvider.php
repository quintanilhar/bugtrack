<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Auth\ActiveDirectoryUserProvider;
use Catho\Authentication\ActiveDirectory\ActiveDirectoryFactory;

/**
 * Class ActiveDirectoryAuthProvider
 * @package App\Providers
 */
class ActiveDirectoryAuthProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->extend(
            'activeDirectory',
            function() {
                return new ActiveDirectoryUserProvider(
                    new ActiveDirectoryFactory()
                );
            }
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function register()
    {
    }
}
