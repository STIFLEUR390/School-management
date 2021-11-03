<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examTypes = ExamType::all();

        return view('backend.setup.exam_type.view_exam_type', compact('examTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup.exam_type.add_exam_type');
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
            'name' => 'required|min:3|unique:exam_types,name',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => __($validator->messages()->all()[0]),
                'alert-type' => 'error'
            );
            return back()->with($notification)->withInput();
        }

        $examType = new ExamType();
        $examType->name = $request->name;
        $examType->save();

        $notification = array(
            'message' => __('Exam Type Inserted Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('exam.type.index')->with($notification);
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
        $examType = ExamType::findOrFail($id);

        return view('backend.setup.exam_type.edit_exam_type', compact("examType"));
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
        $examType = ExamType::findOrFail($id);

        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|unique:exam_types,name,'.$examType->id,
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => __($validator->messages()->all()[0]),
                'alert-type' => 'error'
            );
            return back()->with($notification)->withInput();
        }

        $examType->name = $request->name;
        $examType->save();

        $notification = array(
            'message' => __('Exam Type Updated Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('exam.type.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examType = ExamType::findOrFail($id);
        $examType->delete();

        $notification = array(
            'message' => __('Exam Type Deleted Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->route('exam.type.index')->with($notification);
    }
}