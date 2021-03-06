<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userAll = User::orderby('name')->paginate();
		$index = $userAll->getPerPage() * ($userAll->getCurrentPage()-1) + 1;
		return View::make('user.index',array(
										'userAll'=>$userAll,
										'index'=>$index
										));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User();
		$credentials = array(
				'username' 		=> 'required|unique:'.$user->getTable().',username',
				'employee_id' 	=> 'required|unique:'.$user->getTable().',employee_id',
				'mobile' 		=> 'required|unique:'.$user->getTable().',mobile',
				'email' 		=> 'required|email|unique:'.$user->getTable().',email',
				'password'		=> 'required'
				);
		$validator	= Validator::make(Input::all(),$credentials);
		if($validator->fails()){
			return Redirect::to('user')
								->withErrors($validator)
								->withInput(Input::all())
								->with(['flash_message'=>'Username/Employee ID/Mobile/email should be unique']);
		} else {
			$user = new User();
			$user->employee_id		= Input::get('employee_id');
			$user->name 			= Input::get('name');
			$user->mobile 			= Input::get('mobile');
			$user->username 		= Input::get('username');
			$user->password 		= Hash::make(Input::get('password'));
			$user->user_type 		= Input::get('user_type');
			$user->sex 				= Input::get('sex');
			$user->date_of_birth	= Input::get('date_of_birth');
			$user->email 			= Input::get('email');
			$user->group 			= Input::get('group');
			$user->entry_into_service	= Input::get('entry_into_service');
			$user->superannuation_date	= Input::get('superannuation_date');
			$user->total_earned_leave 	= Input::get('total_earned_leave');
			$user->total_half_pay_leave	= Input::get('total_half_pay_leave');
			$user->remember_token 	= Input::get('_token');
			if($user->save())
			return Redirect::back()->with(['flash_message'=>'User successfully created']);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$userById = User::find($id);
		return View::make('user.show')->with(array(
										'userById'	=> $userById
										));
	}

	public function updateProfile($id){
		$user = new User();
		$credentials = array(
				'username' 		=> 'required|unique:'.$user->getTable().',username,'.$id,
				'employee_id' 	=> 'required|unique:'.$user->getTable().',employee_id,'.$id,
				'mobile' 		=> 'required|unique:'.$user->getTable().',mobile,'.$id,
				'email' 		=> 'required|email|unique:'.$user->getTable().',email,'.$id
				);
		$validator	= Validator::make(Input::all(),$credentials);
		if($validator->fails()){
			return Redirect::to('user.show',Auth::user()->id)
								->withErrors($validator)
								->withInput(Input::all())
								->with(['flash_message'=>'Username/Employee ID/Mobile/email should be unique']);
		} else {
			$user = User::find($id);
			$user->employee_id		= Input::get('employee_id');
			$user->name 			= Input::get('name');
			$user->mobile 			= Input::get('mobile');
			$user->username 		= Input::get('username');
			if(strlen(Input::get('password')) > 0)
				$user->password 	= Hash::make(Input::get('password'));
			$user->sex 				= Input::get('sex');
			$user->date_of_birth	= Input::get('date_of_birth');
			$user->email 			= Input::get('email');
			$user->group 			= Input::get('group');
			$user->entry_into_service	= Input::get('entry_into_service');
			$user->superannuation_date	= Input::get('superannuation_date');
			$user->total_earned_leave 	= Input::get('total_earned_leave');
			$user->total_half_pay_leave	= Input::get('total_half_pay_leave');
			$user->remember_token 	= Input::get('_token');
			if($user->save())

			return Redirect::back()->with(['flash_message'=>'User successfully Updated']);
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$userAll = User::orderBy('name')->paginate();
		$index = $userAll->getPerPage() * ($userAll->getCurrentPage()-1) + 1;
		$userById = User::find($id);
		return View::make('user.edit')->with(array(
										'userById'	=> $userById,
										'userAll'	=> $userAll,
										'index'		=> $index
										));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = new User();
		$credentials = array(
				'username' 		=> 'required|unique:'.$user->getTable().',username,'.$id,
				'employee_id' 	=> 'required|unique:'.$user->getTable().',employee_id,'.$id,
				'mobile' 		=> 'required|unique:'.$user->getTable().',mobile,'.$id,
				'email' 		=> 'required|email|unique:'.$user->getTable().',email,'.$id,
				'password'		=> 'required,'.$id
				);
		$validator	= Validator::make(Input::all(),$credentials);
		if($validator->fails()){
			return Redirect::to('user')
								->withErrors($validator)
								->withInput(Input::all())
								->with(['flash_message'=>'Username/Employee ID/Mobile/email should be unique']);
		} else {
			$user = User::find($id);
			$user->employee_id		= Input::get('employee_id');
			$user->name 			= Input::get('name');
			$user->mobile 			= Input::get('mobile');
			$user->username 		= Input::get('username');
			if(strlen(Input::get('password')) > 0)
				$user->password 	= Hash::make(Input::get('password'));
			$user->user_type 		= Input::get('user_type');
			$user->sex 				= Input::get('sex');
			$user->date_of_birth	= Input::get('date_of_birth');
			$user->email 			= Input::get('email');
			$user->group 			= Input::get('group');
			$user->entry_into_service	= Input::get('entry_into_service');
			$user->superannuation_date	= Input::get('superannuation_date');
			$user->total_earned_leave 	= Input::get('total_earned_leave');
			$user->total_half_pay_leave	= Input::get('total_half_pay_leave');
			$user->remember_token 	= Input::get('_token');
			if($user->save())

			return Redirect::back()->with(['flash_message'=>'User successfully Updated']);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
		return Redirect::route('user.index')->with(['flash_message'=>'User successfully Deleted']);
	}

	public function login(){
		return View::make('login');
	}

	public function authenticate(){
		$rules = array(
			'username' => 'required',
			'password' => 'required'
			);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
		{
			return Redirect::route('login')->withErrors($validator);
		}
		else
		{
			$attempt = Auth::attempt([
					'username' => Input::get('username'),
					'password' => Input::get('password')
				]);

			if ($attempt) {
				return Redirect::to('/');
			}
			else
				return Redirect::to('login')->with(['flash_message'=>'Invalid Username or Password'])->withInput();
		}
	}

	public function logout(){
		Auth::logout();
		return Redirect::to('login');
	}

	public function forgotpassword(){
		return View::make('user.forgotpassword');
	}

	public function submitforgot(){
		$username = Input::get('username');
		$pass = rand(1000,9999);
		$mobile = Input::get('mobile');

		$userId = User::where('username','=',$username)
						->where('mobile','=',$mobile)
						->pluck('id');
		if($userId) {
			include("../app/config/local/sms.php");
			$post = curl_init();
			curl_setopt($post, CURLOPT_URL, "$url/sendsms?uname=".$user."&pwd=".$password."&senderid=".$sender1."&to=".$mobile."&msg=".urlencode("Your temporary password is $pass. Change it on your next login.")."&route=T");
			//curl_setopt($post, CURLOPT_URL, "$url/sendsms?uname=".urlencode($user)."&pwd=".urlencode($pass)."&senderid=".urlencode($sender)."&to=".$phone."&msg=".urlencode("One Time Password for submitting Property Returns form is $otp.")."&route=T");
			curl_exec($post);
			curl_close($post);

			$user = User::find($userId);
			$user->password = Hash::make($pass);
			$user->save();

			return Redirect::to('login')->with(['flash_message'=>'Password Successfully Reset And New Password is Send to Your Mobile'])->withInput();	
		} else {
			return Redirect::back()->with(['flash_message'=>'Username and Mobile No is not Match.'])->withInput();	
		}
	}


}
