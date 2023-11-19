<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExcessStockController extends Controller
{

    public function part()
    {
        $page_title = 'Excess Part Stock';
        $page_description = '';
        $obj_arr = DB::table('excess_part')->get();
        $customers = DB::table('cust_tbl')->get();
        $parts = DB::table('part_tbl')->get();

        return view('admin.excess_stock.part', compact('page_title', 'page_description', 'obj_arr', 'customers', 'parts'));
    }

    public function ring()
    {
        $page_title = 'Excess Ring Stock';
        $page_description = '';
        $obj_arr = DB::table('excess_ring')->get();
        $customers = DB::table('cust_tbl')->get();
        $parts = DB::table('part_tbl')->get();

        return view('admin.excess_stock.ring', compact('page_title', 'page_description', 'page_description', 'obj_arr', 'customers', 'parts'));
    }

}
