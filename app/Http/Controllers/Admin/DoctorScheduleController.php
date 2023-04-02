<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DoctorScheduleRequest;
use App\Models\DoctorSchedule;
use App\Models\Schedule;

class DoctorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.pages.doctorschedule.index',[
            'doctorschedules' => DoctorSchedule::filter($request->all())->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upsert(DoctorSchedule $doctorschedule)
    {
        return view('admin.pages.doctorschedule.upsert',[
            'doctorschedule' => $doctorschedule,
            'schedules' => Schedule::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function modify(DoctorScheduleRequest $request)
    {
        return DoctorSchedule::upsertInstance($request);
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
    public function destroy(DoctorSchedule $doctorschedule)
    {
        return $doctorschedule->deleteInstance();
    }

    public function filter(Request $request)
    {
        return view('admin.pages.doctorschedule.index',[
            'doctorschedules' => DoctorSchedule::filter($request->all())->paginate(10)
        ]);
    }
}
