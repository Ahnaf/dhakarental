@extends('layouts.admin')
@section('title','Invoice Details')
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" id="testtest">Invoice List</h1>
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
            <!--begin::Card-->
            <div class="card">
                
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Add subscription-->
                            <a href="{{ route('admin.addinvoiceview') }}" class="btn btn-success">
                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                            <span class="svg-icon svg-icon-2">
                                
                            </span>
                            <!--end::Svg Icon-->Confrim</a>
                            <!--end::Add subscription-->
                            
                        </div>
                        <!--end::Search-->
                    </div>

                    <div class="card-toolbar">
                 
                        <div class="d-flex justify-content-end">
                           
                            
                            <!--begin::Add subscription-->
                            <button tyye="button" onclick="printDiv('print_content')" class="btn btn-primary">
                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="#ffffff" d="M24 11v12h-24v-12h4v-10h10.328c1.538 0 5.672 4.852 5.672 6.031v3.969h4zm-18 5h12v-8.396c0-1.338-2.281-1.494-3.25-1.229.453-.813.305-3.375-1.082-3.375h-7.668v13zm16-3h-2v5h-16v-5h-2v8h20v-8zm-6 0h-8v-1h8v1zm0-3h-8v1h8v-1zm0-2h-8v1h8v-1z"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Print</button>
                            <!--end::Add subscription-->
                        </div>
                        <!--end::Toolbar-->

                        
                        
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card header-->
               
                    
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0" id="print_content">
                        <div class="card-header border-0 pt-6">

                        <div class="card-title">
                            <span class="fs-6">{{ $invoice->admin->name}}</span>
                        </div>

                        <div class="card-title">
                            <span class="fs-6">{{ $invoice->contact->fname}}</span>  
                            
                        </div>
                    </div>
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    
                                    <th class="">No</th>
                                    <th class="">Item Name</th>
                                    <th class="">Qty</th>
                                    <th class=""></th>
                                    <th class="">Price</th>
                                
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold" id="tablebodycheckbox">
                                @foreach ($invoice->items as $index=> $item)
                                <tr>
                                    <td class="">
                                        {{ $index + 1 }}
                                    </td>
                                
                                    <td>
                                        {{ $item->itemname }}
                                    </td>

                                    <td>
                                        {{ $item->quantity }}
                                    </td>

                                    <td> 
                                    </td>

                                    <td class="">
                                        {{ $item->itemprice }}
                                    </td>
                                    
                            

                                </tr>
                                @endforeach  
                                <tr>
                                <th scope="row"></th>
                                <td colspan="2"></td>
                                <td class="text-end">Total:</td>
                                <td class=""> {{$invoice->total}}</td>
                                </tr>

                                <tr>
                                <th scope="row"></th>
                                <td colspan="2"></td>
                                <td class="text-end">Vat:</td>
                                <td class=""> {{$invoice->vat}}</td>
                                </tr>

                                <tr>
                                <th scope="row"></th>
                                <td colspan="2"></td>
                                <td class="text-end">Discount:</td>
                                <td class=""> {{$invoice->discount}}</td>
                                </tr>

                                <tr>
                                <th scope="row"></th>
                                <td colspan="2"></td>
                                <td class="text-end">Grandtotal:</td>
                                <td class=""> {{$invoice->grandtotal}}</td>
                                </tr>

                                <tr>
                                <th scope="row"></th>
                                <td colspan="2"></td>
                                <td class="text-end">Paid Amount:</td>
                                <td class=""> {{$invoice->paidamount}}</td>
                                </tr>

                                <tr>
                                <th scope="row"></th>
                                <td colspan="2"></td>
                                <td class="text-end">Due Amount:</td>
                                <td class=""> {{$invoice->dueamount}}</td>
                                </tr>
                                                            
                            </tbody>
                           
                        </table>

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
<script src="{{asset('assets/js/custom/apps/user-management/invoice/invoicelist.js')}}"></script>
<script>
    // function printDiv(divName) {
    //     var printContents = document.getElementById(divName).innerHTML;
    //     var disp_setting="toolbar=yes,location=no,";
    //     disp_setting+="directories=yes,menubar=yes,";
    //     disp_setting+="scrollbars=yes,width=650, height=600, left=100, top=25";
    //     var originalContents = document.body.innerHTML;
    //     var docprint=window.open("","",disp_setting);
    //     document.body.innerHTML = printContents;
    //     docprint.document.write(content_vlue);
    //     docprint.document.close();
    //     docprint.focus();
    //     //window.print();

    //     //document.body.innerHTML = originalContents;
    // }
function printDiv(divName) {
    var disp_setting="toolbar=yes,location=no,";
    disp_setting+="directories=yes,menubar=yes,";
    disp_setting+="scrollbars=yes,width=650, height=600, left=100, top=25";
    var content_vlue = document.getElementById(divName).innerHTML;
    var docprint=window.open("","",disp_setting);
    docprint.document.open();
    docprint.document.write('<!doctype html>');
    docprint.document.write('<html lang="en">');
    //docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
    docprint.document.write('<head><title>My Title</title>');
    docprint.document.write('<style type="text/css">body{ margin:0px;');
    docprint.document.write('font-family:verdana,Arial;color:#000;');
    docprint.document.write('font-family:Verdana, Geneva, sans-serif; font-size:12px;}');
    docprint.document.write('a{color:#000;text-decoration:none;} </style>');
    docprint.document.write('</head><body onLoad="self.print()"><center>');
    docprint.document.write(content_vlue);
    docprint.document.write('</center></body></html>');
    docprint.document.close();
    docprint.focus();
}
</script>
@endpush