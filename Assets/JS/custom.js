jQuery(function($)
	$('#ajax_form').on('submit', function(el){
        el.preventDefault();
        $.post(ajaxurl,{action: 'my_ajax_action', option1: el.target.AZ_option_1.value},function(val{
        	alert(val);
        )
	});

});
	