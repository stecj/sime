Serhas = {};

Serhas.scroll = {
	'offset'	: '200',
	'duration'	: '500',
	'animate'	: function (target) {
		$('html,body').animate({scrollTop:$(target).offset().top - this.offset}, this.duration); // Animate the scroll to this link's href value
	},
	'setData'	: function (data) {
		$('#result').html(data.result);
	}
};



jQuery(function ($) {
	
				
			// checkbox-all 7===============================================
			$(document).ready(function() {
			$('#selecctall7').click(function(event) {  //on click 
			
					if(this.checked) { // check select status
						$('.checkbox7').each(function() { //loop through each checkbox
							this.checked = true;  //select all checkboxes with class "checkbox1"               
						});
					}else{
						$('.checkbox7').each(function() { //loop through each checkbox
							this.checked = false; //deselect all checkboxes with class "checkbox1"                       
						});         
					}
				});
			
			});
		
							
			
	// checkbox-all COPIA SEGURIDAD===============================================
			//$(document).ready(function() {
//			$('#selecctall1').click(function(event) {  //on click 
//			
//					if(this.checked) { // check select status
//						$('.checkbox1').each(function() { //loop through each checkbox
//							this.checked = true;  //select all checkboxes with class "checkbox1"               
//						});
//					}else{
//						$('.checkbox1').each(function() { //loop through each checkbox
//							this.checked = false; //deselect all checkboxes with class "checkbox1"                       
//						});         
//					}
//				});
//			
//			});


	// Placeholder =============================================================
	
	$('select.placeholder').each(togglePlaceholder);
	$('select.placeholder').change(togglePlaceholder);
	
	function togglePlaceholder () {
		var $this = $(this);
		if ($this.val()) $this.removeClass('placeholder');
		else $this.addClass('placeholder');
	}
	
	// Select ajax =============================================================
	
	$('select.ajax').change(getOptions);
	$('select.ajax').each(getOptions);
	
	function getOptions() {
		var $this = $(this),
			val = $this.val(),
			action = $this.data('action'),
			url = ['/ajax', action, val].join('/'),
			$target = $($this.data('target'));
		
		$.get(url).done(function (data) {
			$target.html(data);
			$target.addClass('placeholder');
		});
	}

	// Select ajax multiple ====================================================
	
	$('select.ajax-multiple').change(getOptionsMultiple);
	$('select.ajax-multiple').each(getOptionsMultiple);
	
	function getOptionsMultiple() {
		if ( ! $(this).val()) return;
		
		var $this = $(this),
			$action = $this.data('action'),
			$val = $this.val().join('-'),
			$url = ['','ajax', $action, $val].join('/') + '?multiple=true',
			$target = $($this.data('target'));
		
		$.get($url).done(function (data) {
			$target.html(data);
		});
	}
	
	// nav-navbar-toggle =======================================================
	
	$('.nav-navbar-toggle').click(toggleNavbar);
	
	function toggleNavbar () {
		var $navbar = $('.nav-navbar'),
			$body = $('body');
			
		if ($navbar.hasClass('show')) {
			$navbar.removeClass('show');
			$body.removeClass('navbar');
			Saes.scroll.offset = 70;
		} else {
			$navbar.addClass('show');
			$body.addClass('navbar');
			Saes.scroll.offset = 200;
		}
	}
	
	// Start ===================================================================
	
	$('.start-select-all').click(function () {
		var $select = $(this).parent().find('select');
		
		$select.find('option').prop('selected', true);
		if ($select.hasClass('ajax-multiple')) $select.each(getOptionsMultiple);
	});
	
	// Calculator ==============================================================
	
	// - Alternative document
	$('.alt-doc-cb').change(toggleAlternative);
	$('.alt-doc-cb').each(toggleAlternative);
	
	function toggleAlternative () {
		var $this = $(this),
			$altDoc = $this.closest('.row').find('.alt-doc');
		
		if ($this.prop('checked')) {
			$altDoc.removeClass('hidden').find('input').prop('required', true);
		} else {
			$altDoc.addClass('hidden').find('input')./*val('').*/prop('required', false);
		}
	}
	
	// - Accomplishment
	$('.concept-accomp').change(toggleQuality);
	$('.concept-accomp').each(toggleQuality);
	
	function toggleQuality () {
		var $this = $(this),
			$quality = $this.closest('.row').find('.concept-quality');
		
		if ($this.prop('checked')) {
			$quality.prop('required', true).prop('disabled', false);
		} else {
			$quality.val('').addClass('placeholder').prop('required', false).prop('disabled', true);
		}
	}
	
	// - Form Standard
	$('.form-standard').submit(function (e) {
		e.preventDefault();
		
		var $this = $(this),
			$action = $this.attr('action'),
			$data = $this.serialize(),
			$button = $this.find('.btn-standard-save');
		
		//console.log($data);
		$button.prop('disabled', true);
		
		$.post($action, $data).done(function (data) {
			//console.log(data);
			
			data = JSON.parse(data);
			if (data.status == 'ok') {
				$('#result').html(data.result);
				$button.prop('disabled', false);
			}
		});
	});
	
});

/* =============================================================

    Smooth Scroll 1.1
    Animated scroll to anchor links.

    Script by Charlie Evans.
    http://www.sycha.com/jquery-smooth-scrolling-internal-anchor-links

    Rebounded by Chris Ferdinandi.
    http://gomakethings.com

    Free to use under the MIT License.
    http://gomakethings.com/mit/
    
 * ============================================================= */

(function ($) {
	
	
			
    jQuery(document).ready(function ($) {
        //$(".scroll").click(function(event){ // When a link with the .scroll class is clicked
        $('a[href*=#]').click(function (e){ // When a link with the .scroll class is clicked
			if ($(this).attr('href') == '#') return;
            e.preventDefault(); // Prevent the default action from occurring
			
			Serhas.scroll.animate(this.hash);
        });
		
		hash = document.location.hash;
		
		if (hash) {
			Serhas.scroll.animate(hash);
		}
		
		$('#criterion-standard option').click(function () {
			var target = $(this).data('target');
			console.log(target);
			
			Serhas.scroll.animate(target);
		})
		
    });
})(jQuery);

$(window).on('hashchange', function() {
	
});


	
