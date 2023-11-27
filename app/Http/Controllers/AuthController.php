<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function signin(Request $request) {
        $user = DB::table('users')->where([
            'username' => $request->username,
            'password' => $request->password
        ])->first();

        if ($user) return response(1);
        else return response(0);
    }
}
