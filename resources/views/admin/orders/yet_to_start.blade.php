{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/orders/yet_to_start.css') }}" />
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
                                @foreach($order as $key => $value)
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
                                        <div class="grid-label"><label>Job No.</label></div>
                                        <div class="grid-input"><input id="job" value="{{$job_no}}"></div>
                                        <div class="grid-label"><label>Customer</label></div>
                                        <div class="grid-input">
                                            <select id="cust_id">
                                                <option value="">Select</option>
                                                @foreach($customers as $customer)
                                                    <option value="{{$customer->cust_id}}"><?php echo (strlen($customer->customer) > 20) ? substr($customer->customer, 0, 20) . '...' : $customer->customer ?></option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid-label"><label for="po">PO Number</label></div>
                                        <div class="grid-input"><input id="po"></div>
                                        <div class="grid-label"><label for="part">Part No.</label><a id="part_info_btn">i</a></div>
                                        <div class="grid-input">
                                            <select id="part">
                                                <option value="">Select</option>
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
                                        <div class="grid-label"><label>Weight (pre)</label></div>
                                        <div class="grid-input"><input id="wbs" type="number" step="0.001" placeholder="0.000"></div>
                                        <div class="grid-label"><label>Weight (post)</label></div>
                                        <div class="grid-input"><input id="was" type="number" step="0.001" placeholder="0.000"></div>
                                        <div class="grid-label"><label>Total tube (ft)</label></div>
                                        <div class="grid-input"><input id="tf" type="number" step="0.001" placeholder="0.000"></div>
                                        <div class="grid-label"><label>Price</label></div>
                                        <div class="grid-input"><input id="price" type="number" step="0.001" placeholder="0.000"></div>
                                        <div class="grid-label"><label>Revenue total</label></div>
                                        <div class="grid-input"><input id="PO_total" type="number" step="0.001" placeholder="0.000"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 gutter-b">
                                    <div class="grid-container-3">
                                        <div class="grid-label"><label>Mill</label></div>
                                        <div class="grid-input">
                                            <select id="mac_add_tbl">
                                                <option value="">Select</option>
                                                @foreach($mac_addresses as $mac_address)
                                                    <option value="{{$mac_address->device}}">{{$mac_address->device}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Mill Operator</label></div>
                                        <div class="grid-input">
                                            <select id="mill_operator">
                                                <option value="">Select</option>
                                                @foreach($mill_operators as $mill_operator)
                                                    <option value="{{$mill_operator->ID}}">{{$mill_operator->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Cut Off Operator</label></div>
                                        <div class="grid-input">
                                            <select id="cutoff_operator">
                                                <option>Select</option>
                                                @foreach($cutoff_operators as $cutoff_operator)
                                                    <option value="{{$cutoff_operator->ID}}">{{$cutoff_operator->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Repair Welder</label></div>
                                        <div class="grid-input">
                                            <select id="repair_welder">
                                                <option>Select</option>
                                                @foreach($repair_welders as $repair_welder)
                                                    <option value="{{$repair_welder->ID}}">{{$repair_welder->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Inspector</label></div>
                                        <div class="grid-input">
                                            <select id="inspector">
                                                <option>Select</option>
                                                @foreach($inspectors as $inspector)
                                                    <option value="{{$inspector->ID}}">{{$inspector->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Container Type</label></div>
                                        <div class="grid-input">
                                            <select id="cont_type">
                                                <option>Select</option>
                                                @foreach($conts as $cont)
                                                    <option value="{{$cont->ID}}">{{$cont->cont_type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Shipping Method</label></div>
                                        <div class="grid-input">
                                            <select id="ship_method">
                                                <option>Select</option>
                                                @foreach($ship_methods as $ship_method)
                                                    <option value="{{$ship_method->ID}}">{{$ship_method->ship_method}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 gutter-b">
                                    <div class="grid-container-3">
                                        <div class="grid-label"><label>Mill Weld Spec</label></div>
                                        <div class="grid-input">
                                            <select id="weld_spec_mill">
                                                <option>Select</option>
                                                @foreach($weld_spec_mills as $weld_spec_mill)
                                                    <option value="{{$weld_spec_mill->weld_spec}}">{{$weld_spec_mill->weld_spec}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Repair Weld Spec</label></div>
                                        <div class="grid-input">
                                            <select id="weld_spec_repair">
                                                <option>Select</option>
                                                @foreach($weld_spec_repairs as $weld_spec_repair)
                                                    <option value="{{$weld_spec_repair->weld_spec}}">{{$weld_spec_repair->weld_spec}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 gutter-b">
                                    <div class="grid-container">
                                        <div class="grid-container-2">
                                            <div class="grid-label"><label>Line Item</label></div>
                                            <div class="grid-input"><input id="item" type="number"></div>
                                        </div>
                                        <div class="grid-container-2 grid-border-top d-none">
                                            <div class="grid-label"><label>Date Began</label></div>
                                            <div class="grid-input"><input type="date" value="{{date('Y-m-d')}}" id="began"></div>
                                        </div>
                                        <div class="grid-container-2 grid-border-top d-none">
                                            <div class="grid-label"><label>Date Finished</label></div>
                                            <div class="grid-input"><input type="date" value="{{date('Y-m-d')}}" id="finished"></div>
                                        </div>
                                        <div class="grid-container-2 grid-border-top d-none">
                                            <div class="grid-label"><label>Date Shipped</label></div>
                                            <div class="grid-input"><input type="date" value="{{date('Y-m-d')}}" id="shipped"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 gutter-b">
                                    <div class="table-container border">
                                        <h5 class="text-center m-0 p-2 bg-success text-white"><i class="fa fa-exclamation-triangle text-white"></i> Check started to see order info.</h5>
                                        <table class="table table-head-bg text-center mb-0">
                                            <thead>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Started ?</td>
                                                <td><input id="started-check" type="checkbox"></td>
                                            </tr>
                                            <tr>
                                                <td>Finished ?</td>
                                                <td><input id="finished-check" type="checkbox"></td>
                                            </tr>
                                            <tr>
                                                <td>Shipped ?</td>
                                                <td><input id="shipped-check" type="checkbox"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="row mt-5 mb-5" id="additional-container"></div>
                        <div class="row mt-5">
                            <div class="col-lg-7">
                                <div class="d-flex justify-content-around">
                                    <div>
                                        <label class="radio-label"><input class="coil_option" name="coil_data" value="1" type="radio"> Allocated </label>
                                    </div>
                                    <div>
                                        <label class="radio-label"><input class="coil_option" name="coil_data" value="2" type="radio"> All material widths </label>
                                    </div>
                                    <div>
                                        <label class="radio-label"><input class="coil_option" name="coil_data" value="3" type="radio"> Part specific widths </label>
                                    </div>
                                </div>
                                <div class="table-container table-height">
                                    <table class="table table-bordered table-hover table-head-bg text-center">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Coil</th>
                                            <th>Weight</th>
                                            <th>Width</th>
                                            <th>Worker#</th>
                                            <th>Heat#</th>
                                            <th>Job</th>
                                            <th>Allocated</th>
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
                            <div class="col-lg-4 mt-8">
                                <div class="alert alert-light" role="alert" id="weight_allocated_alert">
                                    Weight Allocated: 0 <br>
                                    Weight already used: 0 <br>
                                    Total Weight dedicated to job: 0
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-4">
                                <fieldset>
                                    <legend>Order Status</legend>
                                    <div class="grid-container-3">
                                        <div class="grid-label"><label>Instruction</label></div>
                                        <div class="grid-input">
                                            <select id="instr">
                                                @foreach($instr_types as $instr_type)
                                                    <option value="{{$instr_type->ID}}">{{$instr_type->Instruction}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Balance</label></div>
                                        <div class="grid-input"><input id="balance"></div>
                                        <div class="grid-label"><label>Status</label></div>
                                        <div class="grid-input">
                                            <select id="status">
                                                @foreach($status_types as $status_type)
                                                    <option value="{{$status_type->ID}}">{{$status_type->status}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Call</label></div>
                                        <div class="grid-input"><input id="call"></div>
                                        <div class="grid-label"><label>TPM Status</label></div>
                                        <div class="grid-input">
                                            <select id="TPM_Type">
                                                @foreach($tpm_types as $tpm_type)
                                                    <option value="{{$tpm_type->ID}}">{{$tpm_type->TPM_Type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-3 float-right">
                                        <button type="button" class="btn btn-success" style="width: 145px !important;">Preview Report</button>
                                    </div>
                                </fieldset>
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
                            <div class="col-lg-4 mt-8">
                                <div class="alert alert-light" role="alert" id="length_allocated_alert">
                                    Weight Allocated: 0 <br>
                                    Weight already used: 0 <br>
                                    Total Weight dedicated to job: 0
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <div class="col-2 indi-input">
                                            <label>Blank ring?</label>
                                            <input class="show-btn" type="checkbox" id="part_modal_blank_ring">
                                        </div>
                                        <div class="col-2 indi-input d-none">
                                            <label>Blank Ring Length +</label>
                                            <input id="part_modal_blank_ring_plus" value="0">
                                        </div>
                                        <div class="col-2 indi-input d-none">
                                            <label>Blank Ring Length -</label>
                                            <input id="part_modal_blank_ring_minus" value="0">
                                        </div>
                                    </div>
                                    <div class="d-flex mb-5">
                                        <div class="col-2 indi-input">
                                            <label>Dimple depth?</label>
                                            <input class="show-btn" type="checkbox" id="part_modal_depth_of_dimple">
                                        </div>
                                        <div class="col-2 indi-input d-none">
                                            <label>Depth of dimple</label>
                                            <input id="part_modal_depth_of_dimple" value="0">
                                        </div>
                                        <div class="col-2 indi-input d-none">
                                            <label>Plus +</label>
                                            <input id="part_modal_depth_of_dimple_plus" value="0">
                                        </div>
                                        <div class="col-2 indi-input d-none">
                                            <label>Minus -</label>
                                            <input id="part_modal_depth_of_dimple_minus" value="0">
                                        </div>
                                    </div>
                                    <div class="d-flex mb-5">
                                        <div class="col-2 indi-input">
                                            <label>Blank end ring?</label>
                                            <input class="show-btn" type="checkbox" id="part_modal_blank_end">
                                        </div>
                                        <div class="col-2 indi-input d-none">
                                            <label>Width of ring</label>
                                            <input id="part_modal_width_of_ring" value="0">
                                        </div>
                                        <div class="col-2 indi-input d-none">
                                            <label>Plus +</label>
                                            <input id="part_modal_width_of_ring_plus" value="0">
                                        </div>
                                        <div class="col-2 indi-input d-none">
                                            <label>Minus -</label>
                                            <input id="part_modal_width_of_ring_minus" value="0">
                                        </div>
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
                                        <div class="grid-input"><input id="part_modal_drawing"></div>
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
            <!--start::Modal-->
            <div class="modal fade" id="jobModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Job Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b example example-compact">
                                <!--begin::Form-->
                                <form class="form">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 gutter-b">
                                                <fieldset>
                                                    <legend>Part Specification</legend>
                                                    <div class="row">
                                                        <div class="col-4 p-5">
                                                            <div class="row">
                                                                <div class="col-12 gutter-b">
                                                                    <div class="grid-container-3">
                                                                        <div class="grid-label"><label>Job No.</label></div>
                                                                        <div class="grid-input"><input id="modal_job"></div>
                                                                        <div class="grid-label"><label>Quantity</label></div>
                                                                        <div class="grid-input"><input id="modal_quantity"></div>
                                                                        <div class="grid-label"><label>Material</label></div>
                                                                        <div class="grid-input">
                                                                            <select id="modal_material">
                                                                                @foreach($materials as $material)
                                                                                <option value="{{$material->material}}">{{$material->material}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="grid-label"><label>Gage</label></div>
                                                                        <div class="grid-input">
                                                                            <select id="modal_gage">
                                                                                @foreach($gages as $gage)
                                                                                    <option value="{{$gage->gage}}">{{$gage->gage}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="grid-label"><label>Pattern</label></div>
                                                                        <div class="grid-input" id="modal_pattern">
                                                                            <select>
                                                                                @foreach($patterns as $pattern)
                                                                                    <option value="{{$pattern->pattern}}">{{$pattern->pattern}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="grid-label"><label>Hole Size</label></div>
                                                                        <div class="grid-input"><input id="modal_holes"></div>
                                                                        <div class="grid-label"><label>Hole centers</label></div>
                                                                        <div class="grid-input"><input id="modal_centers"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 gutter-b">
                                                                    <div class="row">
                                                                        <div class="col-8">
                                                                            <div class="grid-container-3">
                                                                                <div class="grid-label"><label>OD</label></div>
                                                                                <div class="grid-input"><input id="modal_od"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="grid-container-3">
                                                                                <div class="grid-label"><label>+</label></div>
                                                                                <div class="grid-input"><input id="modal_positive"></div>
                                                                                <div class="grid-label"><label>-</label></div>
                                                                                <div class="grid-input"><input id="modal_negative"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="grid-container-3">
                                                                        <div class="grid-label"><label>Drawing</label></div>
                                                                        <div class="grid-input"><input id="modal_drawing"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 p-5">
                                                            <div class="row">
                                                                <div class="col-12 gutter-b">
                                                                    <div class="grid-container-3">
                                                                        <div class="grid-label"><label>Customer</label></div>
                                                                        <div class="grid-input"><input id="modal_customer"></div>
                                                                        <div class="grid-label"><label>PO Number</label></div>
                                                                        <div class="grid-input"><input id="modal_po"></div>
                                                                        <div class="grid-label"><label>Line item</label></div>
                                                                        <div class="grid-input"><input id="modal_item"></div>
                                                                        <div class="grid-label"><label>Part No.</label></div>
                                                                        <div class="grid-input"><input id="modal_part_no"></div>
                                                                        <div class="grid-label"><label>Part Desc.</label></div>
                                                                        <div class="grid-input"><textarea id="modal_part_desc"></textarea></div>
                                                                        <div class="grid-label"><label>Date ordered</label></div>
                                                                        <div class="grid-input"><input id="modal_date_ordered"></div>
                                                                        <div class="grid-label"><label>Date Due</label></div>
                                                                        <div class="grid-input"><input id="modal_date_due"></div>
                                                                        <div class="grid-label"><label>Ship Date</label></div>
                                                                        <div class="grid-input"><input id="modal_ship_date"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 gutter-b">
                                                                    <div class="row">
                                                                        <div class="col-8">
                                                                            <div class="grid-container">
                                                                                <div class="grid-container-2">
                                                                                    <div class="grid-label"><label>Finished length</label></div>
                                                                                    <div class="grid-input"><input id="modal_finished_length"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="grid-container-3">
                                                                                <div class="grid-label"><label>+</label></div>
                                                                                <div class="grid-input"><input id="modal_finished_length_positive"></div>
                                                                                <div class="grid-label"><label>-</label></div>
                                                                                <div class="grid-input"><input id="modal_finished_length_negative"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 p-5">
                                                            <div class="row">
                                                                <div class="col-12 gutter-b">
                                                                    <div class="grid-container-3">
                                                                        <div class="grid-label"><label>Mill Spec</label></div>
                                                                        <div class="grid-input">
                                                                            <select name="" id="modal_mill_spec">
                                                                                @foreach($weld_spec_mills as $weld_spec_mill)
                                                                                    <option value="{{$weld_spec_mill->weld_spec}}">{{$weld_spec_mill->weld_spec}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="grid-label"><label>Repair Spec</label></div>
                                                                        <div class="grid-input">
                                                                            <select name="" id="modal_repair_spec">
                                                                                @foreach($weld_spec_repairs as $weld_spec_repair)
                                                                                    <option value="{{$weld_spec_repair->weld_spec}}">{{$weld_spec_repair->weld_spec}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 gutter-t gutter-b">
                                                <fieldset>
                                                    <legend>Mfg. Specification</legend>
                                                    <div class="row">
                                                        <div class="col-3 p-5">
                                                            <div class="row">
                                                                <div class="col-12 gutter-b">
                                                                    <div class="grid-container-3">
                                                                        <div class="grid-label"><label>Strip width</label></div>
                                                                        <div class="grid-input"><input id="modal_strip_width"></div>
                                                                        <div class="grid-label"><label>Angle</label></div>
                                                                        <div class="grid-input"><input id="modal_angle"></div>
                                                                        <div class="grid-label"><label>Cutoff length</label></div>
                                                                        <div class="grid-input"><input id="modal_cutoff_length"></div>
                                                                        <div class="grid-label"><label>Die</label></div>
                                                                        <div class="grid-input"><input id="modal_die"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 p-5">
                                                            <div class="row">
                                                                <div class="col-12 gutter-b">
                                                                    <div class="grid-container-3">
                                                                        <div class="grid-label"><label>Mill</label></div>
                                                                        <div class="grid-input"><input id="modal_mill"></div>
                                                                        <div class="grid-label"><label>Ring Min</label></div>
                                                                        <div class="grid-input"><input id="modal_ring_min"></div>
                                                                        <div class="grid-label"><label>Ring Max</label></div>
                                                                        <div class="grid-input"><input id="modal_ring_max"></div>
                                                                        <div class="grid-label"><label>ID drift</label></div>
                                                                        <div class="grid-input"><input id="modal_id_drift"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 p-5">
                                                            <div class="row">
                                                                <div class="col-12 gutter-b">
                                                                    <div class="grid-container-3">
                                                                        <div class="grid-label"><label>Mill amps</label></div>
                                                                        <div class="grid-input"><input id="modal_mill_amps"></div>
                                                                        <div class="grid-label"><label>Mill volts</label></div>
                                                                        <div class="grid-input"><input id="modal_mill_volts"></div>
                                                                        <div class="grid-label"><label>Mill speed</label></div>
                                                                        <div class="grid-input"><input id="modal_mill_speed"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 p-5">
                                                            <div class="row">
                                                                <div class="col-12 gutter-b">
                                                                    <div class="grid-container-3">
                                                                        <div class="grid-label"><label>Repair amps</label></div>
                                                                        <div class="grid-input"><input id="modal_repair_amps"></div>
                                                                        <div class="grid-label"><label>Repair volts</label></div>
                                                                        <div class="grid-input"><input id="modal_repair_volts"></div>
                                                                        <div class="grid-label"><label>Repair speed</label></div>
                                                                        <div class="grid-input"><input id="modal_repair_speed"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 gutter-t gutter-b">
                                                <fieldset>
                                                    <legend>Report Option</legend>
                                                    <div class="row">
                                                        <div class="col-3 p-5">
                                                            <div class="grid-container-3">
                                                                <div class="grid-label"><label>Mill Log</label></div>
                                                                <div class="grid-input"><input type="checkbox" id="modal_mill_log"></div>
                                                                <div class="grid-label"><label>Mill Setup</label></div>
                                                                <div class="grid-input"><input type="checkbox" id="modal_mill_setup"></div>
                                                                <div class="grid-label"><label>Welding Sheets</label></div>
                                                                <div class="grid-input"><input type="checkbox" id="modal_welding_sheets"></div>
                                                                <div class="grid-label"><label>Worksheet</label></div>
                                                                <div class="grid-input"><input type="checkbox" id="modal_work_sheet"></div>
                                                                <div class="grid-label"><label>Direct Pack</label></div>
                                                                <div class="grid-input"><input type="checkbox" id="modal_direct_pack"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-5 p-5">
                                                            <div class="grid-container-3">
                                                                <div class="grid-label"><label>Cutoff Sheets</label></div>
                                                                <div class="grid-input"><input type="checkbox" id="modal_cutoff_sheets"></div>
                                                                <div class="grid-label"><label>Inspection Sheets</label></div>
                                                                <div class="grid-input"><input type="checkbox" id="modal_inspection_sheets"></div>
                                                                <div class="grid-label"><label>Allocation</label></div>
                                                                <div class="grid-input"><input type="checkbox" id="modal_allocation"></div>
                                                                <div class="grid-label"><label>Allocation Mesh</label></div>
                                                                <div class="grid-input"><input type="checkbox" id="modal_allocation_mesh"></div>
                                                                <div class="grid-label"><label>Ring Inspection</label></div>
                                                                <div class="grid-input"><input type="checkbox" id="modal_allocation_inspection"></div>
                                                                <div class="grid-label"><label>GeoForm Ring Inspection</label></div>
                                                                <div class="grid-input"><input type="checkbox" id="modal_geoform_ring_inspection"></div>
                                                                <div class="grid-label"><label>GeoForm Ring Concentric Inspection</label></div>
                                                                <div class="grid-input"><input type="checkbox" id="modal_geoform_ring_concentric_inspection"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 p-5">
                                                            <div class="grid-container-3 mb-10">
                                                                <div class="grid-label"><label>From</label></div>
                                                                <div class="grid-input"><input type="number" id="modal_from"></div>
                                                                <div class="grid-label"><label>To</label></div>
                                                                <div class="grid-input"><input type="number" id="modal_to"></div>
                                                            </div>
                                                            <div class="row justify-content-center">
                                                                <div class="col-8">
                                                                    <fieldset class="child-fieldset">
                                                                        <legend>Print Options</legend>
                                                                        <div>
                                                                            <div class="d-flex justify-content-between">
                                                                                <label>Print</label>
                                                                                <input type="checkbox" id="modal_print">
                                                                            </div>
                                                                            <div class="d-flex justify-content-between">
                                                                                <label>Preview</label>
                                                                                <input type="checkbox" id="modal_preview">
                                                                            </div>
                                                                            <div class="d-flex justify-content-center mt-5">
                                                                                <button type="button" class="btn-custom" id="modal_button">View Reports</button>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
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
    <script src="{{ asset('assets/js/orders/yet_to_start.js') }}"></script>
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
                $('#mill_operator').val('').change();
                $('#cutoff_operator').val('').change();
                $('#repair_welder').val('').change();
                $('#inspector').val('').change();
                $('#cont_type').val('').change();
                $('#ship_method').val('').change();
                $('#weld_spec_mill').val('').change();
                $('#weld_spec_repair').val('').change();
                toastr.success("You can add new data now!", "Success");
            })
        })
    </script>
@endsection
