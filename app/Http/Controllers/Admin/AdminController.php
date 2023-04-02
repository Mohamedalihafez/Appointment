<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\DoctorSchedule;
use App\Models\Gallary;
use App\Models\Specialization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard'
        ,[
        'specialites' => Specialization::all(),
        'doctorschedules'=> DoctorSchedule::where('doctor_id',Auth::user()->id)->count(),
        'appointmentes'=> Appointment::count(),

        ]

);
    }

    public function uploadImageInTemp(Request $request)
    {
       return Gallary::uploadImageInTemp($request);
    }

    public function removeImageInTemp(Request $request)
    {
        if ( File::exists($request->image) ) {
            File::delete($request->image);
        }
    }
}
