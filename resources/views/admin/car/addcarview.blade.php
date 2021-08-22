@extends('layouts.admin')
@section('title','Add Car')
{{-- @section('description', 'Admin Login')
@section('meta', 'Admin Login') --}}


@push('css')
<link href="{{asset('assets/css/imageuploadify.min.css')}}" rel="stylesheet">
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
                <!--begin::Card header-->
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
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Image</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('assets/media/avatars/blank.png')}})">
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
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Type</span>
                                    
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select name="type" aria-label="Select Type" data-control="select2" data-placeholder="Select Type..." class="form-select form-select-solid form-select-lg fw-bold">
                                        <option value="">Select Type...</option>
                                        <option value="Sedan">Sedan</option>
                                        <option value="SUV">SUV</option>
                                        <option value="CUV">CUV</option>
                                        <option value="Micro">Micro</option>
                                        <option value="VAN ">VAN</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Reg. Number</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="reg_number" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Enter Reg Number" value="" />
                                        </div>
                                        <!--end::Col-->

                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Registration Year</span>
                                   
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select name="registration_year" id="yearpicker" aria-label="Select Year" data-control="select2" data-placeholder="Select Year..." class="form-select form-select-solid form-select-lg fw-bold">
                                        <option value="">Select Year...</option>

                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Car Model</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="model" class="form-control form-control-lg form-control-solid" placeholder="Enter Car Model" value="" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Condition</span>
                                   
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="condition" value="Best"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Best
                                        </label>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="condition" value="Good"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Good
                                        </label>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="condition" value="Average"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Average
                                        </label>
                                    </div>
                                    
                                </div>
                            
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">AC Type</span>
                                   
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->

                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="ac" value="Single"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Single
                                        </label>
                                    </div>
                                
                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="ac" value="Duel"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Duel
                                        </label>
                                    </div>
                                
                                </div>

                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Fuel Type</span>
                                    
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="fuel[]" value="Petrol"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Petrol
                                        </label>
                                    </div> 
                                </div>

                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="fuel[]" value="CNG"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            CNG
                                        </label>
                                    </div> 
                                </div>

                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="fuel[]" value="LPG"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            LPG
                                        </label>
                                    </div> 
                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="fuel[]" value="Hybrid"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Hybrid
                                        </label>
                                    </div> 
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Gearbox</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="gearbox" value="Manual"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Manual
                                        </label>
                                    </div>
                                
                                </div>

                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="gearbox" value="Automatic"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Automatic
                                        </label>
                                    </div>
                                
                                </div>

                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="gearbox" value="Semi-automatic"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            Semi-automatic
                                        </label>
                                    </div>
                                
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Sitting Capasity</span>
                                    
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="sitting" value="3"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            3
                                        </label>
                                    </div>
                                
                                </div>
                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="sitting" value="5"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            5
                                        </label>
                                    </div>
                                
                                </div>
                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="sitting" value="7"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            7
                                        </label>
                                    </div>
                                
                                </div>

                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="sitting" value="9"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            9
                                        </label>
                                    </div>
                                
                                </div>

                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="sitting" value="11"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            11
                                        </label>
                                    </div>
                                
                                </div>

                                <div class="col-lg-1 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="sitting" value="13"/>
                                        <label class="form-check-label" for="flexRadioLg">
                                            13
                                        </label>
                                    </div>
                                
                                </div>
                                
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Color</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select name="color" id="color" aria-label="Select Color" data-control="select2" data-placeholder="Select Color..." class="form-select form-select-solid form-select-lg fw-bold">
                                        <option value="">Select Color...</option>
                                        <option value="Black">Black</option>
                                        <option value="Blue">Blue</option>
                                        <option value="Brown">Brown</option>
                                        <option value="Gold">Gold</option>
                                        <option value="Gray">Gray</option>
                                        <option value="Green">Green</option>
                                        <option value="Orange">Orange</option>
                                        <option value="Purple">Purple</option>
                                        <option value="Red">Red</option>
                                        <option value="Silver">Silver</option>
                                        <option value="Tan">Tan</option>
                                        <option value="White">White</option>
                                        <option value="Yellow">Yellow</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Location</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="location" class="form-control form-control-lg form-control-solid" placeholder="Enter Location" value="" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">isAvailable</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="isavailable" value="True"/>
                                        <label class="form-check-label" for="flexRadioSm">
                                            True
                                        </label>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="isavailable" value="False"/>
                                        <label class="form-check-label" for="flexRadioSm">
                                            False
                                        </label>
                                    </div>
                                    
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Other Features</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="other_features" class="form-control form-control-lg form-control-solid" placeholder="Enter Other Features" value="" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Owner/Driver</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="owner_driver" class="form-control form-control-lg form-control-solid" placeholder="Enter Owner/Driver" value="" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Note</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="note" class="form-control form-control-lg form-control-solid" placeholder="Enter Note" value="" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Prefered For</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid form-check-sm">
                                        <input class="form-check-input" type="radio" name="prefered" value="Any"/>
                                        <label class="form-check-label" for="flexRadioSm">
                                            Any
                                        </label>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid form-check-sm">
                                        <input class="form-check-input" type="radio" name="prefered" value="Daily"/>
                                        <label class="form-check-label" for="flexRadioSm">
                                           Daily
                                        </label>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid form-check-sm">
                                        <input class="form-check-input" type="radio" name="prefered" value="Weekly"/>
                                        <label class="form-check-label" for="flexRadioSm">
                                           Weekly
                                        </label>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-2 fv-row">
                                    <div class="form-check form-check-custom form-check-solid form-check-sm">
                                        <input class="form-check-input" type="radio" name="prefered" value="Monthly"/>
                                        <label class="form-check-label" for="flexRadioSm">
                                           Monthly
                                        </label>
                                    </div>
                                    
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Attachment &nbsp;<span style="cursor: pointer" id="addAttachment" class="btn-link m-l-10">+ Add more</span></label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-4 fv-row">
                                    <input type="text" name="attachments_of_text[]" class="form-control form-control-lg form-control-solid" placeholder="Name of attachment"/>
                                </div>
                                <div class="col-lg-4 fv-row">
                                    <input type="file" name="attachments_of_paper[]" class="form-control form-control-lg form-control-solid" placeholder="Enter Owner/Driver"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div id="setattachment">

                            </div>
                            <!--end::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Gallary Images</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input class="selectimage" type="file" name="gallery[]" accept="image/*" multiple>
                                </div>
                                <!--end::Col-->
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
 <script type="text/javascript" src="{{asset('assets/js/imageuploadify.min.js')}}"></script> 
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
    $(document).ready(function() {
        $('.selectimage').imageuploadify();
    });
    $('#addAttachment').click(function () {
        $('#setattachment').append('<div class="row mb-6 attachmentunset"><label class="col-lg-4 col-form-label fw-bold fs-6">Attachment &nbsp;<a style="cursor: pointer" class="removeattachment"><i class="fa fa-trash"></i></a></label><div class="col-lg-4 fv-row"><input type="text" name="attachments_of_text[]" class="form-control form-control-lg form-control-solid" placeholder="Name of attachment paper"/></div><div class="col-lg-4 fv-row"><input type="file" name="attachments_of_paper[]" class="form-control form-control-lg form-control-solid" placeholder="Enter Owner/Driver"/></div></div>');
    });
    $("body").on("click",".removeattachment",function(e){
        $(this).parents('.attachmentunset').remove();

    });
</script>
@endpush