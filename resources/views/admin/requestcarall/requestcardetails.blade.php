@extends('layouts.admin')
@section('title','Car Request Details')
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" id="testtest">Car Request Details</h1>
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
        <div id="kt_content_container" class="container">
            <!--begin::Post card-->
            <div class="card">
                <!--begin::Body-->
                <div class="card-body p-lg-20 pb-lg-0">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-xl-row">
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid me-xl-15">
                            <!--begin::Post content-->
                            <div class="mb-17">
                                <!--begin::Wrapper-->
                                <div class="mb-8">
                                    

                    
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Description-->
                          
                                <!--end::Description-->
                                <!--begin::Block-->
                                <div class="d-flex align-items-center border-dashed card-rounded p-2 p-lg-10 mb-4">
                                
                                    <!--begin::Text-->
                                    <div class="mb-0 fs-6">
                                        <div class="text-dark fw-bold lh-lg mb-2"><strong>Name:- <b>{{$requestcar->name}}</b></strong></div>
                                        <div class="text-dark fw-bold lh-lg mb-2"><strong>Contact Number:- <b>{{$requestcar->contact_number}}</b></strong></div>
                                        <div class="text-dark fw-bold lh-lg mb-2"><strong>Date Of Journey:- <b>{{$requestcar->date_of_journey}}</b></strong></div>
                                        <div class="text-dark fw-bold lh-lg mb-2"><strong>Pickup Time:- <b>{{$requestcar->pickup_time}}</b></strong></div>
                                        <div class="text-dark fw-bold lh-lg mb-2"><strong>Pessenger:- <b>{{$requestcar->pessenger}}</b></strong></div>
                                        <div class="text-dark fw-bold lh-lg mb-2"><strong>From Location:- <b>{{$requestcar->from}}</b></strong></div>
                                        <div class="text-dark fw-bold lh-lg mb-2"><strong>To Location:- <b>{{$requestcar->to}}</b></strong></div>
                                        <div class="text-dark fw-bold lh-lg mb-2"><strong>Other Information:- <b>{{$requestcar->other_information}}</b></strong></div>
                                        <div class="text-dark fw-bold lh-lg mb-2"><strong>Status:- <b>{{$requestcar->status}}</b></strong></div>
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Block-->
                    
                               
                            </div>
                            <!--end::Post content-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Sidebar-->
                        <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">
                        
                        </div>
                        <!--end::Sidebar-->
                    </div>
                    <!--end::Layout-->
                    <a href="{{ route('admin.requestcarstatus', ['id' => $requestcar->id, 'status' => 'confirm'])}}" class="btn btn-success">Confirm Request</a>
                    <a href="{{ route('admin.requestcarstatus', ['id' => $requestcar->id, 'status' => 'processing'])}}" class="btn btn-primary">Processing Request</a>
                    <a href="{{ route('admin.requestcarstatus', ['id' => $requestcar->id, 'status' => 'hold'])}}" class="btn btn-warning">Hold Request</a>
                    <a href="{{ route('admin.requestcarstatus', ['id' => $requestcar->id, 'status' => 'cancel'])}}" class="btn btn-danger">Cancel Request</a>
                 
                </div>
                <!--end::Body-->
            </div>
            <!--end::Post card-->
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

// $(document).ready(function(){
//  $('.getpermissionupdatedata').on('click', function(){
//     let pid = $(this).attr('data-perid'); 
//     let mid = $(this).attr('data-permoduleid');
//     let pname = $(this).attr('data-pername');
//     let pslug = $(this).attr('data-perslug');
//     $('#permission_name').val(pname);
//     $('#permission_slug').val(pslug);
//     $('#moduleid').val(mid);
//     $('#perid').val(pid);
    
//  });
// });
</script>


@endpush