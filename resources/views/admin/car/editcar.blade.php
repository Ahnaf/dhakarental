@extends('layouts.admin')
@section('title','Edit Car')
{{-- @section('description', 'Admin Login')
@section('meta', 'Admin Login') --}}


@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" rel="stylesheet" type="text/css">
<style>

/*** CUSTOM FILE INPUT STYE ***/
.wrap-custom-file {
  position: relative;
  display: inline-block;
  width: 150px;
  height: 150px;
  margin: 0 0.5rem 1rem;
  text-align: center;
}
.wrap-custom-file input[type="file"] {
  position: absolute;
  top: 0;
  left: 0;
  width: 2px;
  height: 2px;
  overflow: hidden;
  opacity: 0;
}
.wrap-custom-file label {
  z-index: 1;
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  overflow: hidden;
  padding: 0 0.5rem;
  cursor: pointer;
  background-color: rgb(218, 211, 211);
  border-radius: 4px;
  -webkit-transition: -webkit-transform 0.4s;
  transition: -webkit-transform 0.4s;
  transition: transform 0.4s;
  transition: transform 0.4s, -webkit-transform 0.4s;
}
.wrap-custom-file label span {
  display: block;
  margin-top: 2rem;
  font-size: 1.4rem;
  color: #777;
  -webkit-transition: color 0.4s;
  transition: color 0.4s;
}
.wrap-custom-file label .fa {
  position: absolute;
  bottom: 1rem;
  left: 50%;
  -webkit-transform: translatex(-50%);
  transform: translatex(-50%);
  font-size: 1.5rem;
  color: lightcoral;
  -webkit-transition: color 0.4s;
  transition: color 0.4s;
}
.wrap-custom-file label:hover {
  -webkit-transform: translateY(-1rem);
  transform: translateY(-1rem);
}
.wrap-custom-file label:hover span, .wrap-custom-file label:hover .fa {
  color: #333;
}
.wrap-custom-file label.file-ok {
  background-size: cover;
  background-position: center;
}
.wrap-custom-file label.file-ok span {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  padding: 0.3rem;
  font-size: 1.1rem;
  color: #000;
  background-color: rgba(255, 255, 255, 0.7);
}
.wrap-custom-file label.file-ok .fa {
  display: none;
}
</style>
@endpush

@section('content')


<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Edit Car</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Basic info-->

            <div class="card mb-5 mb-xl-10">
               @if(session('carwarning'))
                    <!--begin::Alert-->
                    <div class="alert alert-dismissible bg-warning d-flex flex-column flex-sm-row p-5 mb-10">
                        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                            <p class="fs-6 mt-3">{{ session('carwarning') }}</p>
                        </div>
                        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                            <span class="svg-icon svg-icon-2x svg-icon-light">&times;</span>
                        </button>
                    </div>
                    <!--end::Alert-->
                @endif
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Edit Car Profile</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div>
                    <!--begin::Form-->
                    <form class="form" action="{{ route('admin.carupdate') }}" method="POST" enctype="multipart/form-data">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            @csrf
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label required fw-bold fs-6">Image</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('storage/car/'.$car->token.'/'.$car->avatar)}})">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-300px h-150px" style="background-image: url({{asset('storage/car/'.$car->token.'/'.$car->avatar)}})"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>

                                    <!--end::Hint-->
                                </div>
                                @error('avatar') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label fw-bold fs-6">
                                    <span class="required">Type</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-3 fv-row">
                                    <select name="type" aria-label="Select Type" data-control="select2" data-placeholder="Select Type..." class="form-select form-select-solid form-select-lg fw-bold">
                                        <option value="">Select Type...</option>
                                        <option value="Sedan" @if ($car->type == 'Sedan') {{'selected'}} @else {{''}} @endif>Sedan</option>
                                        <option value="SUV" @if ($car->type == 'SUV') {{'selected'}} @else {{''}} @endif>SUV</option>
                                        <option value="CUV" @if ($car->type == 'CUV') {{'selected'}} @else {{''}} @endif>CUV</option>
                                        <option value="Micro" @if ($car->type == 'Micro') {{'selected'}} @else {{''}} @endif>Micro</option>
                                        <option value="VAN" @if ($car->type == 'VAN') {{'selected'}} @else {{''}} @endif>VAN</option>
                                    </select>

                                </div>
                                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label required fw-bold fs-6">Reg. Number</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-3">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="reg_number" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Enter Reg Number" value="{{ $car->reg_number }}" />

                                        </div>
                                        <!--end::Col-->

                                    </div>
                                    <!--end::Row-->
                                </div>
                                @error('reg_number') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label fw-bold fs-6">
                                    <span class="required">Registration Year</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                
                                <div class="col-lg-3 fv-row">
                                    <input type="hidden" id="setyearpicker" value="{{ $car->registration_year}}">
                                    <select name="registration_year" id="yearpicker" aria-label="Select Year" data-control="select2" data-placeholder="Select Year..." class="form-select form-select-solid form-select-lg fw-bold">
                                        <option value="">Select Year...</option>

                                    </select>

                                </div>
                                @error('registration_year') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->


                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label required fw-bold fs-6">Car Model</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-3 fv-row">
                                    <input type="text" name="model" class="form-control form-control-lg form-control-solid" placeholder="Enter Car Model" value="{{ $car->model }}" />

                                </div>
                                @error('model') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label fw-bold fs-6">
                                    <span class="required">Condition</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input @if ($car->condition == 'Best') {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="condition" value="Best"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Best
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input @if ($car->condition == 'Good') {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="condition" value="Good"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Good
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input @if ($car->condition == 'Average') {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="condition" value="Average"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Average
                                        </label>
                                    </div>

                                </div>
                                @error('condition') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label fw-bold fs-6">
                                    <span class="required">AC Type</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->

                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input @if ($car->ac == 'Single') {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="ac" value="Single"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Single
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input @if ($car->ac == 'Duel') {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="ac" value="Duel"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Duel
                                        </label>
                                    </div>

                                </div>
                                @error('ac') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label fw-bold fs-6">
                                    <span class="required">Fuel Type</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-2 fv-row">
                                   
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="fuel" value="Petrol"
                                          @if ($car->fuel == 'Petrol')
                                            {{'checked'}}
                                          @else
                                            {{''}}
                                          @endif  
                                        />
                                        <label class="form-check-label" for="flexRadioLg">
                                            Petrol
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="fuel" value="CNG"
                                          @if ($car->fuel == 'CNG')
                                            {{'checked'}}
                                          @else
                                            {{''}}
                                          @endif  
                                        />
                                        <label class="form-check-label" for="flexRadioLg">
                                            CNG
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="fuel" value="LPG"
                                          @if ($car->fuel == 'LPG')
                                            {{'checked'}}
                                          @else
                                            {{''}}
                                          @endif  
                                        />
                                        <label class="form-check-label" for="flexRadioLg">
                                            LPG
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="fuel" value="Hybrid"
                                          @if ($car->fuel == 'Hybrid')
                                            {{'checked'}}
                                          @else
                                            {{''}}
                                          @endif  
                                        />
                                        <label class="form-check-label" for="flexRadioLg">
                                            Hybrid
                                        </label>
                                    </div>
                                </div>
                                @error('fuel') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label required fw-bold fs-6">Gearbox</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input @if ($car->gearbox == 'Manual') {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="gearbox" value="Manual"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Manual
                                        </label>
                                    </div>

                                </div>

                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input @if ($car->gearbox == 'Automatic') {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="gearbox" value="Automatic"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Automatic
                                        </label>
                                    </div>

                                </div>

                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input @if ($car->gearbox == 'Semi-automatic') {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="gearbox" value="Semi-automatic"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Semi-automatic
                                        </label>
                                    </div>

                                </div>
                                @error('gearbox') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label fw-bold fs-6">
                                    <span class="required">Sitting Capacity</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input @if ($car->sitting == 3) {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="sitting" value="3"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            3
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input @if ($car->sitting == 5) {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="sitting" value="5"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            5
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input @if ($car->sitting == 7) {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="sitting" value="7"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            7
                                        </label>
                                    </div>

                                </div>

                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input @if ($car->sitting == 9) {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="sitting" value="9"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            9
                                        </label>
                                    </div>

                                </div>

                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input @if ($car->sitting == 11) {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="sitting" value="11"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            11
                                        </label>
                                    </div>

                                </div>

                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input @if ($car->sitting == 13) {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="sitting" value="13"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            13
                                        </label>
                                    </div>

                                </div>

                                @error('sitting') <span class="text-danger">{{ $message }}</span> @enderror

                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label required fw-bold fs-6">Color</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-4 fv-row">
                                    <select name="color" id="color" aria-label="Select Color" data-control="select2" data-placeholder="Select Color..." class="form-select form-select-solid form-select-lg fw-bold">
                                        <option value="">Select Color...</option>
                                        <option value="Black" @if ($car->color == 'Black') {{'selected'}} @else {{''}} @endif >Black</option>
                                        <option value="Blue" @if ($car->color == 'Blue') {{'selected'}} @else {{''}} @endif>Blue</option>
                                        <option value="Brown" @if ($car->color == 'Brown') {{'selected'}} @else {{''}} @endif>Brown</option>
                                        <option value="Gold" @if ($car->color == 'Gold') {{'selected'}} @else {{''}} @endif>Gold</option>
                                        <option value="Gray" @if ($car->color == 'Gray') {{'selected'}} @else {{''}} @endif>Gray</option>
                                        <option value="Green" @if ($car->color == 'Green') {{'selected'}} @else {{''}} @endif>Green</option>
                                        <option value="Orange" @if ($car->color == 'Orange') {{'selected'}} @else {{''}} @endif>Orange</option>
                                        <option value="Purple" @if ($car->color == 'Purple') {{'selected'}} @else {{''}} @endif>Purple</option>
                                        <option value="Red" @if ($car->color == 'Red') {{'selected'}} @else {{''}} @endif>Red</option>
                                        <option value="Silver" @if ($car->color == 'Silver') {{'selected'}} @else {{''}} @endif>Silver</option>
                                        <option value="Tan" @if ($car->color == 'Tan') {{'selected'}} @else {{''}} @endif>Tan</option>
                                        <option value="White" @if ($car->color == 'White') {{'selected'}} @else {{''}} @endif>White</option>
                                        <option value="Yellow" @if ($car->color == 'Yellow') {{'selected'}} @else {{''}} @endif>Yellow</option>
                                    </select>

                                </div>
                                @error('color') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label required fw-bold fs-6">Location</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-4 fv-row">
                                    <input type="text" name="location" class="form-control form-control-lg form-control-solid" placeholder="Enter Location" value="{{ $car->location }}" />

                                </div>
                                @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label fw-bold fs-6">
                                    <span class="required">isAvailable</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input @if ($car->isavailable == 'True') {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="isavailable" value="True"/>
                                        <label class="form-check-label" for="flexRadioSm">
                                            True
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input @if ($car->isavailable == 'False') {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="isavailable" value="False"/>
                                        <label class="form-check-label" for="flexRadioSm">
                                            False
                                        </label>
                                    </div>

                                </div>
                                @error('isavailable') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label fw-bold fs-6">Other Features</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="other_features" class="form-control form-control-lg form-control-solid" placeholder="Enter Other Features" value="{{ $car->other_features}}" />

                                </div>
                                 @error('other_features') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label fw-bold fs-6">Owner/Driver</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="owner_driver" class="form-control form-control-lg form-control-solid" placeholder="Enter Owner/Driver" value="{{ $car->owner_driver}}" />

                                </div>
                                @error('owner_driver') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label fw-bold fs-6">Note</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="note" class="form-control form-control-lg form-control-solid" placeholder="Enter Note" value="{{ $car->note }}" />

                                </div>
                                @error('note') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label fw-bold fs-6">
                                    <span class="required">Preferred For</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid form-check-sm">
                                        <input @if ($car->prefered == 'Any') {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="prefered" value="Any"/>
                                        <label class="form-check-label" for="flexRadioSm">
                                            Any
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid form-check-sm">
                                        <input @if ($car->prefered == 'Daily') {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="prefered" value="Daily"/>
                                        <label class="form-check-label" for="flexRadioSm">
                                           Daily
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid form-check-sm">
                                        <input @if ($car->prefered == 'Weekly') {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="prefered" value="Weekly"/>
                                        <label class="form-check-label" for="flexRadioSm">
                                           Weekly
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid form-check-sm">
                                        <input @if ($car->prefered == 'Monthly') {{'checked'}} @else {{''}} @endif class="form-check-input" type="radio" name="prefered" value="Monthly"/>
                                        <label class="form-check-label" for="flexRadioSm">
                                           Monthly
                                        </label>
                                    </div>

                                </div>
                                @error('prefered') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->

                           <input type="hidden" name="carid" value="{{ $car->id }}">
                           <input type="hidden" name="cartoken" value="{{ $car->token }}">

                        </div>
                        <!--end::Card body-->
                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Update</button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Basic info-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->

<!--begin::Container-->
<div id="kt_content_container" class="container">
    <!--begin::Row-->
    <div class="row g-5 g-xxl-8">
        <!--begin::Col-->
        <div class="col-xxl-5">
            <!--begin::Tables Widget 5-->
            <div class="card card-xxl-stretch mb-5 mb-xl-8">
 
                <!--begin::Body-->
                <div class="card-body py-3">
                    <div class="tab-content">
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                               <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_permissions_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">#No:</th>
                                <th class="min-w-125px">Gallery Image</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($car->gallery as $index => $gallery)
                                <tr>
                                <!--begin::Name=-->
                                <td>{{ $index + 1}}</td>
                                <!--end::Name=-->
                                <!--begin::Assigned to=-->
                                <td><img src="{{ asset('storage/car/'.$car->token.'/'.$gallery->gallery_image)}}" width="80" height="60"></td>
                                
                                <!--end::Assigned to=-->
                                <!--begin::Action=-->
                                <td class="text-end">
                                    
                                    <!--begin::Update-->
                                    <button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3 getgalleryeditid" data-galleryid="{{ $gallery->id }}" data-bs-toggle="modal" data-bs-target="#kt_gallery_update_module">
                                        <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                    <!--end::Update-->
                                    <!--begin::Delete-->
                                    {{-- <button class="btn btn-icon btn-active-light-primary w-30px h-30px" data-kt-permissions-table-filter="delete_row">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button> --}}
                                    <!--end::Delete-->
                                </td>
                                <!--end::Action=-->
                            </tr>
                            @endforeach
                            
                        </tbody>
                        <!--end::Table body-->
                    </table>
                            </div>
                            <!--end::Table-->
                        </div>
                     
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Tables Widget 5-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xxl-7">
            <!--begin::Tables Widget 5-->
            <div class="card card-xxl-stretch mb-5 mb-xl-8">
 
                <!--begin::Body-->
                <div class="card-body py-3">
                    <div class="tab-content">
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                               <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_permissions_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">#No:</th>
                                <th class="min-w-125px">Attach Paper Name</th>
                                <th class="min-w-250px">Attach Paper File</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($car->attachment as $index => $attach)
                                <tr>
                                <!--begin::Name=-->
                                <td>{{ $index + 1}}</td>
                                <!--end::Name=-->
                                <!--begin::Assigned to=-->
                                <td>{{$attach->pepar_name}}</td>
                                <td>
                                   <a href="{{ url('storage/car/'.$car->token.'/'.$attach->pepar_file)}}" class="fw-bold link-primary" target="_blank">{{$attach->pepar_file}}</a> 
                                </td>
                                <!--end::Assigned to=-->
                                <!--begin::Action=-->
                                <td class="text-end">
                                    
                                    <!--begin::Update-->
                                    <button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3 getattacheditid" data-attachid="{{$attach->id}}"" data-attachname="{{$attach->pepar_name}}" data-bs-toggle="modal" data-bs-target="#kt_attach_update_module">
                                        <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                    <!--end::Update-->
                                    <!--begin::Delete-->
                                    {{-- <button class="btn btn-icon btn-active-light-primary w-30px h-30px" data-kt-permissions-table-filter="delete_row">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button> --}}
                                    <!--end::Delete-->
                                </td>
                                <!--end::Action=-->
                            </tr>
                            @endforeach
                            
                        </tbody>
                        <!--end::Table body-->
                    </table>
                            </div>
                            <!--end::Table-->
                        </div>
                     
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Tables Widget 5-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
    
</div>
<!--end::Container-->

<!--begin::Modals-->
<!--begin::Modal - Add permissions-->
<div class="modal fade" id="kt_gallery_update_module" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Update Gallery</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-gallery-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                
                <!--begin::Form-->
                <form id="kt_modal_update_gallery_form" class="form" enctype="multipart/form-data">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold form-label mb-2">
                            <span class="required">Select Gallery Image</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Permission names is required to be unique."></i>
                        </label>
                        <!--end::Label-->
                        <div class="wrap-custom-file">
                            <input type="file" name="gallery" id="image1" accept=".gif, .jpg, .png .jpeg" />
                            <label  for="image1">
                            <span>Select Image</span>
                            <i class="fa fa-image" style="font-size:40px;"></i>
                            </label>
                        </div>
                    </div>

                    <div class="fv-row mb-7">
                        <input type="hidden" id="gallerycarid" name="gallerycarid" value="">
                        <input type="hidden" id="setgcarid" name="setgcarid" value="{{$car->id}}">
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-gallery-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-gallery-modal-action="submit">
                            <span class="indicator-label">Update</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add permissions-->
<!--begin::Modal - Update permissions-->
<div class="modal fade" id="kt_attach_update_module" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Update Attachment</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-attach-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                
                <!--begin::Form-->
                <form id="kt_modal_update_attach_form" class="form" enctype="multipart/form-data">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold form-label mb-2">
                            <span class="required">Attachments pepar Name</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" id="attachname" name="attachments_of_text" class="form-control form-control-lg form-control-solid" placeholder="Name of attachment" value=""/>
                        <!--end::Input-->
                    </div>

                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold form-label mb-2">
                            <span class="">Attachments pepar file</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="file" name="attachments_of_paper" class="form-control form-control-lg form-control-solid"/>
                        
                        <!--end::Input-->
                        <input type="hidden" id="attachid" name="attachid" value="">
                        <input type="hidden" id="attachcarid" name="attachcarid" value="{{$car->id}}">
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-attach-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-attach-modal-action="submit">
                            <span class="indicator-label">Update</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Update permissions-->
<!--end::Modals-->
@endsection

@push('scripts')




<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('assets/js/custom/apps/support-center/tickets/create.js')}}"></script>
<script src="{{asset('assets/js/custom/documentation/documentation.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/custom/apps/user-management/car/update-gallery.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/car/update-attach.js')}}"></script>
<script type="text/javascript">
    let startYear = 1970;
    let endYear = new Date().getFullYear();
    for (i = endYear; i > startYear; i--)
    {
      $('#yearpicker').append($('<option />').val(i).html(i));
    }
    let setyear = $('#setyearpicker').val();
    $('#yearpicker').val(setyear);

</script>
<script type="text/javascript">


$('input[type="file"]').each(function(){
  // Refs
  var $file = $(this),
      $label = $file.next('label'),
      $labelText = $label.find('span'),
      labelDefault = $labelText.text();

  // When a new file is selected
  $file.on('change', function(event){
    var fileName = $file.val().split( '\\' ).pop(),
        tmppath = URL.createObjectURL(event.target.files[0]);
    //Check successfully selection
    if( fileName ){
      $label
        .addClass('file-ok')
        .css('background-image', 'url(' + tmppath + ')');
      $labelText.text(fileName);
    }else{
      $label.removeClass('file-ok');
      $labelText.text(labelDefault);
    }
  });

// End loop of file input elements
});
 $('.getgalleryeditid').on('click', function(){
    let gid = $(this).attr('data-galleryid');
    $('#gallerycarid').val(gid);
    
});
$('.getattacheditid').on('click', function(){
    let aid = $(this).attr('data-attachid');
    let attachname = $(this).attr('data-attachname');
    $('#attachname').val(attachname);
    $('#attachid').val(aid);
    
});

</script>
@endpush
