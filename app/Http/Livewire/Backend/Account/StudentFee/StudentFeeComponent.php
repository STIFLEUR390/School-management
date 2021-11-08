<?php

namespace App\Http\Livewire\Backend\Account\StudentFee;

use App\Models\AccountStudentFee;
use Livewire\Component;

class StudentFeeComponent extends Component
{
    public function render()
    {
        $accountStudentFees = AccountStudentFee::all();
        return view('livewire.backend.account.student-fee.student-fee-component', compact('accountStudentFees'));
    }
}
