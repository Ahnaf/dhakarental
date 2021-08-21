<?php

namespace App\Http\Controllers\Admin\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
