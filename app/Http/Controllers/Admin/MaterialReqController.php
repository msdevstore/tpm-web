<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaterialReqController extends Controller
{

    public function index()
    {
        $page_title = 'Material';
        $page_description = 'requirements for the materials';

        return view('admin.material_requirements.index', compact('page_title', 'page_description'));
    }

}
