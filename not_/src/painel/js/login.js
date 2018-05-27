
$('#btnLogin').click(function(event) {
  event.stopPropagation();
  if($("#login").val() != "" && $("#password").val() != ""){
    carregando();
    var data = $('#formLogin').serialize();
    $.ajax({
        type: 'post',
        url: './../controller/LoginController.php',
        data: data,
        success: function(response) {

            if(response.length < 10)
                window.location.href = 'dashboard.php';
            else{
                $()

                $("#retornoLogin").removeAttr('class', 'd-none');
                $("#retornoLogin").attr('class', 'text-danger');
                $("#retornoLogin").text(response);

                setTimeout(function(){ $("#retornoLogin").attr('class', 'd-none'); }, 3000);

            }

            parar();
        }
    });
}

else{
    if($("#login").val().length==0){
        $("#login").attr('style', 'border-color: red');
        $("#login").focus();

        $("#login").focusout(function(event) {
            if($("#login").val().length>0){
                $("#login").attr('style', 'border-color: #e7e7e7');

            }
        });


    }

    if($("#password").val().length==0){
        $("#password").attr('style', 'border-color: red');
        $("#password").focus();

        $("#password").focusout(function(event) {
            if($("#password").val().length>0){
                $("#password").attr('style', 'border-color: #e7e7e7');
                
            }
        });


    }
    
}



});

