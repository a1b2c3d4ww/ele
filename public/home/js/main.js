jQuery(document).ready(function($){
	var $form_modal = $('.addressdialog'),
		$main_nav = $('#tan');

	//��������
	$main_nav.on('click', function(event){

			$form_modal.attr('style','visibility:visible;');	
			
		
	});

	//�رյ�������
	$('.addressdialog-close').on('click', function(event){

			$form_modal.removeClass('is-visible');
	});
	//ʹ��Esc���رյ�������
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		$form_modal.removeClass('is-visible');
	    }
    });

	