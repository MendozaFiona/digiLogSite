<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // table name
    protected $table = 'users';

    public $primary_key = 'id';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'office_id', // no input from form, automatically assigned
        'admin_id', // either should be filled
        'role_id', //removed, uncomment if needed
    ];

  
    /*protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/

    
}
