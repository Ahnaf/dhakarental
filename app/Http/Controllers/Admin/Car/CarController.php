<?php

namespace App\Http\Controllers\Admin\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateCarRequest;

class CarController extends Controller
{
    public function carList()
    {
        return view('admin.car.carlist');
    }

    public function addCarView()
    {
        return view('admin.car.addcarview');
    }

    public function storeCar(CreateCarRequest $request)
    {
        $validated = $request->validated();
        $fule = implode(',', $validated['fuel']);
        $token = uniqid('car');
        
        $data = [
            'token' => $token,
            'type' => $validated['type'],
            'reg_number' => $validated['reg_number'],
            'registration_year' => $validated['registration_year'],
            'model' => $validated['model'],
            'condition' => $validated['condition'],
            'ac' => $validated['ac'],
            'fuel' => $fule,
            'gearbox' => $validated['gearbox'],
            'sitting' => $validated['sitting'],
            'color' => $validated['color'],
            'location' => $validated['location'],
            'isavailable' => $validated['isavailable'],
            'other_features' => $validated['other_features'],
            'owner_driver' => $validated['owner_driver'],
            'note' => $validated['note'],
            'prefered' => $validated['prefered'],
        ];

        try {
            Storage::disk('public')->makeDirectory('car/' . $token);
            $image = $validated['avatar'];

            $serverimgname = uniqid() . '.' . $image->getClientOriginalExtension();
            $validated['avatar']->storeAs('public/car/'. $token, $serverimgname);
        //dd($validated['gallery']);
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }
}
