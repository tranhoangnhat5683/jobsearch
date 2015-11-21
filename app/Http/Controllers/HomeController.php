<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Utils\Common;

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

	protected $params;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	private function _buildParams(Request $request) {
		return [
			'location'  => $request->input('location'),
			'skill'     => array_filter($request->input('skill', array())),
			'character' => array_filter($request->input('character', array())),
			'gender'    => $request->input('gender', ''),
        ];
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
	public function search(Request $request)
	{
        $parms = $this->_buildParams($request);
        $arrResult = User::search($parms);

        $data = [];
        if (!empty($arrResult)) {
        	$arrResult = $this->buildProfileInfo($arrResult);
        	$data = array('profiles' => array_values($arrResult));
        }

		// return response()->json($data);
		return view('jobsearch/list', $data);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function profile(Request $request)
	{
		$data      = array();
		$identity  = $request->input('identity');
		$arrResult = User::get(array($identity));

        if (!empty($arrResult)) {
        	$arrResult = $this->buildProfileInfo($arrResult);
        	$data = $arrResult[0];

        	// return response()->json($data);
        }
		return view('jobsearch/profile', $data);
	}

	private function buildProfileInfo($list){
		$result = empty($list) ? array() : $list;
		foreach ($result as &$profile) {
			if (!empty($profile['skills'])) {
        		$skill_list = array_column($profile['skills'], 'name');
        		$profile['skill_list'] = implode(' , ', $skill_list);
        	}
        	if (!empty($profile['hobbies'])) {
        		$profile['hobby_list'] = implode(' , ', $profile['hobbies']);
        	}
    		$profile['avatar'] = "http://graph.facebook.com/{$profile['identity']}/picture?height=150&width=150";
		}
		return $result;
	}
}
