<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniQuotesController extends Controller
{

    public function index()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('quote_tbl')
            ->join('cust_tbl', 'quote_tbl.cust_id', '=', 'cust_tbl.cust_id')
            ->select('quote_tbl.quote', 'quote_tbl.cust_id', 'quote_tbl.address', 'quote_tbl.terms', 'quote_tbl.notes', 'quote_tbl.fax_back', 'quote_tbl.date', 'quote_tbl.fob', 'quote_tbl.special', 'quote_tbl.part', 'cust_tbl.customer')
            ->orderBy('quote', 'desc')
            ->get();
        $new_id = $obj_arr->first()->quote + 1;
        $customers = DB::table('cust_tbl')->get();
        $parts = DB::table('part_tbl')->get();

        return view('admin.uni_quotes.index', compact('page_title', 'page_description', 'obj_arr', 'new_id', 'customers', 'parts'));
    }

}
