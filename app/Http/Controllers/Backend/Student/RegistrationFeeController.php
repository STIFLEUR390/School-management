<?php

namespace App\Http\Controllers\Backend\student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

use PDF;

class RegistrationFeeController extends Controller
{
    public function index()
    {
        $years = StudentYear::all();
        $classes = StudentClass::all();

        return view('backend.student.registration_fee.registration_fee_view', compact('years', 'classes'));
    }

    public function RegFeeClassData(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if ($year_id != '') {
            $where[] = ['year_id', 'like', $year_id . '%'];
        }
        if ($class_id != '') {
            $where[] = ['class_id', 'like', $class_id . '%'];
        }
        $allStudent = AssignStudent::with(['discount'])->where($where)->get();
        // dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>'.__('ID No').'</th>';
        $html['thsource'] .= '<th>'.__('Student Name').'</th>';
        $html['thsource'] .= '<th>'.__('Roll No').'</th>';
        $html['thsource'] .= '<th>'.__('Reg Fee').'</th>';
        $html['thsource'] .= '<th>'.__('Discount').' </th>';
        $html['thsource'] .= '<th>'.__('Student Fee').' </th>';
        $html['thsource'] .= '<th>'.__('Action').'</th>';


        foreach ($allStudent as $key => $v) {
            $registrationfee = FeeCategoryAmount::where('fee_category_id', '1')->where('class_id', $v->class_id)->first();
            $color = 'success';
            $html[$key]['tdsource']  = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['student']['id_no'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['student']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v->roll . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $registrationfee->amount . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['discount']['discount'] . '%' . '</td>';

            $originalfee = $registrationfee->amount;
            $discount = $v['discount']['discount'];
            $discounttablefee = $discount / 100 * $originalfee;
            $finalfee = (float)$originalfee - (float)$discounttablefee;

            $html[$key]['tdsource'] .= '<td>' . priceFormat($finalfee) . '</td>';
            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-' . $color . '" title="PaySlip" target="_blanks" href="' . route("student.registration.fee.payslip") . '?class_id=' . $v->class_id . '&student_id=' . $v->student_id . '">'.__('Fee Slip').'</a>';
            $html[$key]['tdsource'] .= '</td>';
        }
        return response()->json(@$html);
    } // end method


    public function RegFeePayslip(Request $request)
    {
        $student_id = $request->student_id;
        $class_id = $request->class_id;

        $assignStudent = AssignStudent::with(['student', 'discount'])->where('student_id', $student_id)->where('class_id', $class_id)->first();

        $pdf = PDF::loadView('backend.student.registration_fee.registration_fee_pdf', compact('assignStudent'));
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
