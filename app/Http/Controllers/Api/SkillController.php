<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Skill;

class SkillController extends Controller {

    public function search() {
        return Skill::search();
    }

}