function alteraCor(id){

	var idrowCor = 'rowCor'+id;

	$("#idCor").val($('tr#'+idrowCor+' td:nth-child(1)').text());
	$("#txtDescCor").val($('tr#'+idrowCor+' td:nth-child(2)').text());
	$("#txtCor").val($('tr#'+idrowCor+' td:nth-child(3)').text());
	$("#html5colorpicker").val($('tr#'+idrowCor+' td:nth-child(3)').text());
	

	$("#btnCadastraCor").text("Alterar");
	$("#btnCadastraCor").val("2");
}