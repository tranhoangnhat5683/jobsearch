<?php

namespace App\Http\Controllers;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Joke;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Neo;

class TestController extends Controller {

    public function __construct() {
        //$this->middleware('auth.basic', ['only' => 'store']);
//        $this->middleware('jwt.auth');
    }

    public function angular() {
        return view('angular');
    }

    public function neo() {
        $user = Neo::create(['name' => 'Some Name', 'email' => 'some@email.com']);
    }

}