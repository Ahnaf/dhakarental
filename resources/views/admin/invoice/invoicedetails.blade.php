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
            <!-- begin::Invoice 1-->
            <div class="card">
                <!-- begin::Body-->
                <div class="card-body py-20">
                    <!-- begin::Wrapper-->
                    <div class="mw-lg-950px mx-auto w-100">
                        <!-- begin::Header-->
                        <div class="d-flex justify-content-between flex-column flex-sm-row mb-0">
                            <h4 class="fw-boldest text-gray-800 fs-2qx pe-5 pb-7">INVOICE</h4>
                            <!--end::Logo-->
                            <div class="text-sm-end">
                                <!--begin::Logo-->
                                <a href="#">
                                    <img alt="Logo" class="float-end" src="{{ asset('assets/media/logos/11-01.svg')}}" width="300" height="120" />
                                </a>
                                <!--end::Logo-->
                                <!--begin::Text-->
                                <div class="text-sm-end fw-bold fs-4 text-muted mt-7">
                                    <div>Dhaka rental</div>
                                    <div>Sector# 11, Uttara, Dhaka</div>
                                    
                                </div>
                                <!--end::Text-->
                                <div class="text-sm-end fw-bold fs-4 text-muted mt-7">
                                    <div class="text-gray-600 fs-6 fw-bold mb-5">INVOICE NO: {{$invoice->id}}</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="border-bottom pb-12">
                            <!--begin::Image-->
                            {{-- <div class="d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center bgi-size-cover card-rounded h-150px h-lg-250px mb-lg-20" style="background-image: url(assets/media/misc/pattern-4.jpg)"></div> --}}
                            <!--end::Image-->
                            <!--begin::Wrapper-->
                            <div class="d-flex justify-content-between flex-column flex-md-row">
                                <!--begin::Content-->
                                <div class="flex-grow-1 pt-8 mb-0">
                                    <!--begin::Table-->
                                    <div class="table-responsive border-bottom mb-0">
                                        <table class="table">
                                            <thead>
                                                <tr class="border-bottom fs-6 fw-bolder text-muted text-uppercase">
                                                    <th class="min-w-175px pb-9">No</th>
                                                    <th class="min-w-70px pb-9 text-end">Item Name</th>
                                                    <th class="min-w-80px pb-9 text-end">Qty</th>
                                                    <th class="min-w-100px pe-lg-6 pb-9 text-end">Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($invoice->items as $index=> $item)
                                                <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                    <td class="d-flex align-items-center pt-11">{{ $index + 1 }}</td>
                                                    <td class="pt-11">{{ $item->itemname }}</td>
                                                    <td class="pt-11">{{ $item->quantity }}</td>
                                                    <td class="pt-11 fs-5 pe-lg-6 text-dark fw-boldest">{{ $item->itemprice }}</td>
                                                </tr>
                                                @endforeach
                                      
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                    <!--begin::Section-->
                                    {{-- <div class="d-flex flex-column mw-md-300px w-100">
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-5 mb-3 text-dark00">BANK TRANSFER</div>
                                        <!--end::Label-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack text-gray-800 mb-3 fs-6">
                                            <!--begin::Accountname-->
                                            <div class="fw-bold pe-5">Account Name:</div>
                                            <!--end::Accountname-->
                                            <!--begin::Label-->
                                            <div class="text-end fw-norma">Barclays UK</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack text-gray-800 mb-3 fs-6">
                                            <!--begin::Accountnumber-->
                                            <div class="fw-bold pe-5">Account Number:</div>
                                            <!--end::Accountnumber-->
                                            <!--begin::Number-->
                                            <div class="text-end fw-norma">1234567890934</div>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack text-gray-800 fs-6">
                                            <!--begin::Code-->
                                            <div class="fw-bold pe-5">Code:</div>
                                            <!--end::Code-->
                                            <!--begin::Label-->
                                            <div class="text-end fw-norma">BARC0032UK</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                    </div> --}}
                                    <!--end::Section-->
                                </div>
                                <!--end::Content-->
                                <!--begin::Separator-->
                                <div class="border-end d-none d-md-block mh-450px mx-9"></div>
                                <!--end::Separator-->
                                <!--begin::Content-->
                                <div class="text-end pt-10">
                                    <!--begin::Total Amount-->
                                    <div class="fs-5 fw-bolder text-muted mb-1">TOTAL AMOUNT</div>
                                    <div class="fs-md-1x fs-4 fw-boldest">{{$invoice->total}}</div>
                                    {{-- <div class="text-muted fw-bold">Taxes included</div> --}}

                                    <div class="fs-5 fw-bolder text-muted mb-1">Vat</div>
                                    <div class="fs-md-1x fs-4 fw-boldest">{{$invoice->vat}}</div>

                                    <div class="fs-5 fw-bolder text-muted mb-1">Discount</div>
                                    <div class="fs-md-1x fs-4 fw-boldest">{{$invoice->discount}}</div>

                                    <div class="fs-5 fw-bolder text-muted mb-1">Grandtotal</div>
                                    <div class="fs-md-1x fs-4 fw-boldest">{{$invoice->grandtotal}}</div>

                                    <div class="fs-5 fw-bolder text-muted mb-1">Paid Amount</div>
                                    <div class="fs-md-1x fs-4 fw-boldest">{{$invoice->paidamount}}</div>

                                    <div class="fs-5 fw-bolder text-muted mb-1">Due Amount</div>
                                    <div class="fs-md-1x fs-4 fw-boldest">{{$invoice->dueamount}}</div>
                                    <!--end::Total Amount-->
                                    <div class="border-bottom w-100 my-7 my-lg-16"></div>
                                    <!--begin::Invoice To-->
                                    <div class="text-gray-600 fs-6 fw-bold mb-1">INVOICE TO.</div>
                                    <div class="fs-6 text-gray-800 fw-bold">{{ $invoice->contact->fname}}</div>
                                    <div class="fs-6 text-gray-800 fw-bold">{{ $invoice->contact->phone}}</div>
                                    <!--end::Invoice To-->
                                    <!--begin::Invoice Date-->
                                    <div class="text-gray-600 fs-6 fw-bold mb-1">DATE</div>
                                    <div class="fs-6 text-gray-800 fw-bold">{{$invoice->created_at->format('D-m-y')}}</div>
                                    <!--end::Invoice Date-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Body-->
                        <!-- begin::Footer-->
                        <div class="d-flex flex-stack flex-wrap mt-lg-20 pt-13">
                            <!-- begin::Actions-->
                            <div class="my-1 me-5">
                                <!-- begin::Pint-->
                                <button type="button" class="btn btn-success my-1 me-12" onclick="window.print();">Print Invoice</button>
                                <!-- end::Pint-->
                                <!-- begin::Download-->
                                {{-- <button type="button" class="btn btn-light-success my-1">Download</button> --}}
                                <!-- end::Download-->
                            </div>
                            <!-- end::Actions-->
                            <!-- begin::Action-->
                            <a href="{{ route('admin.addinvoiceview') }}" class="btn btn-primary my-1">Create Invoice</a>
                            <!-- end::Action-->
                        </div>
                        <!-- end::Footer-->
                    </div>
                    <!-- end::Wrapper-->
                </div>
                <!-- end::Body-->
            </div>
            <!-- end::Invoice 1-->
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
    docprint.document.write('<head><title>My Title</title>');
    docprint.document.write('<style type="text/css">body{ margin:0px; width: 850px;');
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