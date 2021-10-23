<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profileView()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('backend.user.view_profile', compact('user'));
    }

    public function profileEdit()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('backend.user.edit_profile', compact('user'));
    }

    public function profileStore(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        if ($request->file('image')){
            $user->image = $this->uploadImage($request, $user);
        }
        $user->save();

        $notification = array(
            'message' => __('User Profile Updated Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('profile.view')->with($notification);
    }

    public function uploadImage(Request $request, $data)
    {
        $file = $request->file('image');
        @unlink(public_path('upload/user_images/'.$data->image));
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/user_images'),$filename);

        return $filename;
    }
}
