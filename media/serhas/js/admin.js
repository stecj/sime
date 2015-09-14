jQuery(function () {
	
	// Career Name =============================================================
	
	$('#admin-credit-type').change(toggleCareerName);
	$('#admin-credit-type').each(toggleCareerName);
	//toggleCareerName.call($('#signup-credit-type'));
	
	function toggleCareerName () {
		var $this = $(this), val = $this.val();
		if (val == 'institucion') {
			$('#admin-career-type').prop('required', false).hide();
		}
		else if (val == 'carrera') {
			$('#admin-career-type').prop('required', true).show();
		}
	}
	
		
});

