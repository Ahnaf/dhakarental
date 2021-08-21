<?php

namespace App\Http\Controllers\Admin\Module;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Module;

class ModuleController extends Controller
{
    public function moduleList()
    {
        $modules = Module::orderBy('id', 'ASC')->paginate(10);
        return view('admin.module.modulelist', ['modules' => $modules]);
    }

    public function moduleStore(Request $request)
    {
        $v = Validator::make($request->all(), [
            'modulename' => 'required',
            'moduledescription'  => 'required',
        ]);

        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $data =[
            'name' => $request->modulename,
            'description' => $request->moduledescription
        ];

        Module::create($data);
        activityLog("created a new module.");
        return response()->json(['success' => 'Module successfully seved!', 200]);
    }

    public function updateModule(Request $request)
    {
        $v = Validator::make($request->all(), [
            'modulename' => 'required',
            'moduledescription'  => 'required',
        ]);

        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $data = [
            'name' => $request->modulename,
            'description' => $request->moduledescription
        ];

        Module::where('id', $request->moduleid)->update($data);
        activityLog("updated module.");
        return response()->json(['success' => 'Module successfully updated!', 200]);

    }



    public function deleteModule(Request $request)
    {
        $findModule = Module::findOrFail($request->moduleid);
        $findModule->delete();
        activityLog("deleted module.");
        return response()->json(['success' => 'Module successfully deleted!', 200]);
    }
}
