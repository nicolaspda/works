//FUNÇÃO QUE ENCERRA SESSÃO DO GOOGLE
 function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }

//FUNÇÃO QUE CARREGA OS DADOS DE DESCONEXÃO
  function onLoad() {
      gapi.load('auth2', function() {
        gapi.auth2.init();
      });
    }

//FUNÇÃO QUE REMOVE AS CREDENCIAS
function remove() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.disconnect().then(function () {
      console.log('disconnected.');
    });
}


//FUNÇÃO QUE CARREGA OS DADOS PARA LOGIN
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  var userID = profile.getId(); 
  var userName = profile.getName();
  var userPicture = profile.getImageUrl();
  var userEmail = profile.getEmail(); 
  var userToken = googleUser.getAuthResponse().id_token;


if(userName !== ''){

	var dados = {
			userID:userID,
      userName:userName,
     	userPicture:userPicture,
    	userEmail:userEmail
	
  };
  
	$.post('login_google.php', dados, function(retorna){

		if(retorna==1){
    
          $("#sucessoLogin").fadeIn("fast", function(e){ // Exibir a div de mensagem de sucesso
          $("#sucessoLogin").delay(1500).fadeOut("fast"); // Depois de exibido, 1,5 segundos de exibição
          
          $("body").delay(1500).fadeOut('fast', function(e){ // fica um tempo antes de redirecionar
               location.reload();
              })
            })
          }
  
  if(retorna==2){
    
      //ABRE O MODAL PARA PEDIR UM NUMERO DE TELEFONE  
      $("#modal_etapa").modal('show');
     	$("#formulario_etapa").on('submit', function (e) {
     		$('#modal_etapa').modal('hide');	
     		e.preventDefault();
     		$.ajax({
     			type: "POST",
     			url: "login_google_prim.php",
     			data: $('#formulario_etapa').serialize(),
     			success: function (data) {
            		location.reload();
     			}
     		});
        return false;
        });//FIM DO AJAX
         
         
          }

          else if(retorna==0){

          $("#falhaLogin").fadeIn("fast", function(e){ // Exibir a div de mensagem de erro
          $("#falhaLogin").delay(2800).fadeOut("fast"); // Depois de exibido, eu dou um tempo de 1,5 segundos e escondo.
 			    });
           
          }
	});

			
}

}

