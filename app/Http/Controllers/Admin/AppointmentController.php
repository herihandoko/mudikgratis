<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AppointmentDataTable;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:appointment-index|appointment-create|appointment-edit|appointment-delete', ['only' => ['index','show']]);
         $this->middleware('permission:appointment-create', ['only' => ['create','store']]);
         $this->middleware('permission:appointment-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:appointment-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AppointmentDataTable $appointmentDataTable)
    {
        return $appointmentDataTable->render('admin.appointmentIndex');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('admin.appointmentEdit', compact('appointment'));
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
        $appointment = Appointment::findOrFail($id);
        $appointment->appointment_date = $request->appointment_date;
        $appointment->status = $request->status;
        $appointment->save();

        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.appointment.index')->with($notification);
    }

    public function destroy($id){
        Appointment::findOrFail($id)->delete();
    }
}
