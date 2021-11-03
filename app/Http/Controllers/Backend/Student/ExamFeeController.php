<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\ExamType;
use Illuminate\Http\Request;
use PDF;

class ExamFeeController extends Controller
{
    //
    public function examFeePayslip(Request $request)
    {
        $studen_id = $request->student_id;
        $class_id = $request->class_id;

        $data['exam_type'] = ExamType::where('id', $request->exam_type_id)->first()['name'];

        $data['details'] = AssignStudent::with(['student', 'discount'])->where('student_id', $studen_id)->where('class_id', $class_id)->first();

        $pdf = PDF::loadView('backend.student.exam_fee.exam_fee_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');

        return $pdf->stream('document.pdf');
    }
}