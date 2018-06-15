$("#insereCli").click(
	function(event) {
		event.stopPropagation();

		if ($("#nome").val() != '' && $("#email").val() != ''
			&& $("#password").val() != '') {

			var data = $("#formRegister").serialize();

		$.ajax({
			type : 'post',
			url : './controller/controllerCliente.php',
			data : data,
			success : function(response) {

				if (response == "Cadastrado") {
					$("#returnFormRegistrar").text(
						"Cadastrado com sucesso");
					$("#returnFormRegistrar").attr("class",
						"text-success text-center");


					setTimeout(function() {
						$("#returnFormRegistrar").attr('class',
							'd-none');
						$("#nome").val("");
						$("#email").val("");
						$("#password").val("");

					}, 3000);
					window.location.href = './index.php';
				} else {

					$("#returnFormRegistrar").text(
						"Não foi possivel cadastrar");
					$("#returnFormRegistrar").attr("class",
						"text-danger text-center");
					setTimeout(function() {
						$("#returnFormRegistrar").attr('class',
							'd-none');
						$("#nome").text("");
						$("#email").text("");
						$("#password").text("");
					}, 3000);
				}
				
			}

		});
		
	} else {
		if ($("#nome").val().length == 0) {
			$("#nome").attr("style", "border-color: red");
			$("#nome").focus();

			$("#nome").focusout(function(event) {
				if ($("#nome").val().length > 0) {
					$("#nome").attr("style", "border-color: #e7e7e7");
				}
			});
		}
		if ($("#email").val().length == 0) {
			$("#email").attr("style", "border-color: red");

			$("#email").focusout(function(event) {
				if ($("#email").val().length > 0) {
					$("#email").attr("style", "border-color: #e7e7e7");
				}
			});
		}
		if ($("#password").val().length == 0) {
			$("#password").attr("style", "border-color: red");

			$("#password").focusout(
				function(event) {
					if ($("#password").val.length > 0) {
						$("#password").attr("style",
							"border-color: #e7e7e7");
					}
				});
		}

	}

});
