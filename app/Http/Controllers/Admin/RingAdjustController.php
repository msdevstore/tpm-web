<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RingAdjustController extends Controller
{

    public function index()
    {
        $page_title = 'Ring Adjustment';
        $page_description = '';

        return view('admin.ring_adjustment.index', compact('page_title', 'page_description'));
    }

}
