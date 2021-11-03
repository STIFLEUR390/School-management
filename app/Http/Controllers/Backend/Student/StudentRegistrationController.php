<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
//use niklasravnsborg\LaravelPdf\Facades\Pdf;

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentYears = StudentYear::all();
        $studentClasses = StudentClass::all();

        $year_id = StudentYear::orderBy('id', 'desc')->first()->id;
        $class_id = StudentClass::orderBy('id', 'desc')->first()->id;
        $asssignStudents = AssignStudent::where('year_id', $year_id)->where('class_id', $class_id)->get();

        return view('backend.student.student_registration.student_view', compact('asssignStudents','studentYears', 'studentClasses', 'year_id', 'class_id'));
    }

    public function studentClassYearWise(Request $request){
        $studentYears = StudentYear::all();
        $studentClasses = StudentClass::all();

        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $asssignStudents = AssignStudent::where('year_id', $year_id)->where('class_id', $class_id)->get();

        return view('backend.student.student_registration.student_view', compact('asssignStudents','studentYears', 'studentClasses', 'year_id', 'class_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studentYears = StudentYear::all();
        $studentClasses = StudentClass::all();
        $studentGroups = StudentGroup::all();
        $studentShifts = StudentShift::all();
        return view('backend.student.student_registration.student_add', compact('studentClasses', 'studentGroups', 'studentYears', 'studentShifts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $chekYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first();

            if ($student == null){
                $firstReq = 0;
                $studentId = $firstReq +1;
                if ($studentId < 10){
                    $id_no = '000'.$studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00'.$studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0'.$studentId;
                }
            } else {
                $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first()->id;
                $studentId = $student + 1;
                if ($studentId < 10){
                    $id_no = '000'.$studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00'.$studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0'.$studentId;
                }
            }

            $final_id_no = $chekYear.$id_no;
            $user = new User();
            $code = rand(000000, 999999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->code = $code;
            $user->usertype = 'Student';
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));

            if ($request->file('image')){
                $file = $request->file('image');
                $filename = date('YmdHis').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user->image = $filename;
            }
            $user->save();

            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();

        });

        $notification = array(
            'message' => __('Student Registration Inserted Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('students.registration.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignStudent = AssignStudent::with(['student', 'discount'])->where('student_id', $id)->first();

        $pdf = PDF::loadView('backend.student.student_registration.student_details_pdf', compact('assignStudent'));
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function studentRegPromotion($id)
    {
        $studentYears = StudentYear::all();
        $studentClasses = StudentClass::all();
        $studentGroups = StudentGroup::all();
        $studentShifts = StudentShift::all();
        $assignStudent = AssignStudent::with(['student', 'discount'])->where('student_id', $id)->first();
        return view('backend.student.student_registration.student_promotion', compact('assignStudent' ,'studentClasses', 'studentGroups', 'studentYears', 'studentShifts'));
    }

    public function studentUpdatePromotion(Request $request, $id)
    {

        DB::transaction(function () use ($request, $id) {

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));

            if ($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/student_images/'.$user->image));
                $filename = date('YmdHis').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user->image = $filename;
            }
            $user->save();

            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();

        });

        $notification = array(
            'message' => __('Student Promotion Updated Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('students.registration.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studentYears = StudentYear::all();
        $studentClasses = StudentClass::all();
        $studentGroups = StudentGroup::all();
        $studentShifts = StudentShift::all();
        $assignStudent = AssignStudent::with(['student', 'discount'])->where('student_id', $id)->first();
        return view('backend.student.student_registration.student_edit', compact('assignStudent' ,'studentClasses', 'studentGroups', 'studentYears', 'studentShifts'));
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
        DB::transaction(function () use ($request, $id) {

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));

            if ($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/student_images/'.$user->image));
                $filename = date('YmdHis').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user->image = $filename;
            }
            $user->save();

            $assign_student = AssignStudent::where('id', $request->assign_student_id)->where('student_id', $id)->first();
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student = DiscountStudent::where('assign_student_id', $request->assign_student_id)->first();
            $discount_student->discount = $request->discount;
            $discount_student->save();

        });

        $notification = array(
            'message' => __('Student Registration Updated Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('students.registration.index')->with($notification);
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