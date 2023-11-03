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
                    <h3 class="card-title">Orders</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Stamping Job No.</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Customer</label></div>
                                    <div class="grid-input">
                                        <select>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Part No.</label></div>
                                    <div class="grid-input">
                                        <select>
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-2 indi-input">
                                        <label>Rouselle</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Niagara</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>SEYI</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Rouselle Alt</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Niagara Alt</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>SEYI Alt</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Blank</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Blank Alt</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Cycles</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Linear Feet</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Strip width</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Strip width Alt.</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Die</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Progression</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Mill Job</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Cycles to allocate</label>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6" style="color: #888">
                                <div>
                                    <label>3 Test Cycles? <input type="checkbox"></label>
                                </div>
                                <div>
                                    <label>Remark</label>
                                    <textarea style="width: 100%; height: 60px; border: 1px solid #ccc;"></textarea>
                                </div>
                                <div>
                                    <label>Press</label>
                                    <select style="width: 100%; border: 1px solid #ccc; padding: 3px 6px">
                                        <option></option>
                                    </select>
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
