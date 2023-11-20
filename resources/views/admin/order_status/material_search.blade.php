{{-- Extends layout --}}
@extends('layout.default')

{{-- Styles --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- Content --}}
@section('content')

    {{-- Main --}}
    <div class="row">
        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2 gutter-b">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-image-file text-primary"></i>
                        </span>
                        <h3 class="card-label">Search by Job#</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Search Form-->
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-xl-12">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search..." id="search_query" />
                                        <span>
                                                                <i class="flaticon2-search-1 text-muted"></i>
                                                            </span>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-5 mt-lg-0 d-flex justify-content-end">
                                    <a class="btn btn-light-primary px-6 font-weight-bold" id="search-btn">Search</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                </div>
            </div>
            <!--end::Card-->
        </div>

        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2 gutter-b">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-image-file text-primary"></i>
                        </span>
                        <h3 class="card-label">Allocated Coils</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-foot-custom table-checkable kt_datatable" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Coil</th>
                            <th>Job</th>
                            <th>Work Number</th>
                            <th>Date Allocated</th>
                            <th>Weight</th>
                            <th>Operator</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($allocated_coils as $coil)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$coil->coil_no}}</td>
                                <td>{{$coil->job}}</td>
                                <td>{{$coil->operator}}</td>
                                <td>{{$coil->date_received}}</td>
                                <td>{{$coil->weight}}</td>
                                <td>{{$coil->operator}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>

        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2 gutter-b">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-image-file text-primary"></i>
                        </span>
                        <h3 class="card-label">Used Coils</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-foot-custom table-checkable kt_datatable" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Coil ID</th>
                            <th>Total Number of Tube</th>
                            <th>Heat Number</th>
                            <th>Work Number</th>
                            <th>Date Used</th>
                            <th>Weight</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>

        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2 gutter-b">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-image-file text-primary"></i>
                        </span>
                        <h3 class="card-label">Tube Lists</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-foot-custom table-checkable kt_datatable" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tube ID</th>
                            <th>Coil ID</th>
                            <th>Mill Checked</th>
                            <th>CutOff Checked</th>
                            <th>Inspect Checked</th>
                            <th>Mill Time</th>
                            <th>CutOff Time</th>
                            <th>Inspect Time</th>
                            <th>Mill Operator</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>

        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2 gutter-b">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-image-file text-primary"></i>
                        </span>
                        <h3 class="card-label">Allocated Mesh</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-foot-custom table-checkable kt_datatable" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>Mesh ID</th>
                            <th>Heat Number</th>
                            <th>Mesh</th>
                            <th>Type</th>
                            <th>Date Allocated</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>

        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-image-file text-primary"></i>
                        </span>
                        <h3 class="card-label">Used Mesh</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-foot-custom table-checkable kt_datatable" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>Mesh ID</th>
                            <th>Heat Number</th>
                            <th>Mesh</th>
                            <th>Type</th>
                            <th>Start Tube</th>
                            <th>Date Used</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tfoot>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/pages/crud/datatables/advanced/row-callback.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#search-btn').click(function() {
                window.location.href =  `/order_status/material_search/${$('#search_query').val()}`;
            })
        })
    </script>
@endsection
