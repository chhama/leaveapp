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
		if(Auth::user()->user_type == 'Administrator'){
			$adminlist = User::where('user_type','=','Administrator')->get();
			$leavelist = Leave::get();
			$pending_leave=LeaveTaken::where('apply_to','=',Auth::user()->id)->where('status','=','submitted')->join('users','users.id','=','leave_taken.user_id')->join('leave','leave_taken.leave_id','=','leave.id')->paginate(10,['users.name as username','reason','leave_from','leave_to','no_of_days','leave_taken.id as leave_id','leave.type as leave_type','users.total_earned_leave','users.total_half_pay_leave']);
			return View::make('dashboard.admin',compact('pending_leave','adminlist','leavelist'));
		}
		else{
			$adminlist = User::where('user_type','=','Administrator')->get();
			$leavelist = Leave::get();
			// dd($adminlist);
			return View::make('dashboard.employee',compact('adminlist','leavelist'));
		}

	}

}
