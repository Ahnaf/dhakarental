<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\Module;

class RoleController extends Controller
{
    public function roleList()
    {
        $roles = Role::paginate(10);
        return view("admin.role.rolelist", compact('roles'));
    }

    public function roleStoreViw()
    {
        $modules = Module::get();
        return view('admin.role.rolestore', compact('modules'));
    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|max:150|unique:roles,slug',
            'description' => 'required',
            'permissions' => 'required'
        ]);

        $data = [
            'name' => $request->role_name,
            'slug' => Str::slug($request->role_name),
            'description' => $request->description 
        ];
        

        Role::create($data)->permissions()->attach($request->permissions);
        activityLog("created a new role.");
        return redirect(route('admin.rolelist'))->with('rolesuccess', "Role successfully save!");
    }

    public function updateRoleView($id)
    {
        $modules = Module::get();
        $role = Role::findOrFail($id);
        return view('admin.role.roleupdateview', compact('modules', 'role'));
    }

    public function storeUpdateRole(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|max:60',
            'description' => 'required',
            'permissions' => 'required'
        ]);

        $data = [
            'name' => $request->role_name,
            'slug' => Str::slug($request->role_name),
            'description' => $request->description
        ];

        Role::where('id', $request->roleid)->update($data);
        $rolesedit = Role::findOrFail($request->roleid);
        $rolesedit->permissions()->sync($request->permissions);
        activityLog("updated role.");
        return redirect(route('admin.rolelist'))->with('rolesuccess', "Role successfully updated!");

    }

    public function deleteRole(Request $request)
    {
        $roleid = $request->roleid;
        $findR = Role::findOrFail($roleid);
        $findR->delete();
        activityLog("deleted role.");
        return response()->json(['success' => 'Role successfully deleted!', 200]);
    }
}
