<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function delete($id) {
        $order = DB::table('orders_tbl')->where('job', $id)->first();
        if ($order) {
            $status = DB::table('orders_tbl')->where('job', $id)->delete();
            return response($status);
        }
        return response(false);
    }

    public function create(Request $request) {
        $obj = [];

        if ($request->item) $obj['item'] = $request->item;
        if ($request->began) $obj['began'] = $request->began;
        if ($request->finished) $obj['finished'] = $request->finished;
        if ($request->shipped) $obj['shipped'] = $request->shipped;
        $obj['cust_id'] = $request->cust_id;
        $obj['po'] = $request->po;
        $obj['part'] = $request->part;
        $obj['quantity'] = $request->quantity;
        $obj['ordered'] = $request->ordered;
        $obj['due'] = $request->due;
        $obj['ship_date'] = $request->ship_date;
//        $obj['mill_operator'] = $request->mill_operator;
//        $obj['cutoff_operator'] = $request->cutoff_operator;
//        $obj['repair_welder'] = $request->repair_welder;
//        $obj['inspector'] = $request->inspector;
//        $obj['cont_type'] = $request->cont_type;
//        $obj['ship_method'] = $request->ship_method;
//        $obj['weld_spec_mill'] = $request->weld_spec_mill;
//        $obj['weld_spec_repair'] = $request->weld_spec_repair;

        $order = DB::table('orders_tbl')->where('job', $request->job)->first();
        if ($order) {
            $result = DB::table('orders_tbl')->where('job', $order->job)->update($obj);
            if ($result) return response(2);
        } else {
            $obj['job'] = $request->job;
            $obj['has_started'] = 1;
            $obj['has_finished'] = 0;
            $obj['has_finished_tack'] = 0;
            $obj['has_shipped'] = 0;
            $obj['drift_dim'] = 0;
            $obj['drift_insp'] = '';
            $obj['device'] = '';
            $obj['gen_pdf'] = '0';
            $result = DB::table('orders_tbl')->insert($obj);
            if ($result) return response(1);
        }

        return response(0);
    }

    public function all()
    {
        $page_title = '';
        $page_description = '';

        $customers = DB::table('cust_tbl')->orderBy('customer')->get();
        $orders = DB::table('orders_tbl')->orderBy('job', 'desc')->limit(30)->get();
        $job_no = DB::table('orders_tbl')->orderBy('job', 'desc')->first()->job + 1;
//        $parts = DB::table('part_tbl')->get();
        $mac_addresses = DB::table('mac_add_tbl')->where('device', 'like', 'mill_%')->get();
        $mill_operators = DB::table('employee')->where('mill_operator', 1)->get();
        $cutoff_operators = DB::table('employee')->where('cutoff_operator', 1)->get();
        $repair_welders = DB::table('employee')->where('repair_welder', 1)->get();
        $inspectors = DB::table('employee')->where('inspector', 1)->get();
        $conts = DB::table('cont')->get();
        $ship_methods = DB::table('ship_method')->get();
        $weld_spec_mills = DB::table('weld_spec_mill')->get();
        $weld_spec_repairs = DB::table('weld_spec_repair')->get();
        $patterns = DB::table('pat_tbl')->get();
        $materials = DB::table('mat_tbl')->get();
        $gages = DB::table('gage_tbl')->get();
        $patterns = DB::table('pat_tbl')->get();
        $fracs = DB::table('frac_tbl')->get();
        $dies = DB::table('die_tbl')->get();
        $drifts = DB::table('drifts')->get();
        $die_stamps = DB::table('die_stamp_tbl')->get();
        $meshes = DB::table('mesh')->get();

        return view('admin.orders.all', compact('orders', 'fracs', 'dies', 'drifts', 'die_stamps', 'meshes', 'patterns', 'gages', 'materials', 'inspectors', 'repair_welders', 'cutoff_operators', 'mill_operators', 'page_title', 'page_description', 'job_no', 'customers', 'mac_addresses', 'conts', 'ship_methods', 'weld_spec_mills', 'weld_spec_repairs'));
    }

    public function yetToStart()
    {
        $page_title = '';
        $page_description = '';

        $customers = DB::table('cust_tbl')->orderBy('customer')->get();
        $orders = DB::table('orders_tbl')->where('has_started', 0)->orderBy('job', 'desc')->limit(30)->get();
        $job_no = DB::table('orders_tbl')->orderBy('job', 'desc')->first()->job + 1;
//        $parts = DB::table('part_tbl')->get();
        $mac_addresses = DB::table('mac_add_tbl')->where('device', 'like', 'mill_%')->get();
        $mill_operators = DB::table('employee')->where('mill_operator', 1)->get();
        $cutoff_operators = DB::table('employee')->where('cutoff_operator', 1)->get();
        $repair_welders = DB::table('employee')->where('repair_welder', 1)->get();
        $inspectors = DB::table('employee')->where('inspector', 1)->get();
        $conts = DB::table('cont')->get();
        $ship_methods = DB::table('ship_method')->get();
        $weld_spec_mills = DB::table('weld_spec_mill')->get();
        $weld_spec_repairs = DB::table('weld_spec_repair')->get();
        $instr_types = DB::table('instr_type')->get();
        $status_types = DB::table('status_type')->get();
        $tpm_types = DB::table('tpm_type')->get();
        $materials = DB::table('mat_tbl')->get();
        $gages = DB::table('gage_tbl')->get();
        $patterns = DB::table('pat_tbl')->get();
        $fracs = DB::table('frac_tbl')->get();
        $dies = DB::table('die_tbl')->get();
        $drifts = DB::table('drifts')->get();
        $die_stamps = DB::table('die_stamp_tbl')->get();
        $meshes = DB::table('mesh')->get();

        return view('admin.orders.yet_to_start', compact('materials', 'fracs', 'dies', 'drifts', 'die_stamps', 'meshes', 'gages', 'patterns', 'instr_types', 'status_types', 'tpm_types', 'orders', 'inspectors', 'repair_welders', 'cutoff_operators', 'mill_operators', 'page_title', 'page_description', 'job_no', 'customers', 'mac_addresses', 'conts', 'ship_methods', 'weld_spec_mills', 'weld_spec_repairs'));
    }

    public function started()
    {
        $page_title = '';
        $page_description = '';

        $customers = DB::table('cust_tbl')->orderBy('customer')->limit(20)->get();
        $orders = DB::table('orders_tbl')->where('has_started', 1)->orderBy('job', 'desc')->limit(30)->get();
        $job_no = DB::table('orders_tbl')->orderBy('job', 'desc')->first()->job + 1;
        $parts = DB::table('part_tbl')->get();
        $mac_addresses = DB::table('mac_add_tbl')->where('device', 'like', 'mill_%')->get();
        $mill_operators = DB::table('employee')->where('mill_operator', 1)->get();
        $cutoff_operators = DB::table('employee')->where('cutoff_operator', 1)->get();
        $repair_welders = DB::table('employee')->where('repair_welder', 1)->get();
        $inspectors = DB::table('employee')->where('inspector', 1)->get();
        $conts = DB::table('cont')->get();
        $ship_methods = DB::table('ship_method')->get();
        $weld_spec_mills = DB::table('weld_spec_mill')->get();
        $weld_spec_repairs = DB::table('weld_spec_repair')->get();
        $instr_types = DB::table('instr_type')->get();
        $status_types = DB::table('status_type')->get();
        $tpm_types = DB::table('tpm_type')->get();
        $materials = DB::table('mat_tbl')->get();
        $gages = DB::table('gage_tbl')->get();
        $patterns = DB::table('pat_tbl')->get();
        $fracs = DB::table('frac_tbl')->get();
        $dies = DB::table('die_tbl')->get();
        $drifts = DB::table('drifts')->get();
        $die_stamps = DB::table('die_stamp_tbl')->get();
        $meshes = DB::table('mesh')->get();

        return view('admin.orders.started', compact('materials', 'fracs', 'dies', 'drifts', 'die_stamps', 'meshes', 'gages', 'patterns', 'instr_types', 'status_types', 'tpm_types', 'orders', 'inspectors', 'repair_welders', 'cutoff_operators', 'mill_operators', 'page_title', 'page_description', 'job_no', 'customers', 'parts', 'mac_addresses', 'conts', 'ship_methods', 'weld_spec_mills', 'weld_spec_repairs'));
    }

    public function finished()
    {
        $page_title = '';
        $page_description = '';

        $customers = DB::table('cust_tbl')->orderBy('customer')->limit(20)->get();
        $orders = DB::table('orders_tbl')->where('has_finished', 1)->orderBy('job', 'desc')->limit(30)->get();
        $job_no = DB::table('orders_tbl')->orderBy('job', 'desc')->first()->job + 1;
        $parts = DB::table('part_tbl')->get();
        $mac_addresses = DB::table('mac_add_tbl')->where('device', 'like', 'mill_%')->get();
        $mill_operators = DB::table('employee')->where('mill_operator', 1)->get();
        $cutoff_operators = DB::table('employee')->where('cutoff_operator', 1)->get();
        $repair_welders = DB::table('employee')->where('repair_welder', 1)->get();
        $inspectors = DB::table('employee')->where('inspector', 1)->get();
        $conts = DB::table('cont')->get();
        $ship_methods = DB::table('ship_method')->get();
        $weld_spec_mills = DB::table('weld_spec_mill')->get();
        $weld_spec_repairs = DB::table('weld_spec_repair')->get();
        $instr_types = DB::table('instr_type')->get();
        $status_types = DB::table('status_type')->get();
        $tpm_types = DB::table('tpm_type')->get();
        $materials = DB::table('mat_tbl')->get();
        $gages = DB::table('gage_tbl')->get();
        $patterns = DB::table('pat_tbl')->get();
        $fracs = DB::table('frac_tbl')->get();
        $dies = DB::table('die_tbl')->get();
        $drifts = DB::table('drifts')->get();
        $die_stamps = DB::table('die_stamp_tbl')->get();
        $meshes = DB::table('mesh')->get();

        return view('admin.orders.finished', compact('materials', 'fracs', 'dies', 'drifts', 'die_stamps', 'meshes', 'gages', 'patterns', 'instr_types', 'status_types', 'tpm_types', 'orders', 'inspectors', 'repair_welders', 'cutoff_operators', 'mill_operators', 'page_title', 'page_description', 'job_no', 'customers', 'parts', 'mac_addresses', 'conts', 'ship_methods', 'weld_spec_mills', 'weld_spec_repairs'));
    }

    public function shipped()
    {
        $page_title = '';
        $page_description = '';

        $customers = DB::table('cust_tbl')->orderBy('customer')->get();
        $orders = DB::table('orders_tbl')->where('has_shipped', 1)->orderBy('job', 'desc')->limit(30)->get();
        $job_no = DB::table('orders_tbl')->orderBy('job', 'desc')->first()->job + 1;
        $parts = DB::table('part_tbl')->get();
        $mac_addresses = DB::table('mac_add_tbl')->where('device', 'like', 'mill_%')->get();
        $mill_operators = DB::table('employee')->where('mill_operator', 1)->get();
        $cutoff_operators = DB::table('employee')->where('cutoff_operator', 1)->get();
        $repair_welders = DB::table('employee')->where('repair_welder', 1)->get();
        $inspectors = DB::table('employee')->where('inspector', 1)->get();
        $conts = DB::table('cont')->get();
        $ship_methods = DB::table('ship_method')->get();
        $weld_spec_mills = DB::table('weld_spec_mill')->get();
        $weld_spec_repairs = DB::table('weld_spec_repair')->get();
        $instr_types = DB::table('instr_type')->get();
        $status_types = DB::table('status_type')->get();
        $tpm_types = DB::table('tpm_type')->get();
        $materials = DB::table('mat_tbl')->get();
        $gages = DB::table('gage_tbl')->get();
        $patterns = DB::table('pat_tbl')->get();
        $fracs = DB::table('frac_tbl')->get();
        $dies = DB::table('die_tbl')->get();
        $drifts = DB::table('drifts')->get();
        $die_stamps = DB::table('die_stamp_tbl')->get();
        $meshes = DB::table('mesh')->get();

        return view('admin.orders.shipped', compact('materials', 'fracs', 'dies', 'drifts', 'die_stamps', 'meshes', 'gages', 'patterns', 'instr_types', 'status_types', 'tpm_types', 'orders', 'inspectors', 'repair_welders', 'cutoff_operators', 'mill_operators', 'page_title', 'page_description', 'job_no', 'customers', 'parts', 'mac_addresses', 'conts', 'ship_methods', 'weld_spec_mills', 'weld_spec_repairs'));
    }

    public function paused()
    {
        $page_title = '';
        $page_description = '';

        $jobs = DB::table('orders_tbl')->where([
                'has_finished' => 1,
                'has_started' => 1,
                'device' => ''
            ])
            ->limit(30)
            ->get();

        $devices = DB::table('mac_add_tbl')->where('device', 'like', '%mill_%')->get();

        return view('admin.orders.paused', compact('page_title', 'page_description', 'jobs', 'devices'));
    }

    public function stamping()
    {
        $page_title = '';
        $page_description = '';
        $orders = DB::table('stamping_orders_tbl')->orderBy('job', 'desc')->limit(30)->get();
        $job_no = DB::table('orders_tbl')->orderBy('job', 'desc')->first()->job + 1;
        $customers = DB::table('cust_tbl')->orderBy('customer')->get();
        $active_jobs = DB::table('orders_tbl')->where('has_finished', 0)->orderBy('job', 'desc')->limit(30)->get();

        return view('admin.orders.stamping', compact('page_title', 'page_description', 'orders', 'job_no', 'customers', 'active_jobs'));
    }
}
