<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Admin;

class AdminRegisterController extends Controller
{

    public function adminList()
    {
        $admins = Admin::paginate(10);
        return view('admin.auth.adminlist', compact('admins'));
    }
    public function adminUserAdd()
    {
        $roles = Role::get();
        return view('admin.auth.adminregister', compact('roles'));
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required']
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id'  => $request->role
        ];

        Admin::create($data);
        activityLog("create a admin user.");
        return redirect(route('admin.listindex'))->with('adminsucess', 'Admin successfully saved!');

    }

    public function editAdminView($id)
    {
        $roles = Role::get();
        $admin = Admin::findOrFail($id);
        return view('admin.auth.editadmin', compact('roles', 'admin'));
    }

    public function updateAdminStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role' => ['required']
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role_id'  => $request->role
        ];

        try {
            if(isset($request->password)){
                $data['password'] = Hash::make($request->password);
            }
            Admin::where('id', $request->adminid)->update($data);
            activityLog("updated admin user.");
            return redirect(route('admin.listindex'))->with('adminsucess', 'Admin successfully updated!');
        } catch (\Throwable $exception) {
            return redirect(route('admin.listindex'))->with('adminwarning', 'Internal error!');
        }
    }

    public function deleteAdmin(Request $request)
    {
        $find = Admin::findOrFail($request->adminid);
        $find->delete();
        activityLog("deleted admin user.");
        return response()->json(['success' => 'Admin successfully deleted!', 200]);
    }
}
