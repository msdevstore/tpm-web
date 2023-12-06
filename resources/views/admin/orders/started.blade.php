{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/orders/all.css') }}" />
@endsection

{{-- Content --}}
@section('content')

    {{-- Main --}}
    <div class="row gutter-b" id="orders-table" style="display: none">
        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Orders Table</h3>
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
                                                @foreach($orders->first() as $key => $value)
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
                            @foreach($orders->first() as $key => $value)
                                <th>{{$key}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="order-btn" data="{{$order->job}}">
                                @foreach($order as $value)
                                    <td>{{$value}}</td>
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
                    <h3 class="card-title">Orders</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row gutter-b" id="control-panel" style="display: none">
                            <div class="col-lg-4 d-flex justify-content-between">
                                <a class="btn btn-control" id="backward-btn"><i class="fa fa-backward"></i></a>
                                <a class="btn btn-control" id="forward-btn"><i class="fa fa-forward"></i></a>
                            </div>
                        </div>
                        <form>
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 gutter-b">
                                    <div class="grid-container-3">
                                        <div class="grid-label"><label for="job">Job No.</label></div>
                                        <div class="grid-input"><input id="job" value="{{$job_no}}"></div>
                                        <div class="grid-label"><label>Customer</label></div>
                                        <div class="grid-input">
                                            <select id="cust_id">
                                                <option value="">Select</option>
                                                @foreach($customers as $customer)
                                                    <option value="{{$customer->cust_id}}">{{$customer->customer}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid-label"><label for="po">PO Number</label></div>
                                        <div class="grid-input"><input id="po"></div>
                                        <div class="grid-label"><label for="part">Part No.</label><a id="part_info_btn">i</a></div>
                                        <div class="grid-input">
                                            <select id="part">
                                                <option value=""> --- Select --- </option>
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Quantity</label></div>
                                        <div class="grid-input"><input type="number" id="quantity"></div>
                                        <div class="grid-label"><label>Date Ordered</label></div>
                                        <div class="grid-input"><input type="date" id="ordered"></div>
                                        <div class="grid-label"><label>Date Due</label></div>
                                        <div class="grid-input"><input type="date" id="due"></div>
                                        <div class="grid-label"><label>Shipping Date</label></div>
                                        <div class="grid-input"><input type="date" id="ship_date"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 gutter-b">
                                    <div class="grid-container-3">
                                        <div class="grid-label"><label>LF mat</label></div>
                                        <div class="grid-input"><input id="lf_req" type="number" step="0.001" placeholder="0.000"></div>
                                        <div class="grid-label"><label>Weight</label></div>
                                        <div class="grid-input"><input id="wbs" type="number" step="0.001" placeholder="0.000"></div>
                                        {{--                                        <div class="grid-label"><label>Weight (post)</label></div>--}}
                                        {{--                                        <div class="grid-input"><input id="was" type="number" step="0.001" placeholder="0.000"></div>--}}
                                        <div class="grid-label"><label>Total tube (ft)</label></div>
                                        <div class="grid-input"><input id="tf" type="number" step="0.001" placeholder="0.000"></div>
                                    </div>
                                </div>
                                {{--                                <div class="col-lg-4 gutter-b">--}}
                                {{--                                    <div class="grid-container-3">--}}
                                {{--                                        <div class="grid-label"><label>Mill</label></div>--}}
                                {{--                                        <div class="grid-input">--}}
                                {{--                                            <select id="mac_add_tbl">--}}
                                {{--                                                <option value="">Select</option>--}}
                                {{--                                                @foreach($mac_addresses as $mac_address)--}}
                                {{--                                                    <option value="{{$mac_address->device}}">{{$mac_address->device}}</option>--}}
                                {{--                                                @endforeach--}}
                                {{--                                            </select>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="grid-label"><label>Mill Operator</label></div>--}}
                                {{--                                        <div class="grid-input">--}}
                                {{--                                            <select id="mill_operator">--}}
                                {{--                                                <option value="">Select</option>--}}
                                {{--                                                @foreach($mill_operators as $mill_operator)--}}
                                {{--                                                    <option value="{{$mill_operator->ID}}">{{$mill_operator->name}}</option>--}}
                                {{--                                                @endforeach--}}
                                {{--                                            </select>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="grid-label"><label>Cut Off Operator</label></div>--}}
                                {{--                                        <div class="grid-input">--}}
                                {{--                                            <select id="cutoff_operator">--}}
                                {{--                                                <option>Select</option>--}}
                                {{--                                                @foreach($cutoff_operators as $cutoff_operator)--}}
                                {{--                                                    <option value="{{$cutoff_operator->ID}}">{{$cutoff_operator->name}}</option>--}}
                                {{--                                                @endforeach--}}
                                {{--                                            </select>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="grid-label"><label>Repair Welder</label></div>--}}
                                {{--                                        <div class="grid-input">--}}
                                {{--                                            <select id="repair_welder">--}}
                                {{--                                                <option>Select</option>--}}
                                {{--                                                @foreach($repair_welders as $repair_welder)--}}
                                {{--                                                    <option value="{{$repair_welder->ID}}">{{$repair_welder->name}}</option>--}}
                                {{--                                                @endforeach--}}
                                {{--                                            </select>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="grid-label"><label>Inspector</label></div>--}}
                                {{--                                        <div class="grid-input">--}}
                                {{--                                            <select id="inspector">--}}
                                {{--                                                <option>Select</option>--}}
                                {{--                                                @foreach($inspectors as $inspector)--}}
                                {{--                                                    <option value="{{$inspector->ID}}">{{$inspector->name}}</option>--}}
                                {{--                                                @endforeach--}}
                                {{--                                            </select>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="grid-label"><label>Container Type</label></div>--}}
                                {{--                                        <div class="grid-input">--}}
                                {{--                                            <select id="cont_type">--}}
                                {{--                                                <option>Select</option>--}}
                                {{--                                                @foreach($conts as $cont)--}}
                                {{--                                                    <option value="{{$cont->ID}}">{{$cont->cont_type}}</option>--}}
                                {{--                                                @endforeach--}}
                                {{--                                            </select>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="grid-label"><label>Shipping Method</label></div>--}}
                                {{--                                        <div class="grid-input">--}}
                                {{--                                            <select id="ship_method">--}}
                                {{--                                                <option>Select</option>--}}
                                {{--                                                @foreach($ship_methods as $ship_method)--}}
                                {{--                                                    <option value="{{$ship_method->ID}}">{{$ship_method->ship_method}}</option>--}}
                                {{--                                                @endforeach--}}
                                {{--                                            </select>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="col-lg-4 gutter-b">--}}
                                {{--                                    <div class="grid-container-3">--}}
                                {{--                                        <div class="grid-label"><label>Mill Weld Spec</label></div>--}}
                                {{--                                        <div class="grid-input">--}}
                                {{--                                            <select id="weld_spec_mill">--}}
                                {{--                                                <option>Select</option>--}}
                                {{--                                                @foreach($weld_spec_mills as $weld_spec_mill)--}}
                                {{--                                                    <option value="{{$weld_spec_mill->weld_spec}}">{{$weld_spec_mill->weld_spec}}</option>--}}
                                {{--                                                @endforeach--}}
                                {{--                                            </select>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="grid-label"><label>Repair Weld Spec</label></div>--}}
                                {{--                                        <div class="grid-input">--}}
                                {{--                                            <select id="weld_spec_repair">--}}
                                {{--                                                <option>Select</option>--}}
                                {{--                                                @foreach($weld_spec_repairs as $weld_spec_repair)--}}
                                {{--                                                    <option value="{{$weld_spec_repair->weld_spec}}">{{$weld_spec_repair->weld_spec}}</option>--}}
                                {{--                                                @endforeach--}}
                                {{--                                            </select>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="col-lg-3 gutter-b">--}}
                                {{--                                    <div class="grid-container-3">--}}
                                {{--                                        <div class="grid-label"><label>Ship Date</label></div>--}}
                                {{--                                        <div class="grid-input"><input name="ship_dates[]" type="text"></div>--}}
                                {{--                                        <div class="grid-label"><label>Quantity</label></div>--}}
                                {{--                                        <div class="grid-input"><input name="ship_quantities[]" type="number"></div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="col-lg-1 gutter-b">--}}
                                {{--                                    <button type="button" id="add_btn" class="btn btn-plus">+</button>--}}
                                {{--                                </div>--}}
                            </div>
                        </form>

                        <div class="row mt-5 mb-5" id="additional-container"></div>
                        <div class="row mt-5">
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="radio-label"><input class="coil_option" name="coil_data" value="5" type="radio"> Blank Material Part Specific Width </label>
                                    </div>
                                    <div class="col-6">
                                        <label class="radio-label"><input class="coil_option" name="coil_data" value="3" type="radio"> Perf material part specific widths </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="radio-label"><input class="coil_option" name="coil_data" value="4" type="radio"> Blank Material All Width </label>
                                    </div>
                                    <div class="col-6">
                                        <label class="radio-label"><input class="coil_option" name="coil_data" value="2" type="radio"> Material all widths </label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-around">
                                    <div>
                                        <label class="radio-label"><input class="coil_option" name="coil_data" value="1" type="radio"> Allocated all material </label>
                                    </div>
                                </div>
                                <div class="table-container table-height">
                                    <table class="table table-bordered table-hover table-head-bg text-center">
                                        <thead>
                                        <tr>
                                            {{--                                            <th>No</th>--}}
                                            <th>Coil#</th>
                                            <th>Material</th>
                                            <th>Gage</th>
                                            <th>Width</th>
                                            <th>Pattern</th>
                                            <th>Hole</th>
                                            <th>Center</th>
                                            {{--                                            <th>Allocated</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody id="coil_data">
                                        <tr><td colspan="8" style="vertical-align: middle;">No data to display!</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3 d-flex justify-content-center">
                                    <button type="button" class="btn btn-success mr-10" onclick="updateAllocation(1, this)"> Allocate </button>
                                    <button type="button" class="btn btn-success mr-10" onclick="updateAllocation(2, this)"> Deallocate </button>
                                    <button type="button" class="btn btn-success" onclick="updateAllocation(3, this)"> Enter as Used </button>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-30">
                                <div class="alert alert-light pt-5" role="alert" id="weight_allocated_alert">
                                    <p id="required">Total weight required for the order: <b>0</b></p>
                                    <p id="blank">Blank allocated: <b>0</b></p>
                                    <p id="perf">Perf material allocated: <b>0</b></p>
                                    <p id="allocated">Total weight allocated: <b>0</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-8">
                                <div class="d-flex justify-content-around">
                                    <div>
                                        <label class="radio-label"><input name="mesh_data" type="radio" value="1" checked> Allocated </label>
                                    </div>
                                    <div>
                                        <label class="radio-label"><input name="mesh_data" type="radio" value="2"> All Mesh </label>
                                    </div>
                                    <div>
                                        <label class="radio-label"><input name="mesh_data" type="radio" value="3"> Part Specific Mesh </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="tab-list">
                                        <div class="tab-list-item active" onclick="meshRequest(1)">Layer 1 Mesh</div>
                                        <div class="tab-list-item" onclick="meshRequest(2)">Layer 2 Mesh</div>
                                        <div class="tab-list-item" onclick="meshRequest(3)">Drainage 1 Mesh</div>
                                        <div class="tab-list-item" onclick="meshRequest(4)">Drainage 2 Mesh</div>
                                    </div>
                                    <div class="table-container table-height">
                                        <table class="table table-head-bg text-center table-custom">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Mesh Type</th>
                                                <th>Type</th>
                                                <th>Received</th>
                                                <th>Width</th>
                                                <th>Length</th>
                                                <th>Allocated</th>
                                                <th>TPM JOB</th>
                                                <th>Heat#</th>
                                            </tr>
                                            </thead>
                                            <tbody id="mesh_data">
                                            <tr><td colspan="9" style="vertical-align: middle;">No data to display!</td></tr>
                                            </tbody>
                                        </table>
                                        <div class="mesh-toolbar">
                                            <button type="button" class="btn btn-success mr-10" onclick="updateAllocation(4, this)"> Allocate </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-10">
                                <div class="alert alert-light" role="alert" id="length_allocated_alert">
                                    <table style="width: 100%; text-align: center">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Total required</th>
                                            <th>Total allocated</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td style="text-align: left">Filter layer 1</td>
                                            <td id="layer1_required">0</td>
                                            <td id="layer1_allocated">0</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">Filter layer 2</td>
                                            <td id="layer2_required">0</td>
                                            <td id="layer2_allocated">0</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">Drainage 1</td>
                                            <td id="drainage1_required">0</td>
                                            <td id="drainage1_allocated">0</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">Drainage 2</td>
                                            <td id="drainage2_required">0</td>
                                            <td id="drainage2_allocated">0</td>
                                        </tr>
                                        </tbody>
                                    </table>
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
            <!--start::Modal-->
            <div class="modal fade" id="partModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Part Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!--begin::Card-->
                            <div class="row">
                                <div class="col-lg-8 gutter-b">
                                    <div class="grid-container-3 mb-10">
                                        <div class="grid-label"><label>Part#</label></div>
                                        <div class="grid-input"><input id="part_modal_part"></div>
                                        <div class="grid-label"><label>Customer</label></div>
                                        <div class="grid-input">
                                            <select id="part_modal_cust_id">
                                                @foreach($customers as $customer)
                                                    <option value="{{$customer->cust_id}}">{{$customer->customer}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Part Description</label></div>
                                        <div class="grid-input"><textarea id="part_modal_description"></textarea></div>
                                    </div>
                                    <div class="d-flex mb-5">
                                        <div class="col-2 indi-input">
                                            <label>Dimension</label>
                                            <input type="text" id="part_modal_dim">
                                        </div>
                                        <div class="col-1 indi-input">
                                            <label>ID ?</label>
                                            <input type="checkbox" id="part_modal_id_not_od">
                                        </div>
                                        <div class="col-2 indi-input">
                                            <label>Dim +</label>
                                            <input type="text" id="part_modal_dim_plus">
                                        </div>
                                        <div class="col-2 indi-input">
                                            <label>Dim -</label>
                                            <input type="text" id="part_modal_dim_minus">
                                        </div>
                                    </div>
                                    <div class="d-flex mb-5">
                                        <div class="col-3 indi-input">
                                            <label>Material</label>
                                            <select id="part_modal_material">
                                                @foreach($materials as $material)
                                                    <option>{{$material->material}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-3 indi-input">
                                            <label>Gage</label>
                                            <select id="part_modal_gage">
                                                @foreach($gages as $gage)
                                                    <option>{{$gage->gage}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-5">
                                        <div class="col-2 indi-input">
                                            <label>Pattern</label>
                                            <select id="part_modal_pattern">
                                                @foreach($patterns as $pattern)
                                                    <option>{{$pattern->pattern}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2 indi-input">
                                            <label>Hole Size</label>
                                            <select id="part_modal_holes">
                                                @foreach($fracs as $frac)
                                                    <option value="{{$frac->decimal}}">{{$frac->holes}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2 indi-input">
                                            <label>Hole Center</label>
                                            <select id="part_modal_centers">
                                                @foreach($fracs as $frac)
                                                    <option value="{{$frac->decimal}}">{{$frac->centers}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-5">
                                        <div class="col-2 indi-input">
                                            <label>Cutoff length</label>
                                            <input id="part_modal_cutoff_length">
                                        </div>
                                        <div class="col-2 indi-input">
                                            <label>Strip width</label>
                                            <input id="part_modal_strip">
                                        </div>
                                        <div class="col-2 indi-input">
                                            <label>ID Drift</label>
                                            <input id="part_modal_cutoff_id_drift">
                                        </div>
                                        <div class="col-1 indi-input">
                                            <label>Mill</label>
                                            <select id="part_modal_mill">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-5">
                                        <label class="main-color">Blank ring? <input type="checkbox" id="part_modal_blank_ring"></label>
                                    </div>
                                    <div class="d-flex mb-5">
                                        <label class="main-color">Dimple depth? <input type="checkbox" id="part_modal_depth_of_dimple"></label>
                                    </div>
                                    <div class="d-flex mb-5">
                                        <label class="main-color">Blank end ring? <input type="checkbox" id="part_modal_blank_end"></label>
                                    </div>
                                    <div class="d-flex mb-5">
                                        <div class="col-2 indi-input">
                                            <label>Finished</label>
                                            <input id="part_modal_finished">
                                        </div>
                                        <div class="col-2 indi-input">
                                            <label>Length +</label>
                                            <input id="part_modal_length_plus">
                                        </div>
                                        <div class="col-2 indi-input">
                                            <label>Length -</label>
                                            <input id="part_modal_length_minus">
                                        </div>
                                    </div>
                                    <div class="d-flex mb-5">
                                        <div class="col-2 indi-input">
                                            <label>Min. Ring</label>
                                            <input id="part_modal_min_ring">
                                        </div>
                                        <div class="col-2 indi-input">
                                            <label>Max. Ring</label>
                                            <input id="part_modal_max_ring">
                                        </div>
                                        <div class="col-2 indi-input">
                                            <label>Die</label>
                                            <select id="part_modal_die">
                                                @foreach($dies as $die)
                                                    <option value="{{$die->die}}">{{$die->die_id}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row gutter-b">
                                            <div class="col-6">
                                                <div class="grid-container-3">
                                                    <div class="grid-label"><label>Layer 1 Mesh</label></div>
                                                    <div class="grid-input">
                                                        <select id="part_modal_layer_1_mesh">
                                                            @foreach($meshes as $mesh)
                                                                <option>{{$mesh->mesh}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="grid-label"><label>Layer 1 Width</label></div>
                                                    <div class="grid-input"><input id="part_modal_layer_1_width"></div>
                                                    <div class="grid-label"><label>Drainage 1 Mesh</label></div>
                                                    <div class="grid-input">
                                                        <select id="part_modal_drainage_1_mesh">
                                                            @foreach($meshes as $mesh)
                                                                <option>{{$mesh->mesh}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="grid-label"><label>Drainage 1 Width</label></div>
                                                    <div class="grid-input"><input id="part_modal_drainage_1_width"></div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="grid-container-3">
                                                    <div class="grid-label"><label>Layer 2 Mesh</label></div>
                                                    <div class="grid-input">
                                                        <select id="part_modal_layer_2_mesh">
                                                            @foreach($meshes as $mesh)
                                                                <option>{{$mesh->mesh}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="grid-label"><label>Layer 2 Width</label></div>
                                                    <div class="grid-input"><input id="part_modal_layer_2_width"></div>
                                                    <div class="grid-label"><label>Drainage 2 Mesh</label></div>
                                                    <div class="grid-input">
                                                        <select id="part_modal_drainage_2_mesh">
                                                            @foreach($meshes as $mesh)
                                                                <option>{{$mesh->mesh}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="grid-label"><label>Drainage 2 Width</label></div>
                                                    <div class="grid-input"><input id="part_modal_drainage_2_width"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="grid-container-3">
                                                    <div class="grid-label"><label>MFG Notes</label></div>
                                                    <div class="grid-input"><textarea id="part_modal_notes"></textarea></div>
                                                    <div class="grid-label"><label>INSP. Notes</label></div>
                                                    <div class="grid-input"><textarea id="part_modal_insp_notes"></textarea></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="title text-center h-40px pt-3 bg-success text-white"><i class="fa fa-inbox text-white"></i> Calculations will be done after part is saved</div>
                                    <div class="grid-container-3">
                                        <div class="grid-label"><label>OA</label></div>
                                        <div class="grid-input"><input id="part_modal_oa"></div>
                                        <div class="grid-label"><label>Tube Weight</label></div>
                                        <div class="grid-input"><input id="part_modal_tube_weight"></div>
                                        <div class="grid-label"><label>Tube length in feet</label></div>
                                        <div class="grid-input"><input id="part_modal_tube_length_in_feet"></div>
                                        <div class="grid-label"><label>weight/foot</label></div>
                                        <div class="grid-input"><input id="part_modal_weight_foot"></div>
                                        <div class="grid-label"><label>hspi</label></div>
                                        <div class="grid-input"><input id="part_modal_hspi"></div>
                                        <div class="grid-label"><label>Angle</label></div>
                                        <div class="grid-input"><input id="part_modal_angle"></div>
                                        <div class="grid-label"><label>lf per foot</label></div>
                                        <div class="grid-input"><input id="part_modal_lf_per_foot"></div>
                                        <div class="grid-label"><label>lf per tube</label></div>
                                        <div class="grid-input"><input id="part_modal_lf_per_tube"></div>
                                        <div class="grid-label"><label>Drawing</label></div>
                                        <div class="grid-input"><input id="part_modal_drawing" type="file"></div>
                                        <div class="grid-label"><label>Drawing Number</label></div>
                                        <div class="grid-input"><input id="part_modal_drawing_number"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Modal-->
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/my_table.js') }}"></script>
    <script src="{{ asset('assets/js/orders/all.js') }}"></script>
    <script>
        const orders = {{Js::from($orders)}};

        $(document).ready(function() {
            $('#my_table').parent().css('overflow-x', 'auto');

            $('#main-table-format').click(function() {
                $('#job').val({{$job_no}});
                $('#cust_id').val('');
                $('#po').val('');
                $('#part').val('');
                $('#quantity').val('');
                $('#ordered').val('');
                $('#due').val('');
                $('#ship_date').val('');
                // $('#mill_operator').val('').change();
                // $('#cutoff_operator').val('').change();
                // $('#repair_welder').val('').change();
                // $('#inspector').val('').change();
                // $('#cont_type').val('').change();
                // $('#ship_method').val('').change();
                // $('#weld_spec_mill').val('').change();
                // $('#weld_spec_repair').val('').change();
                toastr.success("You can add new data now!", "Success");
            })
        })
    </script>
@endsection
