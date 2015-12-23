<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract
{
    use Authenticatable, Authorizable;

    const ROLE_REPORTER =  'reporter';
    const ROLE_ENGINEER = 'engineer';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'login', 'email', 'password'];

    protected $guarded = ['id', 'created_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    public function reports()
    {
        return $this->hasMany(Bug::class, 'reporter_id');
    }

    public function scopeEngineers($query)
    {
        $query->where('role', 'engineer');
    }

    public function getAvatar()
    {
        return sprintf(
            'http://www.gravatar.com/avatar/%s?d=identicon&s=%d',
            md5($this->email),
            50
        );
    }
}
