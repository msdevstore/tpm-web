<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $page_title = 'Customers Information';
        $page_description = '';

        return view('admin.customer.index', compact('page_title', 'page_description'));
    }
}
