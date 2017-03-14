$(initPage);

function initPage() {
	var $openingDate   = $('#openingDate'),
		$formFortnight = $('#formFortnight'),
		$addSpending   = $('#addSpending'),
		$addEntry      = $('#addEntry'),
		$spendings     = $('#spendings'),
		$entries       = $('#entries'),
		$addFortnight  = $('#addFortnight'),
		totalSpendings = 1,
		totalEntries   = 1;

	// validating form
	$formFortnight.validate({
		rules: {
			name: 'required',
			initialAmount: {
				required: true,
				number: true
			},
			openingDate: 'required'
		}
	});

	// datepicker
	$openingDate.datepicker({
		format:   'dd/mm/yyyy',
		autoclose: true
	});

	// adding spending
	$addSpending.on('click', function(event) {
		var html = '<div class="form-group" id="spending_' + totalSpendings + '">' +
			'<label for="" class="control-label col-sm-2 col-md-3">Spending:</label>' +
			'<div class="col-sm-5 col-md-4">' +
			'<input type="text" name="spendingName[]" id="" class="form-control" placeholder="Name">' +
			'</div>' +
			'<div class="col-sm-4 col-md-3">' +
			'<div class="input-group">' +
			'<span class="input-group-addon">$</span>' +
			'<input type="text" name="spendingAmount[]" id="" class="form-control" placeholder="Amount">' +
			'</div>' + 
			'</div>' +
			'<div class="col-sm-1 col-md-1">' +
			'<button type="button" class="btn btn-default btn-sm deleteSpending" data-spending="' + totalSpendings + '">x</button>' + 
			'</div>'
			'</div>';

		$spendings.append(html);
		totalSpendings++;
	});

	// remove an spending
	$spendings.on('click', '.deleteSpending', function() {
		var numSpending = $(this).data('spending');

		$('#spending_' + numSpending).remove();
	});

	// adding an entry
	$addEntry.on('click', function(event) {
		var html = '<div class="form-group" id="entry_' + totalEntries + '">' +
			'<label for="" class="control-label col-sm-2 col-md-3">Entry:</label>' +
			'<div class="col-sm-5 col-md-4">' +
			'<input type="text" name="entryName[]" id="" class="form-control" placeholder="Name">' +
			'</div>' +
			'<div class="col-sm-4 col-md-3">' +
			'<div class="input-group">' +
			'<span class="input-group-addon">$</span>' +
			'<input type="text" name="entryAmount[]" id="" class="form-control" placeholder="Amount">' +
			'</div>' + 
			'</div>' +
			'<div class="col-sm-1 col-md-1">' +
			'<button type="button" class="btn btn-default btn-sm deleteEntry" data-entry="' + totalEntries + '">x</button>' + 
			'</div>'
			'</div>';

		$entries.append(html);
		totalEntries++;
	});

	// remove an entry
	$entries.on('click', '.deleteEntry', function(event) {
		var numEntry = $(this).data('entry');

		$('#entry_' + numEntry).remove();
	});

	// save fortnight
	$addFortnight.on('click', function() {
		if ($formFortnight.valid()) {
			
		}
	});
}