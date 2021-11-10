<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\MarksGrade;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class MarkSheetController extends Controller
{
    //

    public function index()
    {
        $years = StudentYear::all();
        $classes = StudentClass::all();
        $exam_types = ExamType::all();

        return view('backend.report.marksheet.marksheet_view', compact('classes', 'exam_types', 'years'));
    }

    public function get(Request $request)
    {
        $year_id = $request->year_id;
    	$class_id = $request->class_id;
    	$exam_type_id = $request->exam_type_id;
    	$id_no = $request->id_no;

        $count_fail = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)
                        ->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)
                        ->where('marks','<','33')->get()->count();
        $singleStudent = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)
                            ->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->first();

        if ($singleStudent == true) {
            $allMarks = StudentMarks::with(['assign_subject','year'])->where('year_id',$year_id)
                            ->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)
                            ->where('id_no',$id_no)->get();
            $allGrades = MarksGrade::all();

            return view('backend.report.marksheet.marksheet_pdf', compact('allMarks', 'allGrades', 'count_fail'));
        } else {
            $notification = array(
                'message' => __('Sorry These Criteria Donse not match'),
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }
        
    }
}
