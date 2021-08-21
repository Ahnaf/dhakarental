@extends('layouts.admin')
@section('title','Role Update')
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Update Role</h1>
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                </div>
                
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Card-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header mt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ route('admin.rolelist') }}" class="btn btn-light-primary">
                            <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                            
                            <!--end::Svg Icon-->Back</a>
                            <!--end::Button-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <form id="kt_modal_update_role_form" class="form" action="{{ route('admin.roleupdatestore')}}" method="POST">
                            @csrf
							<!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bolder form-label mb-2">
                                        <span class="required">Role name</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter a role name" name="role_name" value="{{ $role->name}}" />
                                    <!--end::Input-->
                                     @error('role_name') <span class="text-danger">{{ $message }}</span> @enderror 
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bolder form-label mb-2">
                                        <span class="required">Description</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter description" name="description" value="{{ $role->description}}" />
                                    <!--end::Input-->
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror 
                                </div>
                                <!--end::Input group-->
                                <input type="hidden" name="roleid" value="{{$role->id}}">
                                <!--begin::Permissions-->
                                <div class="fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bolder form-label mb-2">Role Permissions</label>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                        <input class="form-check-input" type="checkbox" id="select_all" 
                                        />
                                        <span class="form-check-label">Select All</span>
                                    </label> 
                                    <!--end::Label-->
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        @error('permissions') <span class="text-danger">{{ $message }}</span> @enderror 
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                                            <!--begin::Table body-->
                                            <tbody class="text-gray-600 fw-bold">
                                                <!--begin::Table row-->
                                                
                                                <!--end::Table row-->
                                                @foreach ($modules as $module)
                                                   <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">{{ucfirst($module->name)}}:</td>
                                                    <!--end::Label-->
                                                    <!--begin::Input group-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            @php

                                                           //$module->permissions = $role->permissions->map(fn ($item) => (int)$item->id);
                                                          
                                                            @endphp
                                                            @foreach ($module->permissions as $permission)
                                                            
                                                            
                                                              <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" value="{{$permission->id}}" name="permissions[]" 
                                                                    @isset($role->permissions)
                                                                        @foreach ($role->permissions as $roleper)
                                                                            {{$permission->id == $roleper->id ? 'checked' : ''}}
                                                                        @endforeach
                                                                    @endisset
                                                                />
                                                                <span class="form-check-label">{{$permission->name}}</span>
                                                            </label>  
                                                            @endforeach
                                                            
                                                                                                                       
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Input group-->
                                                </tr>
                                                <!--end::Table row--> 
                                                @endforeach
                                                
                                                
                                                <!--end::Table row-->
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Permissions-->
                            </div>
                            <!--end::Scroll-->
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                  
                                <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
                                    <span class="indicator-label">Save</span>
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
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
$(document).ready(function(){
    $('#select_all').click(function(event){

        if(this.checked){
            $(':checkbox').each(function(){
                this.checked = true;
            });
        }else{
            $(':checkbox').each(function(){
                this.checked = false;
            });
        }
    });
});
</script>
@endpush