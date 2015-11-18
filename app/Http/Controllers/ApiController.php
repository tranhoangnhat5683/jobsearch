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

    public function skill()
    {

    }

    public function getProfile(Request $request)
    {
        $identity = $request->input('identity', '100005965563483');
        $rowset = DB::select("MATCH (profile:User) WHERE profile.identity = '{$identity}' return profile LIMIT 1");
        $result = [];
        foreach($rowset as $row)
        {
            $result[] = $row['profile']->getProperties();
        }
        return $result;
    }
}