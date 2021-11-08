<?php

namespace App\Http\Livewire\Backend\Account\AccountSalary;

use App\Models\AccountEmployeeSalary;
use Livewire\Component;

class AccountSalaryComponent extends Component
{
    public function render()
    {
        $accounts = AccountEmployeeSalary::all();
        return view('livewire.backend.account.account-salary.account-salary-component', compact('accounts'));
    }
}
