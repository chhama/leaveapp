<?php

class LeaveController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$leaveAll = Leave::orderby('type')->paginate();
		$index = $leaveAll->getPerPage() * ($leaveAll->getCurrentPage()-1) + 1;
		return View::make('leave.index',array(
										'leaveAll'=>$leaveAll,
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
		$credentials = array(
				'type' 			=> 'required',
				'max_allowed'	=> 'required'
				);
		$validator	= Validator::make(Input::all(),$credentials);
		if($validator->fails()){
			return Redirect::to('leave')
								->withErrors($validator)
								->withInput(Input::all())
								->with(['flash_message'=>'Type & Max Allowed is required.']);
		} else {
			$leave = new Leave();
			$leave->type			= Input::get('type');
			$leave->max_allowed 	= Input::get('max_allowed');
			if($leave->save())
			return Redirect::back()->with(['flash_message'=>'Leave successfully created']);
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
		$credentials = array(
				'type' 			=> 'required',
				'max_allowed'	=> 'required'
				);
		$validator	= Validator::make(Input::all(),$credentials);
		if($validator->fails()){
			return Redirect::to('leave')
								->withErrors($validator)
								->withInput(Input::all())
								->with(['flash_message'=>'Type & Max Allowed is required.']);
		} else {
			$leave = Leave::find($id);
			$leave->type			= Input::get('type');
			$leave->max_allowed 	= Input::get('max_allowed');
			if($leave->save())
			return Redirect::back()->with(['flash_message'=>'Leave successfully created']);
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
		//
	}


}
