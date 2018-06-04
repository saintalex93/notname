
function alterarModelo(id){
    var idRow = "rowModelo"+id;


    $("#descModelo").val($('tr#'+idRow+' td:nth-child(5)').text());
    $("#tamanhoModelo").val($('tr#'+idRow+' td:nth-child(3)').text());
    $("#corModelo").val($('tr#'+idRow+' td:nth-child(2)').text());
    $("#produtoModelo").val($('tr#'+idRow+' td:nth-child(4)').text());
    $("#txtValorModelo").val($('tr#'+idRow+' td:nth-child(9)').text());
    $("#quantidadeModelo").val($('tr#'+idRow+' td:nth-child(10)').text());
    $("#statusModelo").val($('tr#'+idRow+' td:nth-child(11)').text());

    if($('tr#'+idRow+' td:nth-child(11)').text() == "Ativo"){

        $("#btnSactive").removeAttr('class', 'btn btn-primary btn-sm notActive');
        $("#btnSactive").attr('class', 'btn btn-primary btn-sm active');

        $("#btnSinactive").removeAttr('class', 'btn btn-secondary btn-sm active');
        $("#btnSinactive").attr('class', 'btn btn-secondary btn-sm notActive');

    }
    else{

        $("#btnSinactive").removeAttr('class', 'btn btn-secondary btn-sm notActive');
        $("#btnSinactive").attr('class', 'btn btn-secondary btn-sm active');

        $("#btnSactive").removeAttr('class', 'btn btn-primary btn-sm active');
        $("#btnSactive").attr('class', 'btn btn-primary btn-sm notActive');

    }
    trocaCor();

    $("#capaImg").attr('src', './../img/Modelos/ModeloCapa_'+id+'.jpg');
    $("#foto1Img").attr('src', './../img/Modelos/ModeloImg1_'+id+'.jpg');
    $("#foto2Img").attr('src', './../img/Modelos/ModeloImg2_'+id+'.jpg');
    $("#foto3Img").attr('src', './../img/Modelos/ModeloImg3_'+id+'.jpg');


    window.scrollTo(0, 105);






}




$("#btnCadastraModelo").click(function() {

    carregando();

    $('#formModelo').submit();


});


// Ajax para produto com imagem.

$("#formModelo").submit(function () {

    var formData = new FormData(this);

    $.ajax({
        url: './controller/controllerModelo.php?action=insereModelo',
        type: 'POST',
        data: formData,
        success: function (data) {
            parar();
            alert(data);

        },
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() {  // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function () {
                    /* faz alguma coisa durante o progresso do upload */
                }, false);
            }
            return myXhr;
        }
    });
});




    // Paleta
    $("#corModelo").change(function(event) {
        trocaCor();
    });

    function trocaCor(){
        $cor =  ($("#corModelo option:selected").attr('class'));

        $("#txtCor").css('background', $cor);
    }


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

