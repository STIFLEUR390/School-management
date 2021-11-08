<?php

namespace App\Http\Livewire\Backend\Account\AccountSalary;

use App\Models\AccountEmployeeSalary;
use App\Models\EmployeeAttendance;
use Carbon\Carbon;
use Livewire\Component;

class AddAccountSalaryComponent extends Component
{
    public $date;
//    public $salaries;
    public $where;
    public $amount;
    public $employee_id;
    public $checkmanage;

    public function mount()
    {
        $this->date = Carbon::now()->format('Y-m-d');
//        $this->salaries = null;
    }

    public function render()
    {
        $date = date('Y-m',strtotime($this->date));
        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }

        $this->where = $where;
        $salaries = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user' => function($query) {
            $query->get()->first;
        }])->where($where)->get();
        return view('livewire.backend.account.account-salary.add-account-salary-component' , compact('salaries'));
    }

    /*public function search()
    {
        $date = date('Y-m',strtotime($this->date));
        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }

        $this->where = $where;
        $this->salaries = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user' => function($query) {
                                $query->get()->first;
                            }])->where($where)->get();
        $data = $this->salaries;
    }*/

    public function store()
    {
        dd($this);
        $date = date('Y-m', strtotime($this->date));

        AccountEmployeeSalary::where('date',$date)->delete();

        $checkdata = $request->checkmanage;

        if ($checkdata !=null) {
            for ($i=0; $i <count($checkdata) ; $i++) {
                $data = new AccountEmployeeSalary();
                $data->date = $date;
                $data->employee_id = $this->employee_id[$checkdata[$i]];
                $data->amount = $this->amount[$checkdata[$i]];
                $data->save();
            }
        } // end if

        if (!empty(@$data) || empty($checkdata)) {

            $notification = array(
                'message' => __('Well Done Data Successfully Updated'),
                'alert-type' => 'success'
            );

            return redirect()->route('account.salary')->with($notification);
        }else{
            session()->flash('message', __('Sorry Data not Saved'));
            session()->flash('alert-type', __('error'));
        }
    }
}
