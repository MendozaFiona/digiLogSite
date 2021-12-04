<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public static function name($visit_id)
    {
        return CampusVisit::where('id', $visit_id)->first()->name;
    }

    public static function contact($visit_id)
    {
        return CampusVisit::where('id', $visit_id)->first()->contact;
    }

    public static function timeIn($visit_id)
    {
        return CampusVisit::where('id', $visit_id)->first()->time_in;
    }

    public static function purpose($visit_id)
    {
        return CampusVisit::where('id', $visit_id)->first()->purpose;
    }

    public static function namesArray()
    {
        return CampusVisit::distinct()->pluck('name')->where('date', Carbon::today()->format('Y-m-d'))->all();
    }
}
