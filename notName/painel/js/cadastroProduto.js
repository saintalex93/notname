$("#btnCadastroMarca").click(function() {
	carregando();

	var form = $('#formMarca');

	$.ajax( {
		type: "POST",
		url: './controller/controllerProduto.php?action=insereMarca',
		data: form.serialize(),
		success: function( response ) {
			alert( response );

			parar();
		}
	} );



});


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













$(document).ready( function() {
	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
		label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
	});

	$('.btn-file :file').on('fileselect', function(event, label) {

		var input = $(this).parents('.input-group').find(':text'),
		log = label;

		if( input.length ) {
			input.val(log);
		} else {
			if( log ) alert(log);
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

	$("#imgInp").change(function(){
		readURL(this);
	}); 	
});













$(function () {

	$("#statusProduto").val("Ativo");
	$("#statusCategoria").val("Ativo");

	$("#statusMarca").val("Ativo");




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


	$('#radioBtn a').on('click', function(){
		var sel = $(this).data('title');
		var tog = $(this).data('toggle');
		$('#'+tog).prop('value', sel);

		$('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
		$('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
	})

});