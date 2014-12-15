<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		if(Auth::user()->user_type == 'Administrator')
			return View::make('dashboard.admin');
		else{
			$adminlist = User::where('user_type','=','Administrator')->get();
			$leavelist = Leave::get();
			// dd($adminlist);
			return View::make('dashboard.employee',compact('adminlist','leavelist'));
		}

	}

}
