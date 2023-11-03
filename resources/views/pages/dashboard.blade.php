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
                            <td>64616-103</td>
                            <td>São Félix do Xingu</td>
                            <td>698 Oriole Pass</td>
                            <td>Hayes Boule</td>
                            <td>Casper-Kerluke</td>
                            <td>$563997.38</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>54868-3377</td>
                            <td>Bình Minh</td>
                            <td>8998 Delaware Court</td>
                            <td>Humbert Bresnen</td>
                            <td>Hodkiewicz and Sons</td>
                            <td>$582935.03</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>0998-0355</td>
                            <td>Palagao Norte</td>
                            <td>91796 Sutteridge Road</td>
                            <td>Jareb Labro</td>
                            <td>Kuhlman Inc</td>
                            <td>$925080.02</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>55154-6876</td>
                            <td>Jiannan</td>
                            <td>8 Muir Drive</td>
                            <td>Krishnah Tosspell</td>
                            <td>Prosacco-Kessler</td>
                            <td>$144042.68</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>49349-069</td>
                            <td>Shawnee Mission</td>
                            <td>782 Mallory Lane</td>
                            <td>Dale Kernan</td>
                            <td>Bernier and Sons</td>
                            <td>$504245.54</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>53499-0393</td>
                            <td>Kozel’shchyna</td>
                            <td>02 Briar Crest Parkway</td>
                            <td>Halley Bentham</td>
                            <td>Schoen-Metz</td>
                            <td>$431379.80</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>43074-105</td>
                            <td>De la Paz</td>
                            <td>643 Mayer Road</td>
                            <td>Burgess Penddreth</td>
                            <td>DuBuque, Stanton and Stanton</td>
                            <td>$254072.66</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>76328-333</td>
                            <td>Sobreira</td>
                            <td>6715 Dakota Parkway</td>
                            <td>Cob Sedwick</td>
                            <td>Homenick-Nolan</td>
                            <td>$1070878.82</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>21130-054</td>
                            <td>Roissy Charles-de-Gaulle</td>
                            <td>4942 Darwin Hill</td>
                            <td>Tabby Callaghan</td>
                            <td>Daugherty-Considine</td>
                            <td>$234343.18</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>68788-9890</td>
                            <td>Cristóbal</td>
                            <td>854 Dapin Terrace</td>
                            <td>Broddy Jarry</td>
                            <td>Walter Group</td>
                            <td>$101388.34</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>43269-779</td>
                            <td>Tidili Mesfioua</td>
                            <td>67 Talisman Drive</td>
                            <td>Marjorie McGougan</td>
                            <td>Littel and Sons</td>
                            <td>$1107527.60</td>
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
                            <td>64616-103</td>
                            <td>São Félix do Xingu</td>
                            <td>698 Oriole Pass</td>
                            <td>Hayes Boule</td>
                            <td>Casper-Kerluke</td>
                            <td>$563997.38</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>54868-3377</td>
                            <td>Bình Minh</td>
                            <td>8998 Delaware Court</td>
                            <td>Humbert Bresnen</td>
                            <td>Hodkiewicz and Sons</td>
                            <td>$582935.03</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>0998-0355</td>
                            <td>Palagao Norte</td>
                            <td>91796 Sutteridge Road</td>
                            <td>Jareb Labro</td>
                            <td>Kuhlman Inc</td>
                            <td>$925080.02</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>55154-6876</td>
                            <td>Jiannan</td>
                            <td>8 Muir Drive</td>
                            <td>Krishnah Tosspell</td>
                            <td>Prosacco-Kessler</td>
                            <td>$144042.68</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>49349-069</td>
                            <td>Shawnee Mission</td>
                            <td>782 Mallory Lane</td>
                            <td>Dale Kernan</td>
                            <td>Bernier and Sons</td>
                            <td>$504245.54</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>53499-0393</td>
                            <td>Kozel’shchyna</td>
                            <td>02 Briar Crest Parkway</td>
                            <td>Halley Bentham</td>
                            <td>Schoen-Metz</td>
                            <td>$431379.80</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>43074-105</td>
                            <td>De la Paz</td>
                            <td>643 Mayer Road</td>
                            <td>Burgess Penddreth</td>
                            <td>DuBuque, Stanton and Stanton</td>
                            <td>$254072.66</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>76328-333</td>
                            <td>Sobreira</td>
                            <td>6715 Dakota Parkway</td>
                            <td>Cob Sedwick</td>
                            <td>Homenick-Nolan</td>
                            <td>$1070878.82</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>21130-054</td>
                            <td>Roissy Charles-de-Gaulle</td>
                            <td>4942 Darwin Hill</td>
                            <td>Tabby Callaghan</td>
                            <td>Daugherty-Considine</td>
                            <td>$234343.18</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>68788-9890</td>
                            <td>Cristóbal</td>
                            <td>854 Dapin Terrace</td>
                            <td>Broddy Jarry</td>
                            <td>Walter Group</td>
                            <td>$101388.34</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>43269-779</td>
                            <td>Tidili Mesfioua</td>
                            <td>67 Talisman Drive</td>
                            <td>Marjorie McGougan</td>
                            <td>Littel and Sons</td>
                            <td>$1107527.60</td>
                        </tr>
                        </tfoot>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
        </div>

{{--        <div class="col-lg-6 col-xxl-4">--}}
{{--            @include('pages.widgets._widget-1', ['class' => 'card-stretch gutter-b'])--}}
{{--        </div>--}}

{{--        <div class="col-lg-6 col-xxl-4">--}}
{{--            @include('pages.widgets._widget-2', ['class' => 'card-stretch gutter-b'])--}}
{{--        </div>--}}

{{--        <div class="col-lg-6 col-xxl-4">--}}
{{--            @include('pages.widgets._widget-3', ['class' => 'card-stretch card-stretch-half gutter-b'])--}}
{{--            @include('pages.widgets._widget-4', ['class' => 'card-stretch card-stretch-half gutter-b'])--}}
{{--        </div>--}}

{{--        <div class="col-lg-6 col-xxl-4 order-1 order-xxl-1">--}}
{{--            @include('pages.widgets._widget-5', ['class' => 'card-stretch gutter-b'])--}}
{{--        </div>--}}

{{--        <div class="col-xxl-8 order-2 order-xxl-1">--}}
{{--            @include('pages.widgets._widget-6', ['class' => 'card-stretch gutter-b'])--}}
{{--        </div>--}}

{{--        <div class="col-lg-6 col-xxl-4 order-1 order-xxl-2">--}}
{{--            @include('pages.widgets._widget-7', ['class' => 'card-stretch gutter-b'])--}}
{{--        </div>--}}

{{--        <div class="col-lg-6 col-xxl-4 order-1 order-xxl-2">--}}
{{--            @include('pages.widgets._widget-8', ['class' => 'card-stretch gutter-b'])--}}
{{--        </div>--}}

{{--        <div class="col-lg-12 col-xxl-4 order-1 order-xxl-2">--}}
{{--            @include('pages.widgets._widget-9', ['class' => 'card-stretch gutter-b'])--}}
{{--        </div>--}}
    </div>

    {{-- Main --}}
    <div class="row">
        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2 gutter-b gutter-t">
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
                                        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                        <span>
                                                                <i class="flaticon2-search-1 text-muted"></i>
                                                            </span>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-5 mt-lg-0 d-flex justify-content-end">
                                    <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
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
                        <tr>
                            <td>1</td>
                            <td>5</td>
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
                        </tfoot>
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
                        </tfoot>
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
{{--    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>--}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/pages/crud/datatables/advanced/row-callback.js') }}"></script>
@endsection
