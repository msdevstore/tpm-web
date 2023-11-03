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
                            <div class="col-lg-6 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Cust ID</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Customer</label></div>
                                    <div class="grid-input"><input></div>
                                </div>
                            </div>
                            <div class="col-lg-6 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Training Report - Mill</label></div>
                                    <div class="grid-input"><input type="checkbox"></div>
                                    <div class="grid-label"><label>Training Report - Cutoff</label></div>
                                    <div class="grid-input"><input type="checkbox"></div>
                                    <div class="grid-label"><label>Training Report - Welder</label></div>
                                    <div class="grid-input"><input type="checkbox"></div>
                                    <div class="grid-label"><label>Training Report - Inspector</label></div>
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
