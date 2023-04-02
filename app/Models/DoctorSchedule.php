<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class DoctorSchedule extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = 
    [
        'name' , 'doctor_id' , 'schedule_id'
    ];

    static function upsertInstance($request)
    {
        if ($request->schedule_id) 
        {
            foreach($request->schedule_id as $key => $schedule_id){
                $doctorschedule = DoctorSchedule::updateOrCreate(
                    [
                        'schedule_id' => $request->schedule_id[$key] ?? null ,
                        'doctor_id' => Auth::user()->id,
                    ],
                    [
                        'schedule_id' => $request->schedule_id[$key] ?? null ,
                        'doctor_id' => Auth::user()->id,
                    ]);
            }
        }

        
        return $doctorschedule;
    }

    //delete_data
    public function deleteInstance()
    {
        return $this->delete();
    }

    
    // Scopes
    public function scopeFilter($query,$request)
    {
        if ( isset($request['name']) ) 
        {
            $query->where('day','like','%'.$request['name'].'%');
        }

        return $query;
    }
  
    //relation

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    
}
