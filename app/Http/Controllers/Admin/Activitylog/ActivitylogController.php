<?php

namespace App\Http\Controllers\Admin\Activitylog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Models\Permission;

class ActivitylogController extends Controller
{
    public function activityLogList()
    {
        $lastActivitys = Activity::orderBy('id', 'DESC')->paginate(10);
        return view('admin.activitylog.activityloglist', compact('lastActivitys'));
    }

    public function deleteActivityLog(Request $request)
    {
        $findDelete = Activity::findOrFail($request->activityid);
        $findDelete->delete();
        activityLog("deleted activity log.");
        return response()->json(['success' => 'Activity log successfully deleted!', 200]);   
    }

    public function deleteActivityLogList(Request $request)
    {
        foreach ($request->activityidlist as $activityid) {
            $find = Activity::findOrFail($activityid);
            $find->delete();
        }
        activityLog("deleted activity log list.");
        return response()->json(['success' => 'Activity Logs successfully deleted!', 200]);
    }
}
