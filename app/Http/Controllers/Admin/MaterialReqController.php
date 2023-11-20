<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialReqController extends Controller
{

    public function index()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('mat_req')->get();
        $gages = DB::table('gage_tbl')->get();
        $patterns = DB::table('pat_tbl')->get();
        $fracs = DB::table('frac_tbl')->get();

        return view('admin.material_requirements.index', compact('page_title', 'page_description', 'obj_arr', 'gages', 'patterns', 'fracs'));
    }

}
