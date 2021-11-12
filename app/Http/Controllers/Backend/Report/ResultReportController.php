<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use PDF;

class ResultReportController extends Controller
{
    public function resultView()
    {
        $years = StudentYear::all();
        $classes = StudentClass::all();
        $exam_types = ExamType::all();

        return view('backend.report.student_result.student_result_view', compact('classes', 'exam_types', 'years'));
    }

    public function resultGet(Request $request)
    {
//        dd($request->all());
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_tyoe_id = $request->exam_type_id;

        $singleResult = StudentMarks::where('year_id', $year_id)->where('class_id', $class_id)
                            ->where('exam_type_id', $exam_tyoe_id)->first();
        if ($singleResult == true) {
            $student_marks = StudentMarks::select('year_id', 'class_id', 'exam_type_id', 'student_id')
                ->where('year_id', $year_id)->where('class_id', $class_id)
                ->where('exam_type_id', $exam_tyoe_id)->groupBy('year_id')->groupBy('class_id')
                ->groupBy('exam_type_id')->groupBy('student_id')->get();

            $pdf = PDF::loadView('backend.report.student_result.student_result_pdf', compact('student_marks'));
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');
        } else {
            $notification = array(
                'message' => __('Sorry These Criteria Donse not match'),
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }

    public function idCardIndex()
    {
        $years = StudentYear::all();
        $classes = StudentClass::all();

        return view("backend.report.idcard.idcard_view", compact('classes', 'years'));
    }

    public function idCardGet(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;

        $check_data = AssignStudent::where('year_id', $year_id)->where('class_id', $class_id)->first();

        if ($check_data == true) {
            $assign_students = AssignStudent::where('year_id', $year_id)->where('class_id', $class_id)->get();

            $pdf = PDF::loadView('backend.report.idcard.idcard_pdf', compact('assign_students'));
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');
        } else {
            $notification = array(
                'message' => __('Sorry These Criteria Donse not match'),
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }
}
