<?php

namespace App\Http\Controllers\Admin\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateCarRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Car;
use App\Models\Cargallery;
use App\Models\Carattach;

class CarController extends Controller
{
    public function carList()
    {
        $cars = Car::orderBy('id', 'DESC')->paginate(10);
        return view('admin.car.carlist', compact('cars'));
    }

    public function addCarView()
    {
        return view('admin.car.addcarview');
    }

    public function storeCar(CreateCarRequest $request)
    {
        $validated = $request->validated();
        $fule = implode(', ', $validated['fuel']);
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
            'created_by' => Auth::user()->id
        ];

        
        try {
            DB::beginTransaction();
            $image = $validated['avatar'];
            if($image){
                Storage::disk('public')->makeDirectory('car/' . $token);
                $serverimgname = uniqid() . '.' . $image->getClientOriginalExtension();
                $validated['avatar']->storeAs('public/car/' . $token, $serverimgname);
                $data['avatar'] = $serverimgname;
            }
            $car = Car::create($data);
           

            foreach ($validated['attachments_of_paper'] as $key => $value) {
                $file = uniqid('attachpepar') . '.' . $validated['attachments_of_paper'][$key]->getClientOriginalExtension();
                $value->storeAs('public/car/' . $token, $file);
                $data = [
                    'car_id' => $car->id,
                    'pepar_name' => $validated['attachments_of_text'][$key],
                    'pepar_file' => $file
                ];
                Carattach::create($data);
            }

            foreach ($validated['gallery'] as $key => $value) {
                $gallery = uniqid('gallery') . '.' . $validated['gallery'][$key]->getClientOriginalExtension();
                $value->storeAs('public/car/' . $token, $gallery);
                $data = [
                    'car_id' => $car->id,
                    'gallery_image' => $gallery
                ];
                Cargallery::create($data);
             }
            DB::commit(); 
            return redirect(route('admin.carlist'))->with('carsuccess', 'Car successfully saved!');
        } catch (\Throwable $exception) {
            return redirect(route('admin.caradd'))->with('carwarning', 'Car not save, Internal error');
            DB::rollBack();
        }
        
    }

    public function carDetails($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.car.cardetails', compact('car'));
    }

    public function deleteCar(Request $request)
    {
        $id = $request->carid;
        //Storage::deleteDirectory();
        return response()->json(['success' => 'Car successfully deleted!'. $id, 200]);
    }
}
