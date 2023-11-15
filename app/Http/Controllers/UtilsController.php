<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtilsController extends Controller
{
    public function getLatest($table)
    {
        return DB::table($table)->orderBy('id', 'desc')->first();
    }

    public function getAll($table, ?string $field = 'id')
    {
        return DB::table($table)->orderBy($field)->get();
    }

}
