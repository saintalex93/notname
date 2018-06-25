
$(".produtosCX").click(function () {
	$("#idProduct").val(this.id);

	carregando();
	$.ajax({
		type: 'GET',
		url: './controller/controllerProduto.php?action=seleciona&idProdSelected=' + this.id,
		success: function (response) {
			parar();
			window.scrollTo(0, 100);
			var produto = JSON.parse(response);
			produto = produto[0];
			console.log(produto);
			console.log(produto["categoria"][0]["idCateg"]);
			var btnAcao = $("#btnCadastroProduto");

			btnAcao.attr("value", "2");
			btnAcao.removeClass("btn-success");
			btnAcao.addClass("btn-secondary");
			$("#spanButton").text("ALTERAR");


			$("#idProd").val(produto['idProd']);
			$("#txtNomeProduto").val(produto['descProd']);
			$("#material").val(produto['material']);
			$("#statusProduto").val(produto['statusProd']);
			$("#txtDescricaoProduto").val(produto['descCompletaProd']);

			$("#img-upload").attr("src", "./../img/Produtos/Produto" + produto["idProd"] + ".jpg");
			// $("#imgInp").value("Produto"+produto["idProd"]+".jpg");


			$(".chkCat").each(function () {
				$(this).removeAttr('checked', false);
			});


			for (var i = 0; i < produto["categoria"].length; i++) {

				$("#Bctg" + produto["categoria"][i]["idCateg"]).addClass('active');
				$("#Bctg" + produto["categoria"][i]["idCateg"]).addClass('btn-secondary');
				$("#chkCats" + produto["categoria"][i]["idCateg"]).attr('checked', 'checked');

			}

			$(".chkCat").each(function () {

				if ($(this).attr('checked')) {
					$("#Bctg" + $(this).attr('value')).find(".state-icon").removeClass()
						.addClass('state-icon fa fa-check-square');
				}
				else {
					$("#Bctg" + $(this).attr('value')).removeClass("active");
					$("#Bctg" + $(this).attr('value')).find(".state-icon").removeClass()
						.addClass('state-icon fa fa-square');
				}
			});

			// "img-upload"

			if ($('#statusProduto').val() == "ATIVO") {

				$("#btnProdActive").removeAttr('class', 'btn btn-primary btn-sm notActive');
				$("#btnProdActive").attr('class', 'btn btn-primary btn-sm active');

				$("#btnProdInactive").removeAttr('class', 'btn btn-secondary btn-sm active');
				$("#btnProdInactive").attr('class', 'btn btn-secondary btn-sm notActive');

			}
			else {

				$("#btnProdInactive").removeAttr('class', 'btn btn-secondary btn-sm notActive');
				$("#btnProdInactive").attr('class', 'btn btn-secondary btn-sm active');

				$("#btnProdActive").removeAttr('class', 'btn btn-primary btn-sm active');
				$("#btnProdActive").attr('class', 'btn btn-primary btn-sm notActive');

			}


			$("#btnCadastroProduto").text("ALTERAR");
			$("#btnCadastroProduto").val("2");

		}
	});

});

$("#btnCancelar").on('click', function () {
	cancelar();
});

function cancelar() {

	window.scrollTo(0, 100);

	$("#btnCadastroProduto").attr("value", "1");

	$('.chkCat').prop('checked', false);

	$(".state-icon").each(function () {
		$(this).removeClass()
			.addClass('state-icon fa fa-square');

		$(".categCheck").removeClass("active");
	});

	$("#txtNomeProduto").val("");
	$("#material").val("");
	$("#statusProduto").val('ATIVO');
	$("#txtDescricaoProduto").val("");

	$("#btnProdActive").removeAttr('class', 'btn btn-primary btn-sm notActive');
	$("#btnProdActive").attr('class', 'btn btn-primary btn-sm active');

	$("#btnProdInactive").removeAttr('class', 'btn btn-secondary btn-sm active');
	$("#btnProdInactive").attr('class', 'btn btn-secondary btn-sm notActive');

	$("#img-upload").attr("src", "");

}


$("#btnCadastroProduto").click(function () {

	carregando();

	$('#formProduto').submit();


});

// Ajax para produto com imagem.

$("#formProduto").submit(function () {

	if ($("#btnCadastroProduto").val() == 1){

		
		var formData = new FormData(this);
		
		$.ajax({
			url: './controller/controllerProduto.php?action=insereProduto',
			type: 'POST',
			data: formData,
			success: function (data) {
				parar();
				alert(data);
				
			},
			cache: false,
			contentType: false,
			processData: false,
			xhr: function () {  // Custom XMLHttpRequest
				var myXhr = $.ajaxSettings.xhr();
				if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
					myXhr.upload.addEventListener('progress', function () {
						/* faz alguma coisa durante o progresso do upload */
					}, false);
				}
				return myXhr;
			}
		});
	}
	else {
		var formData = new FormData(this);

		$.ajax({
			url: './controller/controllerProduto.php?action=alteraProduto',
			type: 'POST',
			data: formData,
			success: function (data) {
				parar();
				alert(data);

			},
			cache: false,
			contentType: false,
			processData: false,
			xhr: function () {  // Custom XMLHttpRequest
				var myXhr = $.ajaxSettings.xhr();
				if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
					myXhr.upload.addEventListener('progress', function () {
						/* faz alguma coisa durante o progresso do upload */
					}, false);
				}
				return myXhr;
			}
		});
	}

});



$(function () {

	$('.NO-CACHE').attr('src', function () { return $(this).attr('src') + "?a=" + Math.random() });
	// Botão para Imagem produto

	$(document).on('change', '.btn-file :file', function () {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
	});

	$('.btn-file :file').on('fileselect', function (event, label) {

		var input = $(this).parents('.input-group').find(':text'),
			log = label;

		if (input.length) {
			input.val(log);
		} else {
			if (log) alert(log);
		}

	});
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#img-upload').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imgInp").change(function () {
		readURL(this);
	});


	// CheckBox Categorias produtos

	$('.button-checkbox').each(function () {

		// Vê se é "Radio" ou Check
		var $widget = $(this),
			$button = $widget.find('button'),
			$checkbox = $widget.find('input:checkbox'),
			color = $button.data('color'),
			settings = {
				on: {
					icon: 'fa fa-check-square'
				},
				off: {
					icon: 'fa fa-square'
				}
			};

		$button.on('click', function () {
			$checkbox.prop('checked', !$checkbox.is(':checked'));
			$checkbox.triggerHandler('change');
			updateDisplay();
		});
		$checkbox.on('change', function () {
			updateDisplay();
		});



		function updateDisplay() {
			var isChecked = $checkbox.is(':checked');

			$button.data('state', (isChecked) ? "on" : "off");

			$button.find('.state-icon')
				.removeClass()
				.addClass('state-icon ' + settings[$button.data('state')].icon);

			if (isChecked) {
				$button
					.removeClass('btn-secondary')
					.addClass('btn-' + color + ' active');
			}
			else {
				$button
					.removeClass('btn-' + color + ' active')
					.addClass('btn-secondary');
			}
		}

		function init() {

			updateDisplay();

			if ($button.find('.state-icon').length == 0) {
				$button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
			}
		}
		init();
	});


	// Status produto, modelo e categorias



	$('#radioBtn a').on('click', function () {
		var sel = $(this).data('title');
		var tog = $(this).data('toggle');
		$('#' + tog).prop('value', sel);

		$('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass('notActive');
		$('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active');
	})

});

$("#btnCancelProduto").click(function (event) {
	$("#idProd").val("");
	$("#txtNomeProduto").val("");
	$("#material").val("");
	$("#statusProduto").val("");
	$("#txtDescricaoProduto").val("");
	$("#img-upload").attr("src","images/logoNot.png");

	$("#txtNomeProduto").focus();

	if ($("#btnCancelProduto").val() == 2) {
		$("#btnCancelProduto").val(1);
		$("#btnCancelProduto").text('Cadastrar')
	}

	
});
