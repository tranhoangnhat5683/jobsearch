<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skill;

class SkillController extends Controller {

    public function search(Request $request) {
        $name = $request->input('name');
        return Skill::search($name);
    }

}