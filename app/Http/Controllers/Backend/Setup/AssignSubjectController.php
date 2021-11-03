<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class AssignSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignSubjects = AssignSubject::select('class_id')->groupBy('class_id')->get();

        return view("backend.setup.assign_subject.view_assign_subject", compact("assignSubjects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schoolSubjects = SchoolSubject::all();
        $studentClasses = StudentClass::all();
        return view("backend.setup.assign_subject.add_assign_subject", compact("schoolSubjects", "studentClasses"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subjectCount = count($request->subject_id);
        if ($subjectCount != null)
        {
            for ($i = 0; $i<$subjectCount; $i++){
                $assignSubject = new AssignSubject();
                $assignSubject->class_id = $request->class_id;
                $assignSubject->subject_id = $request->subject_id[$i];
                $assignSubject->full_mark = $request->full_mark[$i];
                $assignSubject->pass_mark = $request->pass_mark[$i];
                $assignSubject->subjective_mark = $request->subjective_mark[$i];
                $assignSubject->save();
            }
        }

        $notification = array(
            'message' => __("Subject Assign Inserted Successfully"),
            'alert-type' => 'success'
        );

        return redirect()->route('assign.subject.index')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignSubjects = AssignSubject::where('class_id', $id)->orderBy('subject_id', 'asc')->get();

        return view('backend.setup.assign_subject.details_assign_subject', compact('assignSubjects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schoolSubjects = SchoolSubject::all();
        $studentClasses = StudentClass::all();
        $assignSubject = AssignSubject::where('class_id', $id)->orderBy('subject_id', 'asc')->get();

        return view('backend.setup.assign_subject.edit_assign_subject', compact('schoolSubjects', 'studentClasses', 'assignSubject'));
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

        if ($request->subject_id == null){
            $notification = array(
                'message' => __("Sorry You do not select any Subject"),
                'alert-type' => 'error'
            );
        }else
        {
        $subjectCount = count($request->subject_id);
        AssignSubject::where('class_id', $id)->delete();
            for ($i = 0; $i<$subjectCount; $i++){
                $assignSubject = new AssignSubject();
                $assignSubject->class_id = $request->class_id;
                $assignSubject->subject_id = $request->subject_id[$i];
                $assignSubject->full_mark = $request->full_mark[$i];
                $assignSubject->pass_mark = $request->pass_mark[$i];
                $assignSubject->subjective_mark = $request->subjective_mark[$i];
                $assignSubject->save();
            }
        }

        $notification = array(
            'message' => __("Data Updated Successfully"),
            'alert-type' => 'success'
        );

        return redirect()->route('assign.subject.index')->with($notification);
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