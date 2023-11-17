<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function all()
    {
        $page_title = 'All Orders';
        $page_description = '';

        $customers = DB::table('cust_tbl')->orderBy('customer', 'asc')->get();
        $orders = DB::table('orders_tbl')->orderBy('job', 'desc')->limit(100)->get();
        $job_no = $orders->first()->job + 1;
        $parts = DB::table('part_tbl')->get();
        $gages = DB::table('gage_tbl')->get();
        $fractions = DB::table('frac_tbl')->get();
        $patterns = DB::table('pat_tbl')->get();
        $mac_addresses = DB::table('mac_add_tbl')->where('device', 'like', 'mill_%')->get();
        $employees = DB::table('employee')->get();
        $mill_operators = DB::table('employee')->where('mill_operator', 1)->get();
        $cutoff_operators = DB::table('employee')->where('cutoff_operator', 1)->get();
        $repair_welders = DB::table('employee')->where('repair_welder', 1)->get();
        $inspectors = DB::table('employee')->where('inspector', 1)->get();
        $conts = DB::table('cont')->get();
        $ship_methods = DB::table('ship_method')->get();
        $weld_spec_mills = DB::table('weld_spec_mill')->get();
        $weld_spec_repairs = DB::table('weld_spec_repair')->get();
        $materials = DB::table('mat_tbl')->get();
        $dies = DB::table('die_tbl')->get();
        $drifts = DB::table('drifts')->get();

        return view('admin.orders.all', compact('orders', 'inspectors', 'repair_welders', 'cutoff_operators', 'mill_operators', 'page_title', 'page_description', 'job_no', 'customers', 'parts', 'gages', 'fractions', 'patterns', 'mac_addresses', 'employees', 'conts', 'ship_methods', 'weld_spec_mills', 'weld_spec_repairs', 'materials', 'dies', 'drifts'));
    }

    public function yetToStart()
    {
        $page_title = 'Yet to start';
        $page_description = '';

        return view('admin.orders.yet_to_start', compact('page_title', 'page_description'));
    }

    public function started()
    {
        $page_title = 'Started orders';
        $page_description = '';

        return view('admin.orders.started', compact('page_title', 'page_description'));
    }

    public function finished()
    {
        $page_title = 'Finished orders';
        $page_description = '';

        return view('admin.orders.finished', compact('page_title', 'page_description'));
    }

    public function shipped()
    {
        $page_title = 'Shipped orders';
        $page_description = '';

        return view('admin.orders.shipped', compact('page_title', 'page_description'));
    }

    public function paused()
    {
        $page_title = 'Paused orders';
        $page_description = '';

        return view('admin.orders.paused', compact('page_title', 'page_description'));
    }

    public function stamping()
    {
        $page_title = 'Stamping orders';
        $page_description = '';

        return view('admin.orders.stamping', compact('page_title', 'page_description'));
    }
}
