{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/quotes/pricing.css') }}" />
@endsection

{{-- Content --}}
@section('content')

    {{-- Main --}}
    <div class="row">
        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Quotes</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Customer</label></div>
                                    <div class="grid-input">
                                        <select id="cust_id">
                                            <option value="">Please select customer!</option>
                                            <option value="*">All sustomers</option>
                                            @foreach($customers as $customer)
                                                <option value="$customer->cust_id">{{$customer->customer}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Time Frame</label></div>
                                    <div class="grid-input">
                                        <select id="timeFrame">
                                            <option value="">Please Select Time Frame</option>
                                            <option value="6">Last 6 Month</option>
                                            <option value="12">Last 12 Month</option>
                                            <option value="24">Last 24 Month</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 gutter-b">
                                <div class="grid-container-3 gutter-b">
                                    <div class="grid-label"><label>Part No</label></div>
                                    <div class="grid-input">
                                        <select id="part">
                                            <option value="">Select part id
                                            @foreach($parts as $part)
                                                <option value="{{$part->part}}">{{$part->part}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Tube OD</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Material Type</label></div>
                                    <div class="grid-input">
                                        <select id="material">
                                            <option value="">Select Material Type</option>
                                            @foreach($materials as $material)
                                                <option value="{{$material->material}}">{{$material->material}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Gage Of Material</label></div>
                                    <div class="grid-input">
                                        <select id="gage">
                                            <option value="">Select Gage Material</option>
                                            @foreach($gages as $gage)
                                                <option value="{{$gage->gage}}">{{$gage->gage}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <button class="btn-control">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>

        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Search Result</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-hover table-head-custom table-foot-custom table-checkable kt_datatable">
                        <thead>
                        <tr>
                            {{--                            @foreach($obj_arr->first() as $key => $value)--}}
                            {{--                                <th>{{$key}}</th>--}}
                            {{--                            @endforeach--}}
                        </tr>
                        </thead>
                        <tbody>
                        {{--                        @foreach($obj_arr as $obj)--}}
                        {{--                            <tr class="main-table-btn" data="{{$obj->quote}}">--}}
                        {{--                                @foreach($obj as $key => $value)--}}
                        {{--                                    <td><?php echo (strlen($value) > 20) ? substr($value, 0, 20) . '...' : $value ?></td>--}}
                        {{--                                @endforeach--}}
                        {{--                            </tr>--}}
                        {{--                        @endforeach--}}
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/pages/crud/datatables/advanced/row-callback.js') }}"></script>
    <script src="{{ asset('assets/js/quotes/pricing.js') }}"></script>
    <script>
        {{--const objArr = {{Js::from($obj_arr)}};--}}

        $(document).ready(function() {
            $('#DataTables_Table_0').parent().css('overflow-x', 'auto');
        })
    </script>
@endsection
