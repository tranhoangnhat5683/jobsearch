<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller {

    public function search(Request $request) {
        $identity = $request->input('identity');
        $skill_name = $request->input('skill');

        $user = [];
        if ($identity)
        {
            $user['identity'] = $identity;
        }
        $skill = [];
        if ($skill_name)
        {
            $skill['name'] = $skill_name;
        }

        return User::search($user, $skill);
    }

}