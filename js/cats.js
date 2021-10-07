$(document).ready(function() {
$('.link').click(function(e) {
    e.preventDefault();
    var pega = $(this).data('rel');
    document.getElementsByName('cat1')[0].value = pega;
    $('.dropdown.oculta').hide();
    $('#' + $(this).data('rel')).fadeIn('fast');
    $("#formulario_cat").submit();
    });

$('.link2').click(function(e) {
    e.preventDefault();
    var pega2 = $(this).data('rel');
    document.getElementsByName('cat2')[0].value = pega2; 
    $("#formulario_cat").submit();
    });


//AJAX ENVIA CATEGORIAS
      $("#formulario_cat").submit(function(){
        $.ajax({
          type: "POST",
          url: "seleciona_markers.php",
          dataType: "text",
          data: $('#formulario_cat').serialize(),
          success: function( data ){
            console.log(data);
          }
        });
        return false;
      });
    //FIM AJAX             



var placesLists = {
  'informatica': '#informatica2',
  'casa_e_jardim': '#casa2',
  'autos': '#autos2',
  'servicos': '#servicos2',
  'aulas': '#aulas2',
  'pets': '#pets2',
  'consultoria': '#consultoria2',
  'eventos': '#eventos2',
  'estetica': '#estetica2',
  'saude': '#saude2',
  
};

$('select[name=categoria]').change(function(){

  //esconde os outros selects
  $('.esconde_select').hide();

	//pega valor atual
  var value = $(this).val();
  
  //se tiver algum valor na lista mostra
  if (value in placesLists){    	
    $(placesLists[value]).fadeIn('fast');
  }

});
});
