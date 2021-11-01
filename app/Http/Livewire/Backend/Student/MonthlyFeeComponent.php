<?php

namespace App\Http\Livewire\Backend\Student;

use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Livewire\Component;

class MonthlyFeeComponent extends Component
{
    public $year_id;
    public $class_id;
    public $assignStudents ;
    public $month;

    public function mount()
    {
        $this->class_id = '';
        $this->year_id = '';
        $this->month= '';
        $this->assignStudents = null;
    }

    public function render()
    {
        $years = StudentYear::all();
        $classes = StudentClass::all();

        return view('livewire.backend.student.monthly-fee-component', compact('years', 'classes'));
    }

    public function search()
    {
        $year_id = $this->year_id;
        $class_id = $this->class_id;
        if ($year_id != '') {
            $where[] = ['year_id', 'like', $year_id . '%'];
        }
        if ($class_id != '') {
            $where[] = ['class_id', 'like', $class_id . '%'];
        }

        $this->assignStudents = AssignStudent::with(['discount'])->where($where)->get();
    }
}
