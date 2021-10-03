<?php

namespace App\Http\Controllers\Admin\Requestcar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Requestcar;

class RequestcarController extends Controller
{
    public function storeCarREquest(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required|max:70',
            'contact_number' => 'required|min:11|max:11|regex:/^\+?(88)?0?1[3456789][0-9]{8}\b/',
            'date_of_journey' => 'required',
            'pickup_time'  => 'required',
            'pessenger' => 'required',
            'from' => 'required',
            'to' => 'required',
            'other_information'  => 'nullable|max:255'
        ]);


        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $data = [
            'name' => $request->name,
            'contact_number' => $request->contact_number,
            'date_of_journey' => $request->date_of_journey,
            'pickup_time' => $request->pickup_time,
            'pessenger' => $request->pessenger,
            'from' => $request->from,
            'to' => $request->to,
            'other_information' => $request->other_information,
            'notification' => 0,
            'status' => 'panding'

        ];

        Requestcar::create($data);

        return response()->json(['status' => 'Request successfully send'], 200);
    }


    public function requestCarList()
    {
        $requestlist = Requestcar::orderBy('id', 'DESC')->paginate(20);
        return view('admin.requestcarall.carrequestlist', compact('requestlist'));
    }

    public function carRequestDetails($id)
    {
        $requestcar = Requestcar::findOrFail($id);
        return view('admin.requestcarall.requestcardetails', compact('requestcar'));
    }

    public function deleteCarRequest(Request $request)
    {
        $find = Requestcar::findOrFail($request->rcarid);
        $find->delete();
        return response()->json(['success' => "Car Request successfully deleted!", 200]);
    }
}
