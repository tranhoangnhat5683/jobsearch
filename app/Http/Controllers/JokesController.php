<?php

namespace App\Http\Controllers;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use App\Joke;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JokesController extends Controller {

    public function __construct() {
        //$this->middleware('auth.basic', ['only' => 'store']);
//        $this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {
        $search_term = $request->input('search');
        $limit = $request->input('limit')?$request->input('limit'):5;
 
        if ($search_term)
        {
            $jokes = Joke::where('body', 'LIKE', "%$search_term%")->with(
            array('User'=>function($query){
                $query->select('id','name');
            })
            )->select('id', 'body', 'user_id')->paginate($limit); 
 
            $jokes->appends(array(
                'search' => $search_term,
                'limit' => $limit
            ));
        }
        else
        {
            $jokes = Joke::with(
            array('User'=>function($query){
                $query->select('id','name');
            })
            )->select('id', 'body', 'user_id')->paginate($limit); 
 
            $jokes->appends(array(            
                'limit' => $limit
            ));
        }
        
        return response()->json($this->transformCollection($jokes), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        if(! $request->body or ! $request->user_id){
            return Response::json([
                'error' => [
                    'message' => 'Please Provide Both body and user_id'
                ]
            ], 422);
        }
        Joke::create($request->all());
 
        return Response::json([
                'message' => 'Joke Created Succesfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $joke = Joke::with(
            array('User'=>function($query){
                $query->select('id','name');
            })
        )->find($id);
 
        if(!$joke){
            return response()->json([
                'error' => [
                    'message' => 'Joke does not exist'
                ]
            ], 404);
        }
 
         // get previous joke id
        $previous = Joke::where('id', '<', $joke->id)->max('id');
 
        // get next joke id
        $next = Joke::where('id', '>', $joke->id)->min('id');        
 
        return response()->json([
            'previous_joke_id'=> $previous,
            'next_joke_id'=> $next,
            'data' => $this->transform($joke)
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        if(! $request->body or ! $request->user_id){
            return Response::json([
                'error' => [
                    'message' => 'Please Provide Both body and user_id'
                ]
            ], 422);
        }
        
        $joke = Joke::find($id);
        $joke->body = $request->body;
        $joke->user_id = $request->user_id;
        $joke->save(); 
 
        return Response::json([
                'message' => 'Joke Updated Succesfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        Joke::destroy($id);
    }

    private function transformCollection($jokes) {
        $jokesArray = $jokes->toArray();
        return [
            'total' => $jokesArray['total'],
            'per_page' => intval($jokesArray['per_page']),
            'current_page' => $jokesArray['current_page'],
            'last_page' => $jokesArray['last_page'],
            'next_page_url' => $jokesArray['next_page_url'],
            'prev_page_url' => $jokesArray['prev_page_url'],
            'from' => $jokesArray['from'],
            'to' =>$jokesArray['to'],
            'data' => array_map([$this, 'transform'], $jokesArray['data'])
        ];
    }

    private function transform($joke) {
        return [
            'joke_id' => $joke['id'],
            'joke' => $joke['body'],
            'submitted_by' => $joke['user']['name']
        ];
    }

}