<?php

namespace App\Classes\Helpers;
use Illuminate\Support\Facades\DB;

class DBHelper
{
    public function getLatest($table) {
        return DB::table($table)->latest()->first();
    }
}
