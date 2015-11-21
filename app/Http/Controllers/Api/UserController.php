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
        $gender = array_filter(explode(',', $request->input('gender`', '')));

        return User::search(['location' => $location, 'skill' => $skill_ids, 'character' => $character_ids, 'gender' => $gender]);
    }
    public function get(Request $request) {
        $ids = $request->input('id');
        return User::get(explode(',', $ids));
    }

}