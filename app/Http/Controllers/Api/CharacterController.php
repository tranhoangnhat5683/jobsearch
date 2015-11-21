<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Character;

class CharacterController extends Controller {

    public function search(Request $request) {
        $name = $request->input('name');
        return Character::search($name);
    }

}