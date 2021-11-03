<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentShifts = StudentShift::all();

        return view('backend.setup.student_shift.view_shift', compact('studentShifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup.student_shift.add_shift');
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
            'name' => 'required|min:3|unique:student_shifts,name',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => __($validator->messages()->all()[0]),
                'alert-type' => 'error'
            );
            return back()->with($notification)->withInput();
        }

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => __('Student Shift Inserted Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.index')->with($notification);
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
        $studentShift = StudentShift::findOrFail($id);

        return view('backend.setup.student_shift.edit_shift', compact('studentShift'));
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
        $studentShift = StudentShift::findOrFail($id);

        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|unique:student_shifts,name,'.$studentShift->id,
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => __($validator->messages()->all()[0]),
                'alert-type' => 'error'
            );
            return back()->with($notification)->withInput();
        }

        $studentShift->name = $request->name;
        $studentShift->save();

        $notification = array(
            'message' => __('Student Shift Updated Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentShift = StudentShift::findOrFail($id);
        $studentShift->delete();

        $notification = array(
            'message' => __('Student Shift Deleted Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->route('student.shift.index')->with($notification);
    }
}