<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Page;
use App\Character;
use App\Skill;
use DB;

class ApiController extends Controller {

    public function __construct() {
        //$this->middleware('auth.basic', ['only' => 'store']);
//        $this->middleware('jwt.auth');
    }

    /**
     * params: profile, skill, eq 
     * @return [type] [description]
     */
    public function search() {
    }

    /**
     * params: identity
     * @return [type] [description]
     */
    public function stream() {
    }

    public function characteristic()
    {

    }

    public function searchSkill()
    {
        return Skill::search();
    }

    public function getProfile(Request $request)
    {
        $identity = $request->input('identity', '100005965563483');
        $skill = $request->input('skill', 'Javascript');
        
        return User::search($identity, $skill);
    }
}