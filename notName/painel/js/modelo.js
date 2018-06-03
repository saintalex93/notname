
    function alterarModelo(id){
        var idRow = "rowModelo"+id;
        alert(idRow);


    }



    // Paleta
    $("#corModelo").change(function(event) {
        $cor =  ($("#corModelo option:selected").attr('class'));

        $("#txtCor").css('background', $cor);
    });


    function trocaCapa() {

        var oArq = new FileReader();

        oArq.onloadend = function() {
            document.getElementById('capaImg').src = oArq.result;


        }
        if (document.all.capaInput.files[0]) {
            oArq.readAsDataURL(document.all.capaInput.files[0]); // Comando para carregar imagem na memória.
            document.getElementById('capaImg').style.display = "inline-block";


        } else {

            document.all.imgBanner.style.display = "none";

        }
    }

    // Status
    $('#radioBtn a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#'+tog).prop('value', sel);

        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    });

    $("#txtValorModelo").maskMoney({prefix:'R$', allowNegative: true, thousands:'.', decimal:',', affixesStay: true});

