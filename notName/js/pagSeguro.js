var Root = "http://"+document.location.hostname+"/";

var valor = 500.00;

// iniciar Sessao de pagamento
function iniciarSessao()
{
  $.ajax({
    url:  "./controller/PagSeguro.php",
    type: "POST",
    // dataType: "json",
    success: function (response) {
      // console.log(response);
      PagSeguroDirectPayment.setSessionId(response);
    },
    complete: function(response){
      listaMeioPagamentos();
    }
  });
}

function listaMeioPagamentos()
{
  PagSeguroDirectPayment.getPaymentMethods({
    amount: valor,
    success: function (response) {
      //meios de pagamento disponíveis
      console.log(response.paymentMethods.CREDIT_CARD.options);
      var cart = response.paymentMethods.CREDIT_CARD.options;

      // ----------------------------------------------------------------------------------------------
      // Mostrar Apenas as opções Disponíveis.
      $(".cartaoCredito").append("<img src = https://stc.pagseguro.uol.com.br/"+
        cart.AMEX.images.MEDIUM.path+">");
      $(".cartaoCredito").append("<img src = https://stc.pagseguro.uol.com.br/"+
        cart.MASTERCARD.images.MEDIUM.path+">");
      $(".cartaoCredito").append("<img src = https://stc.pagseguro.uol.com.br/"+
        cart.VISA.images.MEDIUM.path+">");
      $(".cartaoCredito").append("<img src = https://stc.pagseguro.uol.com.br/"+
        cart.DINERS.images.MEDIUM.path+">");
      $(".cartaoCredito").append("<img src = https://stc.pagseguro.uol.com.br/"+
        cart.HIPERCARD.images.MEDIUM.path+">");
      $(".cartaoCredito").append("<img src = https://stc.pagseguro.uol.com.br/"+
        cart.SOROCRED.images.MEDIUM.path+">");
      // ----------------------------------------------------------------------------------------------
      // $.each(response.paymentMethods.CREDIT_CARD.options,function(i,obj){
      //   $(".cartaoCredito").append("<div><img src = https://stc.pagseguro.uol.com.br/"+obj.images.SMALL.path+">"+obj.name+"</div>");
      //   // console.log(obj);
      // });
      // $(".boleto").append("<div><img src = https://stc.pagseguro.uol.com.br/"+response.paymentMethods.BOLETO.options.BOLETO.images.SMALL.path+">"+response.paymentMethods.BOLETO.name+"</div>");
      // $.each(response.paymentMethods.ONLINE_DEBIT.options,function(i,obj){
      //   $(".debito").append("<div><img src = https://stc.pagseguro.uol.com.br/"+obj.images.SMALL.path+">"+obj.name+"</div>");

      // });


    },

    complete: function (response) {
      getTokenCard();

    }
  });
}


$('#numeroCartao').on('keyup',function()
{
  var numeroCartao = $(this).val();
  var quantidadeCaracteres = numeroCartao.length;

  if(quantidadeCaracteres == 6){
    PagSeguroDirectPayment.getBrand({
      cardBin: numeroCartao,
      success: function(response) {
        // console.log(response);
        var bandeiraImg = response.brand.name;
        $("#bandeiraCartao").html("<img src = https://stc.pagseguro.uol.com.br//public/img/payment-methods-flags/42x20/"+bandeiraImg+".png>")
        getParcelas(bandeiraImg);
      },
      error: function(response) {
        alert("Cartão inválido");
        $("#bandeiraCartao").empty();
      },

    });
  }

});


function getParcelas(bandeira)
{
 PagSeguroDirectPayment.getInstallments({
  amount: valor,
  maxInstallmentNoInterest: 2,
  brand: bandeira,
  success: function(response)
  {
    $.each(response.installments,function(i,object){
      $.each(object,function(i2,object2){
        // console.log(object2.quantity);
        var numberValue = object2.installmentAmount;
        var valor = "R$ "+numberValue.toFixed(2).replace(".",",");
        var valorParcelas = numberValue.toFixed(2);
        $("#quantidadeParcelas").show().append("<option value = "+object2.quantity+" id="+valorParcelas+">"+
          object2.quantity+" parcelas de "+valor+"</option>");
      });
    });

  }

});
}


$("#quantidadeParcelas").on('change', function(){

  var valueSelected = document.getElementById("quantidadeParcelas");
  $("#valorParcelas").val(valueSelected.options[valueSelected.selectedIndex].id);

});

// Obter o token do cartão de crédito
function getTokenCard()
{
  PagSeguroDirectPayment.createCardToken({
    cardNumber: '4111111111111111',
    brand: 'visa',
    cvv: '123',
    expirationMonth: '12',
    expirationYear: '2030',
    success: function(response)
    {
      console.log(response);

      $("#tokenCard").val(response.card.token);
    }

  });

}


$("#comprar").on('click',function(event){
  // event.preventDefault();
  PagSeguroDirectPayment.onSenderHashReady(function(response){
    console.log(response);
    $("#hashCard").val(response.senderHash);


  });
});

iniciarSessao();





// //SE NÃO GERAR O ID DA SESSÃO E SETAR ESSE ID NO setSessionId NADA VAI FUNCIONAR
// //DEVE-SE GERAR A IDENTIFICAÇÃO DO USUÁRIO TAMBÉM
// //SE FOR CARTÃO DE CRÉDITO DEVE-SE GERAR O TOKEN DO CARTÃO

// function requestBrandCard(numCard){
//   PagSeguroDirectPayment.getBrand({
//     cardBin: numCard,
//     success: function (response) {
//       console.log(response);
//       //bandeira encontrada
//     },
//     error: function (response) {
//       console.log(response);
//       //tratamento do erro
//     },

//   });

// }



// function getHash(){
//   $.ajax({
//     url: './controller/PagSeguro.php',
//     type: 'post',
//     dataTyp: 'json',
//     async: false,
//     timeout: 20000,
//     success: function (data) {
//       // $(".retornoTeste").html(data);
//       console.log(data);
//       // PagSeguroDirectPayment.setSessionId(data);
//       // PagSeguroDirectPayment.onSenderHashReady(function (response) {
//       //   if (response.status == 'error') {
//       //     console.log(response.message);
//       //     return false;
//       //   }
//       //   console.log(response);
//       //   var hash = response.senderHash; //Hash estará disponível nesta variável.
//       //   return hash;
//       // });
//     }
//   });
// }


// $("#sessaoCad").click(function () {
//   getHash();
//   // requestBrandCard('4111111111111111');
//   // console.log(getCardToken('4111111111111111', '123','12','2030'));
// }); 


// function getCardToken(cardNumber, cvv, expirationMonth, expirationYear){
//   var param = {
//     cardNumber: cardNumber,
//     cvv: cvv,
//     expirationMonth: expirationMonth,
//     expirationYear: expirationYear,
//     success: function (response) {
//       console.log(response);
//       //token gerado, esse deve ser usado na chamada da API do Checkout Transparente
//     },
//     error: function (response) {
//       //tratamento do erro
//       console.log(response);

//     },

//   }
//   PagSeguroDirectPayment.createCardToken(param);
// }



// // $("#cadCPF").focus(function () { //gera identificação do usuário

// //   identificador = PagSeguroDirectPayment.getSenderHash();
// //   $(".hashPagSeguro").val(identificador);

// // });

// // $("input[type=text][name=numCartao]").keyup(function () {
// // number = $("#numCartao").val();
// // bin = number.toString();

// //   PagSeguroDirectPayment.getBrand({
// //     cardBin: bin,
// //     success: function (response) {

// //       $(".retornoTeste").html(response['brand']['name']);

// //       bandeira = response['brand']['name'];

// //       if (bandeira === 'elo') {
// //         $('#img-elo').css("border", "3px solid #5d9afc");
// //       } else { $('#img-elo').css("border", "3px solid white"); }

// //       if (bandeira === 'visa') {
// //         $('#img-visa').css("border", "3px solid #5d9afc");
// //       } else { $('#img-visa').css("border", "3px solid white"); }

// //       if (bandeira === 'mastercard') {
// //         $('#img-mastercard').css("border", "3px solid #5d9afc");
// //       } else { $('#img-mastercard').css("border", "3px solid white"); }

// //       if (bandeira === 'hipercard') {
// //         $('#img-hipercard').css("border", "3px solid #5d9afc");
// //       } else { $('#img-hipercard').css("border", "3px solid white"); }

// //       if (bandeira === 'amex') {
// //         $('#img-amex').css("border", "3px solid #5d9afc");
// //       } else { $('#img-amex').css("border", "3px solid white"); }

// //     },
// //     error: function (response) {

// //     }
// //   });

// // });


// // $("#parcelamento").click(function () {

// //   PagSeguroDirectPayment.getInstallments({
// //     amount: 49,
// //     maxInstallmentNoInterest: 1,
// //     //brand: 'visa',

// //     success: function (response) { console.log(response); },
// //     error: function (response) { console.log(response); }
// //   });

// // });

// // $("#cvv").keyup(function () {  //criar token

// //   numCartao = $("#numCartao").val();
// //   cvvCartao = $("#cvv").val();
// //   expiracaoMes = $("#pagamentoMes").val();
// //   expiracaoAno = $("#pagamentoAno").val();

// //   PagSeguroDirectPayment.createCardToken({
// //     cardNumber: numCartao,
// //     cvv: cvvCartao,
// //     expirationMonth: expiracaoMes,
// //     expirationYear: expiracaoAno,

// //     success: function (response) { $(".tokenPagamentoCartao").val(response['card']['token']); },
// //     error: function (response) { console.log(response); }
// //   });

// // });

// // $("#meios").click(function () { //meios de pagamento disponíveis

// //   PagSeguroDirectPayment.getPaymentMethods({
// //     amount: 500,
// //     success: function (response) { console.log(response); },
// //     error: function (response) { console.log(response); }
// //   });

// // });



