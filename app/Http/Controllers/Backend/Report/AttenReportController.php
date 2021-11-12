<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class AttenReportController extends Controller
{
    public function index()
    {
        $employees = User::where('usertype', 'employee')->get();

        return view("backend.report.attend_report.attend_report_view", compact("employees"));
    }

    public function get(Request $request)
    {
        $employee_id = $request->employee_id;
        $date = date('Y-m', strtotime($request->date));
        if ($employee_id != '') {
            $where[] = ['employee_id', $employee_id];
        }
        if ($date != ''){
            $where[] = ['date', 'like', $date.'%'];
        }

        $singleAttendance = EmployeeAttendance::with(['user'])->where($where)->get();

        if ($singleAttendance == true) {
            $employee_attendances = EmployeeAttendance::with(['user'])->where($where)->get();
            $absents = EmployeeAttendance::with(['user'])->where($where)
                ->where('attend_status', 'Absent')->get()->count();
            $leaves = EmployeeAttendance::with(['user'])->where($where)
                ->where('attend_status', 'Leave')->get()->count();
            $month = date('m-Y', strtotime($request->date));

            $pdf = PDF::loadView('backend.report.attend_report.attend_report_pdf', compact('absents', 'employee_attendances', 'leaves', 'month'));
            $pdf->setProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');
        } else {
            $notification = array(
                'message' => 'Sorry These Criteria Donse not match',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }
}
