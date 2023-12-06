{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/material_requirements.css') }}" />
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
                                <div class="row align-items-center my-2 my-md-0">
                                    <div class="col-md-4">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Search..." id="my_search_query" />
                                            <span>
																	<i class="flaticon2-search-1 text-muted"></i>
																</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block" for="my_search_field">Status:</label>
                                            <select class="form-control" id="my_search_field">
                                                <option value="">All</option>
                                                @foreach($obj_arr->first() as $key => $value)
                                                    <option>{{$key}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="btn btn-light-primary px-6 font-weight-bold" id="my_search_btn">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--begin: Datatable-->
                    <table class="table table-separate table-hover table-head-custom table-foot-custom table-checkable" id="my_table" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            @foreach($obj_arr->first() as $key => $value)
                                <th>{{$key}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($obj_arr as $obj)
                            <tr class="main-table-btn" data="{{$obj->Id}}">
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
                    <h3 class="card-title">Material Requirements</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Quantity</label></div>
                                    <div class="grid-input"><input type="number" id="quantity"></div>
                                    <div class="grid-label"><label>Dimension</label></div>
                                    <div class="grid-input"><input type="number" id="dim"></div>
                                    <div class="grid-label"><label>ID</label></div>
                                    <div class="grid-input"><input type="checkbox" id="Id"></div>
                                    <div class="grid-label"><label>Length</label></div>
                                    <div class="grid-input"><input type="number" id="length"></div>
                                    <div class="grid-label"><label>Gage</label></div>
                                    <div class="grid-input">
                                        <select id="gage">
                                            @foreach($gages as $gage)
                                                <option>{{$gage->gage}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Pattern</label></div>
                                    <div class="grid-input">
                                        <select id="pattern">
                                            @foreach($patterns as $pattern)
                                                <option>{{$pattern->pattern}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Holes</label></div>
                                    <div class="grid-input">
                                        <select id=".change()">
                                            @foreach($fracs as $frac)
                                                <option value="{{$frac->decimal}}">{{$frac->holes}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Centers</label></div>
                                    <div class="grid-input">
                                        <select id="centers">
                                            @foreach($fracs as $frac)
                                                <option value="{{$frac->decimal}}">{{$frac->centers}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Strip</label></div>
                                    <div class="grid-input"><input type="number" id="strip"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>OD</label></div>
                                    <div class="grid-input"><input disabled></div>
                                    <div class="grid-label"><label>OA</label></div>
                                    <div class="grid-input"><input disabled></div>
                                    <div class="grid-label"><label>Tube Weight</label></div>
                                    <div class="grid-input"><input disabled></div>
                                    <div class="grid-label"><label>weight/foot</label></div>
                                    <div class="grid-input"><input disabled></div>
                                    <div class="grid-label"><label>hspi</label></div>
                                    <div class="grid-input"><input disabled></div>
                                    <div class="grid-label"><label>Angle</label></div>
                                    <div class="grid-input"><input disabled></div>
                                    <div class="grid-label"><label>Strip/lf</label></div>
                                    <div class="grid-input"><input disabled></div>
                                    <div class="grid-label"><label>wt (pre)</label></div>
                                    <div class="grid-input"><input disabled></div>
                                    <div class="grid-label"><label>Total if mat</label></div>
                                    <div class="grid-input"><input disabled></div>
                                </div>
                                (includes 10% scrap)
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
    <script src="{{ asset('assets/js/my_table.js') }}"></script>
    <script src="{{ asset('assets/js/material_requirements.js') }}"></script>
    <script>
        const objArr = {{Js::from($obj_arr)}};

        $(document).ready(function() {
            $('#my_table').parent().css('overflow-x', 'auto');
        })
    </script>
@endsection
