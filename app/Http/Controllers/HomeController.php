<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Utils\Common;
use App\Skill;
use App\Location;
use App\Character;
use Vinelab\Http\Client as HttpClient;
use \Config;

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
    protected $colors;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
        $this->colors = [
            '62' => 'green',
            '63' => 'blue',
            '​64' => 'yellow',
            '65' => 'red',
            '66' => 'purple',
            '77' => 'green',
            '78' => 'blue',
            '79' => 'red',
            '80' => 'red',
            '81' => 'purple',
            '123' => 'yellow',
        ];
	}

	private function _buildParams(Request $request) {
		return [
			'location'  => $request->input('location', array()),
			'skill'     => $request->input('skill', array()),
			'character' => $request->input('character', array()),
			'gender'    => $request->input('gender', ''),
        ];
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$data = [];

		$skills = Skill::search();
		$data['skills'] = array_column($skills, 'name', 'id');

        $locations = Location::search();
        $data['locations'] = array_column($locations, 'name', 'id');

        $characters = Character::search();
        $data['characters'] = array_column($characters, 'name', 'id');

		return view('jobsearch/index_1', $data);
	}

	public function home(Request $request)
	{
		$data = [];

		$skills = Skill::search();
		$data['skills'] = array_column($skills, 'name', 'id');

        $locations = Location::search();
        $data['locations'] = array_column($locations, 'name', 'id');

        $characters = Character::search();
        $data['characters'] = array_column($characters, 'name', 'id');

		return view('home', $data);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function search(Request $request)
	{
        $params = $this->_buildParams($request);
        $arrResult = User::search($params);

        $data = [];
        if (!empty($arrResult)) {
        	$arrResult = $this->buildProfileInfo($arrResult);
        	$data = array('profiles' => $arrResult);
        }
		return response()->json($data);

		return view('jobsearch/list_1', $data);
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
        }

        $client = new HttpClient;
        $url    = Config::get('app.api');
        try {
            $response           = $client->get($url.'/stream?identity='.$identity);
            $data['activities'] = $response->json(true);
        } catch(Exeption $e) {

        }
        $data['characters_colors'] = $this->colors;

        // return response()->json($data);

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
        	if (!empty($profile['pages'])) {
        		$page_list = array_column($profile['pages'], 'name');
        		$profile['page_list'] = implode(' , ', $page_list);
        	}
    		$profile['avatar'] = "http://graph.facebook.com/{$profile['identity']}/picture?height=150&width=150";
		}
		return $result;
	}
}
