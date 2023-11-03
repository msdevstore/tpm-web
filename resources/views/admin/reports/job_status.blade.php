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
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Quantity</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Material</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Gage</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Pattern</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Hole Size</label></div>
                                                        <div class="grid-input"><input></div>
                                                        <div class="grid-label"><label>Hole centers</label></div>
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
@endsection
