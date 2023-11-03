<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UniScreenController extends Controller
{

    public function index()
    {
        $page_title = 'Want to save customer and part information? Try this version here';
        $page_description = '';

        return view('admin.uni_screen.index', compact('page_title', 'page_description'));
    }

}
