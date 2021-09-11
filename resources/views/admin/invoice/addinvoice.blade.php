@extends('layouts.admin')
@section('title','Add Invoice')
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" id="testtest">Add Invoice</h1>
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
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            
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
                            <button type="button" class="btn btn-primary addmoreitem">
                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Add More Item</button>
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
                    <!--begin::Input group-->
                    <form class="form" action="" method="POST">
                        <!--begin::Step 4-->
                        <div data-kt-stepper-element="content">
                            <div class="w-100 mt-7">
                                <!--begin::Input group-->
                                <div class="row mb-10">
                                    <!--begin::Col-->
                                    <div class="col-md-9 fv-row">
                                        <!--begin::Label-->
                                        <!--end::Label-->
                                        <!--begin::Row-->
                                        <div class="row fv-row">
                                            <!--begin::Col-->
                                            <div class="col-8">
                                                <label class="required fs-6 fw-bold form-label mb-2">Item</label>
                                                <input type="text" class="form-control form-control-solid" placeholder="Item" name="item[]" />
                                                {{-- <select name="type" aria-label="Select Type" data-control="select2" data-placeholder="Select Type..." class="form-select form-select-solid form-select-lg fw-bold">
                                                    <option value="">Select Type...</option>
                                                    <option value="Sedan">Sedan</option>
                                                    <option value="SUV">SUV</option>
                                                    <option value="CUV">CUV</option>
                                                    <option value="Micro">Micro</option>
                                                    <option value="VAN ">VAN</option>
                                                </select> --}}
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            
                                            <div class="col-4">
                                                <label class="required fs-6 fw-bold form-label mb-2">Qty</label>
                                                 <input type="number" class="form-control form-control-solid" placeholder="Qty" name="qty[]" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3">
                                        <label class="required fs-6 fw-bold form-label mb-2">Price</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="50000" name="price[]" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <div id="setmoreitem">
                                </div>
                                <!--begin::Input group-->
                                <div class="row">

                                    <!--begin::Col-->
                                    <div class="col-md-8 mt-2">
                                        <label class="required fs-6 fw-bold form-label mb-2">Customer</label>
                                        <select name="customer" aria-label="Select Type" data-control="select2" data-placeholder="Select Customer..." class="form-select form-select-solid form-select-lg fw-bold">
                                        <option value="">Select Customer...</option>
                                        <option value="Sedan" {{ (old('type') == 'Sedan') ? 'selected' : '' }}>Sedan</option>
                                        <option value="SUV" {{ (old('type') == 'SUV') ? 'selected' : '' }}>SUV</option>
                                        <option value="CUV" {{ (old('type') == 'CUV') ? 'selected' : '' }}>CUV</option>
                                        <option value="Micro" {{ (old('type') == 'Micro') ? 'selected' : '' }}>Micro</option>
                                        <option value="VAN" {{ (old('type') == 'VAN') ? 'selected' : '' }}>VAN</option>
                                    </select>
                                    </div>
                                    <!--end::Col-->
                                   
                                    <!--begin::Col-->
                                    <div class="col-md-4 mt-2">
                                        <label class="required fs-6 fw-bold form-label mb-2">Vat</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="1000" name="vat" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row">

                                    <!--begin::Col-->
                                    <div class="col-md-8 mt-2">
                                   
                                    </div>
                                    <!--end::Col-->
                                   
                                    <!--begin::Col-->
                                    <div class="col-md-4 mt-2">
                                        <label class="required fs-6 fw-bold form-label mb-2">Discount</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="1000" name="discount" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row">

                                    <!--begin::Col-->
                                    <div class="col-md-8 mt-2">
                                   
                                    </div>
                                    <!--end::Col-->
                                   
                                    <!--begin::Col-->
                                    <div class="col-md-4 mt-2">
                                        <label class="required fs-6 fw-bold form-label mb-2">Paid Amount</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="10000" name="paidamount" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row">

                                    <!--begin::Col-->
                                    <div class="col-md-8 mt-2">
                                   
                                    </div>
                                    <!--end::Col-->
                                   
                                    <!--begin::Col-->
                                    <div class="col-md-4 mt-2">
                                        <label class="required fs-6 fw-bold form-label mb-2">Due Amount</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="10000" name="dueamount" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row">

                                    <!--begin::Col-->
                                    <div class="col-md-8 mt-2">
                                   
                                    </div>
                                    <!--end::Col-->
                                   
                                    <!--begin::Col-->
                                    <div class="col-md-4 mt-2">
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Label-->
                                            <div class="me-5">

                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <button type="submit" class="btn btn-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                               
                                                Save Invoice</button>
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                        <!--end::Input group--> 
                                    </div>
                                    <!--end::Col-->
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
    $('.addmoreitem').click(function () {
       $('#setmoreitem').append('<div class="row mb-10 itemunset"><div class="col-md-9 fv-row"><div class="row fv-row"><div class="col-8"><label class="required fs-6 fw-bold form-label mb-2">Item &nbsp;<a style="cursor: pointer" class="removeitem"><i class="fa fa-trash"></i></a></label><input type="text" class="form-control form-control-solid" placeholder="Item" name="item[]"/></div><div class="col-4"><label class="required fs-6 fw-bold form-label mb-2">Qty</label><input type="number" class="form-control form-control-solid" placeholder="Qty" name="qty[]"/></div></div></div><div class="col-md-3"><label class="required fs-6 fw-bold form-label mb-2">Price</label><input type="text" class="form-control form-control-solid" placeholder="50000" name="price[]"/></div></div>');
    });

    $("body").on("click",".removeitem",function(e){
    $(this).parents('.itemunset').remove();
    
    });
});
</script>
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/car/carlist.js')}}"></script>


@endpush