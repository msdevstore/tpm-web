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
                                    <div class="grid-label"><label>Mesh#</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Supplier</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Job</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>TPM PO#</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Received</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Used date</label></div>
                                    <div class="grid-input"><input></div>
                                </div>
                            </div>
                            <div class="col-lg-6 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Operator</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Width</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Length</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Heat#</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Mesh Type</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Material Type</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Enter number of mesh</label></div>
                                    <div class="grid-input"><input></div>
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
