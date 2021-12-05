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

    public static function todayOfficeVisits($date, $office_id){
        return OfficeVisit::select('id')->where('date', $date)->where('office_id', $office_id)->get();
    }

    public static function visitorOfficeVisits($id){
        return OfficeVisit::where('visit_id', $id)->get();
    }
    
}
