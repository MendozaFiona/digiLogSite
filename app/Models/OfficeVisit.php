<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeVisit extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'officevisit';

    public $primary_key = 'id';

    protected $fillable = [
        'visit_id',
        'office_id',
        'date',
        'time_in',
    ];
    
}
