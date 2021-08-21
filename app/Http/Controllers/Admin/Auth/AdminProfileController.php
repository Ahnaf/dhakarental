<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;


class AdminProfileController extends Controller
{
    public function profileView()
    {
        return view('admin.auth.profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];

        

        try {

            $userId = Auth::user()->id;
            $oldimg = Auth::user()->profile_pic;

            if(isset($request->image)){
                $folderPath = 'assets/media/avatars/';

                $image_parts = explode(";base64,", $request->image);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);

                $serverimgname = uniqid('admin') . '.' . $image_type;
                //dd($serverimgname);
                $file = $folderPath . '' . $serverimgname;
                file_put_contents($file, $image_base64);
                $data['profile_pic'] = $serverimgname;
                $imgPath = public_path('assets/media/avatars') . '/' . $oldimg;
                
                if (file_exists($imgPath)) {
                    @unlink('assets/media/avatars/' . $oldimg);
                }
            }

            Admin::where('id', $userId)->update($data);
            activityLog("updated her profile.");
            return redirect(route('admin.profileview'))->with('profilesuccess', 'Profile successfully updated!');
            
        } catch (\Throwable $exception) {
            return redirect(route('admin.profileview'))->with('profilewarning', 'Internal error!');
        }
    }
}
