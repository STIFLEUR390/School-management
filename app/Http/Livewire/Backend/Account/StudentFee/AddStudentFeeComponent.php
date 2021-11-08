<?php

namespace App\Http\Livewire\Backend\Account\StudentFee;

use App\Models\AccountStudentFee;
use App\Models\AssignStudent;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Carbon\Carbon;
use Livewire\Component;

class AddStudentFeeComponent extends Component
{
    public $year_id;
    public $class_id;
    public $fee_category_id;
    public $date;
    public $amount;
    public $checkmanage;
    public $student_id;
    public $assignStudents ;

    public function mount()
    {
        $this->class_id = '';
        $this->year_id = '';
        $this->fee_category_id = '';
        $this->amount = [];
        $this->checkmanage = [];
        $this->student_id = [];
        $this->assignStudents = null;
        $this->date = Carbon::now()->format("Y-m-d");
    }

    public function render()
    {
        $years = StudentYear::all();
        $classes = StudentClass::all();
        $fee_categories = FeeCategory::all();
        return view('livewire.backend.account.student-fee.add-student-fee-component', compact('years', 'fee_categories', 'classes'));
    }

    public function search()
    {
        $year_id = $this->year_id;
        $class_id = $this->class_id;
        $fee_category_id = $this->fee_category_id;
        $date = date('Y-m',strtotime($this->date));

        $this->assignStudents = AssignStudent::with(['discount'])->where('year_id',$year_id)->where('class_id',$class_id)->get();
        $data = $this->assignStudents;
    }

    public function store()
    {
        $date = date('Y-m',strtotime($this->date));

        AccountStudentFee::where('year_id',$this->year_id)->where('class_id',$this->class_id)->where('fee_category_id',$this->fee_category_id)->where('date',$this->date)->delete();

        $checkdata = $this->checkmanage;

//        if ($checkdata !=null) {
        if (!empty($checkdata)) {
            for ($i=0; $i <count($checkdata) ; $i++) {
                $data = new AccountStudentFee();
                $data->year_id = $this->year_id;
                $data->class_id = $this->class_id;
                $data->date = $date;
                $data->fee_category_id = $this->fee_category_id;
                $data->student_id = $this->student_id[$checkdata[$i]];
                $data->amount = $this->amount[$checkdata[$i]];
                $data->save();
            }
        }

        if (!empty(@$data) || empty($checkdata)) {

            $notification = array(
                'message' => __('Well Done Data Successfully Updated'),
                'alert-type' => 'success'
            );

            return redirect()->route('student.fee')->with($notification);
        }
        else {
            session()->flash('message', __('Sorry Data not Saved'));
            session()->flash('alert-type', __('error'));
        }
    }
}
