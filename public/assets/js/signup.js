	$(document).ready(function() {
		$(document).on('click', '#next_btn', function() {
			$(this).parent().remove();
			$('#steptwo').show();
		});

		$(document).on('click', '#step_next_btn', function() {
			$('#plans').show();
			$('#step_next_btn').hide();
		});

		$(document).on('click', '#plans_btn', function() {
			$('#pay_options').show();
			$('#plans_btn').hide();
		});

		var year = new Date();
        year.setDate(year.getDate() - 6570);
        var minDate = year.toISOString().substring(0, 10);
        $('#date_of_birth').attr('max', minDate);
        $('#date_of_birth').attr('placeholder', minDate);

		// Hide all input elements in the pay_options div
		  $('#pay_options p').hide();

		  $('#plan-1 input[type="radio"]').click(function(){
			var num = $('#price-1').text();
			$('#amount-1').text(num + " dollars");
			$('#amount-2').text(num + " dollars");
			$('#amount-3').text(num + " dollars");
			$('#amount-4').text(num + " dollars");
            $('input[name="amount"]').attr('value', num);
		  });

          $('#plan-2 input[type="radio"]').click(function(){
			var num = $('#price-2').text();
			$('#amount-1').text(num + " dollars");
			$('#amount-2').text(num + " dollars");
			$('#amount-3').text(num + " dollars");
			$('#amount-4').text(num + " dollars");
			$('input[name="amount"]').attr('value', num);
		  });

          $('#plan-3 input[type="radio"]').click(function(){
			var num = $('#price-3').text();
			$('#amount-1').text(num + " dollars");
			$('#amount-2').text(num + " dollars");
			$('#amount-3').text(num + " dollars");
			$('#amount-4').text(num + " dollars");
			$('input[name="amount"]').attr('value', num);
		  });

		  $('#pay-1 input[type="radio"]').click(function() {
				$('#pay_options p').hide();
				$('#pay-1 p').show();
				$('#pay_options input[type="text').prop('name',false).prop('required', false);
				$('#pay-1 input[type="text').prop('name','trans_ID').prop('required', true);

				$('#submit_btn').show();
			});

			$('#pay-2 input[type="radio"]').click(function() {
				$('#pay_options p').hide();
				$('#pay-2 p').show();
				$('#pay_options input[type="text').prop('name',false).prop('required', false);
				$('#pay-2 input[type="text').prop('name','trans_ID').prop('required', true);

				$('#submit_btn').show();
			});

			$('#pay-3 input[type="radio"]').click(function() {
				$('#pay_options p').hide();
				$('#pay-3 p').show();
				$('#pay_options input[type="text').prop('name',false).prop('required', false);
				$('#pay-3 input[type="text').prop('name','trans_ID').prop('required', true);

				$('#submit_btn').show();
			});

			$('#pay-4 input[type="radio"]').click(function() {
				$('#pay_options p').hide();
				$('#pay-4 p').show();
				$('#pay_options input[type="text').prop('name',false).prop('required', false);
				$('#pay-4 input[type="text').prop('name','trans_ID').prop('required', true);

				$('#submit_btn').show();
			});

	});
