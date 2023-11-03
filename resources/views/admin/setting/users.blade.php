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
                    <h3 class="card-title">Table</h3>

                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Chris</td>
                                    <td><a class="btn btn-success">Detail</a> <a class="btn btn-danger">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Deris</td>
                                    <td><a class="btn btn-success">Detail</a> <a class="btn btn-danger">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>John</td>
                                    <td><a class="btn btn-success">Detail</a> <a class="btn btn-danger">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Peter</td>
                                    <td><a class="btn btn-success">Detail</a> <a class="btn btn-danger">Delete</a></td>
                                </tr>
                                </tbody>
                            </table>
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
