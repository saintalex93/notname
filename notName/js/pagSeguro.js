//SE NÃO GERAR O ID DA SESSÃO E SETAR ESSE ID NO setSessionId NADA VAI FUNCIONAR
//DEVE-SE GERAR A IDENTIFICAÇÃO DO USUÁRIO TAMBÉM
//SE FOR CARTÃO DE CRÉDITO DEVE-SE GERAR O TOKEN DO CARTÃO

function requestBrandCard(numCard){
  PagSeguroDirectPayment.getBrand({
    cardBin: numCard,
    success: function (response) {
      console.log(response);
      //bandeira encontrada
    },
    error: function (response) {
      console.log(response);
      //tratamento do erro
    },

  });

}



function getHash(){
  $.ajax({
    url: './controller/PagSeguro.php',
    type: 'post',
    dataTyp: 'json',
    async: false,
    timeout: 20000,
    success: function (data) {
      // $(".retornoTeste").html(data);
      console.log(data);
      // PagSeguroDirectPayment.setSessionId(data);
      // PagSeguroDirectPayment.onSenderHashReady(function (response) {
      //   if (response.status == 'error') {
      //     console.log(response.message);
      //     return false;
      //   }
      //   console.log(response);
      //   var hash = response.senderHash; //Hash estará disponível nesta variável.
      //   return hash;
      // });
    }
  });
}


$("#sessaoCad").click(function () {
  getHash();
  // requestBrandCard('4111111111111111');
  // console.log(getCardToken('4111111111111111', '123','12','2030'));
}); 


function getCardToken(cardNumber, cvv, expirationMonth, expirationYear){
  var param = {
    cardNumber: cardNumber,
    cvv: cvv,
    expirationMonth: expirationMonth,
    expirationYear: expirationYear,
    success: function (response) {
      console.log(response);
      //token gerado, esse deve ser usado na chamada da API do Checkout Transparente
    },
    error: function (response) {
      //tratamento do erro
      console.log(response);

    },

  }
  PagSeguroDirectPayment.createCardToken(param);
}



// $("#cadCPF").focus(function () { //gera identificação do usuário

//   identificador = PagSeguroDirectPayment.getSenderHash();
//   $(".hashPagSeguro").val(identificador);

// });

// $("input[type=text][name=numCartao]").keyup(function () {
// number = $("#numCartao").val();
// bin = number.toString();

//   PagSeguroDirectPayment.getBrand({
//     cardBin: bin,
//     success: function (response) {

//       $(".retornoTeste").html(response['brand']['name']);

//       bandeira = response['brand']['name'];

//       if (bandeira === 'elo') {
//         $('#img-elo').css("border", "3px solid #5d9afc");
//       } else { $('#img-elo').css("border", "3px solid white"); }

//       if (bandeira === 'visa') {
//         $('#img-visa').css("border", "3px solid #5d9afc");
//       } else { $('#img-visa').css("border", "3px solid white"); }

//       if (bandeira === 'mastercard') {
//         $('#img-mastercard').css("border", "3px solid #5d9afc");
//       } else { $('#img-mastercard').css("border", "3px solid white"); }

//       if (bandeira === 'hipercard') {
//         $('#img-hipercard').css("border", "3px solid #5d9afc");
//       } else { $('#img-hipercard').css("border", "3px solid white"); }

//       if (bandeira === 'amex') {
//         $('#img-amex').css("border", "3px solid #5d9afc");
//       } else { $('#img-amex').css("border", "3px solid white"); }

//     },
//     error: function (response) {

//     }
//   });

// });


// $("#parcelamento").click(function () {

//   PagSeguroDirectPayment.getInstallments({
//     amount: 49,
//     maxInstallmentNoInterest: 1,
//     //brand: 'visa',

//     success: function (response) { console.log(response); },
//     error: function (response) { console.log(response); }
//   });

// });

// $("#cvv").keyup(function () {  //criar token

//   numCartao = $("#numCartao").val();
//   cvvCartao = $("#cvv").val();
//   expiracaoMes = $("#pagamentoMes").val();
//   expiracaoAno = $("#pagamentoAno").val();

//   PagSeguroDirectPayment.createCardToken({
//     cardNumber: numCartao,
//     cvv: cvvCartao,
//     expirationMonth: expiracaoMes,
//     expirationYear: expiracaoAno,

//     success: function (response) { $(".tokenPagamentoCartao").val(response['card']['token']); },
//     error: function (response) { console.log(response); }
//   });

// });

// $("#meios").click(function () { //meios de pagamento disponíveis

//   PagSeguroDirectPayment.getPaymentMethods({
//     amount: 500,
//     success: function (response) { console.log(response); },
//     error: function (response) { console.log(response); }
//   });

// });



