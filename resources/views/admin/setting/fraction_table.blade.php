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
                    <h3 class="card-title">Setting</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="grid-container-3 mb-5">
                                    <div class="grid-label"><label>Decimal</label></div>
                                    <div class="grid-input"><input></div>
                                </div>
                                <div class="d-flex">
                                    <div class="d-flex flex-column justify-content-center mx-3">
                                        <input>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="pb-2">
                                            <input>
                                        </div>
                                        <div class="fraction-divider"></div>
                                        <div class="pt-2">
                                            <input>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-5">
                                    <button class="btn btn-success mb-2">Fraction To Decimal</button>
                                    <div class="grid-container-3">
                                        <div class="grid-label"><label>Holes</label></div>
                                        <div class="grid-input"><input></div>
                                        <div class="grid-label"><label>Centers</label></div>
                                        <div class="grid-input"><input></div>
                                    </div>
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
