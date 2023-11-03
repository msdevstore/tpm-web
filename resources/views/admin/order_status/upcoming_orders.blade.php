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
                            <th>Customer</th>
                            <th>Ship Date</th>
                            <th>Part</th>
                            <th>Job</th>
                            <th>QTY</th>
                            <th>Description</th>
                            <th>Mill</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM-INR</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM-INR</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM-INR</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM-INR</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM-INR</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM-INR</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
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
                        <h3 class="card-label">Paused Orders</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-foot-custom table-checkable kt_datatable" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Ship Date</th>
                            <th>Part</th>
                            <th>Job</th>
                            <th>QTY</th>
                            <th>Description</th>
                            <th>Mill</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM-INR</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM-INR</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM-INR</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM-INR</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM-INR</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Alloy Machine Works Inc</td>
                            <td>2023-07-12</td>
                            <td>H0K09198BM-INR</td>
                            <td>8679</td>
                            <td>5</td>
                            <td>4.0 IN FLTR CRTG, FINE, 192.00</td>
                            <td><a class="highlight" style="font-weight: bold; color: rgb(113, 106, 202);">Assign</a></td>
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
