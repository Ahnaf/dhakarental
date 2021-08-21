@extends('layouts.admin')
@section('title','Admin Profile')
{{-- @section('description', 'Admin Login')
@section('meta', 'Admin Login') --}}


@push('css')
<link href="{{asset('assets/css/cropper.css') }}" rel="stylesheet">
<style>
    .label {
        cursor: pointer;
    }
    .img-container img {
        max-width: 100%;
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Profile</h1>
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
                @if(session('profilesuccess'))
                <!--begin::Alert-->
                    <div class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row p-5 mb-10">
                        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                            <p class="fs-6 mt-3">{{ session('profilesuccess') }}</p>
                        </div>
                        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                            <span class="svg-icon svg-icon-2x svg-icon-light">&times;</span>
                        </button>
                    </div>
                    <!--end::Alert-->
                @endif

                @if(session('profilewarning'))
                <!--begin::Alert-->
                    <div class="alert alert-dismissible bg-warning d-flex flex-column flex-sm-row p-5 mb-10">
                        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                            <p class="fs-6 mt-3">{{ session('profilewarning') }}</p>
                        </div>
                        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                            <span class="svg-icon svg-icon-2x svg-icon-light">&times;</span>
                        </button>
                    </div>
                    <!--end::Alert-->
                @endif
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Profile Details</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form class="form" action="{{ route('admin.profilestore')}}" method="post" enctype="multipart/form-data">
                        <!--begin::Card body-->
                        @csrf
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                   
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
                                        
                                        <!--begin::Preview existing avatar-->
                                        @if (isset(Auth::user()->profile_pic))
                                        <img id="avatar" src="{{asset('assets/media/avatars/'.Auth::user()->profile_pic)}}" alt="Preview" class="image-input-wrapper w-125px h-125px">
												
                                        @else
                                        <img id="avatar" src="{{asset('assets/media/avatars/blank.png')}}" alt="Preview" class="image-input-wrapper w-125px h-125px">
                                             
                                        @endif
                                        
                                       
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" id="photo" name="avatar" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        
                                        <!--end::Cancel-->
                                       
                                    </div>
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">Allowed file types: jpg, png, jpeg, gif.</div>
                                    <span class="text-danger" id="shoimageerrorempty"></span>

                                    <span class="text-danger" id="shoimageerror1">File size is larger than 2MB!</span>
                                    @error('avatar') <span class="text-danger">{{ $message }}</span> @enderror
                                    <!--end::Hint-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name" value="{{Auth::user()->name}}" />
                                        </div>
                                        <!--end::Col-->
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="email" class="form-control form-control-lg form-control-solid" placeholder="Email" value="{{Auth::user()->email}}" />
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <!--end::Col-->
                                
                            </div>
                            <!--end::Input group-->
                            
                            <input type="hidden" name="image" id="image" value="">
                            
                        </div>
                        <!--end::Card body-->
                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
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

<!--begin::Modal - Add permissions-->
<div class="modal fade" id="cropmodal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Crop image</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
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
                <div class="img-container">
                    <img id="previewimageforcrop" src="" alt="Picture">
                </div>
            </div>
            <!--end::Modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>



@endsection

@push('scripts')
<script>
// $(document).ready(function(){
//  $('.getmoduleeditid').on('click', function(){
//     let mid = $(this).attr('data-moduleid');
//     let mname = $(this).attr('data-modulename');
//     let mdescription = $(this).attr('data-mdescription');

//     $('#mname').val(mname);
//     $('#mdescription').val(mdescription);
//     $('#moduleid').val(mid);
    
//  });
// });
</script>
<script src="{{ asset('assets/js/cropper.js') }}"></script>

<script>
$(document).ready(function() {
    var avatar = document.getElementById('avatar');
    var image = document.getElementById('previewimageforcrop');
    var input = document.getElementById('photo');
    var $modal = $('#cropmodal');
    var imageurlnew;
    var cropper;
    var errormeg = '';

    $('#shoimageerror').hide();
    $('#shoimageerror1').hide();
    $('#adsloader').hide();
    
    $(".savepost").prop('disabled', false);


    $(input).on('change', function(e) {
    $('#shoimageerror1').hide();    
    var files = e.target.files;
    var fileType = files[0]['type'];
    var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
    if ($.inArray(fileType, validImageTypes) < 0) {

        $('#shoimageerror').show();
         $(".savepost").prop('disabled', true);

    // $('#shoimageerror').delay(5000).fadeOut('slow');
        
    }else if(files[0].size > 2097152){


        $('#shoimageerror1').show();
        $(".savepost").prop('disabled', true);
    //$('#shoimageerror').delay(5000).fadeOut('slow');
    }else{
        
        var done = function (url) {
            input.value = '';
            image.src = url;
            //$alert.hide();
            $modal.modal('show');
        };	
    }

    var reader;
    var file;
    var url;

    if (files && files.length > 0) {
        file = files[0];

    if (URL) {
        done(URL.createObjectURL(file));
        } else if (FileReader) {
         reader = new FileReader();
         reader.onload = function (e) {
        done(reader.result);
        };
         reader.readAsDataURL(file);
        }
    }

    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
    cropper = null;
    });

    $('#crop').click(function() {
    var initialAvatarURL;
    var canvas;

    $modal.modal('hide');
    $('#shoimageerror').hide();
    $('#shoimageerror1').hide();
    $('#shoimageerrorempty').hide();
    $(".savepost").prop('disabled', false);

    if(cropper){

        canvas = cropper.getCroppedCanvas({
            width: 200,
            height: 200,

        });
    initialAvatarURL = avatar.src;
    avatar.src = canvas.toDataURL();

    imageurlnew = avatar.src;

    canvas.toBlob(function (blob) {
        $('#image').val(imageurlnew);

        });
    }

    $('#shoimageerror').delay(1000).fadeOut('slow');
    
    });
});

</script>

@endpush