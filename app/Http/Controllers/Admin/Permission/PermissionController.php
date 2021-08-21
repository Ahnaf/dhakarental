<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Permission;
use App\Models\Module;

class PermissionController extends Controller
{
    public function permissionView()
    {
        $modules = Module::get();
        $permissions = Permission::paginate(10);
        return view('admin.permission.permissionview', compact('modules', 'permissions'));
    }

    public function storePermission(Request $request)
    {
        $v = Validator::make($request->all(), [
            'moduleid' => 'required',
            'permissionname' => 'required',
            'permissionslug'  => 'required|unique:permissions,slug',
        ]);

        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $data = [
            'module_id' => $request->moduleid,
            'name' => $request->permissionname,
            'slug' => $request->permissionslug
        ];

        Permission::create($data);
        activityLog("create a permission.");
        return response()->json(['success' => 'Permission successfully seved!', 200]);
    }

    public function permissionUpdate(Request $request)
    {
        $v = Validator::make($request->all(), [
            'moduleid' => 'required',
            'permissionname' => 'required',
            'permissionslug'  => 'required',
        ]);

        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $data = [
            'module_id' => $request->moduleid,
            'name' => $request->permissionname,
            'slug' => $request->permissionslug
        ];

        Permission::where('id', $request->perid)->update($data);
        activityLog("update permission.");
        return response()->json(['success' => 'Permission successfully updated!', 200]); 
    }


    public function deletePermission(Request $request)
    {
        $permissionid = $request->permissionid;
        $findP = Permission::findOrFail($permissionid);
        $findP->delete();
        activityLog("deleted permission.");
        return response()->json(['success' => 'Permission successfully deleted!', 200]);   
    }

    public function deletePermissionList(Request $request)
    {
        foreach($request->permissionidlist as $permissionid)
        {
           $find = Permission::findOrFail($permissionid);
           $find->delete();
        }
        activityLog("deleted permissions.");
        return response()->json(['success' => 'Permissions successfully deleted!', 200]);
    }
}
