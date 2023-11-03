{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
@endsection

{{-- Content --}}
@section('content')

    {{-- Main --}}
    <div class="row">
        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Reports</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-separate table-head-custom table-foot-custom table-checkable text-center kt_datatable" style="margin-top: 13px !important">
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
                            </tfoot>
                        </table>
                        <!--end: Datatable-->
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-end">
                            <button type="reset" class="btn btn-success mr-2">Generate Report</button>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
@endsection
