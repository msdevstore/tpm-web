{{-- Extends layout --}}
@extends('layout.default')

{{-- Styles --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">
        <div class="col-lg-12 col-xxl-12 card-stretch gutter-b">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-image-file text-primary"></i>
                        </span>
                        <h3 class="card-label">In Progress Orders</h3>
                    </div>
                </div>
                <div class="card-body">
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
        </div>
        <div class="col-lg-12 col-xxl-12 card-stretch gutter-b">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-image-file text-primary"></i>
                        </span>
                        <h3 class="card-label">Not Started Orders</h3>
                    </div>
                </div>
                <div class="card-body">
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
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/pages/crud/datatables/advanced/row-callback.js') }}"></script>
@endsection
