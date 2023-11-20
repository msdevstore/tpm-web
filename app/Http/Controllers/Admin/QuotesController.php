<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotesController extends Controller
{

    public function newQuotes()
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
        $materials = DB::table('mat_tbl')->get();
        $gages = DB::table('gage_tbl')->get();
        $patterns = DB::table('pat_tbl')->get();
        $fracs = DB::table('frac_tbl')->get();

        return view('admin.quotes.new_quotes', compact('page_title', 'page_description', 'obj_arr', 'new_id', 'customers', 'materials', 'gages', 'patterns', 'fracs'));
    }

    public function pricingSearch()
    {
        $page_title = '';
        $page_description = '';

        $customers = DB::table('cust_tbl')->get();
        $parts = DB::table('part_tbl')->get();
        $materials = DB::table('mat_tbl')->get();
        $gages = DB::table('gage_tbl')->get();

        return view('admin.quotes.pricing_search', compact('page_title', 'page_description', 'customers', 'parts', 'materials', 'gages'));
    }

}
