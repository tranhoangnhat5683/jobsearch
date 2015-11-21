<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller {

    public function search(Request $request) {
        $location = $request->input('location');
        $skill_ids = array_filter(explode(',', $request->input('skill', '')));
        $character_ids = array_filter(explode(',', $request->input('character`', '')));

        return User::search($location, $skill_ids, $character_ids);
    }
    public function get(Request $request) {
        $id = $request->input('id');
        return User::get($id);
    }

}