{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/setting/footer.css') }}" />
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
                                                @foreach($obj_arr->first() as $key => $value)
                                                    <option>{{$key}}</option>
                                                @endforeach
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
                            @foreach($obj_arr->first() as $key => $value)
                                <th>{{$key}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($obj_arr as $obj)
                            <tr class="main-table-btn" data="{{$obj->id}}">
                                @foreach($obj as $key => $value)
                                    <td><?php echo (strlen($value) > 20) ? substr($value, 0, 20) . '...' : $value ?></td>
                                @endforeach
                            </tr>
                        @endforeach
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
                    <h3 class="card-title">Settings</h3>

                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="w-100" form="table.form" table-name="footer_for_pdf">
                                <div>
                                    <div class="">
                                        <div class="input" style="display: none;">
                                            <span class="left-placeholder">id</span><input id="id" class="align-right" type="text" field="Drift od seems invalid." value="1" maxlength="90">
                                        </div>
                                        <div class="row" style="background: #C9F7F5; border: 1px solid #1BC5BD; color: #1BC5BD;">
                                            <div class="col-4 text-center py-5">
                                                Tube Mill log Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="tubmil_log" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="tubmil_log-2" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="tubmil_log-3" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="tubmil_log-4" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #C9F7F5; border: 1px solid #1BC5BD; color: #1BC5BD;">
                                            <div class="col-4 text-center py-5">
                                                Tube Mill Setup Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="tubmil_setup" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="tubmil_setup-2" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="tubmil_setup-3" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="tubmil_setup-4" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #C9F7F5; border: 1px solid #1BC5BD; color: #1BC5BD;">
                                            <div class="col-4 text-center py-5">
                                                First Part Drift Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="first_part_drift" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="first_part_drift-2" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="first_part_drift-3" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="first_part_drift-4" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #C9F7F5; border: 1px solid #1BC5BD; color: #1BC5BD;">
                                            <div class="col-4 text-center py-5">
                                                Welding Station Check list Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="welding_station_cklist" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="welding_station_cklist-2" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="welding_station_cklist-3" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="welding_station_cklist-4" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #C9F7F5; border: 1px solid #1BC5BD; color: #1BC5BD;">
                                            <div class="col-4 text-center py-5">
                                                Worksheet Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="worksheet" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="worksheet-2" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="worksheet-3" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="worksheet-4" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #C9F7F5; border: 1px solid #1BC5BD; color: #1BC5BD;">
                                            <div class="col-4 text-center py-5">
                                                Direct Pack Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="direct_pack" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="direct_pack-2" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="direct_pack-3" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="direct_pack-4" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #C9F7F5; border: 1px solid #1BC5BD; color: #1BC5BD;">
                                            <div class="col-4 text-center py-5">
                                                Cutoff-Station Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="cutoff-station" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="cutoff-station-2" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="cutoff-station-3" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="cutoff-station-4" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #C9F7F5; border: 1px solid #1BC5BD; color: #1BC5BD;">
                                            <div class="col-4 text-center py-5">
                                                Inspection-Station Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="inspection-station" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="inspection-station-2" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="inspection-station-3" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="inspection-station-4" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #C9F7F5; border: 1px solid #1BC5BD; color: #1BC5BD;">
                                            <div class="col-4 text-center py-5">
                                                Ring Station Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="ring_station" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="ring_station-2" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="ring_station-3" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="ring_station-4" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #C9F7F5; border: 1px solid #1BC5BD; color: #1BC5BD;">
                                            <div class="col-4 text-center py-5">
                                                Geoform Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="geoform" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="geoform-2" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="geoform-3" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="geoform-4" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #C9F7F5; border: 1px solid #1BC5BD; color: #1BC5BD;">
                                            <div class="col-4 text-center py-5">
                                                Geoform Ring Concentric Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="geoform_ring_concentric" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="geoform_ring_concentric-2" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="geoform_ring_concentric-3" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="geoform_ring_concentric-4" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #C9F7F5; border: 1px solid #1BC5BD; color: #1BC5BD;">
                                            <div class="col-4 text-center py-5">
                                                Coil Allcoation Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="coil_alloc" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="coil_alloc-2" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="coil_alloc-3" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="coil_alloc-4" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #C9F7F5; border: 1px solid #1BC5BD; color: #1BC5BD;">
                                            <div class="col-4 text-center py-5">
                                                Mesh Allocation Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="mesh_alloc" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="mesh_alloc-2" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="mesh_alloc-3" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="mesh_alloc-4" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #C9F7F5; border: 1px solid #1BC5BD; color: #1BC5BD;">
                                            <div class="col-4 text-center py-5">
                                                Final Inspection-Geo Form Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="final_inspection" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="final_inspection-2" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="final_inspection-3" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input id="final_inspection-4" class="w-100 h-100 align-right footer-input" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--                    <div class="card-footer">--}}
                    {{--                        <div class="row">--}}
                    {{--                            <div class="col-lg-2"></div>--}}
                    {{--                            <div class="col-lg-10">--}}
                    {{--                                <button type="reset" class="btn btn-success mr-2">Submit</button>--}}
                    {{--                                <button type="reset" class="btn btn-secondary">Cancel</button>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
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
    <script src="{{ asset('assets/js/setting/footer_settings.js') }}"></script>
    <script>
        const objArr = {{Js::from($obj_arr)}};

        $(document).ready(function() {
            $('#DataTables_Table_0').parent().css('overflow-x', 'auto');
        })
    </script>
@endsection
