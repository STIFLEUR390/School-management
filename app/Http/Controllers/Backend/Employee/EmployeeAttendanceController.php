<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $employee_attendaces = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','DESC')->get();
        $employee_attendaces = EmployeeAttendance::select('date')->groupBy('date')->get();

        return view('backend.employee.employee_attendance.employee_attendance_view', compact('employee_attendaces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = User::where('usertype','employee')->get();

        return view('backend.employee.employee_attendance.employee_attendance_add', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EmployeeAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
        $countemployee = count($request->employee_id);
        for ($i=0; $i <$countemployee ; $i++) {
            $attend_status = 'attend_status'.$i;
            $attend = new EmployeeAttendance();
            $attend->date = date('Y-m-d',strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attend->attend_status = $request->$attend_status;
            $attend->save();
        } // end For Loop

        $notification = array(
            'message' => __('Employee Attendace Data Update Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('employee.attendance.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {
        $details = EmployeeAttendance::where('date',$date)->get();

        return view('backend.employee.employee_attendance.employee_attendance_details', compact('details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($date)
    {
        $employee_attendances = EmployeeAttendance::where('date',$date)->get();
        $employees = User::where('usertype','employee')->get();

        return view('backend.employee.employee_attendance.employee_attendance_edit', compact('employees', 'employee_attendances'));
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
    public function destroy($id)
    {
        //
    }
}
