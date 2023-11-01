<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExcessStockController extends Controller
{

    public function part()
    {
        $page_title = 'Excess Part Stock';
        $page_description = 'Some description for the excess stock';

        return view('admin.excess_stock.part', compact('page_title', 'page_description'));
    }

    public function ring()
    {
        $page_title = 'Excess Ring Stock';
        $page_description = 'Some description for the excess stock';

        return view('admin.excess_stock.ring', compact('page_title', 'page_description'));
    }

}
