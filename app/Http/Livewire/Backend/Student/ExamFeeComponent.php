<?php

namespace App\Http\Livewire\Backend\Student;

use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Livewire\Component;

class ExamFeeComponent extends Component
{
    public $year_id;
    public $class_id;
    public $exam_type_id;
    public $assignStudents ;

    public function mount()
    {
        $this->class_id = '';
        $this->year_id = '';
        $this->exam_type_id = '';
        $this->assignStudents = null;
    }

    public function render()
    {
        $years = StudentYear::all();
        $classes = StudentClass::all();
        $exam_types = ExamType::all();

        return view('livewire.backend.student.exam-fee-component', compact('classes', 'exam_types', 'years'));
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