$(document).ready(function() {

	$('.delete').click(function(){
		
		var rel = $(this).attr("rel");
		
		$.confirm({
			'title'		: 'Подтверждение удаления',
			'message'	: 'После удаления восстановление будет невозможно! Продолжить?',
			'buttons'	: {
				'Да'	: {
					'class'	: 'blue',
					'action': function(){
						location.href = rel;
					}
				},
				'Нет'	: {
					'class'	: 'gray',
					'action': function(){}
				}
			}
		});
		
	});

   $('#select-links').click(function(){
 $("#list-links,#list-links-sort").slideToggle(200);     
 }); 
  
  
   $('.block-clients').click(function(){

 $(this).find('ul').slideToggle(300);
   
 });
 
 $('#select-all').click(function(){
    $(".privilege input:checkbox").attr('checked', true);           
});

$('#remove-all').click(function(){
    $(".privilege input:checkbox").attr('checked', false);           
});
 
 
  
 });