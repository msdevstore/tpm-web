{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ship_info.css') }}" />
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
                            <tr class="main-table-btn" data="{{$obj->ship_no}}">
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
                    <h3 class="card-title">Information</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>TPM Ship No</label></div>
                                    <div class="grid-input"><input id="ship_no"></div>
                                    <div class="grid-label"><label>Job</label></div>
                                    <div class="grid-input"><input id="job"></div>
                                    <div class="grid-label"><label>Customer</label></div>
                                    <div class="grid-input"><input id="customer"></div>
                                    <div class="grid-label"><label>Shipping Address</label></div>
                                    <div class="grid-input"><textarea id="ship_to"></textarea></div>
                                    <div class="grid-label"><label>Purchase Order</label></div>
                                    <div class="grid-input"><input id="po"></div>
                                    <div class="grid-label"><label>Quantity</label></div>
                                    <div class="grid-input"><input id="quantity"></div>
                                    <div class="grid-label"><label>Part #</label></div>
                                    <div class="grid-input"><input id="part"></div>
                                    <div class="grid-label"><label>Ship Via</label></div>
                                    <div class="grid-input">
                                        <select id="via">
                                            @foreach($vias as $via)
                                                <option value="{{$via->ship_via}}">{{$via->ship_via}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Date</label></div>
                                    <div class="grid-input"><input id="sh_date"></div>
                                    <div class="grid-label"><label>Part Desc</label></div>
                                    <div class="grid-input"><textarea id="desc"></textarea></div>
                                    <div class="grid-label"><label>Billing Address</label></div>
                                    <div class="grid-input"><textarea id="sold_to"></textarea></div>
                                    <div class="grid-label"><label>Item</label></div>
                                    <div class="grid-input"><input id="item"></div>
                                    <div class="grid-label"><label>Heat #</label></div>
                                    <div class="grid-input"><input id="heat"></div>
                                    <div class="grid-label"><label>Rings</label></div>
                                    <div class="grid-input"><input type="checkbox" id="rings"></div>
                                    <div class="grid-label"><label>Rings Heat#</label></div>
                                    <div class="grid-input"><select id="ring_heat"><option></option></select></div>
                                    <div class="grid-label"><label>Packing List</label></div>
                                    <div class="grid-input"><textarea id="list"></textarea></div>
                                    <div class="grid-label"><label>Certification</label></div>
                                    <div class="grid-input"><input type="checkbox" id="p_cert"></div>
                                    <div class="grid-label"><label>Mil Certs?</label></div>
                                    <div class="grid-input"><input type="checkbox" id="certs"></div>
                                    <div class="grid-label"><label>Partial?</label></div>
                                    <div class="grid-input"><input type="checkbox" id="partial"></div>
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
    <script src="{{ asset('assets/js/ship_info.js') }}"></script>
    <script>
        const objArr = {{Js::from($obj_arr)}};

        $(document).ready(function() {
            $('#DataTables_Table_0').parent().css('overflow-x', 'auto');
        })
    </script>
@endsection
