<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

//    protected $guard = "admin";
    protected $guard_name = 'admin';
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles_name'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
