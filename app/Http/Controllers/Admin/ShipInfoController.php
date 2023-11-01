<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShipInfoController extends Controller
{
    public function index()
    {
        $page_title = 'Ship Info';
        $page_description = 'Some Information for ship';

        return view('admin.ship_info.index', compact('page_title', 'page_description'));
    }
}
