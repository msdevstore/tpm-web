<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartInfoController extends Controller
{

    public function index()
    {
        $page_title = 'Part Information';
        $page_description = '';

        return view('admin.part_information.index', compact('page_title', 'page_description'));
    }

}
