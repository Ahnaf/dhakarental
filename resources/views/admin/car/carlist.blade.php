@extends('layouts.admin')
@section('title','Car List')
{{-- @section('description', 'Admin Login')
@section('meta', 'Admin Login') --}}


@push('css')

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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" id="testtest">Car List</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
              
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container mb-3">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Input group-->
                    <form class="form" action="{{ route('admin.carFilter') }}" method="GET">
                        <!--begin::Step 4-->
                        <div data-kt-stepper-element="content">
                            <div class="w-100 mt-7">
                                <!--begin::Input group-->
                                <div class="row mb-10">
                                    <!--begin::Col-->
                                    <div class="col-md-8 fv-row">
                                        <!--begin::Label-->
                                        <!--end::Label-->
                                        <!--begin::Row-->
                                        <div class="row fv-row">
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <label class="required fs-6 fw-bold form-label mb-2">Type</label>
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
                                            <!--begin::Col-->
                                            
                                            <div class="col-6">
                                                <label class="required fs-6 fw-bold form-label mb-2">Car Model</label>
                                                 <input type="text" class="form-control form-control-solid" placeholder="Car Model" name="model" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4">
                                        <label class="required fs-6 fw-bold form-label mb-2">Condition</label><br>
                                        <div class="form-check form-check-custom form-check-solid d-inline me-4">
                                           
                                                <input class="form-check-input mt-3" type="radio" id="best" name="condition" value="Best"/>
                                                <label class="form-check-label mt-3" for="best">
                                                    Best
                                                </label>
                                            
                                        </div>

                                        <div class="form-check form-check-custom form-check-solid d-inline me-4">
                                            
                                                <input class="form-check-input mt-3" type="radio" id="good" name="condition" value="Good"/>
                                                <label class="form-check-label" for="good">
                                                    Good
                                                </label>
                                            
                                        </div>

                                        <div class="form-check form-check-custom form-check-solid d-inline me-4">
                                            
                                                <input class="form-check-input mt-3" type="radio" id="average" name="condition" value="Average"/>
                                                <label class="form-check-label" for="average">
                                                    Average
                                                </label>
                                            
                                        </div>
                                        
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row">

                                    <!--begin::Col-->
                                    <div class="col-md-4">
                                        <label class="required fs-6 fw-bold form-label mb-2">Fuel Type</label><br>
                                        <div class="form-check form-check-custom form-check-solid d-inline me-2">
                                            <input class="form-check-input mt-3" type="radio" id="petrol" name="fuel" value="Petrol"/>
                                            <label class="form-check-label mt-3" for="petrol">
                                                Petrol
                                            </label>
                                        </div>

                                        <div class="form-check form-check-custom form-check-solid d-inline me-2">
                                            <input class="form-check-input mt-3" type="radio" id="cng" name="fuel" value="CNG"/>
                                            <label class="form-check-label" for="cng">
                                                CNG
                                            </label>
                                        </div>

                                        <div class="form-check form-check-custom form-check-solid d-inline me-2">
                                            <input class="form-check-input mt-3" type="radio" id="lpg" name="fuel" value="LPG"/>
                                            <label class="form-check-label" for="lpg">
                                                LPG
                                            </label>
                                        </div>

                                        <div class="form-check form-check-custom form-check-solid d-inline me-2">
                                                <input class="form-check-input mt-3" type="radio" id="hybrid" name="fuel" value="Hybrid"/>
                                                <label class="form-check-label" for="hybrid">
                                                    Hybrid
                                                </label>
                                        </div>
                                        
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <div class="row fv-row">
                                            <div class="col-12">
                                                <label class="required fs-6 fw-bold form-label mb-2">Location</label>
                                                 <input type="text" class="form-control form-control-solid" placeholder="Location" name="location" />
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4">
                                        <label class="required fs-6 fw-bold form-label mb-2">isAvailable</label><br>
                                        <div class="form-check form-check-custom form-check-solid d-inline me-4">
                                            <input class="form-check-input mt-3" type="radio" id="isavailable1" name="isavailable" value="True"/>
                                            <label class="form-check-label mt-3" for="isavailable1">
                                                True
                                            </label>
                                        </div>

                                        <div class="form-check form-check-custom form-check-solid d-inline me-5">
                                            <input class="form-check-input mt-3" type="radio" id="isavailable2" name="isavailable" value="False"/>
                                            <label class="form-check-label" for="isavailable2">
                                                False
                                            </label>
                                        </div>  
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Label-->
                                    <div class="me-5">

                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <button type="submit" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                        </span>
                                        Filter</button>
                                    </label>
                                    <!--end::Switch-->
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <!--end::Step 4-->
                        
                    </form>
                    <!--end::Input group-->
                    
                </div>
                
                <!--end::Card body-->
            </div>
            <!--end::Card-->
          

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                @if(session('carsuccess'))
                    <!--begin::Alert-->
                    <div class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row p-5 mb-10">
                        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                            <p class="fs-6 mt-3">{{ session('carsuccess') }}</p>
                        </div>
                        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                            <span class="svg-icon svg-icon-2x svg-icon-light">&times;</span>
                        </button>
                    </div>
                    <!--end::Alert-->
                @endif
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-subscription-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Car" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
                            <!--begin::Filter-->
                            {{-- <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                            
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z" fill="#000000" />
                                    </g>
                                </svg>
                            </span>
                            Filter</button> --}}
                           
                             <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                               
                            </div> 
                            <!--end::Menu 1-->
                            <!--end::Filter-->
                            
                            <!--begin::Add subscription-->
                            <a href="{{ route('admin.caradd') }}" class="btn btn-primary">
                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Add Car</a>
                            <!--end::Add subscription-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Group actions-->
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-subscription-table-toolbar="selected">
                            <div class="fw-bolder me-5">
                            <span class="me-2" data-kt-subscription-table-select="selected_count"></span>Selected</div>
                            <button type="button" class="btn btn-danger" data-kt-subscription-table-select="delete_selected">Delete Selected</button>
                        </div>
                        <!--end::Group actions-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="hidden" data-kt-check="true" data-kt-check-target="#kt_subscriptions_table .form-check-input" value="1" />
                                    </div>
                                </th>
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="hidden" data-kt-check="true"/>
                                    </div>
                                </th>
                                <th class="min-w-125px">No</th>
                                <th class="min-w-125px">Model</th>
                                <th class="min-w-125px">Reg No</th>
                                <th class="min-w-125px">Reg Year</th>
                                <th class="min-w-125px">Color</th>
                                <th class="min-w-125px">Image</th>
                                <th class="min-w-125px">Status</th>
                                <th class="text-center min-w-70px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-bold" id="tablebodycheckbox">
                            @foreach ($cars as $index=> $car)
                            <tr>
                                <!--begin::Checkbox-->
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="hidden" value="{{ $car->id }}" />
                                    </div>
                                </td>
                                <!--end::Checkbox-->

                                <!--begin::Checkbox-->
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="hidden" value="{{ $car->status }}" />
                                    </div>
                                </td>
                                <!--end::Checkbox-->
                                <!--begin::Status=-->
                                <td>
                                    <div class="badge badge-light-success">{{$index + 1}}</div>
                                </td>
                                <!--end::Status=-->
                                <!--begin::Billing=-->
                                <td>
                                    {{ $car->model }}
                                </td>

                                <td>
                                    {{$car->reg_number}}
                                </td>

                                <td>
                                    {{$car->registration_year}}
                                </td>
                                <!--end::Billing=-->
                                <!--begin::Product=-->
                                <td>
                                    {{ $car->color}}
                                </td>
                                <!--end::Product=-->
                                <!--begin::Date=-->
                                <td>
                                    <img src="{{ asset('storage/car/'.$car->token.'/'.$car->avatar)}}" width="60" height="40">
                                </td>
                                <!--end::Date=-->

                                <!--begin::Date=-->
                                <td>
                                    @if ($car->status == 1)
                                       <p class="text-success">Active</p>
                                    @else
                                        <p class="text-warning">Dactive</p>  
                                    @endif
                                </td>
                                <!--end::Date=-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Actions
                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('admin.cardetails', ['id' => $car->id])}}" class="menu-link px-3">View</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('admin.caredit', ['id' => $car->id])}}" class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" data-kt-subscriptions-table-filter="delete_row" class="menu-link px-3">
                                                @if ($car->status == 1)
                                                    <p class="text-warning">Dactive</p>
                                                @else
                                                    <p class="text-success">Active</p>    
                                                @endif
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                                <!--end::Action=-->
                            </tr>
                            @endforeach  
                            
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                    {{$cars->links()}}
                </div>
                
                <!--end::Card body-->
            </div>
            <!--end::Card-->


        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->


@endsection

@push('scripts')
<script>

//console.log(array);
// var array = [] 
// document.getElementById("testtest").addEventListener("click", function(){
      
// var inputval = document.getElementById("tablebodycheckbox").querySelectorAll("input[type=checkbox]:checked");
// for (var i = 0; i < inputval.length; i++) {
//     alert(inputval[i].value);
//   array.push(inputval[i].value)
// }
// });

$(document).ready(function(){
 $('.getpermissionupdatedata').on('click', function(){
    let pid = $(this).attr('data-perid'); 
    let mid = $(this).attr('data-permoduleid');
    let pname = $(this).attr('data-pername');
    let pslug = $(this).attr('data-perslug');
    $('#permission_name').val(pname);
    $('#permission_slug').val(pslug);
    $('#moduleid').val(mid);
    $('#perid').val(pid);
    
 });
});
</script>
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/car/carlist.js')}}"></script>


@endpush