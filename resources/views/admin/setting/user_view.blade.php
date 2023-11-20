{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/setting/user_view.css') }}" />
@endsection

{{-- Content --}}
@section('content')

    {{-- Main --}}
    <div class="row">
        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">{{$user->username}}</h3>
                    <div class="form-container">
                        <input type="hidden" id="user_id" value="{{$user->id}}">
                        <div class="div-custom m-2"><input class="form-custom" id="username" value="{{$user->username}}" /></div>
                        <div class="div-custom m-2"><input class="form-custom" type="password" id="password" value="{{$user->password}}" /></div>
                        <div class="div-custom m-2"><button class="btn-control" type="button" id="update-btn">Update</button></div>
                        <div class="div-custom m-2"><button class="btn-control" type="button" id="return-btn">Return</button></div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Page Name</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($obj_arr as $obj)
                                    <tr>
                                        <td>{{$obj['page']}}</td>
                                        <td class="d-flex justify-content-around align-items-center">{!! $obj['content'] !!}</td>
                                    </tr>
                                @endforeach
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
    <script src="{{ asset('assets/js/setting/user_view.js') }}"></script>
@endsection
