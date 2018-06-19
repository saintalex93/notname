$("#btnCadastroCategoria").click(function() 
{	
	if($("#btnCadastroCategoria").val() == 1)
	{
		if ($("#txtCategoria").val() != '') {
			carregando();

			var form = $('#formCategoria');

			$.ajax( {
				type: "POST",
				url: './controller/controllerCategoria.php?action=insereCategoria',
				data: form.serialize(),
				success: function( response ) {
					if(response == 'Inserido')
					{
						$("#returnCadCategPai").text("Cadastrado com sucesso");
						$("#returnCadCategPai").addClass("text-success");

						setInterval(function(){
							$("#returnCadCategPai").css("display","none");
							$("#txtCategoria").val("");
							window.location.reload();
						},3000);
					}
					parar();
				}
			} );
		}
		else{
			$("#returnCadCategPai").text("Preencha todas as informações");
			$("#returnCadCategPai").addClass("text-danger");
		}
	}
	else if ($("#btnCadastroCategoria").val() == 2) 
	{
		if($("#txtCategoria").val() != '')
		{
			carregando();

			var form = $('#formCategoria');

			$.ajax( {
				type: "POST",
				url: './controller/controllerCategoria.php?action=alteraCategoria',
				data: form.serialize(),
				success: function( response ) {
					if(response == 'Alterado')
					{
						$("#returnCadCategPai").text("Alterado com sucesso");
						$("#returnCadCategPai").addClass("text-success");

						setInterval(function(){
							$("#returnCadCategPai").css("display","none");
							$("#txtCategoria").val("");
							window.location.reload();
						},3000);
					}
					parar();
				}
			} );
		}
		else{
			$("#returnCadCategPai").text("Preencha todas as informações");
			$("#returnCadCategPai").addClass("text-danger");
		}
	}
});



$("#btnCadastroCategoriaFilha").click(function() 
{
	if ($("#btnCadastroCategoriaFilha").val() == 1) 
	{
		if ($("#txtCategoriaFilho").val() != '') {
			carregando();

			var form = $('#formCategoriaFilha');

			$.ajax( {
				type: "POST",
				url: './controller/controllerCategoria.php?action=insereCategoriaFilha',
				data: form.serialize(),
				success: function( response ) {
					if(response == 'Alterado')
					{
						$("#returnCadCategFilho").text("Cadastrado com sucesso");
						$("#returnCadCategFilho").addClass("text-success");

						setInterval(function(){
							$("#returnCadCategFilho").css("display","none");
							$("#txtCategoriaFilho").val("");
							$("#optCategoriaPai").val(0);
							window.location.reload();
						},3000);
					}
					parar();
				}
			} );
		}
		else{
			$("#returnCadCategFilho").text("Preencha todas as informações");
			$("#returnCadCategFilho").addClass("text-danger");
		}
	}
	else if($("#btnCadastroCategoriaFilha").val() == 2){

		if ($("#txtCategoriaFilho").val() != '') {
			carregando();

			var form = $('#formCategoriaFilha');

			$.ajax( {
				type: "POST",
				url: './controller/controllerCategoria.php?action=alteraCategoriaFilha',
				data: form.serialize(),
				success: function( response ) {
					if(response == 'Alterado')
					{
						$("#returnCadCategFilho").text("Alterado com sucesso");
						$("#returnCadCategFilho").addClass("text-success");

						setInterval(function(){
							$("#returnCadCategFilho").css("display","none");
							$("#txtCategoriaFilho").val("");
							$("#optCategoriaPai").val(0);
							window.location.reload();
						},3000);
					}
					parar();
				}
			} );
		}
		else{
			$("#returnCadCategFilho").text("Preencha todas as informações");
			$("#returnCadCategFilho").addClass("text-danger");
		}
	}
	else{
		alter("Algo deu muito errado");
	}
});


/**************************************************************************************************************/
//                                                                                                            //
//                             Funções para limpar os text e values da pagina                                 //
//                                                                                                            //
//                                                                                                            //
/**************************************************************************************************************/

$("#btnCancelarCategPai").click(function(event){
	$("#txtCategoria").val("");
	$("#txtCategoria").focus();

	if($("#btnCadastroCategoria").val() == 2){
		$("#btnCadastroCategoria").val(1);
		$("#btnCadastroCategoria").text('Cadastrar')
	}
});

$("#btnCancelarCategFilho").click(function(event){
	$("#txtCategoriaFilho").val("");
	$("#optCategoriaPai").val(0);
	$("#txtCategoriaFilho").focus();

	if($("#btnCadastroCategoriaFilha").val() == 2){
		$("#btnCadastroCategoriaFilha").val(1);
		$("#btnCadastroCategoriaFilha").text('Cadastrar')
	}
});