<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

$app->group(['middleware' => 'sqlmap_identifier'], function() use ($app) {
    $app->get('/', function () {
        return view('index');
    });

    $app->post('/', function (Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');
        $result = DB::select("SELECT * FROM users WHERE password = ? AND name = '$username'", [md5($password)]);

        if (count($result) === 1) {
            return view('admin');
        }
        return view('index', ['is_auth_failure' => true]);
    });
});