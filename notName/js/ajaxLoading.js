  function carregando() {
    $.blockUI({
      css: {
        border: 'none',
        padding: '15px',
        backgroundColor: '#000',
        '-webkit-border-radius': '10px',
        '-moz-border-radius': '10px',
        opacity: .5,
        color: '#fff'
      },
      message: '<img src="./img/loading.gif" style="width:7%"/ onerror = "this.src=\'./../img/loading.gif\' "> Por favor aguarde...'
    });
  }

  function parar(){
    $.unblockUI();
  }