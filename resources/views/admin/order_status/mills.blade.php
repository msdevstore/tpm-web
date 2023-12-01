{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">
        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-image-file text-primary"></i>
                        </span>
                        <h3 class="card-label">Shipping Tomorrow</h3>
                    </div>
                </div>
                <div class="card-body">
                    @foreach($obj_arr as $obj)
                        <div class="row justify-content-center py-2">
                            <h1 class="w-100 text-center text-primary">{{$obj['title']}}</h1>
                            <table class="table table-bordered w-75">
                                <thead>
                                <tr>
                                    <th>Job #</th>
                                    <th>OD</th>
                                    <th>Operator</th>
                                    <th>Scrap</th>
                                </tr>
                                </thead>
                                <tbody>
                                {!! $obj['content'] !!}
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
            <!--end::Card-->
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
