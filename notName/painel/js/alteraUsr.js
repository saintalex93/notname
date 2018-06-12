function alteraUsr(id){

	var idRowUsr = 'rowUsr'+id;

	$("#idUsr").val($('tr#'+idRowUsr+' td:nth-child(1)').text());
	$("#txtNomeUsr").val($('tr#'+idRowUsr+' td:nth-child(2)').text());
	$("#txtEmail").val($('tr#'+idRowUsr+' td:nth-child(5)').text());
	$("#txtLogin").val($('tr#'+idRowUsr+' td:nth-child(3)').text());
	$("#txtSenhaUsr").val($('tr#'+idRowUsr+' td:nth-child(4)').text());
	$("#permissao").val($('tr#'+idRowUsr+' td:nth-child(6)').text());


	$("#btnCadastroUsr").text("Alterar");
	$("#btnCadastroUsr").val("2");
}