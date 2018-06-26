function fnCep(cep) {

    cep = cep.replace(".", "").replace("-", "");

    var oPagina = new XMLHttpRequest();

    with (oPagina) {
        open('GET', "https://viacep.com.br/ws/" + cep + "/json/");

        send();

        onload = function () {
            var oDados = JSON.parse(responseText);

            document.all.txtEndereco.value = oDados.logradouro;
            document.all.txtCidade.value = oDados.localidade;
            document.all.txtBairro.value = oDados.bairro;
            document.all.cmbUf.value = oDados.uf;

            document.all.txtNumero.focus();


        }

    }

}


$("#btnCliEnd").click(function (){

			carregando();

			var form = $('#formCliEnd');

			$.ajax( {
				type: "POST",
				url: './controller/controllerCliEnd.php?',
				data: form.serialize(),
				success: function( response ) {
                    console.log(response);
					parar();
				}
			} );


});
