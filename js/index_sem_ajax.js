$(document).ready(function(){

	function resize(){
				$(window).resize(function(){
				if(window.innerWidth > 650){

			var li= $('#lista-topo');
			$('#menu').removeClass('resptop');
		
			li.removeClass('resptop-ul').addClass('lista_top').show();
		
		}else{
		$('#menu').addClass('resptop');
		var li= $('#lista-topo');
		li.removeClass('lista_top').addClass('resptop-ul').hide();
	}
	});
	}

		$('.close').click(function(event){
		$(this).parents('.box').fadeOut();
	});

	function update(){

var data = new Date();
	$('textarea').prepend("Atualização "+data.toLocaleString()+" : \n\n");
}

		$('.btn_3').click(function(event){

			$(this).toggleClass("up_btn");
			$(this).parent().find('form').fadeToggle(1500);
			
		});
		

	if(window.innerWidth < 650){

		$('.nometopo').hide();
		var li= $('#lista-topo');
		$('#menu').addClass('resptop');

		li.removeClass('lista_top').addClass('resptop-ul').hide();

		resize();
		
		
	}
	else{
			resize();
	}
	

$('#menu').click(function(){

var li= $('#lista-topo');

li.fadeToggle();

});






});



		

