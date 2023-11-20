<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function jobStatus()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('order_specs')->get();

        return view('admin.reports.job_status', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function pdfGenerator()
    {
        $page_title = '';
        $page_description = '';

        return view('admin.reports.pdf_generator', compact('page_title', 'page_description'));
    }

    public function standardPrices()
    {
        $page_title = '';
        $page_description = '';

        return view('admin.reports.standard_prices', compact('page_title', 'page_description'));
    }

    public function training()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('cust_tbl')->get();

        return view('admin.reports.training', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function steelReceive()
    {
        $page_title = '';
        $page_description = '';

        return view('admin.reports.steel_receive', compact('page_title', 'page_description'));
    }

    public function audit()
    {
        $page_title = '';
        $page_description = '';

        return view('admin.reports.audit', compact('page_title', 'page_description'));
    }

    public function orderStatus()
    {
        $page_title = '';
        $page_description = '';

        return view('admin.reports.order_status', compact('page_title', 'page_description'));
    }

}
