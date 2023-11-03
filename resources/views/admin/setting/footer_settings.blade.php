{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/setting_footer.css') }}" />
@endsection

{{-- Content --}}
@section('content')

    {{-- Main --}}
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
                                            <span class="left-placeholder">id</span><input var="id" class="align-right" type="text" field="Drift od seems invalid." value="1" maxlength="90">
                                        </div>
                                        <div class="row" style="background: #f5f7fa; border: 1px solid #ccc;">
                                            <div class="col-4 text-center py-5">
                                                Tube Mill log Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="tubmil_log" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="tubmil_log-2" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="tubmil_log-3" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="tubmil_log-4" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #f5f7fa; border: 1px solid #ccc;">
                                            <div class="col-4 text-center py-5">
                                                Tube Mill Setup Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="tubmil_setup" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="tubmil_setup-2" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="tubmil_setup-3" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="tubmil_setup-4" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #f5f7fa; border: 1px solid #ccc;">
                                            <div class="col-4 text-center py-5">
                                                First Part Drift Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="first_part_drift" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="first_part_drift-2" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="first_part_drift-3" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="first_part_drift-4" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #f5f7fa; border: 1px solid #ccc;">
                                            <div class="col-4 text-center py-5">
                                                Welding Station Check list Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="welding_station_cklist" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="welding_station_cklist-2" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="welding_station_cklist-3" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="welding_station_cklist-4" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #f5f7fa; border: 1px solid #ccc;">
                                            <div class="col-4 text-center py-5">
                                                Worksheet Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="worksheet" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="worksheet-2" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="worksheet-3" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="worksheet-4" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #f5f7fa; border: 1px solid #ccc;">
                                            <div class="col-4 text-center py-5">
                                                Direct Pack Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="direct_pack" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="direct_pack-2" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="direct_pack-3" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="direct_pack-4" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #f5f7fa; border: 1px solid #ccc;">
                                            <div class="col-4 text-center py-5">
                                                Cutoff-Station Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="cutoff-station" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="cutoff-station-2" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="cutoff-station-3" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="cutoff-station-4" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #f5f7fa; border: 1px solid #ccc;">
                                            <div class="col-4 text-center py-5">
                                                Inspection-Station Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="inspection-station" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="inspection-station-2" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="inspection-station-3" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="inspection-station-4" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #f5f7fa; border: 1px solid #ccc;">
                                            <div class="col-4 text-center py-5">
                                                Ring Station Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="ring_station" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="ring_station-2" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="ring_station-3" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="ring_station-4" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #f5f7fa; border: 1px solid #ccc;">
                                            <div class="col-4 text-center py-5">
                                                Geoform Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="geoform" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="geoform-2" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="geoform-3" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="geoform-4" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #f5f7fa; border: 1px solid #ccc;">
                                            <div class="col-4 text-center py-5">
                                                Geoform Ring Concentric Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="geoform_ring_concentric" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="geoform_ring_concentric-2" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="geoform_ring_concentric-3" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="geoform_ring_concentric-4" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #f5f7fa; border: 1px solid #ccc;">
                                            <div class="col-4 text-center py-5">
                                                Coil Allcoation Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="coil_alloc" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="coil_alloc-2" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="coil_alloc-3" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="coil_alloc-4" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #f5f7fa; border: 1px solid #ccc;">
                                            <div class="col-4 text-center py-5">
                                                Mesh Allocation Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="mesh_alloc" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="mesh_alloc-2" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="mesh_alloc-3" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="mesh_alloc-4" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background: #f5f7fa; border: 1px solid #ccc;">
                                            <div class="col-4 text-center py-5">
                                                Final Inspection-Geo Form Footer
                                            </div>
                                            <div class="col-8">
                                                <div class="d-flex align-center justify-content-center align-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="final_inspection" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-1</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="final_inspection-2" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-2</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="final_inspection-3" class="w-100 h-100 align-right" type="text" maxlength="90">
                                                    </div>
                                                    <span class="w-80px">Line-3</span>
                                                </div>
                                                <div class="d-flex align-center justify-content-center">
                                                    <div class="flex-grow-1">
                                                        <input var="final_inspection-4" class="w-100 h-100 align-right" type="text" maxlength="90">
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
@endsection
