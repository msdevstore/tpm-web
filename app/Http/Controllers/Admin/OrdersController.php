<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function all()
    {
        $page_title = 'All';
        $page_description = 'Some description for the orders';

        return view('admin.orders.all', compact('page_title', 'page_description'));
    }

    public function yetToStart()
    {
        $page_title = 'Yet to start';
        $page_description = 'Some description for the orders';

        return view('admin.orders.yet_to_start', compact('page_title', 'page_description'));
    }

    public function started()
    {
        $page_title = 'Started';
        $page_description = 'Some description for the orders';

        return view('admin.orders.started', compact('page_title', 'page_description'));
    }

    public function finished()
    {
        $page_title = 'Finished';
        $page_description = 'Some description for the orders';

        return view('admin.orders.finished', compact('page_title', 'page_description'));
    }

    public function shipped()
    {
        $page_title = 'Shipped';
        $page_description = 'Some description for the orders';

        return view('admin.orders.shipped', compact('page_title', 'page_description'));
    }

    public function paused()
    {
        $page_title = 'Paused';
        $page_description = 'Some description for the orders';

        return view('admin.orders.paused', compact('page_title', 'page_description'));
    }

    public function stamping()
    {
        $page_title = 'Stamping';
        $page_description = 'Some description for the orders';

        return view('admin.orders.stamping', compact('page_title', 'page_description'));
    }
}
