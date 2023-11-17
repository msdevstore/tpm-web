{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/orders_all.css') }}" />
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
                                                @foreach($orders->first() as $key => $value)
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
                                    <div class="grid-label"><label>PO Number</label></div>
                                    <div class="grid-input"><input id="po"></div>
                                    <div class="grid-label"><label>Part No.</label></div>
                                    <div class="grid-input">
                                        <select id="part">
                                            <option value="">Select</option>
                                            @foreach($parts as $part)
                                                <option {{$part->part}}><?php echo (strlen($part->part) > 20) ? substr($part->part, 0, 20) . '...' : $part->part ?></option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Quantity</label></div>
                                    <div class="grid-input"><input id="quantity"></div>
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
{{--                            <div class="col-lg-4 gutter-b">--}}
{{--                                <div class="grid-container-3">--}}
{{--                                    <div class="grid-label"><label>LF mat</label></div>--}}
{{--                                    <div class="grid-input"><input type="text"></div>--}}
{{--                                    <div class="grid-label"><label>Weight (pre)</label></div>--}}
{{--                                    <div class="grid-input"><input type="number"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-lg-3 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Ship Date</label></div>
                                    <div class="grid-input"><input name="ship_dates[]" type="text"></div>
                                    <div class="grid-label"><label>Quantity</label></div>
                                    <div class="grid-input"><input name="ship_quantities[]" type="number"></div>
                                </div>
                            </div>
                            <div class="col-lg-1 gutter-b">
                                <button type="button" id="add_btn" class="btn btn-plus">+</button>
                            </div>
                        </div>
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
                                <div class="table-container">
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
                                    <div class="table-container">
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
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/pages/crud/datatables/advanced/row-callback.js') }}"></script>
    <script src="{{ asset('assets/js/orders_all.js') }}"></script>
    <script>
        const orders = {{Js::from($orders)}};

        $(document).ready(function() {
            $('#DataTables_Table_0').parent().css('overflow-x', 'auto');

            $('#forward-btn').click(function() {
                const job = $('#job').val();
                let index = orders.findIndex(order => order.job == job);
                if (index - 1 < 0) index = orders.length - 1;
                updateValues(orders[index - 1]);
            })

            $('#backward-btn').click(function() {
                const job = $('#job').val();
                let index = orders.findIndex(order => order.job == job);
                if (index + 1 >= orders.length) index = 0;
                updateValues(orders[index + 1]);
            })

            function updateValues(obj) {
                $('#job').val(obj.job);
                $('#cust_id').val(obj.cust_id);
                $('#po').val(obj.po);
                $('#part').val(obj.part);
                $('#quantity').val(obj.quantity);
                $('#ordered').val(obj.ordered.substring(0,10));
                $('#due').val(obj.due.substring(0,10));
                $('#ship_date').val(obj.ship_date.substring(0,10));
                $('#mill_operator').val(obj.mill_operator).change();
                $('#cutoff_operator').val(obj.cutoff_operator).change();
                $('#repair_welder').val(obj.repair_welder).change();
                $('#inspector').val(obj.inspector).change();
                $('#cont_type').val(obj.cont_type).change();
                $('#ship_method').val(obj.ship_method).change();
                $('#weld_spec_mill').val(obj.weld_spec_mill).change();
                $('#weld_spec_repair').val(obj.weld_spec_repair).change();
            }

            $(document).on('click', '.order-btn', function(e) {
                if ($(e.target)[0].localName === 'td') {
                    let job = $(e.target).parent().attr('data');

                    let order = orders.filter(order => order.job == job)[0];
                    updateValues(order);

                    $.ajax({
                        url: '/api/v1/get_weight/' + order.job,
                        type: 'get',
                        success: function(res) {
                            // console.log(res);
                            const temp = `Weight Allocated: ${res.tw} <br>
                                    Weight already used: ${res.used} <br>
                                    Total Weight dedicated to job: ${Number(res.tw) + Number(res.used)}`;
                            $('#weight_allocated_alert').empty().append(temp);
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })

                    $.ajax({
                        url: '/api/v1/get_mesh_total/' + order.job,
                        type: 'get',
                        success: function(res) {
                            console.log(res);
                            const temp = `Length Allocated: ${res.ML} <br>
                                    Length already used: ${res.EL} <br>
                                    Total Required Length: ${Number(res.ML) + Number(res.EL)}`;
                            $('#length_allocated_alert').empty().append(temp);
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })

                    $('#orders-table').slideToggle();
                    $('#control-panel').css('display', 'flex');
                    // console.log(order);
                }
            })

            $('#add_btn').click(function() {
                const temp = `<div class="col-lg-3 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Ship Date</label></div>
                                    <div class="grid-input"><input name="ship_dates[]" type="text"></div>
                                    <div class="grid-label"><label>Quantity</label></div>
                                    <div class="grid-input"><input name="ship_quantities[]" type="number"></div>
                                </div>
                            </div>`;
                $('#additional-container').append(temp);
            })
        })
    </script>
@endsection
