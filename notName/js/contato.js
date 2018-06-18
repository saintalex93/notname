$("#btnContato").click(function(event) {

	carregando();

	carregando();
	var data = $('#formContato').serialize();
	$.ajax({
		type: 'post',
		url: './controller/enviaEmailContato.php',
		data: data,  
		success: function (response) {
			retorno = JSON.parse(response);

			alert(retorno['mensagem']);       

			parar();

		}
	});


});

	$('#celular').mask('(00) 00000-0000');


