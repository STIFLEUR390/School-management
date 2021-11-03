<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeCategories = FeeCategory::all();

        return view('backend.setup.fee_category.view_fee_category', compact('feeCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup.fee_category.add_fee_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|unique:fee_categories,name',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => __($validator->messages()->all()[0]),
                'alert-type' => 'error'
            );
            return back()->with($notification)->withInput();
        }

        $feeCategory = new FeeCategory();
        $feeCategory->name = $request->name;
        $feeCategory->save();

        $notification = array(
            'message' => __('Fee Category Inserted Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('fee.category.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feeCategory = FeeCategory::findOrfail($id);

        return view('backend.setup.fee_category.edit_fee_category', compact('feeCategory'));
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
        $feeCategory = FeeCategory::findOrfail($id);

        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|unique:fee_categories,name,'.$feeCategory->id,
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => __($validator->messages()->all()[0]),
                'alert-type' => 'error'
            );
            return back()->with($notification)->withInput();
        }

        $feeCategory->name = $request->name;
        $feeCategory->save();

        $notification = array(
            'message' => __('Fee Category Updated Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('fee.category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feeCategory = FeeCategory::findOrfail($id);
        $feeCategory->delete();

        $notification = array(
            'message' => __('Fee Category Deleted Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->route('fee.category.index')->with($notification);
    }
}