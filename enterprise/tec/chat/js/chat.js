function getContent( timestamp )
{

	var queryString = { 'timestamp' : timestamp };
	
	$.getJSON ( "server.php", queryString , function ( obj )
	{

//alert(obj.content);
		if (obj.content) {
			$('#retorno').append(obj.content);
			$("#retorno").scrollTop($("#retorno")[0].scrollHeight);
		}
		// reconecta ao receber uma resposta do servidor
		setTimeout(function () {
			getContent( obj.timestamp );
		}, 2000);
	});
}


$(document).ready(function(){


	$('.menu-chat').click(function(){
		$('.chat-list').toggle("slide");
	});
$(window).resize(function(){
	if(window.innerWidth > 650){
		$('.chat-list').show();
	}
		if(window.innerWidth < 650){
		$('.hdchat').click(function(){
			$('.chat-list').fadeOut("slow");
		});
	}

});

$('.selUser').on("submit",function(e){
		e.preventDefault();

	$form=$(this);
	$.post(this.action, $form.serialize(), function(w) {	

		$('#chatbox').html(w);
	}).error(function() {
		alert('Ocorreu um erro na conexão com o servidor. Por favor tente novamente mais tarde.');

	});
});


$('.chatmessages').submit(function(e){
	e.preventDefault();
	$form=$(this);
	$.post(this.action, $form.serialize(), function(w) {
			if(w){
				alert(w);
				return;
			}

			$("#retorno").scrollTop($("#retorno")[0].scrollHeight);

		$form.each(function(){this.reset();});
	});
});



});

