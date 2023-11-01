<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuotesController extends Controller
{

    public function newQuotes()
    {
        $page_title = 'New Quotes';
        $page_description = 'Some description for the Quotes';

        return view('admin.quotes.new_quotes', compact('page_title', 'page_description'));
    }

    public function pricingSearch()
    {
        $page_title = 'Pricing Search';
        $page_description = 'Some description for the Quotes';

        return view('admin.quotes.pricing_search', compact('page_title', 'page_description'));
    }

}
