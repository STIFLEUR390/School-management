<?php

namespace App\Http\Livewire\Backend\Employee;

use App\Models\EmployeeAttendance;
use Carbon\Carbon;
use Livewire\Component;

class MonthlySalaryComponent extends Component
{
    public $date;
    public $employee_attendances;
    public $where;

    public function mount()
    {
        $this->date = Carbon::now();
        $this->employee_attendances = null;
    }

    public function render()
    {
        return view('livewire.backend.employee.monthly-salary-component');
    }

    public function search()
    {
        $date = date('Y-m',strtotime($this->date));
        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }

        $this->where = $where;
        $this->employee_attendances = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
    }
}
