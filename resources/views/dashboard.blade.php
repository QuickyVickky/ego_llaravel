@extends('user.master')
@section('title','dashboard')
@section('content')
    @include('user.send_header')
    <div class="dashboard-body">
		<div class="no-activity">
			<div class="no-activity-inner">
				<div class="activity-inner-img">
					<img src=" {{ asset('front/images/No-Activity.svg') }}">
				</div>
				<div class="activity-inner-text">
					<p>This is where you’ll see your activity and transactions. <br>Choose how you’d like to get started.</p>
					<button type="button" id="SendMoney" class="btn btn-primary btn-fixwidth text-uppercase">Send money</button>
				</div>
			</div>
		</div>
		
	</div>