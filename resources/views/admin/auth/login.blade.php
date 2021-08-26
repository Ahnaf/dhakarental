@extends('layouts.loginmaster')
@section('title','Admin Login')
{{-- @section('description', 'Admin Login')
@section('meta', 'Admin Login') --}}


@push('css')

@endpush

@section('content')

<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/development-hd.png)">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid pb-lg-20">
					<!--begin::Logo-->
					<a href="" class="">
						<img alt="Logo" src="{{ asset('assets/media/logos/11-01.svg') }}" class="h-200px" />
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{route('adminlogin.submit')}}" method="POST">
							<!--begin::Heading-->
							@csrf
							<div class="text-center mb-5">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Sign In to Dhaka Rental</h1>
								@if(session('loginerror'))
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>Wait!</strong> {{session('loginerror')}}
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
								@endif

								@if ($errors->any())
									@foreach ($errors->all() as $error)
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>Wait!</strong> {{ $error }}
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
									@endforeach
								@endif
								<!--end::Title-->
								<!--begin::Link-->
								
								<!--end::Link-->
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Label-->
								<label class="form-label fs-6 fw-bolder text-dark">Email</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" />
								<!--end::Input-->
								{{-- @error('email') <span class="text-danger">{{ $message }}</span> @enderror --}}
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack mb-2">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
									<!--end::Label-->
									<!--begin::Link-->
									{{-- <a href="" class="link-primary fs-6 fw-bolder">Forgot Password ?</a> --}}
									<!--end::Link-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
								<!--end::Input-->
								{{-- @error('password') <span class="text-danger">{{ $message }}</span> @enderror --}}
							</div>
							<!--end::Input group-->
							{{-- <div class="g-recaptcha" data-sitekey="6LfMgA4cAAAAAIYIehi2sNuDPjqm58LmmFE781Lo"></div> --}}
							<!--begin::Actions-->
							<div class="text-center">
								<!--begin::Submit button-->
								<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
									<span class="indicator-label">Continue</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<!--end::Submit button-->
								<!--begin::Separator-->
								
								<!--end::Google link-->
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
				
			</div>
			<!--end::Authentication - Sign-in-->
		</div>

@endsection

@push('scripts')

@endpush