//Função que atualiza a tabela sem precisar recarregar a página.
function refreshTable(){
        $('#tableHolder').load('mostra_vagas_user.php', function(){
           setTimeout(refreshTable, 5000);
        });
    }

//PEGA A IMG QUE FOI CLICADA E ATRIBUI AO INPUT DO MODAL
$(document).on("click", ".alterar", function () {
   var id_vaga = $(this).data('id');
      $("#cadVaga").on("show.bs.modal", function(){
          $(".modal-body #id_vagas").val(id_vaga);
      });
      $("#cadVaga").modal({backdrop: 'static', keyboard: false});
    }); 


//PEGA A IMG QUE FOI CLICADA E ATRIBUI AO INPUT DO MODAL
 $(document).on("click", ".lixo", function () {
  var id_vaga = $(this).data('id');
  $(".modal-body #id_vaga").val(id_vaga);
  $("#modal_exclui").modal('show');
 
 var ids = {id_vaga:id_vaga};

   //AJAX EXCLUI DADOS DA VAGA
   $("#formulario_exclui").submit(function(){
   	
	   	$.ajax({
	   		type: "POST",
	   		url: "excluiDados.php",
	   		data: ids,
	   		success: function(response){
	   			if(response==true){
	   				console.log("passou");
	   				$("#modal_exclui").modal('hide');
	   				refreshTable();
	   			}
	   		}
	   	});
	   	return false;
    }); //FIM AJAX   

});



$(document).ready(function() {

//LISTAGEM DE SOLICITAÇÕES
document.getElementById("listSolicitacoes").onclick = function(){
  $('#painel').hide();
  $('#vaga').hide();
  $('#vagasUser').show();
}

//VOLTAR LISTAGEM DE SOLICITAÇÕES
document.getElementById("voltar").onclick = function(){
  $('#vagasUser').hide();
  $('#vaga').hide();
  $('#painel').show();
}



//MOSTRAR CADASTRO MODAL
document.getElementById("cadastro").onclick = function(){
  closeNav();
  $('#dadosModal').modal('show');
  //AJAX CADASTRA USUARIO SUCESSO
      $("#formulario_altera_usu").submit(function(){
         
        $.ajax({
          type: "POST",
          url: "atualizaDados.php",
          data: $('#formulario_altera_usu').serialize(),
           success: function(response){
         if(response==true){

          $("#DadosValidos").fadeIn("fast", function(e){ // Exibir a div de mensagem de sucesso
          $("#DadosValidos").delay(3500).fadeOut("fast"); // Depois de exibido, 3,5 segundos de exibição
          
          $("body").delay(3500).fadeOut('fast', function(e){ // fica um tempo antes de redirecionar
              location.reload(); 
              })
            });
          }
          }
        });
      return false;
    }); //FIM AJAX   


}
//HABILITAR CAMPOS DE ALTERAÇÃO
document.getElementById("alterar").onclick = function(){
  $(".desabilitado").removeAttr('disabled');

}



});
    