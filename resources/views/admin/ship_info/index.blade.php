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
                    <h3 class="card-title">Information</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>TPM Ship No</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Job</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Customer</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Shipping Address</label></div>
                                    <div class="grid-input"><textarea></textarea></div>
                                    <div class="grid-label"><label>Quantity</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Quantity</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Part #</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Ship Via</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                </div>
                            </div>
                            <div class="col-lg-6 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Date</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Part Desc</label></div>
                                    <div class="grid-input"><textarea></textarea></div>
                                    <div class="grid-label"><label>Billing Address</label></div>
                                    <div class="grid-input"><textarea></textarea></div>
                                    <div class="grid-label"><label>Item</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Heat #</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Rings</label></div>
                                    <div class="grid-input"><input type="checkbox"></div>
                                    <div class="grid-label"><label>Rings Heat#</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Packing List</label></div>
                                    <div class="grid-input"><textarea></textarea></div>
                                    <div class="grid-label"><label>Certification</label></div>
                                    <div class="grid-input"><input type="checkbox"></div>
                                    <div class="grid-label"><label>Mil Certs?</label></div>
                                    <div class="grid-input"><input type="checkbox"></div>
                                    <div class="grid-label"><label>Partial?</label></div>
                                    <div class="grid-input"><input type="checkbox"></div>
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
