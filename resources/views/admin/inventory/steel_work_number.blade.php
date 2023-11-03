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
                                    <div class="grid-label"><label>Work Number</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Material</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Gage</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Width</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Heat Number</label></div>
                                    <div class="grid-input"><input></div>
                                </div>
                            </div>
                            <div class="col-lg-6 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Hole Pattern</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Hole Size</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Hole Centers</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>TPM PO#</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Heat Number</label></div>
                                    <div class="grid-input"><input type="checkbox"></div>
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
