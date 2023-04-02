<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SpecializationRequest;
use App\Models\Specialization;
use App\Models\User;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.pages.specialization.index',[
            'specialites' => Specialization::filter($request->all())->paginate(10)
        ]);
    }

    public function doctor(Request $request)
    {
        return view('admin.pages.specialization.doctor',[
            'doctors' => User::where('role_id' ,USER)->where('speciality_id',$request->specialization)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upsert(Specialization $specialization)
    {
        return view('admin.pages.specialization.upsert',[
            'specialization' => $specialization
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function modify(SpecializationRequest $request)
    {
        return Specialization::upsertInstance($request);
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
    public function destroy(Specialization $specialization)
    {
        return $specialization->deleteInstance();
    }

    public function filter(Request $request)
    {
        return view('admin.pages.specialization.index',[
            'specialites' => Specialization::filter($request->all())->paginate(10)
        ]);
    }
}
