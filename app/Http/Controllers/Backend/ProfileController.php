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
}
