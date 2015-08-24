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

	$('.btn_3').click(function(event){

		$(this).toggleClass("up_btn");
		$(this).parent().find('form').fadeToggle(1500);

	});	


	$('form').submit(function(e){
		e.preventDefault();
		$form=$(this);
		$('input[type=submit]').val("Carregando...");
		$.post(this.action, $form.serialize(), function(w) {
				//alert(this.action);
				//alert($form.serialize());
				
				if(w){
					alert(w);
					$('input[type=submit]').val("Enviar");
					$form.each(function(){
						this.reset();
					});

					return;

				}
				location=$form.attr('data-redirect');
			}).error(function() {
				alert('Ocorreu um erro na conexão com o servidor. Por favor tente novamente mais tarde.');

			});


		});



	if(window.innerWidth < 650){

		
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

        function update(){

        var data = new Date();
        $('textarea').prepend("Atualização "+data.toLocaleString()+" : \n\n");
    }