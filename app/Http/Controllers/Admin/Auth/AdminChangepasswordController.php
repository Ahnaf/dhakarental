<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminChangepasswordController extends Controller
{
    public function changePasswordView()
    {
        return view('admin.auth.changepassword');
    }

    public function storeChangePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $adminId = Auth::user()->id;

        $data = [
            'password' => Hash::make($request->password)
        ];
        Admin::where('id', $adminId)->update($data);
        activityLog("changed her password.");
        return redirect(route('admin.changepassview'))->with('adminpasssucess', 'Password successfully updated!');
    }
}
