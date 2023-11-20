{{-- Extends layout --}}
@extends('layout.default')

{{-- Styles --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/order_status/upcoming_orders.css') }}" />
@endsection

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">
        <div class="col-lg-12 col-xxl-12 card-stretch gutter-b">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-image-file text-primary"></i>
                        </span>
                        <h3 class="card-label">In Progress Orders</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-foot-custom table-checkable kt_datatable" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Ship Date</th>
                            <th>Part #</th>
                            <th>Job #</th>
                            <th>Qty</th>
                            <th>Description</th>
                            <th>Mill</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="main-table-btn" data="{{$order->job}}">
                                <td><?php echo (strlen($order->customer) > 20) ? substr($order->customer, 0, 20) . '...' : $order->customer ?></td>
                                <td><?php echo (strlen($order->ship_date) > 20) ? substr($order->ship_date, 0, 20) . '...' : $order->ship_date ?></td>
                                <td><?php echo (strlen($order->part) > 20) ? substr($order->part, 0, 20) . '...' : $order->part ?></td>
                                <td><?php echo (strlen($order->quantity) > 20) ? substr($order->quantity, 0, 20) . '...' : $order->quantity ?></td>
                                <td><?php echo (strlen($order->job) > 20) ? substr($order->job, 0, 20) . '...' : $order->job ?></td>
                                <td><?php echo (strlen($order->description) > 20) ? substr($order->description, 0, 20) . '...' : $order->description ?></td>
                                <td>
                                    <select class="device-option" data="{{$order->job}}">
                                        <option value="">--- No selected ---</option>
                                        @foreach($devices as $device)
                                            <?php $selected = ''; if($device->device == $order->device) $selected = 'selected' ?>
                                            <option value="{{$device->device}}" {{$selected}}>{{$device->device}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                        </tfoot>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xxl-12 card-stretch gutter-b">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-image-file text-primary"></i>
                        </span>
                        <h3 class="card-label">Paused Orders</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-foot-custom table-checkable kt_datatable" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Ship Date</th>
                            <th>Part #</th>
                            <th>Job #</th>
                            <th>Qty</th>
                            <th>Description</th>
                            <th>Mill</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paused_orders as $order)
                            <tr class="main-table-btn" data="{{$order->job}}">
                                <td><?php echo (strlen($order->customer) > 20) ? substr($order->customer, 0, 20) . '...' : $order->customer ?></td>
                                <td><?php echo (strlen($order->ship_date) > 20) ? substr($order->ship_date, 0, 20) . '...' : $order->ship_date ?></td>
                                <td><?php echo (strlen($order->part) > 20) ? substr($order->part, 0, 20) . '...' : $order->part ?></td>
                                <td><?php echo (strlen($order->quantity) > 20) ? substr($order->quantity, 0, 20) . '...' : $order->quantity ?></td>
                                <td><?php echo (strlen($order->job) > 20) ? substr($order->job, 0, 20) . '...' : $order->job ?></td>
                                <td><?php echo (strlen($order->description) > 20) ? substr($order->description, 0, 20) . '...' : $order->description ?></td>
                                <td>
                                    <select class="device-option" data="{{$order->job}}">
                                        <option value="">--- No selected ---</option>
                                        @foreach($devices as $device)
                                                <?php $selected = ''; if($device->device == $order->device) $selected = 'selected' ?>
                                            <option value="{{$device->device}}" {{$selected}}>{{$device->device}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/pages/crud/datatables/advanced/row-callback.js') }}"></script>
    <script src="{{ asset('assets/js/order_status/upcoming_orders.js') }}"></script>
@endsection
