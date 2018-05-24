jQuery(document).ready(function($){
	var $form_modal = $('.addressdialog'),
		$main_nav = $('#tan');

	//弹出窗口
	$main_nav.on('click', function(event){

			$form_modal.attr('style','visibility:visible;');	
			
		
	});

	//关闭弹出窗口
	$('.addressdialog-close').on('click', function(event){

			$form_modal.removeClass('is-visible');
	});
	//使用Esc键关闭弹出窗口
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		$form_modal.removeClass('is-visible');
	    }
    });

	