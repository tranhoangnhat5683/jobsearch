<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Character;

class CharacterController extends Controller {

    public function search() {
        return Character::search();
    }

}