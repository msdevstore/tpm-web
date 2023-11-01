<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UniScreenController extends Controller
{

    public function index()
    {
        $page_title = 'UniScreen';
        $page_description = '';

        return view('admin.uni_screen.index', compact('page_title', 'page_description'));
    }

}
