<?php

namespace App\Http\Controllers\Admin\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('Admin.component.user.change_password');
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.change.password')
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $currentPassword = $request->input('current_password');

        if (Hash::check($currentPassword, $user->password)) {
            $user->password = Hash::make($request->input('new_password'));
            $user->save();

            return redirect()->route('admin.home')->with('success', 'Password changed successfully.');
        } else {
            return redirect()->route('admin.change.password')->with('error', 'Current password is incorrect.');
        }
    }
}
