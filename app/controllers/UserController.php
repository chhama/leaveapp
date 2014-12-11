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
		//dd($userAll);
		return View::make('user.index',array('userAll'=>$userAll));
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
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
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


}
