<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountEmployeeSalary;
use Illuminate\Http\Request;

class StoreAccountSalaryController extends Controller
{
    public function __invoke(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));

        AccountEmployeeSalary::where('date',$date)->delete();

        $checkdata = $request->checkmanage;

        if ($checkdata !=null) {
            for ($i=0; $i <count($checkdata) ; $i++) {
                $data = new AccountEmployeeSalary();
                $data->date = $date;
                $data->employee_id = $request->employee_id[$checkdata[$i]];
                $data->amount = $request->amount[$checkdata[$i]];
                $data->save();
            }
        } // end if

        if (!empty(@$data) || empty($checkdata)) {

            $notification = array(
                'message' => 'Well Done Data Successfully Updated',
                'alert-type' => 'success'
            );

            return redirect()->route('account.salary')->with($notification);
        }else{

            $notification = array(
                'message' => 'Sorry Data not Saved',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

        }
    }
}
