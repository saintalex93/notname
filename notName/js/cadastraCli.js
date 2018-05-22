$("#insereCli").click(
		function(event) {
			event.stopPropagation();

			if ($("#nome") != '' && $("#email") != '' && $("#password") != '') {
				var data = $("#formRegister").serialize();

				$.ajax({
					type : 'post',
					url : './controller/cadastraCliente.php',
					data : data,
					success : function(response) {
						alert(response);
						if (response == "Cadastrado") {
							$("#returnFormRegistrar").text(
									"Cadastrado com sucesso");
							$("#returnFormRegistrar").attr("class",
									"text-success");

						} else
							(response == "Erro")
						{
							alert(response);
							$("#returnFormRegistrar").text(
									"Não foi possivel cadastrar");
							$("#returnFormRegistrar").attr("class",
									"text-danger");

						}
					}
				
				});
			}
		});
