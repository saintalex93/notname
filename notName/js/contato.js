$("#btnContato").click(function(event) {


	carregando();
	var data = $('#formContato').serialize();
	$.ajax({
		type: 'post',
		url: './controller/enviaEmailContato.php',
		data: data,  
		success: function (response) {
			retorno = JSON.parse(response);
			parar();
			
			$("#retornoContato").text(retorno['mensagem']);

			$("#myModal").modal();


		}
	});


});

$('#celular').mask('(00) 00000-0000');


