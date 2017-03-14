@extends('layouts.app')

@section('content')
	<h2>Add a new fortnight</h2>
	{!! BootForm::horizontal(['url' => '/fortnight/create', 'id' => 'formFortnight']) !!}
	{!! BootForm::text('name', 'Name:') !!}
	
	<div class="form-group">
		<label for="initialAmount" class="control-label col-sm-2 col-md-3">Initial amount:</label>
		<div class="col-sm-5 col-md-6">
			<div class="input-group">
				<span class="input-group-addon">$</span>
				<input type="text" name="initialAmount" id="initialAmount" class="form-control">
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<label for="openingDate" class="control-label col-sm-2 col-md-3">Opening date:</label>
		<div class="col-sm-5 col-md-6">
			<input type="text" name="openingDate" id="openingDate" class="form-control" readonly>
		</div>
	</div>

	<hr>
	<p>Also, you can add some spendings you have already made... or no one!</p>
	<button type="button" id="addSpending" class="btn btn-default">Add spending</button>
	<div id="spendings"></div>

	<hr>
	<p>You can add some entries you have get... or no one!</p>
	<button type="button" id="addEntry" class="btn btn-default">Add entry</button>
	<div id="entries"></div>

	{!! BootForm::button('Create fortnight', ['id' => 'addFortnight']) !!}
	{!! BootForm::close() !!}
@stop

@section('js')
	<script src="/js/fortnights/add.js"></script>
@stop