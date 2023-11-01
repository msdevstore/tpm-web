<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UniQuotesController extends Controller
{

    public function index()
    {
        $page_title = 'Uni_Quotes';
        $page_description = 'Some requirements for the uni quotes';

        return view('admin.uni_quotes.index', compact('page_title', 'page_description'));
    }

}
