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
        $users = User::where('usertype', 'Admin')->get();
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
            $notification = array(
                'message' => __($validator->messages()->all()[0]),
                'alert-type' => 'error'
            );
            return back()->with($notification)->withInput();
        }

        $code = rand(000000, 999999);
        $data = new User();
        $data->usertype = "Admin";
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->code = $code;
        $data->password = bcrypt($code);
        $data->save();

        $notification = array(
            'message' => __('User Inserted Successfully'),
            'alert-type' => 'success'
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
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $notification = array(
            'message' => __('User Updated Successfully'),
            'alert-type' => 'success'
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