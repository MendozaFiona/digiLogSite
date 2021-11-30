<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusVisit extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'campusvisit';

    protected $primary_key = 'id';

    protected $fillable = [
        'name',
        'contact',
        'vehicle_type',
        'plate_num',
        'date', 
        'time_in',
    ];
}