(function($){
	$(document).ready(function(){
		$('.print-btn').click(function(){
			var url = $(this).data('url');
			if (typeof url == "undefined") return;
			window.open(url,'print', 'width=800,height=600,location=no,menubar=no,toolbar=no,scrollbars=1');
		});

		$( "#bla input[type=checkbox]" ).click(function(){
			if ($(this).is(':checked')) {
				$(this).parent().parent().parent().parent().find('button').addClass('btn-danger');
			}else {
				var isDanger = true;
				$('.unchecked input[type=checkbox]').each(function(i){
					if ($(this).is(':checked')) {
						isDanger = false; 
						return false;
					}					
				})
				
				if(isDanger) $(this).parent().parent().parent().parent().find('button').removeClass('btn-danger');
			}
		});

		$( ".t_input" ).keyup(function(){
			if ($(this).val() != '') {
				$(this).parent().parent().addClass('btn-danger');
			}else{
				$(this).parent().parent().removeClass('btn-danger');
			}
		});
	});
})(jQuery);




