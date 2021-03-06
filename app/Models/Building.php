<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'building';

    public $primary_key = 'id';

    protected $fillable = [
        'name',
        'latitude',
        'longitude',
    ];
}
