{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/quotes/new.css') }}" />
@endsection

{{-- Content --}}
@section('content')

    {{-- Main --}}
    <div class="row gutter-b" id="main-table" style="display: none">
        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Main Table</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-11 col-xl-10">
                                <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                            <span>
																	<i class="flaticon2-search-1 text-muted"></i>
																</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                            <select class="form-control" id="kt_datatable_search_status">
                                                <option value="">All</option>
                                                @foreach($obj_arr->first() as $key => $value)
                                                    <option>{{$key}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-xl-2 mt-5 mt-lg-0 d-flex justify-content-end">
                                <a href="" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--begin: Datatable-->
                    <table class="table table-separate table-hover table-head-custom table-foot-custom table-checkable kt_datatable" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            @foreach($obj_arr->first() as $key => $value)
                                <th>{{$key}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($obj_arr as $obj)
                            <tr class="main-table-btn" data="{{$obj->quote}}">
                                @foreach($obj as $key => $value)
                                    <td><?php echo (strlen($value) > 20) ? substr($value, 0, 20) . '...' : $value ?></td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
    </div>
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
                        <div class="row gutter-b">
                            <div class="col-lg-4">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Quote</label></div>
                                    <div class="grid-input"><input id="quote" value="{{$new_id}}"></div>
                                    <div class="grid-label"><label>Company</label></div>
                                    <div class="grid-input">
                                        <select id="cust_id">
                                            <option value="">Select Client</option>
                                            @foreach($customers as $customer)
                                                <option value="{{$customer->cust_id}}">{{$customer->customer}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Part</label></div>
                                    <div class="grid-input">
                                        <select id="part">
                                            <option value="">Select Part</option>
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Address</label></div>
                                    <div class="grid-input"><textarea id="address"></textarea></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Date</label></div>
                                    <div class="grid-input"><input type="date" id="date" value="<?php echo date("Y-m-d") ?>"></div>
                                    <div class="grid-label"><label>Notes</label></div>
                                    <div class="grid-input"><textarea id="notes"></textarea></div>
                                </div>
                            </div>
                        </div>
                        <div class="row gutter-b">
                            <div class="col-lg-4">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Quantity</label></div>
                                    <div class="grid-input"><input id="quantity"></div>
                                    <div class="grid-label"><label>Quotes units</label></div>
                                    <div class="grid-input">
                                        <select id="units">
                                            <option value="0">per inch</option>
                                            <option value="1">per foot</option>
                                            <option value="2">each</option>
                                            <option value="3">per order</option>
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Material</label></div>
                                    <div class="grid-input">
                                        <select id="mat_value">
                                            @foreach($materials as $material)
                                                <option>{{$material-> material}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Gage</label></div>
                                    <div class="grid-input">
                                        <select id="gage">
                                            @foreach($gages as $gage)
                                                <option value="{{$gage->thickness}}">{{$gage->gage}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Pattern</label></div>
                                    <div class="grid-input">
                                        <select id="pattern">
                                            @foreach($patterns as $pattern)
                                                <option value="{{$pattern->pattern}}">{{$pattern->pattern}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Holes</label></div>
                                    <div class="grid-input">
                                        <select id="holes">
                                            <option value="">Select Holes</option>
                                            @foreach($fracs as $frac)
                                                <option value="{{$frac->decimal}}">{{$frac->holes}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Centers</label></div>
                                    <div class="grid-input">
                                        <select id="centers">
                                            <option value="">Select Centers</option>
                                            @foreach($fracs as $frac)
                                                <option value="{{$frac->decimal}}">{{$frac->centers}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Diameter</label></div>
                                    <div class="grid-input"><input id="diameter"></div>
                                    <div class="grid-label"><label>ID</label></div>
                                    <div class="grid-input"><input id="is_od" type="checkbox"></div>
                                    <div class="grid-label"><label>Length</label></div>
                                    <div class="grid-input"><input id="length"></div>
                                    <div class="grid-label"><label>Mat. ($/lb)</label></div>
                                    <div class="grid-input"><input id="mat_cost"></div>
                                    <div class="grid-label"><label>Stamping ($/lf)</label></div>
                                    <div class="grid-input"><input id="stamping"></div>
                                    <div class="grid-label"><label>Strip Width</label></div>
                                    <div class="grid-input"><input id="strip"></div>
                                    <div class="grid-label"><label>Angle</label></div>
                                    <div class="grid-input"><input id="angle"></div>
                                    <div class="grid-label"><label>Weight</label></div>
                                    <div class="grid-input"><input id="weight"></div>
                                    <div class="grid-label"><label>Total Time</label></div>
                                    <div class="grid-input"><input id="time"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="grid-container-3 gutter-b">
                                    <div class="grid-label"><label>Setup cost</label></div>
                                    <div class="grid-input"><input id="setup"></div>
                                    <div class="grid-label"><label>Men working</label></div>
                                    <div class="grid-input"><input id="men"></div>
                                    <div class="grid-label"><label>Crating cost</label></div>
                                    <div class="grid-input"><input id="crating"></div>
                                    <div class="grid-label"><label>Tubes per crate</label></div>
                                    <div class="grid-input"><input id="tpc"></div>
                                    <div class="grid-label"><label>Shop supplies</label></div>
                                    <div class="grid-input"><input id="shop"></div>
                                    <div class="grid-label"><label>Electric cost ($/ft)</label></div>
                                    <div class="grid-input"><input id="electric"></div>
                                    <div class="grid-label"><label>Cutoff spd (in/min)</label></div>
                                    <div class="grid-input"><input id="cut_spd"></div>
                                    <div class="grid-label"><label>Tag cost ($/tag)</label></div>
                                    <div class="grid-input"><input id="tag"></div>
                                    <div class="grid-label"><label>Scrap rate</label></div>
                                    <div class="grid-input"><input id="scrap"></div>
                                    <div class="grid-label"><label>Gas cost ($/hr)</label></div>
                                    <div class="grid-input"><input id="gas"></div>
                                    <div class="grid-label"><label>Tubes per blade</label></div>
                                    <div class="grid-input"><input id="tpb"></div>
                                    <div class="grid-label"><label>Blade cost ($/bl)</label></div>
                                    <div class="grid-input"><input id="blade"></div>
                                </div>
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Description</label></div>
                                    <div class="grid-input"><textarea id="description"></textarea></div>
                                    <div class="grid-label"><label>Total Material + scrap</label></div>
                                    <div class="grid-input"><input id="tmscrap"></div>
                                    <div class="grid-label"><label>Total Time For Order</label></div>
                                    <div class="grid-input"><input id="ttfo"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="grid-container-3 gutter-b">
                                    <div class="grid-label"><label>Overhead</label></div>
                                    <div class="grid-input"><input id="overhead"></div>
                                    <div class="grid-label"><label>Cost basis</label></div>
                                    <div class="grid-input"><input id="basis"></div>
                                    <div class="grid-label"><label>Labour ($/hr)</label></div>
                                    <div class="grid-input"><input id="labor"></div>
                                    <div class="grid-label"><label>Weld spd (in/min)</label></div>
                                    <div class="grid-input"><input id="ws"></div>
                                    <div class="grid-label"><label>Markup</label></div>
                                    <div class="grid-input"><input id="markup"></div>
                                    <div class="grid-label"><label>Density (lbs/ci)</label></div>
                                    <div class="grid-input"><input id="density"></div>
                                </div>
                                <div class="gutter-b">
                                    <fieldset class="child-fieldset">
                                        <legend>Rate Info</legend>
                                        <div class="grid-container-3 gutter-b">
                                            <div class="grid-label"><label>Marginal Cost</label></div>
                                            <div class="grid-input"><input id="mc"></div>
                                            <div class="grid-label"><label>Shop Overhead</label></div>
                                            <div class="grid-input"><input id="shop-overhead"></div>
                                            <div class="grid-label"><label>Net Profit</label></div>
                                            <div class="grid-input"><input id="profit"></div>
                                            <div class="grid-label"><label>Rate</label></div>
                                            <div class="grid-input"><input id="rate"></div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="d-flex justify-content-around">
                                    <button type="button" class="btn-control"><i class="fa fa-angle-double-right"></i></button>
                                    <button type="button" class="btn-control"><i class="fa fa-angle-left"></i></button>
                                    <button type="button" class="btn-control" disabled><i class="fa fa-gear"></i></button>
                                    <button type="button" class="btn-control"><i class="fa fa-angle-right"></i></button>
                                    <button type="button" class="btn-control"><i class="fa fa-angle-double-right"></i></button>
                                </div>
                                <div class="d-flex justify-content-around">
                                    <button type="button" class="btn-control"><i class="fa fa-undo"></i></button>
                                    <button type="button" class="btn-control"><i class="fa fa-trash"></i></button>
                                    <button type="button" class="btn-control"><i class="fa fa-plus"></i></button>
                                    <button type="button" class="btn-control"><i class="fa fa-calculator"></i></button>
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
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/pages/crud/datatables/advanced/row-callback.js') }}"></script>
    <script src="{{ asset('assets/js/quotes/new.js') }}"></script>
    <script>
        const objArr = {{Js::from($obj_arr)}};

        $(document).ready(function() {
            $('#DataTables_Table_0').parent().css('overflow-x', 'auto');
        })
    </script>
@endsection
