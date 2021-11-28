<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Office extends Authenticatable
{
    use HasFactory, Notifiable;

    // table name
    protected $table = 'office';

    public $primary_key = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    protected $hidden = [
        'remember_token',
    ];

    
}
