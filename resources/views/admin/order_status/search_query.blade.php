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
        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-image-file text-primary"></i>
                        </span>
                        <h3 class="card-label">TPM Order Search Query</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-11 col-xl-10">
                                <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                            <span>
																	<i class="flaticon2-search-1 text-muted"></i>
																</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                            <select class="form-control" id="kt_datatable_search_status">
                                                <option value="">All</option>
                                                <option value="1">Job</option>
                                                <option value="2">Company</option>
                                                <option value="3">Quantity</option>
                                                <option value="4">Ship Date</option>
                                                <option value="5">Action</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--                                    <div class="col-md-4 my-2 my-md-0">--}}
                                    {{--                                        <div class="d-flex align-items-center">--}}
                                    {{--                                            <label class="mr-3 mb-0 d-none d-md-block">Type:</label>--}}
                                    {{--                                            <select class="form-control" id="kt_datatable_search_type">--}}
                                    {{--                                                <option value="">All</option>--}}
                                    {{--                                                <option value="1">Online</option>--}}
                                    {{--                                                <option value="2">Retail</option>--}}
                                    {{--                                                <option value="3">Direct</option>--}}
                                    {{--                                            </select>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="col-lg-1 col-xl-2 mt-5 mt-lg-0 d-flex justify-content-end">
                                <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-foot-custom table-checkable kt_datatable" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Mill</th>
                            <th>Job Number</th>
                            <th>Company Name</th>
                            <th>Quantity</th>
                            <th>Ordered Date</th>
                            <th>Ship Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>5</td>
                            <td>8791</td>
                            <td>Halliburton</td>
                            <td>100</td>
                            <td>2023-07-12</td>
                            <td>2023-07-12</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>6</td>
                            <td>8791</td>
                            <td>Halliburton</td>
                            <td>100</td>
                            <td>2023-07-12</td>
                            <td>2023-07-12</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>7</td>
                            <td>8791</td>
                            <td>Halliburton</td>
                            <td>100</td>
                            <td>2023-07-12</td>
                            <td>2023-07-12</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>8</td>
                            <td>8791</td>
                            <td>Halliburton</td>
                            <td>100</td>
                            <td>2023-07-12</td>
                            <td>2023-07-12</td>
                        </tr>
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
@endsection
