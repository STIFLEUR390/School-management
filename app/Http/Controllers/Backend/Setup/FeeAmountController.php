<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeCategoryAmounts = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();

        return view('backend.setup.fee_amount.view_fee_amount', compact('feeCategoryAmounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = StudentClass::all();
        $feeCategories = FeeCategory::all();

        return view('backend.setup.fee_amount.add_fee_amount', compact('classes', 'feeCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countClass = count($request->class_id);
        if ($countClass != null)
        {
            for ($i=0; $i<$countClass; $i++)
            {
                $feeAmount = new FeeCategoryAmount();
                $feeAmount->fee_category_id = $request->fee_category_id;
                $feeAmount->class_id = $request->class_id[$i];
                $feeAmount->amount = $request->amount[$i];
                $feeAmount->save();
            }
        }

        $notification = array(
            'message' => __('Fee Amount Inserted Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('fee.amount.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feeCategoryAmounts = FeeCategoryAmount::where('fee_category_id', $id)->orderBy('class_id', 'asc')->get();

        return view('backend.setup.fee_amount.details_fee_amount', compact('feeCategoryAmounts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classes = StudentClass::all();
        $feeCategories = FeeCategory::all();
        $feeCategoryAmounts = FeeCategoryAmount::where('fee_category_id', $id)->orderBy('class_id', 'asc')->get();

        return view('backend.setup.fee_amount.edit_fee_amount', compact('classes', 'feeCategories' ,'feeCategoryAmounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->class_id == null)
        {
            $notification = array(
                'message' => __('Sorry You do not select any class amount'),
                'alert-type' => 'error'
            );

            return redirect()->route('fee.amount.edit', $id)->with($notification);
        } else {
            $countClass = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id', $id)->delete();
            for ($i=0; $i<$countClass; $i++){
                $feeAmount = new FeeCategoryAmount();
                $feeAmount->fee_category_id = $request->fee_category_id;
                $feeAmount->class_id = $request->class_id[$i];
                $feeAmount->amount = $request->amount[$i];
                $feeAmount->save();
            }
        }

        $notification = array(
            'message' => __('Data Updated Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('fee.amount.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
