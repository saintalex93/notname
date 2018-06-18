$("#btnCadastroCategoria").click(function() {
	carregando();

	var form = $('#formCategoria');

	$.ajax( {
		type: "POST",
		url: './controller/controllerProduto.php?action=insereCategoria',
		data: form.serialize(),
		success: function( response ) {
			alert( response );

			parar();
		}
	} );

	

});

$("#btnCadastroCategoriaFilha").click(function() {
	carregando();

	var form = $('#formCategoriaFilha');

	$.ajax( {
		type: "POST",
		url: './controller/controllerProduto.php?action=insereCategoriaFilha',
		data: form.serialize(),
		success: function( response ) {
			alert( response );

			parar();
		}
	} );

	

});
