<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartInfoController extends Controller
{

    public function index()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('part_tbl')->get();
        $customers = DB::table('cust_tbl')->get();
        $materials = DB::table('mat_tbl')->get();
        $gages = DB::table('gage_tbl')->get();
        $patterns = DB::table('pat_tbl')->get();
        $fracs = DB::table('frac_tbl')->get();
        $dies = DB::table('die_tbl')->get();
        $drifts = DB::table('drifts')->get();
        $die_stamps = DB::table('die_stamp_tbl')->get();
        $meshes = DB::table('mesh')->get();

        return view('admin.part_information.index', compact('page_title', 'page_description', 'customers', 'obj_arr', 'gages', 'patterns', 'fracs', 'materials', 'dies', 'drifts', 'die_stamps', 'meshes'));
    }

}
