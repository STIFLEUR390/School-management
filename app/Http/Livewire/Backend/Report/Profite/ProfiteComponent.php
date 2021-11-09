<?php

namespace App\Http\Livewire\Backend\Report\Profite;

use App\Models\AccountEmployeeSalary;
use App\Models\AccountOtherCost;
use App\Models\AccountStudentFee;
use Carbon\Carbon;
use Livewire\Component;

class ProfiteComponent extends Component
{
    public $date_start;
    public $date_end;
    public $account_student_fees;

    
    /* public function mount()
    {
        $this->date_start = Carbon::now()->format('Y-m-d');
        $this->date_end = Carbon::now()->addMonths(-1)->format('Y-m-d');
    } */

    public function render()
    {
        if (!empty($this->date_start) && !empty($this->date_end)) {

            $start_date = date('Y-m',strtotime($this->date_start));
            $end_date = date('Y-m',strtotime($this->date_end));
            $sdate = date('Y-m-d',strtotime($this->date_start));
            $edate = date('Y-m-d',strtotime($this->date_end));

            $student_fee = AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');

    	    $other_cost = AccountOtherCost::whereBetween('date',[$sdate,$edate])->sum('amount'); 

    	    $emp_salary = AccountEmployeeSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');

            $total_cost = $other_cost+$emp_salary;

            $profit = $student_fee-$total_cost;

            $this->account_student_fees = 1;
        }else {
            $this->account_student_fees = null;
            $student_fee = null;
            $other_cost = null;
            $emp_salary = null;
            $total_cost = null;
            $profit = null;
            $sdate = null;
            $edate = null;
        }
        return view('livewire.backend.report.profite.profite-component', compact('emp_salary', 'other_cost', 'student_fee', 'profit', 'total_cost', 'sdate', 'edate'));
    }
}
