<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Appointment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = 
    [
        'date' , 'startTime' , 'endTime','status' ,'patient_id','doctor_id'
    ];

    static function upsertInstance($request)
    {
        $schedule = Schedule::where('id',$request->schedule_id)->first();
        $time = $schedule->startTime;
        $startTime = $time;
        // Appointment Limitation
        $appointments = Appointment::all();
        foreach ($appointments as $appointment) {
            // Start Time Appointment Limitation
            if ($time == $appointment->startTime || Carbon::parse($appointment->date)->isoFormat('dddd') == $schedule->day && $appointment->diagnose->doctor_id == $request->doctor_id) {
                $startTime = Carbon::parse($time)->addHour(1);
                $time = Carbon::parse($time)->addHour(1);
            }
        }

        // Start Date Input from Day Algorithm
        $day = $schedule->day;
        $days = [
            Carbon::now()->addDays(1),
            Carbon::now()->addDays(2),
            Carbon::now()->addDays(3),
            Carbon::now()->addDays(4),
            Carbon::now()->addDays(5),
            Carbon::now()->addDays(6),
            Carbon::now()->addDays(7),
        ];
        for ($i = 0; $i < 7; $i++) {
            if (Carbon::parse($days[$i])->isoFormat('dddd') == $day) 
            {
                $date = $days[$i]->format('Y-m-d');
            }
        }
        // End Date Input from Day Algorithm
        $appointment = Appointment::updateOrCreate(
            [
                'id' => $request->id ?? null
            ],
            [
                'date' => $date,
                'startTime' => $startTime,
                'endTime' => Carbon::parse($startTime)->addHour(),
                'status' => 'pending',
                'patient_id'=> Auth::user()->id,
                'doctor_id'=> $request->doctor_id
            ],
        );
        Complaint::updateOrCreate([
            'patient_id' => auth()->user()->id,
            'appointment_id' => $appointment->id,
        ]);

        Diagnose::updateOrCreate([
            'doctor_id' => $request->doctor_id,
            'appointment_id' => $appointment->id,
        ]);
        return $appointment;
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
            $query->where('name','like','%'.$request['name'].'%');
        }

        return $query;
    }
    
    public function complaint()
    {
        return $this->hasOne(Complaint::class);
    }

    public function diagnose()
    {
        return $this->hasOne(Diagnose::class);
    }

    public function doctors()
    {
        return $this->belongsToMany(User::class, 'diagnosis', 'appointment_id', 'doctor_id')->using(Diagnose::class)->as('doctors');
    }

    public function patients()
    {
        return $this->belongsToMany(User::class, 'complaint', 'appointment_id', 'patient_id')->using(Complaint::class)->as('patients');
    }
}
