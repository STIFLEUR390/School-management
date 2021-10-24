<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentGroups = StudentGroup::all();

        return view('backend.setup.student_group.view_group', compact('studentGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup.student_group.add_goup');
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

        $studentGroup = new StudentGroup();
        $studentGroup->name = $request->name;
        $studentGroup->save();

        $notification = array(
            'message' => __('Student Group Inserted Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.index')->with($notification);
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
        $studentGroup = StudentGroup::findOrFail($id);

        return view('backend.setup.student_group.edit_group', compact('studentGroup'));
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
        $studentGroup = StudentGroup::findOrFail($id);

        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|unique:student_classes,name,'.$studentGroup->id,
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => __($validator->messages()->all()[0]),
                'alert-type' => 'error'
            );
            return back()->with($notification)->withInput();
        }

        $studentGroup->name = $request->name;
        $studentGroup->save();

        $notification = array(
            'message' => __('Student Group Updated Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentGroup = StudentGroup::findOrFail($id);

        $studentGroup->delete();

        $notification = array(
            'message' => __('Student Group Deleted Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->route('student.group.index')->with($notification);
    }
}
