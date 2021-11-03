<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentyears = StudentYear::all();

        return view('backend.setup.student_year.view_year', compact('studentyears'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup.student_year.add_year');
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
            'name' => 'required|min:3|unique:student_years,name',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => __($validator->messages()->all()[0]),
                'alert-type' => 'error'
            );
            return back()->with($notification)->withInput();
        }

        $studentYear = new StudentYear();
        $studentYear->name = $request->name;
        $studentYear->save();

        $notification = array(
            'message' => __('Student Year Inserted Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.index')->with($notification);
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
        $studentYear = StudentYear::findOrFail($id);

        return view('backend.setup.student_year.edit_year', compact('studentYear'));
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
        $studentYear = StudentYear::findOrFail($id);

        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|unique:student_years,name,'.$studentYear->id,
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => __($validator->messages()->all()[0]),
                'alert-type' => 'error'
            );
            return back()->with($notification)->withInput();
        }

        $studentYear->name = $request->name;
        $studentYear->save();

        $notification = array(
            'message' => __('Student Year Updated Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentYear = StudentYear::findOrFail($id);
        $studentYear->delete();

        $notification = array(
            'message' => __('Student Year Deleted Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->route('student.year.index')->with($notification);
    }
}