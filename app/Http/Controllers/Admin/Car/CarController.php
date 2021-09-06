<?php

namespace App\Http\Controllers\Admin\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\CarUpdateRequest;
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

    public function changeStatus(Request $request)
    {
        $id = $request->carid;
        $status = $request->carstatus;
        if($status == 1){
            Car::where('id', $id)->update(['status' => 0]);
            return response()->json(['success' => 'Car status successfully dactive !', 200]);  
        }else{
            Car::where('id', $id)->update(['status' => 1]);
            return response()->json(['success' => 'Car status successfully active!', 200]);
        }
        
    }

    public function carEditView($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.car.editcar', compact('car'));
    }

    public function updateCarStore(CarUpdateRequest $request)
    {
        $validated = $request->validated();
        $fule = implode(', ', $validated['fuel']);
        $token = $validated['cartoken'];
        $carid = $validated['carid'];
        $data = [
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
            'prefered' => $validated['prefered']
        ];

        try {

            $findCar = Car::findOrFail($carid);
            if (isset($validated['avatar'])) {
                $image = $validated['avatar'];
                $serverimgname = uniqid() . '.' . $image->getClientOriginalExtension();
                $validated['avatar']->storeAs('public/car/' . $token, $serverimgname);
                $data['avatar'] = $serverimgname;

                if (Storage::exists('public/car/'. $token .'/'. $findCar->avatar)) {
                    Storage::disk('public')->delete('car/'. $token .'/'. $findCar->avatar);
                }
            }

            Car::where('id', $carid)->update($data);

            return redirect(route('admin.carlist'))->with('carsuccess', 'Car successfully updated!');
        } catch (\Throwable $exception) {
            return redirect(route('admin.caredit', ['id' => $carid]))->with('carwarning', 'Car not update, Internal error');

        }
    }

    public function editGallery(Request $request)
    {
        $v = Validator::make($request->all(), [
            'gallery' => 'required|mimes:jpg,gif,jpeg,png'
        ]);

        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $gid = $request->gallerycarid;
        $findCar = Car::findOrFail($request->setgcarid);
        $findGallery = Cargallery::findOrFail($gid);
        $token = $findCar->token;
        
        $image = $request->gallery;
        $serverimgname = uniqid('car') . '.' . $image->getClientOriginalExtension();
        $request->gallery->storeAs('public/car/' . $token, $serverimgname);
        $data['gallery_image'] = $serverimgname;

        if (Storage::exists('public/car/' . $token . '/' . $findGallery->gallery_image)) {
            Storage::disk('public')->delete('car/' . $token . '/' . $findGallery->gallery_image);
        }

        Cargallery::where('id', $gid)->update($data);
        return response()->json(['success' => "Gallery image successfully updated", 200]);
    }

    public function editAttach(Request $request)
    {
        $v = Validator::make($request->all(), [
            'attachments_of_text' => 'required',
            'attachments_of_paper' => 'nullable|mimes:jpg,gif,jpeg,png,pdf,doc'
        ]);

        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $aid = $request->attachid;
        $findCar = Car::findOrFail($request->attachcarid);
        $findAttach = Carattach::findOrFail($aid);
        $token = $findCar->token;

        $data = [
            'pepar_name' => $request->attachments_of_text,
        ];

        $file = $request->attachments_of_paper;

        if($file){
            $serverimgname = uniqid('attachpepar') . '.' . $file->getClientOriginalExtension();
            $request->attachments_of_paper->storeAs('public/car/' . $token, $serverimgname);
            $data['pepar_file'] = $serverimgname;

            if (Storage::exists('public/car/' . $token . '/' . $findAttach->pepar_file)) {
                Storage::disk('public')->delete('car/' . $token . '/' . $findAttach->pepar_file);
            }
        }

        Carattach::where('id', $aid)->update($data);
        return response()->json(['success' => "Attachment successfully updated", 200]);
    }

    public function carFilter(Request $request)
    {
        $cars = Car::where('type', $request->type)
                ->where('model', $request->model)
                ->where('condition', $request->condition)
                ->where('fuel', $request->fuel)
                ->where('location', $request->location)
                ->where('isavailable', $request->isavailable)
                ->where('status', 1)->paginate(10);

        return view('admin.car.carfilter', compact('cars'));

    }
}
