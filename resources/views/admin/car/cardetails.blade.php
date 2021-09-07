@extends('layouts.admin')
@section('title','Car Details')
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" id="testtest">Car Details</h1>
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
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap mb-6">
                                        <!--begin::Item-->
                                        <div class="me-9 my-1">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks.svg-->
                                            <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Label-->
                                            <span class="fw-bolder text-gray-400">{{$car->created_at->format('jS F, Y - g:i a')}}</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="me-9 my-1">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotone/Interface/Folder.svg-->
                                            <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.25" d="M13 6L12.4104 5.01732C11.8306 4.05094 10.8702 3.36835 9.75227 3.22585C8.83875 3.10939 7.66937 3 6.5 3C5.68392 3 4.86784 3.05328 4.13873 3.12505C2.53169 3.28325 1.31947 4.53621 1.19597 6.14628C1.09136 7.51009 1 9.43529 1 12C1 13.8205 1.06629 15.4422 1.15059 16.7685C1.29156 18.9862 3.01613 20.6935 5.23467 20.8214C6.91963 20.9185 9.17474 21 12 21C14.8253 21 17.0804 20.9185 18.7653 20.8214C20.9839 20.6935 22.7084 18.9862 22.8494 16.7685C22.9337 15.4422 23 13.8205 23 12C23 10.9589 22.9398 9.97795 22.8611 9.14085C22.7101 7.53313 21.4669 6.2899 19.8591 6.13886C19.0221 6.06022 18.0411 6 17 6H13Z" fill="#12131A" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13 6H1.21033C1.39381 4.46081 2.58074 3.27842 4.13877 3.12505C4.86788 3.05328 5.68396 3 6.50004 3C7.66941 3 8.83879 3.10939 9.75231 3.22585C10.8702 3.36835 11.8306 4.05094 12.4104 5.01732L13 6Z" fill="#12131A" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Label-->
                                            <span class="fw-bolder text-gray-400">{{ $car->admin->name}}</span>
                                            <!--begin::Label-->
                                        </div>
                                        <!--end::Item-->
                                        
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Title-->
                                    <a href="#" class="text-dark text-hover-primary fs-2 fw-bolder">Model: {{ $car->model}}
                                    <span class="fw-bolder text-muted fs-5 ps-1"></span></a>
                                    <!--end::Title-->
                                    <!--begin::Container-->
                                    <div class="overlay mt-8">
                                        <!--begin::Image-->
                                        <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url('{{ asset('storage/car/'.$car->token.'/'.$car->avatar)}}')"></div>
                                        <!--end::Image-->
                                        <!--begin::Links-->
                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                        </div>
                                        <!--end::Links-->
                                    </div>
                                    <!--end::Container-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Description-->
                          
                                <!--end::Description-->
                                <!--begin::Block-->
                                <div class="d-flex align-items-center border-dashed card-rounded p-2 p-lg-10 mb-4">
                                
                                    <!--begin::Text-->
                                    <div class="mb-0 fs-6">
                                        <div class="text-muted fw-bold lh-lg mb-2"><strong>Owner / Driver:</strong> {{ $car->owner_driver }}</div>
                                        <div class="text-muted fw-bold lh-lg mb-2"><strong>Location:</strong> {{ $car->location }}</div>
                                        <div class="text-muted fw-bold lh-lg mb-2"><strong>Note:</strong> {{ $car->note }}</div>
                                        <div class="text-muted fw-bold lh-lg mb-2"><strong>Other features:</strong> {{ $car->other_features }}</div>
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Block-->
                                <!--begin::Block-->
                                <h4 class="text-black mt-3">Attachment</h4>
                                <div class="d-flex align-items-center border-dashed card-rounded p-2 p-lg-10 mb-4">
                                
                                    <!--begin::Text-->
                                    <div class="mb-0 fs-6">
                                        @foreach ($car->attachment as $attach)
                                              <div class="text-muted fw-bold lh-lg mb-2"><strong>Name:</strong> {{ $attach->pepar_name }}, &nbsp;&nbsp; <strong>Pepar:</strong> <a href="{{ url('storage/car/'.$car->token.'/'.$attach->pepar_file)}}" class="fw-bold link-primary" target="_blank">{{$attach->pepar_file}}</a></div>
                                        @endforeach
                                      

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
                           
                                
                            <!--begin::Catigories-->
                            <div class="mb-16">
                                <h4 class="text-black mb-7">Configuration</h4>
                                <!--begin::Item-->
                                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                                    <p class="text-muted text-hover-primary pe-2">Type:</p>
                                    <div class="m-0">{{ $car->type}}</div>
                                </div>

                                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                                    <p class="text-muted text-hover-primary pe-2">Color:</p>
                                    <div class="m-0">{{ $car->color }}</div>
                                </div>
                               
                                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                                    <p class="text-muted text-hover-primary pe-2">Reg number:</p>
                                    <div class="m-0">{{$car->reg_number}}</div>
                                </div>
                            
                                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                                    <p class="text-muted text-hover-primary pe-2">Registration year:</p>
                                    <div class="m-0">{{ $car->registration_year }}</div>
                                </div>
        
                                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                                    <p class="text-muted text-hover-primary pe-2">Condition:</p>
                                    <div class="m-0">{{ $car->condition}}</div>
                                </div>
                               
                                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                                    <p class="text-muted text-hover-primary pe-2">Ac:</p>
                                    <div class="m-0">{{ $car->ac}}</div>
                                </div>

                                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                                    <p class="text-muted text-hover-primary pe-2">Fuel:</p>
                                    <div class="m-0">{{ $car->fuel}}</div>
                                </div>
                               
                                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                                    <p class="text-muted text-hover-primary pe-2">Gearbox:</p>
                                    <div class="m-0">{{$car->gearbox}}</div>
                                </div>
                            
                                
        
                                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                                    <p class="text-muted text-hover-primary pe-2">Prefered:</p>
                                    <div class="m-0">{{ $car->prefered}}</div>
                                </div>
                               
                                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                                    <p class="text-muted text-hover-primary pe-2">Isavailable:</p>
                                    <div class="m-0">{{ $car->isavailable}}</div>
                                </div>
                               
                            </div>

                        </div>
                        <!--end::Sidebar-->
                    </div>
                    <!--end::Layout-->
                    <!--begin::Section-->
                    <div class="mb-17">
                        <!--begin::Content-->
                        <div class="d-flex flex-stack mb-5">
                            <!--begin::Title-->
                            <h3 class="text-black">Car Gallery</h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-9"></div>
                        <!--end::Separator-->
                        <!--begin::Row-->
                        <div class="row g-10">
                            @foreach ($car->gallery as $img)
                             <div class="col-md-3">
                                <!--begin::Feature post-->
                                <div class="card-xl-stretch me-md-6">
                                    <!--begin::Image-->
                                    <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" style="background-image:url('assets/media/stock/600x400/img-73.jpg')" data-fslightbox="lightbox-video-tutorials">
                                        <img src="{{ asset('storage/car/'.$car->token.'/'.$img->gallery_image)}}" class="position-absolute top-50 start-50 translate-middle" alt="" />
                                    </a>
                                    <!--end::Image-->
                                   
                                </div>
                                <!--end::Feature post-->
                            </div>   
                            @endforeach
                            
                            
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Section-->
                 
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
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/permissions/list.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/permissions/add-permission.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/permissions/update-permission.js')}}"></script>

@endpush