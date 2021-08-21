<?php

namespace App\Http\Controllers\Admin\Databasebackup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class DatabasebackupController extends Controller
{
    public function dbBackupList()
    {
        $dbbackupfiles = Storage::files('Laravel');
        return view('admin.dbbackup.backuplist', compact('dbbackupfiles'));
    }

    public function storeDbBackup()
    {
        try {

            Artisan::call('backup:run');
            //Artisan::call('optimize');
            activityLog("get db backup.");
            return redirect(route('admin.dbbackuplist'))->with('dbbackupsuccess', 'DB Backup successfully saved!');
        } catch (\Throwable $exception) {
            dd($exception);
        }
        //return redirect(route('admin.dbbackuplist'))->with('dbbackupsuccess', 'DB Backup successfully saved!'); 
    }

    public function downloadBackup($name)
    {
        activityLog("downloaded db backup file.");
        return Storage::download('Laravel/'. $name);
    }

    public function deleteDbBackuoFile(Request $request)
    {
        $file = $request->filename;
        if (Storage::exists('Laravel/' . $file)) {
            Storage::delete('Laravel/'. $file);
        }
        activityLog("deleted db backup file.");
        return response()->json(['success' => 'DB Backup file successfully deleted!', 200]);
    }
}
