<?php

namespace App\Http\Controllers\Admin\Carowner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarownerController extends Controller
{
    public function carOwnerList()
    {
        return view('admin.carowner.carowner');
    }

    public function carOwnerOverview($id)
    {
        return view('admin.carowner.overview');
    }

    public function addCarOwner()
    {
        return view('admin.carowner.addcarowner');
    }

    public function carOwnerProfile($id)
    {
        return view('admin.carowner.profile');
    }
}
