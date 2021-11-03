<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function ViewClassStudent()
    {
        $studentClasses = StudentClass::all();
        return view('backend.setup.student_class.view_class', compact("studentClasses"));
    }

    public function ViewClassAdd()
    {
        return view('backend.setup.student_class.add_class');
    }

    public function studentClassStore(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|unique:student_classes,name',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => __($validator->messages()->all()[0]),
                'alert-type' => 'error'
            );
            return back()->with($notification)->withInput();
        }

        $studentClass = new StudentClass();
        $studentClass->name = $request->name;
        $studentClass->save();

        $notification = array(
            'message' => __('Student Class Inserted Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function studentClassEdit($id)
    {
        $studentClass = StudentClass::findOrFail($id);

        return view('backend.setup.student_class.edit_class', compact('studentClass'));
    }

    public function studentClassUpdate(Request $request, $id)
    {
        $studentClass = StudentClass::findOrFail($id);

        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|unique:student_classes,name,'.$studentClass->id,
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => __($validator->messages()->all()[0]),
                'alert-type' => 'error'
            );
            return back()->with($notification)->withInput();
        }

        $studentClass = StudentClass::findOrFail($id);
        $studentClass->name = $request->name;
        $studentClass->save();

        $notification = array(
            'message' => __('Student Class Updated Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function studentClassdelete($id)
    {
        $studentClass = StudentClass::findOrFail($id);
        $studentClass->delete();

        $notification = array(
            'message' => __('Student Class Deleted Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->route('student.class.view')->with($notification);
    }
}