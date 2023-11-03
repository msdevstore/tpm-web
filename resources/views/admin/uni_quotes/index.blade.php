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
                    <h3 class="card-title">Uni_Quotes</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Quote</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Company</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Part</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Address</label></div>
                                    <div class="grid-input"><input></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Date</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Fax Back</label></div>
                                    <div class="grid-input"><input type="checkbox"></div>
                                    <div class="grid-label"><label>Terms</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>FOB</label></div>
                                    <div class="grid-input"><input></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Stamping Job</label></div>
                                    <div class="grid-input"><textarea></textarea></div>
                                    <div class="grid-label"><label>Received</label></div>
                                    <div class="grid-input"><textarea></textarea></div>
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
