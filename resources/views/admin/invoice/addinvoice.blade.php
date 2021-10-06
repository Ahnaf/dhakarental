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
           <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Content-->
            <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body p-12">
                        <!--begin::Form-->
                        <form action="{{ route('admin.storeinvoice')}}" method="POST" id="kt_invoice_form">
                            @csrf
                            <!--begin::Wrapper-->
                             <div class="row gx-10 mb-5">
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Bill To</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" name="customer_name" class="form-control form-control-solid" placeholder="Name" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" name="phone" class="form-control form-control-solid" placeholder="Phone number" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <textarea name="address" class="form-control form-control-solid" rows="3" placeholder="Address"></textarea>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Trip Details</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="date" class="form-control form-control-solid" name="date_of_trip" placeholder="Date of trip"/>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" name="ref_number" class="form-control form-control-solid" placeholder="Ref number" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Note"></textarea>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                            <!--begin::Step 4-->
                        <div data-kt-stepper-element="content">
                            <div class="w-100 mt-7">
                                <!--begin::Input group-->
                                <div class="row mb-10">
                                    <!--begin::Col-->
                                    <div class="col-md-9 fv-row">
                                        <label class="required fs-6 fw-bold form-label mb-2">Customer</label>
                                        <select name="customer" aria-label="Select Type" data-control="select2" data-placeholder="Select Customer..." class="form-select form-select-solid form-select-lg fw-bold" required>
                                        <option value="">Select Customer...</option>
                                        @foreach ($contacts as $contact)
                                         <option value="{{$contact->id}}" {{ (old('customer') == $contact->fname) ? 'selected' : '' }}>{{$contact->fname}}</option>   
                                        @endforeach
                                        </select>
                                        @error('customer') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-primary mt-9 float-end addmoreitem">
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                                    <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1" />
                                                </svg>
                                            </span>
                                            Add More Item
                                        </button>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-10 item">
                                    <!--begin::Col-->
                                    <div class="col-md-9 fv-row">
                                        <!--begin::Label-->
                                        <!--end::Label-->
                                        <!--begin::Row-->
                                        <div class="row fv-row ">
                                            <!--begin::Col-->
                                            <div class="col-8">
                                                <label class="required fs-6 fw-bold form-label mb-2">Item</label>
                                                <input type="text" class="form-control form-control-solid" placeholder="Item" name="item[]" required/>
                                                 @error('item.*') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            
                                            <div class="col-4">
                                                <label class="required fs-6 fw-bold form-label mb-2">Qty</label>
                                                 <input type="number" class="form-control form-control-solid qty" placeholder="Qty" name="qty[]" value="1" required/>
                                                 @error('qty.*') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3">
                                        <label class="required fs-6 fw-bold form-label mb-2">Price</label>
                                        <input type="number" class="form-control form-control-solid price" placeholder="50000" name="price[]" required/>
                                        @error('price.*') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <div id="setmoreitem">
                                </div>

                                <!--end::Input group-->
                                <div class="row form-inline">
                                    <!--begin::Col-->
                                    <div class="col-md-6 mt-2">
                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-2 mt-5">
                                        <label class="required fs-6 fw-bold form-label mb-2">Total</label>
                                    </div>
                                    <!--begin::Col-->
                                    <div class="col-md-4 mt-2 ">
                                        
                                        <input type="number" class="form-control form-control-solid" placeholder="10000" id="total" name="total" value="" required/>
                                        @error('total') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->


                                <!--end::Input group-->
                                <div class="row form-inline">

                                    <!--begin::Col-->
                                    <div class="col-md-6 mt-2">

                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-2 mt-5">
                                        <label class="required fs-6 fw-bold form-label mb-2">Vat</label>
                                    </div>
                                    <!--begin::Col-->
                                    <div class="col-md-4 mt-2 ">
                                        
                                        <input type="number" class="form-control form-control-solid" placeholder="1000" id="vat" name="vat" value="" required/>
                                        @error('vat') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->


                                <!--end::Input group-->
                                <div class="row form-inline">

                                    <!--begin::Col-->
                                    <div class="col-md-6 mt-2">

                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-2 mt-5">
                                        <label class="required fs-6 fw-bold form-label mb-2">Discount</label>
                                    </div>
                                    <!--begin::Col-->
                                    <div class="col-md-4 mt-2 ">
                                        
                                        <input type="number" class="form-control form-control-solid" placeholder="1000" id="discount" name="discount" value="" required/>
                                        @error('disount') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->



                                <!--end::Input group-->
                                <div class="row form-inline">

                                    <!--begin::Col-->
                                    <div class="col-md-6 mt-2">

                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-2 mt-5">
                                        <label class="required fs-6 fw-bold form-label mb-2">Grand Total</label>
                                    </div>
                                    <!--begin::Col-->
                                    <div class="col-md-4 mt-2 ">
                                        
                                        <input type="number" class="form-control form-control-solid" placeholder="10000" id="grandtotal" name="grandtotal" value="" required/>
                                        @error('grandtotal') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--end::Input group-->
                                <div class="row form-inline">

                                    <!--begin::Col-->
                                    <div class="col-md-6 mt-2">

                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-2 mt-5">
                                        <label class="required fs-6 fw-bold form-label mb-2">Paid Amount</label>
                                    </div>
                                    <!--begin::Col-->
                                    <div class="col-md-4 mt-2 ">
                                        
                                        <input type="number" class="form-control form-control-solid" placeholder="10000" name="paidamount" required/>
                                        @error('paidamount') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--end::Input group-->
                                <div class="row form-inline">

                                    <!--begin::Col-->
                                    <div class="col-md-6 mt-2">

                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-2 mt-5">
                                        <label class="required fs-6 fw-bold form-label mb-2">Due Amount</label>
                                    </div>
                                    <!--begin::Col-->
                                    <div class="col-md-4 mt-2 ">
                                        
                                        <input type="number" class="form-control form-control-solid" placeholder="10000" name="dueamount" required/>
                                        @error('dueamount') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->


                               <div class="row">
                                   <!--begin::Col-->
                                    <div class="col-md-3 mt-5">
                                        <!--begin::Input group-->
                                        {{-- <div class="d-flex flex-stack">
                                            <!--begin::Label-->
                                            <div class="me-5">

                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Switch-->
                                            <span id="result"></span>
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <button type="submit" class="btn btn-primary me-3">
                                               
                                                Save Invoice</button>
                                            </label>
                                            <!--end::Switch-->
                                        </div> --}}
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-md-3 mt-5">
                                        <!--begin::Input group-->
                                        {{-- <div class="d-flex flex-stack">
                                            <!--begin::Label-->
                                            <div class="me-5">

                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Switch-->
                                            <span id="result"></span>
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <button type="submit" class="btn btn-primary me-3">
                                               
                                                Save Invoice</button>
                                            </label>
                                            <!--end::Switch-->
                                        </div> --}}
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-md-3 mt-5">
                                        <!--begin::Input group-->
                                        {{-- <div class="d-flex flex-stack">
                                            <!--begin::Label-->
                                            <div class="me-5">

                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Switch-->
                                            <span id="result"></span>
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <button type="submit" class="btn btn-primary me-3">
                                               
                                                Save Invoice</button>
                                            </label>
                                            <!--end::Switch-->
                                        </div> --}}
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Col-->
                                   
                                    <!--begin::Col-->
                                    <div class="col-md-3 mt-5">
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Label-->
                                            <div class="me-5">

                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Switch-->
                                            <span id="result"></span>
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <button type="submit" class="btn btn-primary me-3">
                                               
                                                Save Invoice</button>
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                        <!--end::Input group--> 
                                    </div>
                                    <!--end::Col-->
                                </div>

                                
                            </div>
                        </div>
                        <!--end::Step 4-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
            <!--begin::Sidebar-->
            <div class="flex-lg-auto min-w-lg-300px">
                <!--begin::Card-->
                <div class="card" data-kt-sticky="true" data-kt-sticky-name="invoice" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', lg: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                    <!--begin::Card body-->
                    <div class="card-body p-10">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder fs-6 text-gray-700">Currency</label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <select name="currnecy" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select currency" class="form-select form-select-solid">
                                <option value=""></option>
                                <option data-kt-flag="flags/united-states.svg" value="USD">
                                <b>USD</b>&#160;-&#160;USA dollar</option>
                                <option data-kt-flag="flags/united-kingdom.svg" value="GBP">
                                <b>GBP</b>&#160;-&#160;British pound</option>
                                <option data-kt-flag="flags/australia.svg" value="AUD">
                                <b>AUD</b>&#160;-&#160;Australian dollar</option>
                                <option data-kt-flag="flags/japan.svg" value="JPY">
                                <b>JPY</b>&#160;-&#160;Japanese yen</option>
                                <option data-kt-flag="flags/sweden.svg" value="SEK">
                                <b>SEK</b>&#160;-&#160;Swedish krona</option>
                                <option data-kt-flag="flags/canada.svg" value="CAD">
                                <b>CAD</b>&#160;-&#160;Canadian dollar</option>
                                <option data-kt-flag="flags/switzerland.svg" value="CHF">
                                <b>CHF</b>&#160;-&#160;Swiss franc</option>
                            </select>
                            <!--end::Select-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-8"></div>
                        <!--end::Separator-->
                        <!--begin::Input group-->
                        <div class="mb-8">
                            <!--begin::Option-->
                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Payment method</span>
                                <input class="form-check-input" type="checkbox" checked="checked" value="" />
                            </label>
                            <!--end::Option-->
                            <!--begin::Option-->
                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Late fees</span>
                                <input class="form-check-input" type="checkbox" value="" />
                            </label>
                            <!--end::Option-->
                            <!--begin::Option-->
                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Notes</span>
                                <input class="form-check-input" type="checkbox" value="" />
                            </label>
                            <!--end::Option-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-8"></div>
                        <!--end::Separator-->
                        <!--begin::Actions-->
                        <div class="mb-0">
                            <!--begin::Row-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col">
                                    <a href="#" class="btn btn-light btn-active-light-primary w-100">Preview</a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col">
                                    <a href="#" class="btn btn-light btn-active-light-primary w-100">Download</a>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <button type="submit" href="#" class="btn btn-primary w-100" id="kt_invoice_submit_button">
                            <!--begin::Svg Icon | path: icons/duotone/Map/Direction2.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M14,13.381038 L14,3.47213595 L7.99460483,15.4829263 L14,13.381038 Z M4.88230018,17.2353996 L13.2844582,0.431083506 C13.4820496,0.0359007077 13.9625881,-0.12427877 14.3577709,0.0733126292 C14.5125928,0.15072359 14.6381308,0.276261584 14.7155418,0.431083506 L23.1176998,17.2353996 C23.3152912,17.6305824 23.1551117,18.1111209 22.7599289,18.3087123 C22.5664522,18.4054506 22.3420471,18.4197165 22.1378777,18.3482572 L14,15.5 L5.86212227,18.3482572 C5.44509941,18.4942152 4.98871325,18.2744737 4.84275525,17.8574509 C4.77129597,17.6532815 4.78556182,17.4288764 4.88230018,17.2353996 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.000087, 9.191034) rotate(-315.000000) translate(-14.000087, -9.191034)" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Send Invoice</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Sidebar-->
        </div>
        <!--end::Layout-->
          

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->


@endsection

@push('scripts')

<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/car/carlist.js')}}"></script>
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
function addUp(){
    var total = 0;
        $(".item").each(function() {

            var qty = $(this).find("[name='qty[]']").val();
            // console.log($(this).find("[name='price[]']").val());
            var newp = $(this).find("[name='price[]']").val();
            var allprice = (newp * qty);
            total += Number(allprice);
            
        });
        //alert(total);
        $('#total').val(total);
}
$(".price").on("keyup", addUp);
addUp();

$(document).ready(function(){
   
    $('.addmoreitem').click(function () {
      
       $('#setmoreitem').append('<div class="row mb-10 itemunset item"><div class="col-md-9 fv-row"><div class="row fv-row"><div class="col-8"><label class="required fs-6 fw-bold form-label mb-2">Item &nbsp;<a style="cursor: pointer" class="removeitem"><i class="fa fa-trash"></i></a></label><input type="text" class="form-control form-control-solid" placeholder="Item" name="item[]" required/></div><div class="col-4"><label class="required fs-6 fw-bold form-label mb-2">Qty</label><input type="number" class="form-control form-control-solid" placeholder="Qty" name="qty[]" value="1" required/></div></div></div><div class="col-md-3"><label class="required fs-6 fw-bold form-label mb-2">Price</label><input type="number" class="form-control form-control-solid price" placeholder="50000" name="price[]" required/></div></div>');
          function addUp(){
            var total = 0;
                $(".item").each(function() {

                    var qty = $(this).find("[name='qty[]']").val();
                    //console.log($(this).find("[name='price[]']").val());
                    var newp = $(this).find("[name='price[]']").val();
                    var allprice = (newp * qty);
                    total += Number(allprice);
                    
                });
                //alert(total);
                $('#total').val(total);
        }
        $(".price").on("keyup", addUp);
        addUp();
        
    });

    $("body").on("click",".removeitem",function(e){
       
        var removeprice = $(this).parents('.itemunset').find("[name='price[]']").val();
        var removeqty = $(this).parents('.itemunset').find("[name='qty[]']").val();
        var gettotal = $('#total').val();
        var withoutprice = (removeprice * removeqty); 
        var updateprice = (gettotal - withoutprice);
        var setupdateprice = Number(updateprice);
        $('#total').val(setupdateprice);
        var getgrandtotal = $('#grandtotal').val();
        var setgrandtotal =   (getgrandtotal - withoutprice);
        $('#grandtotal').val(setgrandtotal);         
        $(this).parents('.itemunset').remove();
    
    });

    // $("[name='vat']").on("keyup", function(){
    //     var getvat = $("#vat").val();
    //     var setvat = Number(getvat)
    //     var getforvattotal = $('#total').val();
    //     var setforvattotal = Number(getforvattotal);

    //     var setwithvattotal = setforvattotal + setvat;
    //     $('#grandtotal').val(setwithvattotal);
    // });
    
    // $("[name='discount']").on("keypress", function(){
    //     var getdiscount = $("[name='discount']").val();
    //     var setdiscount = Number(getdiscount)
    //     var getfordiscounttotal = $('#grandtotal').val();
    //     var setfordiscounttotal = Number(getfordiscounttotal);

    //     var setwithdiscounttotal = (setfordiscounttotal - setdiscount);
    //     $('#grandtotal').val(setwithdiscounttotal);
    // });
   
});

$("#vat").on("keyup", function() {

    var vat = $("#vat").val();
    var newtotal = $('#total').val();
    $('#grandtotal').val((Number(newtotal)) + (Number(vat)));
});

$(document).on("change keyup blur", "#discount", function() {

    var getvat = $("#vat").val();
    var setvat = Number(getvat)
    var getforvattotal = $('#total').val();
    var setforvattotal = Number(getforvattotal);
    var setwithvattotal = setforvattotal + setvat;
    var getdiscount = $("#discount").val();
    //var getfordiscounttotal = $('#grandtotal').val();

    if (getdiscount != '' && setwithvattotal != '') {
       
        $('#grandtotal').val((Number(setwithvattotal)) - (Number(getdiscount)));
    }else{
        $('#grandtotal').val(Number(setwithvattotal));
    }
});


</script>

@endpush