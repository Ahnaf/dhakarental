@extends('layouts.admin')
@section('title','Add Car')
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Add New Car</h1>
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
                        <h3 class="fw-bolder m-0">Set Car Profile</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div>
                    <!--begin::Form-->
                    <form class="form" action="{{ route('admin.carstore') }}" method="POST" enctype="multipart/form-data">
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
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('assets/media/avatars/1234.png')}})">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-300px h-150px" style="background-image: url({{asset('assets/media/avatars/1234.png')}})"></div>
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
                                        <option value="Sedan" {{ (old('type') == 'Sedan') ? 'selected' : '' }}>Sedan</option>
                                        <option value="SUV" {{ (old('type') == 'SUV') ? 'selected' : '' }}>SUV</option>
                                        <option value="CUV" {{ (old('type') == 'CUV') ? 'selected' : '' }}>CUV</option>
                                        <option value="Micro" {{ (old('type') == 'Micro') ? 'selected' : '' }}>Micro</option>
                                        <option value="VAN" {{ (old('type') == 'VAN') ? 'selected' : '' }}>VAN</option>
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
                                            <input type="text" name="reg_number" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Enter Reg Number" value="{{ old('reg_number')}}" />

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
                                    <input type="text" name="model" class="form-control form-control-lg form-control-solid" placeholder="Enter Car Model" value="{{ old('model') }}" />

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
                                        <input class="form-check-input" type="radio" id="best" name="condition" value="Best" {{ (old('condition') == 'Best') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="best">
                                            Best
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" id="good" name="condition" value="Good" {{ (old('condition') == 'Good') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="good">
                                            Good
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" id="average" name="condition" value="Average" {{ (old('condition') == 'Average') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="average">
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
                                        <input class="form-check-input" type="radio" id="singel" name="ac" value="Single" {{ (old('ac') == 'Single') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="singel">
                                            Single
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" id="duel" name="ac" value="Duel" {{ (old('ac') == 'Duel') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="duel">
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
                                        <input class="form-check-input" type="radio" id="petrol" name="fuel" value="Petrol" {{ (old('fuel') == 'Petrol') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="petrol">
                                            Petrol
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="fuel" id="cng" value="CNG" {{ (old('fuel') == 'CNG') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="cng">
                                            CNG
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" id="lpg" name="fuel" value="LPG" {{ (old('fuel') == 'LPG') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="lpg">
                                            LPG
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" id="hybrid" name="fuel" value="Hybrid" {{ (old('fuel') == 'Hybrid') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="hybrid">
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
                                        <input class="form-check-input" type="radio" id="manual" name="gearbox" value="Manual" {{ (old('gearbox') == 'Manual') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="manual">
                                            Manual
                                        </label>
                                    </div>

                                </div>

                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" id="automatic" name="gearbox" value="Automatic" {{ (old('gearbox') == 'Automatic') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="automatic">
                                            Automatic
                                        </label>
                                    </div>

                                </div>

                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" id="semiautomatic" name="gearbox" value="Semi-automatic" {{ (old('gearbox') == 'Semi-automatic') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="semiautomatic">
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
                                        <input class="form-check-input" type="radio" id="sitting3" name="sitting" value="3" {{ (old('sitting') == '3') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="sitting3">
                                            3
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" id="sitting5" name="sitting" value="5" {{ (old('sitting') == '5') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="sitting5">
                                            5
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" id="sitting7" name="sitting" value="7" {{ (old('sitting') == '7') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="sitting7">
                                            7
                                        </label>
                                    </div>

                                </div>

                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" id="sitting9" name="sitting" value="9" {{ (old('sitting') == '9') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="sitting9">
                                            9
                                        </label>
                                    </div>

                                </div>

                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" id="sitting11" name="sitting" value="11" {{ (old('sitting') == '11') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="sitting11">
                                            11
                                        </label>
                                    </div>

                                </div>

                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" id="sitting13" name="sitting" value="13" {{ (old('sitting') == '13') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="sitting13">
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
                                        <option value="Black" {{ (old('color') == 'Black') ? 'selected' : ''}}>Black</option>
                                        <option value="Blue" {{ (old('color') == 'Blue') ? 'selected' : ''}}>Blue</option>
                                        <option value="Brown" {{ (old('color') == 'Brown') ? 'selected' : ''}}>Brown</option>
                                        <option value="Gold" {{ (old('color') == 'Gold') ? 'selected' : ''}}>Gold</option>
                                        <option value="Gray" {{ (old('color') == 'Gray') ? 'selected' : ''}}>Gray</option>
                                        <option value="Green" {{ (old('color') == 'Green') ? 'selected' : ''}}>Green</option>
                                        <option value="Orange" {{ (old('color') == 'Orange') ? 'selected' : ''}}>Orange</option>
                                        <option value="Purple" {{ (old('color') == 'Purple') ? 'selected' : ''}}>Purple</option>
                                        <option value="Red" {{ (old('color') == 'Red') ? 'selected' : ''}}>Red</option>
                                        <option value="Silver" {{ (old('color') == 'Silver') ? 'selected' : ''}}>Silver</option>
                                        <option value="Tan" {{ (old('color') == 'Tan') ? 'selected' : ''}}>Tan</option>
                                        <option value="White" {{ (old('color') == 'White') ? 'selected' : ''}}>White</option>
                                        <option value="Yellow" {{ (old('color') == 'Yellow') ? 'selected' : ''}}>Yellow</option>
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
                                    <input type="text" name="location" class="form-control form-control-lg form-control-solid" placeholder="Enter Location" value="{{ old('location') }}" />

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
                                        <input class="form-check-input" type="radio" id="isavailable1" name="isavailable" value="True" {{ (old('isavailable') == "True") ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="isavailable1">
                                            True
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" id="isavailable2" name="isavailable" value="False" {{ (old('isavailable') == "False") ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="isavailable2">
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
                                    <input type="text" name="other_features" class="form-control form-control-lg form-control-solid" placeholder="Enter Other Features" value="{{ old('other_features') }}" />

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
                                    <input type="text" name="owner_driver" class="form-control form-control-lg form-control-solid" placeholder="Enter Owner/Driver" value="{{ old('owner_driver') }}" />

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
                                    <input type="text" name="note" class="form-control form-control-lg form-control-solid" placeholder="Enter Note" value="{{ old('note') }}" />

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
                                        <input class="form-check-input" type="radio" id="any" name="prefered" value="Any" {{ (old('prefered') == 'Any') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="any">
                                            Any
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid form-check-sm">
                                        <input class="form-check-input" type="radio" id="daily" name="prefered" value="Daily" {{ (old('prefered') == 'Daily') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="daily">
                                           Daily
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid form-check-sm">
                                        <input class="form-check-input" type="radio" id="weekly" name="prefered" value="Weekly" {{ (old('prefered') == 'Weekly') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="weekly">
                                           Weekly
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid form-check-sm">
                                        <input class="form-check-input" type="radio" id="monthly" name="prefered" value="Monthly" {{ (old('prefered') == 'Monthly') ? 'checked' : ''}}/>
                                        <label class="form-check-label" for="monthly">
                                           Monthly
                                        </label>
                                    </div>

                                </div>
                                @error('prefered') <span class="text-danger">{{ $message }}</span> @enderror
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->

                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label required fw-bold fs-6">Attachment &nbsp;<span style="cursor: pointer" id="addAttachment" class="btn-link m-l-10">+ Add more</span></label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-4 fv-row">
                                    <input type="text" name="attachments_of_text[]" class="form-control form-control-lg form-control-solid" placeholder="Name of attachment"/>

                                    @error('attachments_of_text.*') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-lg-4 fv-row">
                                    <input type="file" name="attachments_of_paper[]" class="form-control form-control-lg form-control-solid" placeholder="Enter Owner/Driver"/>

                                    @error('attachments_of_paper.*') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                            <div id="setattachment">

                            </div>
                            <!--end::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->

                                <label class="col-lg-3 col-form-label fw-bold fs-6">Gallery Images</label>

                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 d-flex flex-row">

                                    <div class="col-lg-3 d-inline">

                                        <div class="wrap-custom-file">
                                            {{-- <button type="button" class="btn btn-danger p-2 px-3 glyphicon glyphicon-remove position-absolute start-0 z-index-2 removegallery">&#x2715</button> --}}
                                            <input type="file" name="gallery[]" id="image1" accept=".gif, .jpg, .png .jpeg" />
                                            <label  for="image1">
                                            <span>Select Image</span>
                                            <i class="fa fa-image" style="font-size:40px;"></i>
                                            </label>
                                        </div>
                                    </div>

                                    <div id="placegallery">

                                    </div>

                                    <div class="col-lg-3" id="addmoregallery">
                                        <div class="wrap-custom-file" >

                                            <label  for="">
                                            <span>Add more Image</span>
                                            <i class="fa fa-plus-circle" style="font-size:40px; color: #575653"></i>
                                            </label>
                                        </div>
                                    </div>



                                </div>
                                 @error('gallery.0') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>
                        <!--end::Card body-->
                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button>
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

@endsection

@push('scripts')




<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('assets/js/custom/apps/support-center/tickets/create.js')}}"></script>
<script src="{{asset('assets/js/custom/documentation/documentation.js')}}"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
{{-- <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/permissions/list.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/permissions/add-permission.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/permissions/update-permission.js')}}"></script> --}}
<script type="text/javascript">
    let startYear = 1970;
    let endYear = new Date().getFullYear();
    for (i = endYear; i > startYear; i--)
    {
      $('#yearpicker').append($('<option />').val(i).html(i));
    }
</script>
<script type="text/javascript">
$('#addmoregallery').click(function () {
    let idset = $('.wrap-custom-file').length +1;
    if($('.wrap-custom-file').length == 4){
        $('#addmoregallery').hide();
    }
    $('#placegallery').append('<div class="col-lg-3 col-6 gallaryunset d-inline position-relative"><div class="wrap-custom-file inline"><button type="button" class="btn btn-danger py-1 px-2 glyphicon glyphicon-remove position-absolute start-0 z-index-2 rounded-1 removegallery">&#x2715</button><input type="file" name="gallery[]" id="image'+idset+'" accept=".gif, .jpg, .png .jpeg" /><label  for="image'+idset+'"><span>Select Image</span><i class="fa fa-image" style="font-size:40px;"></i></label></div></div>');
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


});

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

$("body").on("click",".removegallery",function(e){
    // alert($('.wrap-custom-file').length);
    if($('.wrap-custom-file').length <= 5){
        $('#addmoregallery').show();
    }
    $(this).parents('.gallaryunset').remove();
});

$('#addAttachment').click(function () {
     var count = $('.attachmentunset').length;
     if(count == 5){
        $('#addAttachment').hide();
     }
    $('#setattachment').append('<div class="row mb-6 attachmentunset"><label class="col-lg-3 col-form-label fw-bold fs-6">Attachment &nbsp;<a style="cursor: pointer" class="removeattachment"><i class="fa fa-trash"></i></a></label><div class="col-lg-4 fv-row"><input type="text" name="attachments_of_text[]" class="form-control form-control-lg form-control-solid" placeholder="Name of attachment paper"/></div><div class="col-lg-4 fv-row"><input type="file" name="attachments_of_paper[]" class="form-control form-control-lg form-control-solid" placeholder="Enter Owner/Driver"/></div></div>');

   
});

$("body").on("click",".removeattachment",function(e){
    var count = $('.attachmentunset').length;
    if(count <= 6){
        $('#addAttachment').show();
     }
    $(this).parents('.attachmentunset').remove();
    
});


</script>
@endpush
