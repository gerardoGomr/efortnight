@extends('layouts.app')

@section('content')
	<h1>Start registering your fortnights!</h1>
	<p class="lead">Please sign up in order to register all your fortnights. Fill out the required fields and then press register button. You'll be redirected to your new welcome page.</p>

	{!! BootForm::open(['url' => 'sign-up']) !!}
	{!! BootForm::text('name') !!}
	{!! BootForm::text('initialAmount', 'Initial Amount') !!}
	{!! BootForm::submit('Sign Up') !!}
	{!! BootForm::close() !!}
@stop