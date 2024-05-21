	$(document).ready(function() {

		var year = new Date();
        year.setDate(year.getDate() + 1);
        var minDate = year.toISOString().substring(0, 10);
        $('#appoint_date').attr('min', minDate);
        $('#appoint_date').attr('placeholder', minDate);

	});
