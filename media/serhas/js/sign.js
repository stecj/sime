jQuery(function ($) {
	
	
			
	// Placeholder =============================================================
	
	$('select.placeholder').each(togglePlaceholder);
	$('select.placeholder').change(togglePlaceholder);
	
	function togglePlaceholder () {
		var $this = $(this);
		if ($this.val()) $this.removeClass('placeholder');
		else $this.addClass('placeholder');
	}
	
	// Career Name =============================================================
	
	$('#signup-credit-type').change(toggleCareerName);
	$('#signup-credit-type').each(toggleCareerName);
	//toggleCareerName.call($('#signup-credit-type'));
	
	function toggleCareerName () {
		var $this = $(this), val = $this.val();
		if (val == 'provincia') {
			$('#signup-distrito-name').prop('required', false).hide();
			$('#signup-distrito-type').prop('required', false).hide();
		}
		else if (val == 'distrito') {
			$('#signup-distrito-name').prop('required', true).show();
			$('#signup-distrito-type').prop('required', true).show();
		}
	}
	
	// Committee member add ====================================================
	
	$('#signup-member-add').click(function () {
		var $table = $('.committee'),
			$tbody = $('tbody', $table),
			$row = $('tr:first', $tbody).clone(),
			n = $tbody.children().length;
		
		console.log(n);
		
		$row.find('input[type=radio]').prop('checked', false).val(n);
		$row.find('input[type=text]').val('').prop('required', false);
		$row.appendTo($tbody);
	});
	
	// Committee contact change ================================================
	
	$('.committee').on('change', 'input[type=radio]', changeContact);
	changeContact.call($('.committee input[type=radio]:checked'));
	
	function changeContact () {
		var $tr = $(this).parents('tr');
		$('.committee').find('input[type=text]').prop('required', false);
		$tr.find('input[type=text]').prop('required', true);
	}
	
	// Select ajax =============================================================
	
	$('select.ajax').change(getOptions);
	$('select.ajax').each(getOptions);
	
	function getOptions() {
		var $this = $(this),
			id = $this.val(),
			action = $this.data('action'),
			actions = (typeof action == 'string') ? [action] : action,
			//url = ['/ajax', $action, id].join('/'),
			target = $this.data('target'),
			targets = (typeof target == 'string') ? [target] : target,
			$targets = targets.map(function (a) { return $(a); }),
			i, n = actions.length;
			
		for (i = 0; i < n; i++) {
			url = '/ajax/' + [actions[i],id].join('/');
			
			callAjax(url, $targets[i]);
		}
	}
	
	function callAjax(url, $target) {
		$.get(url).done(function (data) {
			$target.html(data);
			$target.addClass('placeholder');
		});
	}
	
	// Input ajax ==============================================================
	
	$('input.ajax').blur(getResponse);
	//$('input.ajax').each(getResponse);
	
	function getResponse() {
		var $this = $(this),
			$wrapper = $this.parent(),
			val = $this.val(),
			action = $this.data('action'),
			url = [action, val].join('/'),
			alert = ['<p class="text-danger">', '</p>'];
		
		if ( ! val) return;
		
		$.get(url).done(function (data) {
			data = JSON.parse(data);
			
			$wrapper.find('p').remove();
			
			if (data.status == 'ok') {
				$wrapper.removeClass('has-error');
			} else {
				$wrapper.addClass('has-error');
				$wrapper.append(alert[0] + data.msg + alert[1]);
			}
		});
	}
		
		
	
});


		