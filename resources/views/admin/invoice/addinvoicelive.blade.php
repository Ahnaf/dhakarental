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

                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Input group-->
                    <form action="{{ route('admin.storeinvoice')}}" method="POST" class="form">
                        @csrf
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
                                <!--begin::Input group-->
                                    <div class="row">

                                        <!--begin::Col-->
                                        <div class="col-md-4 mt-2">
                                            <label class="required fs-6 fw-bold form-label mb-2">Total</label>
                                            <input type="number" class="form-control form-control-solid" placeholder="10000" id="total" name="total" value="" required/>
                                            @error('total') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-4 mt-2">
                                            <label class="required fs-6 fw-bold form-label mb-2">Vat</label>
                                            <input type="number" class="form-control form-control-solid" placeholder="1000" id="vat" name="vat" value="" required/>
                                            @error('vat') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <!--end::Col-->
                                    
                                        <!--begin::Col-->
                                        <div class="col-md-4 mt-2">
                                            <label class="required fs-6 fw-bold form-label mb-2">Discount</label>
                                            <input type="number" class="form-control form-control-solid" placeholder="1000" id="discount" name="discount" value="" required/>
                                             @error('disount') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                               
         
                                <!--begin::Input group-->
                                <div class="row">

                                   <!--begin::Col-->
                                    <div class="col-md-4 mt-2">
                                        <label class="required fs-6 fw-bold form-label mb-2">Grand Total</label>
                                        <input type="number" class="form-control form-control-solid" placeholder="10000" id="grandtotal" name="grandtotal" value="" required/>
                                        @error('grandtotal') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-md-4 mt-2">
                                        <label class="required fs-6 fw-bold form-label mb-2">Due Amount</label>
                                        <input type="number" class="form-control form-control-solid" placeholder="10000" name="dueamount" required/>
                                        @error('dueamount') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <!--end::Col-->
                                   
                                    <!--begin::Col-->
                                    <div class="col-md-4 mt-2">
                                        <label class="required fs-6 fw-bold form-label mb-2">Paid Amount</label>
                                        <input type="number" class="form-control form-control-solid" placeholder="10000" name="paidamount" required/>
                                        @error('paidamount') <span class="text-danger">{{ $message }}</span> @enderror
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