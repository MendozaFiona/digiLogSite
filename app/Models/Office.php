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
    public $timestamps = false;
    
    protected $table = 'office';

    public $primary_key = 'id';

    protected $fillable = [
        'name',
        'building_num',
        'status',
    ];

    public static function officeStatus($officeID)
    {
        $status = DB::table('office')->where('id', $officeID)->first()->status;

        dd($status);

        $officeStatus = strval($status);

        return $officeStatus;
    }

    public static function office($officeID){
        return Office::select('name')->where('id', $officeID)->value('name');
    }

    public static function officesArray(){
        return Office::pluck('name')->all();
    }
    
}
