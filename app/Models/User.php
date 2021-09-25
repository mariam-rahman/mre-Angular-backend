<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function hasRole()
    {
        $permissions = $this->permissions;
        foreach ($permissions as $perm)
            switch ($perm->name) {
                case 'delete_product':
                    return true;
                    break;
                case 'update_product':
                    return true;
                    break;
                default:
                    break;
            }
        return false;
    }


    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
