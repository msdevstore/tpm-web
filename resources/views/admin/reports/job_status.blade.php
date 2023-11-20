{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
@endsection

{{-- Content --}}
@section('content')

    {{-- Main --}}
    <div class="row gutter-b" id="main-table" style="display: none">
        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Main Table</h3>
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
                                                @if(count($obj_arr) > 0)
                                                @foreach($obj_arr->first() as $key => $value)
                                                    <option>{{$key}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-xl-2 mt-5 mt-lg-0 d-flex justify-content-end">
                                <a href="" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--begin: Datatable-->
                    <table class="table table-separate table-hover table-head-custom table-foot-custom table-checkable kt_datatable" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            @if(count($obj_arr) > 0)
                            @foreach($obj_arr->first() as $key => $value)
                                <th>{{$key}}</th>
                            @endforeach
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($obj_arr) > 0)
                        @foreach($obj_arr as $obj)
                            <tr class="main-table-btn" data="{{$obj->job}}">
                                @foreach($obj as $key => $value)
                                    <td><?php echo (strlen($value) > 20) ? substr($value, 0, 20) . '...' : $value ?></td>
                                @endforeach
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
    </div>
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
                        <div class="row">
                            <div class="col-lg-12 gutter-b">
                                <fieldset>
                                    <legend>Part Specification</legend>
                                    <div class="row">
                                        <div class="col-4 p-5">
                                            <div class="row">
                                                <div class="col-12 gutter-b">
                                                    <div class="grid-container-3">
                                                        <div class="grid-label"><label>Job No.</label></div>
                                                        <div class="grid-input"><input id="job"></div>
                                                        <div class="grid-label"><label>Quantity</label></div>
                                                        <div class="grid-input"><input id="quantity"></div>
                                                        <div class="grid-label"><label>Material</label></div>
                                                        <div class="grid-input"><input id="material"></div>
                                                        <div class="grid-label"><label>Gage</label></div>
                                                        <div class="grid-input"><input id="gage"></div>
                                                        <div class="grid-label"><label>Pattern</label></div>
                                                        <div class="grid-input"><input id="pattern"></div>
                                                        <div class="grid-label"><label>Hole Size</label></div>
                                                        <div class="grid-input"><input id="holes"></div>
                                                        <div class="grid-label"><label>Hole centers</label></div>
                                                        <div class="grid-input"><input id="centers"></div>
                                                    </div>
                                                </div>
                                                <div class="col-12 gutter-b">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="grid-container-3">
                                                                <div class="grid-label"><label>OD</label></div>
                                                                <div class="grid-input"><input></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="grid-container-3">
                                                                <div class="grid-label"><label>+</label></div>
                                                                <div class="grid-input"><input></div>
                                                                <div class="grid-label"><label>-</label></div>
                                                                <div class="grid-input"><input></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="grid-container-3">
                                                        <div class="grid-label"><label>Drawing</label></div>
                                                        <div class="grid-input"><input></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 p-5">
                                            <div class="row">
                                                <div class="col-12 gutter-b">
                                                    <div class="grid-container-3">
                                                        <div class="grid-label"><label>Customer</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>PO Number</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Line item</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Part No.</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Part Desc.</label></div>
                                                        <div class="grid-input"><textarea></textarea></div>
                                                        <div class="grid-label"><label>Date ordered</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Date Due</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Ship Date</label></div>
                                                        <div class="grid-input"><input></div>
                                                    </div>
                                                </div>
                                                <div class="col-12 gutter-b">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="grid-container-3">
                                                                <div class="grid-label"><label>OD</label></div>
                                                                <div class="grid-input"><input></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="grid-container-3">
                                                                <div class="grid-label"><label>+</label></div>
                                                                <div class="grid-input"><input></div>
                                                                <div class="grid-label"><label>-</label></div>
                                                                <div class="grid-input"><input></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 p-5">
                                            <div class="row">
                                                <div class="col-12 gutter-b">
                                                    <div class="grid-container-3">
                                                        <div class="grid-label"><label>Mill Spec</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Repair Spec</label></div>
                                                        <div class="grid-input"><input></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 gutter-t gutter-b">
                                <fieldset>
                                    <legend>Mfg. Specification</legend>
                                    <div class="row">
                                        <div class="col-3 p-5">
                                            <div class="row">
                                                <div class="col-12 gutter-b">
                                                    <div class="grid-container-3">
                                                        <div class="grid-label"><label>Strip width</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Angle</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Cutoff length</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Die</label></div>
                                                        <div class="grid-input"><input></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 p-5">
                                            <div class="row">
                                                <div class="col-12 gutter-b">
                                                    <div class="grid-container-3">
                                                        <div class="grid-label"><label>Mill</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Ring Min</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Ring Max</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>ID drift</label></div>
                                                        <div class="grid-input"><input></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 p-5">
                                            <div class="row">
                                                <div class="col-12 gutter-b">
                                                    <div class="grid-container-3">
                                                        <div class="grid-label"><label>Mill amps</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Mill volts</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Mill speed</label></div>
                                                        <div class="grid-input"><input></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 p-5">
                                            <div class="row">
                                                <div class="col-12 gutter-b">
                                                    <div class="grid-container-3">
                                                        <div class="grid-label"><label>Repair amps</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Repair volts</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Repair speed</label></div>
                                                        <div class="grid-input"><input></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-6 gutter-t gutter-b">
                                <fieldset>
                                    <legend>Mfg. Specification</legend>
                                    <div class="row">
                                        <div class="col-3 p-5">
                                            <a href="#">Mill Log</a><br>
                                            <a href="#">Mill Setup</a><br>
                                            <a href="#">Welding Sheets</a><br>
                                            <a href="#">Worksheet</a><br>
                                            <a href="#">Direct Pack</a>
                                        </div>
                                        <div class="col-5 p-5">
                                            <a href="#">Cutoff Sheets</a><br>
                                            <a href="#">Inspection Sheets</a><br>
                                            <a href="#">Allocation</a><br>
                                            <a href="#">Allocation Mesh</a><br>
                                            <a href="#">Ring Inspection</a><br>
                                            <a href="#">GeoForm Ring Inspection</a><br>
                                            <a href="#">GeoForm Ring Concentric Inspection</a><br>
                                        </div>
                                        <div class="col-4 p-5">
                                            <fieldset class="child-fieldset">
                                                <legend>Print Options</legend>
                                                <div>
                                                    <div class="d-flex justify-content-between">
                                                        <label>Print</label>
                                                        <input type="checkbox">
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <label>Preview</label>
                                                        <input type="checkbox">
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
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
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/pages/crud/datatables/advanced/row-callback.js') }}"></script>
    <script src="{{ asset('assets/js/reports/job_status.js') }}"></script>
    <script>
        const objArr = {{Js::from($obj_arr)}};

        $(document).ready(function() {
            $('#DataTables_Table_0').parent().css('overflow-x', 'auto');
        })
    </script>
@endsection
