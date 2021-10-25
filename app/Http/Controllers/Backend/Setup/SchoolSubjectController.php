<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolSubjects = SchoolSubject::all();

        return view('backend.setup.school_subject.view_school_subject', compact('schoolSubjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup.school_subject.add_school_subject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|unique:school_subjects,name',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => __($validator->messages()->all()[0]),
                'alert-type' => 'error'
            );
            return back()->with($notification)->withInput();
        }

        $shoolSubject = new SchoolSubject();
        $shoolSubject->name = $request->name;
        $shoolSubject->save();

        $notification = array(
            'message' => __('Subject Inserted Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('school.subject.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schoolSubject = SchoolSubject::findOrFail($id);

        return view('backend.setup.school_subject.edit_school_subject', compact('schoolSubject'));
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
        $schoolSubject = SchoolSubject::findOrFail($id);
        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|unique:school_subjects,name,'.$schoolSubject->id,
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => __($validator->messages()->all()[0]),
                'alert-type' => 'error'
            );
            return back()->with($notification)->withInput();
        }

        $schoolSubject->name = $request->name;
        $schoolSubject->save();

        $notification = array(
            'message' => __('Subject Updated Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('school.subject.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schoolSubject = SchoolSubject::findOrFail($id);
        $schoolSubject->delete();

        $notification = array(
            'message' => __('Subject Deleted Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->route('school.subject.index')->with($notification);
    }
}
