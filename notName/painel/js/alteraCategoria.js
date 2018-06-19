function alteraCategoriaPai(id){

	var idrowCatPai = 'rowCatPai'+id;

	$("#idCategPai").val($('tr#'+idrowCatPai+' td:nth-child(1)').text());
	$("#txtCategoria").val($('tr#'+idrowCatPai+' td:nth-child(2)').text());
	

	$("#btnCadastroCategoria").text("Alterar");
	$("#btnCadastroCategoria").val("2");
}

function alteraCategoriaFilha(id){

	var idrowCatFilho = 'rowCatFilho'+id;

	$("#idCategFilha").val($('tr#'+idrowCatFilho+' td:nth-child(1)').text());
	$("#txtCategoriaFilho").val($('tr#'+idrowCatFilho+' td:nth-child(2)').text());
	$("#optCategoriaPai").val($('tr#'+idrowCatFilho+' td:nth-child(4)').text());

	

	$("#btnCadastroCategoriaFilha").text("Alterar");
	$("#btnCadastroCategoriaFilha").val("2");
}