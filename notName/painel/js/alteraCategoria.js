function alteraCategoriaPai(id){

	var idrowCatPai = 'rowCatPai'+id;

	$("#idCategPai").val($('tr#'+idrowCatPai+' td:nth-child(1)').text());
	$("#txtCategoria").val($('tr#'+idrowCatPai+' td:nth-child(2)').text());

	

	$("#btnCadastroCategoria").text("Alterar");
	$("#btnCadastroCategoria").val("2");

	if ($('tr#' + idrowCatPai + ' td:nth-child(2)').text() == "Ativo") {

        $("#radioBtnCateg").removeAttr('class', 'btn btn-primary btn-sm notActive');
        $("#radioBtnCateg").attr('class', 'btn btn-primary btn-sm active');

        $("#radioBtnCateg").removeAttr('class', 'btn btn-secondary btn-sm active');
        $("#radioBtnCateg").attr('class', 'btn btn-secondary btn-sm notActive');

    }
    else {

        $("#radioBtnCateg").removeAttr('class', 'btn btn-secondary btn-sm notActive');
        $("#radioBtnCateg").attr('class', 'btn btn-secondary btn-sm active');

        $("#radioBtnCateg").removeAttr('class', 'btn btn-primary btn-sm active');
        $("#radioBtnCateg").attr('class', 'btn btn-primary btn-sm notActive');

    }
}

function alteraCategoriaFilha(id){

	var idrowCatFilho = 'rowCatFilho'+id;

	$("#idCategFilha").val($('tr#'+idrowCatFilho+' td:nth-child(1)').text());
	$("#txtCategoriaFilho").val($('tr#'+idrowCatFilho+' td:nth-child(2)').text());
	$("#optCategoriaPai").val($('tr#'+idrowCatFilho+' td:nth-child(4)').text());

	

	$("#btnCadastroCategoriaFilha").text("Alterar");
	$("#btnCadastroCategoriaFilha").val("2");

	if ($('tr#' + idrowCatFilho + ' td:nth-child(11)').text() == "Ativo") {

        $("#btnSactive").removeAttr('class', 'btn btn-primary btn-sm notActive');
        $("#btnSactive").attr('class', 'btn btn-primary btn-sm active');

        $("#btnSinactive").removeAttr('class', 'btn btn-secondary btn-sm active');
        $("#btnSinactive").attr('class', 'btn btn-secondary btn-sm notActive');

    }
    else {

        $("#btnSinactive").removeAttr('class', 'btn btn-secondary btn-sm notActive');
        $("#btnSinactive").attr('class', 'btn btn-secondary btn-sm active');

        $("#btnSactive").removeAttr('class', 'btn btn-primary btn-sm active');
        $("#btnSactive").attr('class', 'btn btn-primary btn-sm notActive');

    }
}