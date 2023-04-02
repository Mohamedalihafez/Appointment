<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.pages.appointment.index',[
            'specialites' => Appointment::filter($request->all())->where('patient_id' ,Auth::user()->id)->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upsert(Appointment $appointment)
    {
        return view('admin.pages.appointment.upsert',[
            'appointment' => $appointment
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function modify(AppointmentRequest $request)
    {
        return Appointment::upsertInstance($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        return $appointment->deleteInstance();
    }

    public function filter(Request $request)
    {
        return view('admin.pages.appointment.index',[
            'specialites' => Appointment::filter($request->all())->paginate(10)
        ]);
    }
}
