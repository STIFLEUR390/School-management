<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //
    public function userView()
    {
        $users = User::all();
        return view('backend.user.view_user', compact('users'));
    }

    public function userAdd()
    {
        return view('backend.user.add_user');
    }

    public function userStore(Request $request)
    {
        /*$request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);*/
        $validator = \Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => __('User Inserted Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->route('user.view')->with($notification);

//        return redirect()->route('user.view')->withToastSuccess(__('User Inserted Successfully'));
    }

    public function userEdit($id)
    {
        $user = User::findOrFail($id);

        return view('backend.user.edit_user', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $notification = array(
            'message' => __('User Updated Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function userDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $notification = array(
            'message' => __('User deleted Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->route('user.view')->with($notification);
    }
}
