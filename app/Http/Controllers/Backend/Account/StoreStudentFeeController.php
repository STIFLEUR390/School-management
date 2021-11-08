<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountStudentFee;
use Illuminate\Http\Request;

class StoreStudentFeeController extends Controller
{
    public function __invoke(Request $request)
    {
        $date = date('Y-m',strtotime($request->date));

        AccountStudentFee::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('fee_category_id',$request->fee_category_id)->where('date',$request->date)->delete();

        $checkdata = $request->checkmanage;

        if ($checkdata !=null) {
            for ($i=0; $i <count($checkdata) ; $i++) {
                $data = new AccountStudentFee();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->date = $date;
                $data->fee_category_id = $request->fee_category_id;
                $data->student_id = $request->student_id[$checkdata[$i]];
                $data->amount = $request->amount[$checkdata[$i]];
                $data->save();
            }
        }

        if (!empty(@$data) || empty($checkdata)) {

            $notification = array(
                'message' => __('Well Done Data Successfully Updated'),
                'alert-type' => 'success'
            );

            return redirect()->route('student.fee')->with($notification);
        }else{

            $notification = array(
                'message' => __('Sorry Data not Saved'),
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }
}
