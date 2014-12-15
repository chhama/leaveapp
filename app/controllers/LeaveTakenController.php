<?php

class LeaveTakenController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		// $ga= strtotime(Input::get('dateto')) - strtotime(Input::get('datefrom'));	
		     // echo floor($ga/(60*60*24));

		$leave = new LeaveTaken();

		$leave->user_id = Auth::user()->id;
		$leave->leave_id = Input::get('selectLeave');
		$leave->leave_from = Input::get('datefrom');
		$leave->leave_to = Input::get('dateto');
		$leave->no_of_days = Input::get('totaldays');
		$leave->apply_to = Input::get('selectApprover');
		$leave->status = 'Submitted';
		$leave->reason = Input::get('reason');
		$leave->remark = '';

		if($leave->save())
			return Redirect::back()->with(['flash_message'=>'Leave application submitted successfully.']);
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


}
