<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShipInfoController extends Controller
{
    public function index()
    {
        $page_title = 'Ship Information';
        $page_description = '';

        return view('admin.ship_info.index', compact('page_title', 'page_description'));
    }
}
