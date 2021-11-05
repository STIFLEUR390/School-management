<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;
use PDF;

class MonthlySalaryController extends Controller
{
    //
    public function payslip(Request $request, $employee_id)
    {
        $id = EmployeeAttendance::where('employee_id',$employee_id)->first();
        $date = date('Y-m',strtotime($id->date));
        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }

        $details = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$id->employee_id)->get();

        $pdf = PDF::loadView('backend.employee.monthly_salary.monthly_salary_pdf', compact('details'));
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
