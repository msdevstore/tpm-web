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
                    <h3 class="card-title">Inventory</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Quantity</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Dimension</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>ID</label></div>
                                    <div class="grid-input"><input type="checkbox"></div>
                                    <div class="grid-label"><label>Length</label></div>
                                    <div class="grid-input"><input></div>
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
                                    <div class="grid-label"><label>Strip</label></div>
                                    <div class="grid-input"><input></div>
                                </div>
                            </div>
                            <div class="col-lg-6 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>OD</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>OA</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Tube Weight</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>weight/foot</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>hspi</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Angle</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Strip/lf</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>wt (pre)</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Total if mat</label></div>
                                    <div class="grid-input"><input></div>
                                </div>
                                (includes 10% scrap)
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
