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
                    <h3 class="card-title">Quotes</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row gutter-b">
                            <div class="col-lg-4">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Quote</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Company</label></div>
                                    <div class="grid-input">
                                        <select>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Part</label></div>
                                    <div class="grid-input">
                                        <select>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Address</label></div>
                                    <div class="grid-input"><textarea></textarea></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Date</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Notes</label></div>
                                    <div class="grid-input"><textarea></textarea></div>
                                </div>
                            </div>
                        </div>
                        <div class="row gutter-b">
                            <div class="col-lg-4">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Quantity</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Quotes units</label></div>
                                    <div class="grid-input">
                                        <select>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Material</label></div>
                                    <div class="grid-input">
                                        <select>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Gage</label></div>
                                    <div class="grid-input">
                                        <select>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Pattern</label></div>
                                    <div class="grid-input">
                                        <select>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Holes</label></div>
                                    <div class="grid-input">
                                        <select>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Centers</label></div>
                                    <div class="grid-input">
                                        <select>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Diameter</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>ID</label></div>
                                    <div class="grid-input"><input type="checkbox"></div>
                                    <div class="grid-label"><label>Length</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Mat. ($/lb)</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Stamping ($/lf)</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Strip Width</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Angle</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Weight</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Total Time</label></div>
                                    <div class="grid-input"><input></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="grid-container-3 gutter-b">
                                    <div class="grid-label"><label>Setup cost</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Men working</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Crating cost</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Tubes per crate</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Shop supplies</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Electric cost ($/ft)</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Cutoff spd (in/min)</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Tag cost ($/tag)</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Scrap rate</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Gas cost ($/hr)</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Tubes per blade</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Blade cost ($/bl)</label></div>
                                    <div class="grid-input"><input></div>
                                </div>
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Description</label></div>
                                    <div class="grid-input"><textarea></textarea></div>
                                    <div class="grid-label"><label>Total Material + scrap</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Total Time For Order</label></div>
                                    <div class="grid-input"><input></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="grid-container-3 gutter-b">
                                    <div class="grid-label"><label>Overhead</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Cost basis</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Labour ($/hr)</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Weld spd (in/min)</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Markup</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Density (lbs/ci)</label></div>
                                    <div class="grid-input"><input></div>
                                </div>
                                <div class="gutter-b">
                                    <fieldset class="child-fieldset">
                                        <legend>Rate Info</legend>
                                        <div class="grid-container-3 gutter-b">
                                            <div class="grid-label"><label>Marginal Cost</label></div>
                                            <div class="grid-input"><input></div>
                                            <div class="grid-label"><label>Shop Overhead</label></div>
                                            <div class="grid-input"><input></div>
                                            <div class="grid-label"><label>Net Profit</label></div>
                                            <div class="grid-input"><input></div>
                                            <div class="grid-label"><label>Rate</label></div>
                                            <div class="grid-input"><input></div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="d-flex justify-content-around gutter-b">
                                    <button class="btn btn-success"><i class="fa fa-fast-backward"></i></button>
                                    <button class="btn btn-success"><i class="fa fa-backward"></i></button>
                                    <button class="btn btn-success"><i class="fa fa-pause"></i></button>
                                    <button class="btn btn-success"><i class="fa fa-forward"></i></button>
                                    <button class="btn btn-success"><i class="fa fa-fast-forward"></i></button>
                                </div>
                                <div class="d-flex justify-content-around">
                                    <button class="btn btn-success"><i class="fa fa-play-circle"></i></button>
                                    <button class="btn btn-success"><i class="fa fa-trash"></i></button>
                                    <button class="btn btn-success"><i class="fa fa-plus"></i></button>
                                    <button class="btn btn-success"><i class="fa fa-calculator"></i></button>
                                </div>
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
