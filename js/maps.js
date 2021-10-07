function initialize() {


// Exibir mapa com localização fixa;
var myLatlng = new google.maps.LatLng(-30.0593266, -51.1192982,12);
var marker_cluster = [];
var mapOptions = {
	zoom: 12,
	center: myLatlng,
	panControl: false,
	zoomControl: true,
	mapTypeControl: false,
	scaleControl: true,
	streetViewControl: true,
	overviewMapControl: true,
	rotateControl: true,
  fullscreenControl: false


}

// Exibir o mapa na div #mapa;
  var map = new google.maps.Map(document.getElementById("mapa"), mapOptions);

  //DECLARAR GLOBAL COMO MEIO DA TELA E SE A TELA MUDAR REALOCA O MARKER
  var global_pos = map.getCenter();
  google.maps.event.addListener(map, 'bounds_changed', function() {
          global_pos = map.getCenter();
         }); 
  
 
//PERSONALIZA O MARKER COM TEXTO
var customLabel = {
	restaurant: {
		label: 'A'
	},
	bar: {
		label: 'B'
	}
};

//INSERINDO NO MAPA PINS DO BANCO
var infoWindow = new google.maps.InfoWindow;

//SPIDER MAP

// Criando OverlappingMarkerSpiderfier instancia
      var oms = new OverlappingMarkerSpiderfier(map,
        {markersWontMove: true, markersWontHide: true});

      // Necessario para o Spiderfy funcionar
      oms.addListener('click', function(marker) {
        infoWindow.setContent(marker.desc);
        infoWindow.open(map, marker);
      });

          // Página que os markers serão inseridos
          downloadUrl('resultado.php', function(data) {
          	var xml = data.responseXML;
          	var markers = xml.documentElement.getElementsByTagName('marker');
          	Array.prototype.forEach.call(markers, function(markerElem) {
          		var id = markerElem.getAttribute('id');
          		var name = markerElem.getAttribute('name');
          		var address = markerElem.getAttribute('address');
          		var type = markerElem.getAttribute('type');
          		var point = new google.maps.LatLng(
          			parseFloat(markerElem.getAttribute('lat')),
          			parseFloat(markerElem.getAttribute('lng')));

              //CRIA INFOWINDOW COM TITULO E ADRESS
              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              
              
              //INSERE ICON PERSONALIZADO E MARKER
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
              	map: map,
              	position: point,
              	label: icon.label
              });

              // Necessario para o Spiderfy funcionar
        	  oms.addMarker(marker);
        	  
              marker_cluster.push(marker);

              //AO CLICAR ABRE SIDEBAR
              marker.addListener('click', function() {
              	infoWindow.setContent(infowincontent);
              	infoWindow.open(map, marker);
              	document.getElementsByName('id_marker')[0].value = id;
                //AJAX MOSTRA DADOS
                $("#formulario").submit(function(){
                	$.ajax({
                		type: "POST",
                		url: "mostra_vaga.php",
                		data: $('#formulario').serialize(),
                		success: function( data ){
                			$("#recebe_dados").html( data );
                		}
                	});
                	
                	return false;
                });
               	//FIM AJAX	                  
               	$("#formulario").submit();              
               	$("#painel").hide();
                $('#vagasUser').hide();
               	$("#vaga").show();
               	openNav();
               	//VOLTAR MOSTRAR VAGA
				document.getElementById("voltar_vaga").onclick = function(){
				  $('#vagasUser').hide();
				  $('#vaga').hide();
				  $('#painel').show();
				}
               });
            });
          	var markerCluster = new MarkerClusterer(map, marker_cluster, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m', maxZoom: 15});
          });
          //FIM DO CODIGO QUE INSERE DO BANCO



//INSERINDO PIN
function addmarker() {

  	var marker = new google.maps.Marker({
		position: global_pos,
		map: map,
		title: 'Sua vaga aqui',
		animation: google.maps.Animation.BOUNCE,
		draggable: true
	});


	function cad_marker(){
        //PEGA A POSIÇÃO APÓS LARGAR O PIN      
        document.getElementsByName('lat')[0].value = marker.getPosition().lat();
        document.getElementsByName('lng')[0].value = marker.getPosition().lng();	
     	// MOSTRA MODAL DA VAGA AO LARGAR O MARKER
     	$('#cadVaga').modal({backdrop: 'static', keyboard: false}); 
        }//FIM CAD_MARKER

        cad_marker();
        
     	//AJAX INFORMA CADASTRO DA VAGA SUCESSO
     	$("#formulario_op").on('submit', function (e) {
     		$('#cadVaga').modal('hide');	
     		e.preventDefault();
     		$.ajax({
     			type: "POST",
     			url: "cadastraop.php",
     			data: $('#formulario_op').serialize(),
     			success: function (data) {
     				    alert(data);
            		location.reload();
     			}
     		});
        return false;
        });//FIM DO AJAX
    

     //AO CLICAR ALTERA A POSIÇÃO DO MARKER
     document.getElementById("alterar_marker").onclick = function(){
     	$('#cadVaga').modal('hide');
     	closeNav();
     	google.maps.event.addListener(marker, 'dragend', function() {
     	cad_marker();	
     	$('#cadVaga').modal('show');
     	}); 	
     }

     //BOTAO CANCELA MARKER
     document.getElementById("cancelar_marker").onclick = function(){
     	marker.setMap(null);
     }   
     
     

}//FIM DO ADD MARKER



  //Buscar Geolocalização via HTML5

  var infoWindow = new google.maps.InfoWindow({map: map});
  
  if (navigator.geolocation) {
  	navigator.geolocation.getCurrentPosition(function(position) {
  		var pos = {
  			lat: position.coords.latitude,
  			lng: position.coords.longitude
  		};

  		global_pos = pos;
  		google.maps.event.addListener(map, 'bounds_changed', function() {
          global_pos = pos;
         }); 
//Exibir caixa de dialogo se geolocalizao = true:

           /* infoWindow.setPosition(pos);
           infoWindow.setContent('Localização encontrada.');*/


//Centraliza o mapa baseada na geolocalizaçao:

//map.setCenter(pos);

//Marker azul sendo posicionado no resultado da geolocalizao:

var marker = new google.maps.Marker({
	position:pos, 
	icon:{path:google.maps.SymbolPath.CIRCLE,
		fillColor:"#4285F4",
		fillOpacity:1,
		scale:6,
		strokeColor:"white",
		strokeWeight:2}
	});

//VALORES DO CIRCLE
var radius = 350;
var position = marker.getPosition();
var circle = new google.maps.Circle({
	center: position, 
	radius: radius, 
	fillColor: "#0000FF", 
	fillOpacity: 0.1, 
	map: map, 
	strokeColor: "#FFFFFF", 
	strokeOpacity: 0.1, 
	strokeWeight: 2 
});

marker.setMap(map);


},function() {
	handleLocationError(true, infoWindow, map.getCenter());
});
  } else {

          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }

        //APLICA A FUNÇÃO DO MY LOCATION
        addYourLocationButton(map, infoWindow);

        //APLICA A FUNÇÃO DO INSERIR PIN QUE ARRASTA
        document.getElementById("clica").onclick = function(){
         $("#cadVaga").on("show.bs.modal", function(){
            $(".modal-body #id_vagas").val("");
          });
        	addmarker();

    }




        //VALIDAR SENHA DIGITADA NOVAMENTE
        var password = document.getElementById("senha"), 
        confirm_password = document.getElementById("senhaConfirma");

          function validatePassword(){
            if(password.value != confirm_password.value) {
              confirm_password.setCustomValidity("Senhas não conferem!");
              $("#senhaConfirma").focus(); // Volta para o campo de senha.

            } else {
              confirm_password.setCustomValidity('');
            }
          }

      //AJAX CADASTRA USUARIO SUCESSO
      $("#formulario_usu").submit(function(){
      	$('#cadModal').modal('show');  
      	$.ajax({
      		type: "POST",
      		url: "cadastra.php",
      		data: $('#formulario_usu').serialize(),
      		 success: function(response){
         if(response==true){

          $("#EmailCadValido").fadeIn("fast", function(e){ // Exibir a div de mensagem de sucesso
          $("#EmailCadValido").delay(3500).fadeOut("fast"); // Depois de exibido, 3,5 segundos de exibição
          
          $("body").delay(3500).fadeOut('fast', function(e){ // fica um tempo antes de redirecionar
              location.reload(); 
              })
            });
          }else{
        
          $("#EmailCadNaoValido").fadeIn("fast", function(e){ // Exibir a div de mensagem de erro
          $("#EmailCadNaoValido").delay(2800).fadeOut("fast"); // Depois de exibido, eu dou um tempo de 1,5 segundos e escondo.
          $("#email").focus(); // Volta para o campo de senha.


            });
           }
          }
        });
      return false;
    }); //FIM AJAX   


    //AJAX LOGA USUARIO SUCESSO 
    $("#formulario_login").submit(function(e){  
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "login.php",
        data: $('#formulario_login').serialize(),
        success: function(response){
         if(response==true){

          $("#sucessoLogin").fadeIn("fast", function(e){ // Exibir a div de mensagem de sucesso
          $("#sucessoLogin").delay(1500).fadeOut("fast"); // Depois de exibido, 1,5 segundos de exibição
          
          $("body").delay(1500).fadeOut('fast', function(e){ // fica um tempo antes de redirecionar
              location.reload(); 
              })
            });
          }else{
        
          $("#falhaLogin").fadeIn("fast", function(e){ // Exibir a div de mensagem de erro
          $("#falhaLogin").delay(2800).fadeOut("fast"); // Depois de exibido, eu dou um tempo de 1,5 segundos e escondo.
          $("#IdSenha").focus(); // Volta para o campo de senha.

            });
           }
          }
        });
      return false;
    }); //FIM AJAX


} //aqui eh o fim no initMAP



//Carrega modal de boas vindas e termos p/ usuarios de primeira

$(function() {
  if (typeof Storage != "undefined") {
    if (!localStorage.getItem("done")) {
      setTimeout(function() {
        $('#startModal').modal('show');
      }, 1400);
    }
//ARRUMAR, Salvar coockie apenas quando o usuário clinar em entrar!
    localStorage.setItem("done", true);
 
  }
});


//FUNÇÕES PRA MOSTRAR OS PINS DO BANCO 
function downloadUrl(url, callback) {
	var request = window.ActiveXObject ?
	new ActiveXObject('Microsoft.XMLHTTP') :
	new XMLHttpRequest;

	request.onreadystatechange = function() {
		if (request.readyState == 4) {
			request.onreadystatechange = doNothing;
			callback(request, request.status);
		}
	};

	request.open('GET', url, true);
	request.send(null);
}

function doNothing() {}


// BOTÃO MY LOCATION
function addYourLocationButton(map, marker) 
{
	var controlDiv = document.createElement('div');
	
	var firstChild = document.createElement('button');
	firstChild.style.backgroundColor = '#fff';
	firstChild.style.border = 'none';
	firstChild.style.outline = 'none';
	firstChild.style.width = '28px';
	firstChild.style.height = '28px';
	firstChild.style.borderRadius = '2px';
	firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
	firstChild.style.cursor = 'pointer';
	firstChild.style.marginRight = '10px';
	firstChild.style.padding = '0px';
	firstChild.title = 'Minha localização';
	controlDiv.appendChild(firstChild);
	
	var secondChild = document.createElement('div');
	secondChild.style.margin = '5px';
	secondChild.style.width = '18px';
	secondChild.style.height = '18px';
	secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-1x.png)';
	secondChild.style.backgroundSize = '180px 18px';
	secondChild.style.backgroundPosition = '0px 0px';
	secondChild.style.backgroundRepeat = 'no-repeat';
	secondChild.id = 'you_location_img';
	firstChild.appendChild(secondChild);
	
	google.maps.event.addListener(map, 'dragend', function() {
		$('#you_location_img').css('background-position', '0px 0px');
	});

	firstChild.addEventListener('click', function() {
		var imgX = '0';
		var animationInterval = setInterval(function(){
			if(imgX == '-18') imgX = '0';
			else imgX = '-18';
			$('#you_location_img').css('background-position', imgX+'px 0px');
		}, 500);
		if(navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
				marker.setPosition(latlng);	
				map.setZoom(15);
				map.panTo(latlng);	
				clearInterval(animationInterval);
				$('#you_location_img').css('background-position', '-144px 0px');
			});
		}
		else{
			clearInterval(animationInterval);
			$('#you_location_img').css('background-position', '0px 0px');
		}
	});
	
	controlDiv.index = 1;
	map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
}

//FIM  MY LOCATION


function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(browserHasGeolocation ?
		'O serviço de geolocalização não está ativo!' :
		'O navegador não oferece suporte para geolocalização!');
}

// Função para carregamento assíncrono
function loadScript() {
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyCTOPUJ_vcrl1rRA0Yjlnwd8QHiLrvR2UY&callback=initialize";
	document.body.appendChild(script);
}

window.onload = loadScript;