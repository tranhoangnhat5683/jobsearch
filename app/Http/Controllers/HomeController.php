<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('jobsearch/index');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function search()
	{
		return view('jobsearch/list');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function profile(Request $request)
	{
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

        $data = array();
        $arrResult = User::search($user, $skill);
        if (!empty($arrResult)) {
        	$arrResult = array_values($arrResult);
        	$data = $arrResult[0];
        }
		return view('jobsearch/profile', $data);
	}
}
