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

        $employee = Auth::user()->name;
        $phone = User::where('id','=',Input::get('selectApprover'))->select('mobile')->first();

        include("../app/config/local/sms.php");
        
		$post = curl_init();
		curl_setopt($post, CURLOPT_URL, "$url/sendsms?uname=".$user."&pwd=".$password."&senderid=".$sender."&to=".$phone->mobile."&msg=".urlencode("New leave application from $employee. Please review the application.")."&route=T");
		//curl_setopt($post, CURLOPT_URL, "$url/sendsms?uname=".urlencode($user)."&pwd=".urlencode($pass)."&senderid=".urlencode($sender)."&to=".$phone."&msg=".urlencode("One Time Password for submitting Property Returns form is $otp.")."&route=T");

		if($leave->save() && curl_exec($post)){
			curl_close($post);
			return Redirect::back()->with(['flash_message'=>'Leave application submitted successfully.']);
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

	}

	public function accept($id)
	{
		$leave = LeaveTaken::find($id);
		$userleave = User::where('id','=',$leave->user_id)->first();
			if($leave->leave_id == 1){
				if($userleave->total_earned_leave - $leave->no_of_days >= 0){
					$userleave->total_earned_leave = $userleave->total_earned_leave - $leave->no_of_days;
					// $userleave->save();
				}
				else
					return Redirect::back()->with(['flash_message'=>'Not enough Earned Leave remaining.']);
			}
			if($leave->leave_id == 2) {
				if($userleave->total_half_pay_leave - $leave->no_of_days >= 0){
					$userleave->total_half_pay_leave = $userleave->total_half_pay_leave - $leave->no_of_days;
					// $userleave->save();
				}
				else
					return Redirect::back()->with(['flash_message'=>'Not enough Half Pay Leave remaining.']);
			}
		$leave->status = "Approved";

		$phone = User::where('id','=',$leave->user_id)->select('mobile')->first();
        include("../app/config/local/sms.php");
        
		$post = curl_init();
		curl_setopt($post, CURLOPT_URL, "$url/sendsms?uname=".$user."&pwd=".$password."&senderid=".$sender."&to=".$phone->mobile."&msg=".urlencode("Your application for Earned Leave from $leave->leave_from to $leave->leave_to is approved. Remaining Earned leave: $userleave->total_earned_leave. Remaining Half Pay leave: $userleave->total_half_pay_leave.")."&route=T");

		if($leave->save() && $userleave->save() && curl_exec($post)) {
			curl_close($post);
			return Redirect::back()->with(['flash_message'=>'Leave Application Approved']);
		}
	}

	public function reject($id)
	{
		$leave = LeaveTaken::find(Input::get('leave_id'));
		$leave->status = "Rejected";
		$leave->remark = Input::get('reject_remark');

		$phone = User::where('id','=',$leave->user_id)->select('mobile')->first();
        include("../app/config/local/sms.php");
        
		$post = curl_init();
		curl_setopt($post, CURLOPT_URL, "$url/sendsms?uname=".$user."&pwd=".$password."&senderid=".$sender."&to=".$phone->mobile."&msg=".urlencode("Your application for Earned Leave from $leave->leave_from to $leave->leave_to has been rejected. Login to view the remark.")."&route=T");

		if($leave->save() && curl_exec($post)){
			curl_close($post);
			return Redirect::back()->with(['flash_message'=>'Leave Rejected']);
		}
	}


}
