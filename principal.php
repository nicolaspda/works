<!DOCTYPE html>
<?php
if(!isset($_SESSION)){
    session_start();
}   
   if(isset($_SESSION['idusuario']))
   header("location: principalUser.php");
   
   ?>
<html lang="pt-br">
   <meta charset="UTF-8">
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <link rel="shortcut icon" href="Imagens/logo_works.png"/>
      <link rel= stylesheet type= text/css href= css/estilo.css>
      <script type="text/javascript" src="js/sidenav.js"></script>
      <script type="text/javascript" src="js/cats.js"></script> 
      <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OverlappingMarkerSpiderfier/1.0.3/oms.min.js"></script>
      <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
      <meta name="google-signin-client_id" content="52339897156-d0fpf83h51iecll02pomhk8lo21lc9ce.apps.googleusercontent.com">
      <script type="text/javascript" src="js/login_google.js"></script>
      <script src="js/maps.js"></script>
      <title>Works</title>
   </head>
   <body>
      <!-- Menu lateral HOME-->
      <div id="mySidenav" class="sidenav">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
         <div id="vaga" >
            <div id="starModalBackgroud">
               <img src="imagens/infoOpsBackground.png"> 
            </div>
            <hr>
            <!-- DADOS DA OPORTUNIDADE  -->        
            <form  id="formulario" class="form_buscaIdAnuncio">
               <input type="text" class="form-control"  name="id_marker" > 
            </form>
            <br>
            <!-- Style temporaria, passar para o CSS--> 
            <div id="recebe_dados" class="dadosOpornunidade" style="color:#A4A4A4"></div>
            <hr>
         </div>
         <!-- BUG - se apaga o ID, usuario nao loga-->   
         <button type="button" class="btn btn-default btn btn-block" id="clica" style="display:none;"></button>
         <br>        
      </div>
      <!-- FIM Menu lateral HOME-->
      <div id="main">
         <!-- Inicio de todo conteudo que ficara abaixo do menu lateral-->
         <!-- botao da slide lateral-->
         <!-- FIM - botao da slide lateral-->
         <!-- Barra de navegação superior-->
         <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
               <!-- Botao que mostra os menus ocultos do nav quando tela pequena -->
               <div class="navbar-header">
                  <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#" >
                  <img src="Imagens/works_texto_lado.png" id="logo_nav">
                  </a>
               </div>
               <form id="formulario_cat">
                     <input type="hidden" name="cat1">
                     <input type="hidden" name="cat2">
            </form>
               <!-- FIM -Botao que mostra os menus ocultos do nav quando tela pequena -->
               <div id="navbarCollapse" class="collapse navbar-collapse">
                  <ul class="nav navbar-nav">
                     <li><a class="nav-link" href="func.html">Como usar</a></li>  
                  <li class="dropdown princ">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="#" class="link" data-rel="informatica">Informática</a></li>
                        <li><a href="#" class="link" data-rel="casa_e_jardim">Casa e Jardim</a></li>
                        <li><a href="#" class="link" data-rel="autos">Automóveis</a></li>
                        <li><a href="#" class="link" data-rel="servicos">Serviços domésticos</a></li>
                        <li><a href="#" class="link" data-rel="aulas">Aulas e instruções</a></li>
                        <li><a href="#" class="link" data-rel="pets">Animais e pets</a></li>
                        <li><a href="#" class="link" data-rel="consultoria">Consultoria</a></li>
                        <li><a href="#" class="link" data-rel="eventos">Eventos</a></li>
                        <li><a href="#" class="link" data-rel="estetica">Estética e beleza</a></li>
                        <li><a href="#" class="link" data-rel="saude">Saúde e cuidados</a></li>
                     </ul>
                  </li>
                  <!-- CAT INFORMATICA -->
                  <li class="dropdown oculta" id="informatica">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias 2 INFO
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="#" class="link2" data-rel="formatar">Formatar</a></li>
                        <li><a href="#" class="link2" data-rel="limpar">Limpar</a></li>
                        <li><a href="#" class="link2" data-rel="reparar">Reparar</a></li>
                        <li><a href="#" class="link2" data-rel="instalar">Instalar</a></li>
                        <li><a href="#" class="link2" data-rel="trocar">Trocar</a></li>
                        <li><a href="#" class="link2" data-rel="programar">Programar</a></li>
                        <li><a href="#" class="link2" data-rel="aulas">Aulas</a></li>
                        <li><a href="#" class="link2" data-rel="transporte">Serviços de transporte</a></li>
                        <li><a href="#" class="link2" data-rel="celular">Smartphones</a></li>
                        <li><a href="#" class="link2" data-rel="sistemas">Sistemas</a></li>
                     </ul>
                  </li>
                  <!-- CAT CASA e JARDIM -->
                  <li class="dropdown oculta" id="casa_e_jardim">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias 2 CeJ
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="#" class="link2" data-rel="pintar">Pintar</a></li>
                        <li><a href="#" class="link2" data-rel="cortar">Cortar</a></li>
                        <li><a href="#" class="link2" data-rel="limpar">Limpar</a></li>
                        <li><a href="#" class="link2" data-rel="reformas">Reformas</a></li>
                        <li><a href="#" class="link2" data-rel="reparar">Reparar</a></li>
                        <li><a href="#" class="link2" data-rel="decorar">Decorar</a></li>
                        <li><a href="#" class="link2" data-rel="instalar">Instalar</a></li>
                        <li><a href="#" class="link2" data-rel="transporte">Serviços de transporte</a></li>
                        <li><a href="#" class="link2" data-rel="vidracaria">Vidraçaria</a></li>
                        <li><a href="#" class="link2" data-rel="servicos">Serviços gerais</a></li>
                     </ul>
                  </li>
                  <!-- CAT AUTOMOVEIS -->
                  <li class="dropdown oculta" id="autos">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias 2 
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="#" class="link2" data-rel="pintar">Pintar</a></li>
                        <li><a href="#" class="link2" data-rel="lavar">Lavar</a></li>
                        <li><a href="#" class="link2" data-rel="limpar">Limpar</a></li>
                        <li><a href="#" class="link2" data-rel="reparar">Reparar</a></li>
                        <li><a href="#" class="link2" data-rel="instalar">Instalar</a></li>
                        <li><a href="#" class="link2" data-rel="transporte">Serviços de transporte</a></li>
                        <li><a href="#" class="link2" data-rel="eletrica">Elétrica</a></li>
                        <li><a href="#" class="link2" data-rel="servicos">Serviços gerais</a></li>
                     </ul>
                  </li>
                  <!-- SERVIÇOS DOMESTICOS -->
                  <li class="dropdown oculta" id="servicos">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias 2 
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="#" class="link2" data-rel="servicos">Serviços gerais</a></li>
                        <li><a href="#" class="link2" data-rel="passar">Passar</a></li>
                        <li><a href="#" class="link2" data-rel="limpar">Limpar</a></li>
                        <li><a href="#" class="link2" data-rel="cozinhar">Cozinhar</a></li>
                        <li><a href="#" class="link2" data-rel="lavar">Lavar</a></li>
                        <li><a href="#" class="link2" data-rel="reparar">Reparar</a></li>
                        <li><a href="#" class="link2" data-rel="organizar">Organizar</a></li>
                     </ul>
                  </li>
                  <!-- AULAS E INSTRUÇÕES -->
                  <li class="dropdown oculta" id="aulas">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias 2 
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="#" class="link2" data-rel="informatica">Informática</a></li>
                        <li><a href="#" class="link2" data-rel="direcao">Aulas de direção</a></li>
                        <li><a href="#" class="link2" data-rel="idiomas">Idiomas</a></li>
                        <li><a href="#" class="link2" data-rel="aulas">Aulas particulares</a></li>
                        <li><a href="#" class="link2" data-rel="musica">Música</a></li>
                        <li><a href="#" class="link2" data-rel="arte">Dança e arte</a></li>
                        <li><a href="#" class="link2" data-rel="concursos">Para concursos</a></li>
                        <li><a href="#" class="link2" data-rel="esportes">Esportes</a></li>
                        <li><a href="#" class="link2" data-rel="marciais">Artes marciais</a></li>
                     </ul>
                  </li>
                  <!-- ANIMAIS e PETS -->
                  <li class="dropdown oculta" id="pets">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias 2 
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="#" class="link2" data-rel="adestrador">Adestrador</a></li>
                        <li><a href="#" class="link2" data-rel="passeador">Passeador</a></li>
                        <li><a href="#" class="link2" data-rel="banho_e_tosa">Banho e/ou Tosa</a></li>
                        <li><a href="#" class="link2" data-rel="companheiro">Companheiro(a) de passeio</a></li>
                        <li><a href="#" class="link2" data-rel="procriar">Macho ou Fêmea para procriar</a></li>
                     </ul>
                  </li>
                  <!-- CONSULTORIA -->
                  <li class="dropdown oculta" id="consultoria">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias 2 
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="#" class="link2" data-rel="contador">Contador</a></li>
                        <li><a href="#" class="link2" data-rel="administrativo">Auxílio administrativo</a></li>
                        <li><a href="#" class="link2" data-rel="tradutor">Tradutor</a></li>
                        <li><a href="#" class="link2" data-rel="advogado">Advogado</a></li>
                        <li><a href="#" class="link2" data-rel="seguranca">Segurança particular</a></li>
                        <li><a href="#" class="link2" data-rel="detetive">Detetive</a></li>
                     </ul>
                  </li>
                  <!-- EVENTOS -->
                  <li class="dropdown oculta" id="eventos">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias 2 
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="#" class="link2" data-rel="free">FreeLancer</a></li>
                        <li><a href="#" class="link2" data-rel="promoter">Promoter</a></li>
                        <li><a href="#" class="link2" data-rel="dj">DJs</a></li>
                        <li><a href="#" class="link2" data-rel="bartender">Bartender</a></li>
                        <li><a href="#" class="link2" data-rel="garcom">Garçom</a></li>
                        <li><a href="#" class="link2" data-rel="animacao">Animação</a></li>
                        <li><a href="#" class="link2" data-rel="bandas">Bandas</a></li>
                        <li><a href="#" class="link2" data-rel="seguranca">Segurança</a></li>
                        <li><a href="#" class="link2" data-rel="fotografia">Fotografia</a></li>
                     </ul>
                  </li>
                  <!-- ESTÉTICA E BELEZA -->
                  <li class="dropdown oculta" id="estetica">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias 2 
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="#" class="link2" data-rel="cabeleireiro">Cabeleireiro</a></li>
                        <li><a href="#" class="link2" data-rel="manicure">Manicure e/ou Pedicure</a></li>
                        <li><a href="#" class="link2" data-rel="maquiadora">Maquiadora</a></li>
                        <li><a href="#" class="link2" data-rel="personal_estilo">Personal Stylist</a></li>
                        <li><a href="#" class="link2" data-rel="outros">Outros</a></li>
                     </ul>
                  </li>
                  <!-- SAÚDE E CUIDADOS -->
                  <li class="dropdown oculta" id="saude">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias 2 
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="#" class="link2" data-rel="enfermeira">Enfermeira</a></li>
                        <li><a href="#" class="link2" data-rel="cuidador">Cuidador(a)</a></li>
                        <li><a href="#" class="link2" data-rel="personal_trainer">Personal Trainer</a></li>
                        <li><a href="#" class="link2" data-rel="psicologo">Psicólogo</a></li>
                        <li><a href="#" class="link2" data-rel="outros">Outros</a></li>
                     </ul>
                  </li>
                     <!-- FIM CATEGORIAS --> 
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                     <li class="dropdown" ><a  href="#" data-toggle="modal" data-target="#cadModal">Crie sua conta</a></li>
                     <li class="dropdown">
                        <a href="#" data-toggle="dropdown"><b>Login</b> <span ></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                           <li>
                              <div class="row">
                                 <div class="col-md-12">
                                    Acessar conta via
                                    <div class="social-buttons">
                                       <div class="g-signin2" id="btnGoogleLogin" data-onsuccess="onSignIn" style="float:left"></div>
                                       <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                    </div>
                                    ou
                                    <br>
                                    <br>
                                    <form class="form" role="form" id="formulario_login" accept-charset="UTF-8" id="login-nav">
                                       <div class="form-group">
                                          <input type="email" class="form-control" id="IdEmail" name="Email" placeholder="Email" required>
                                       </div>
                                       <div class="form-group">
                                          <input type="password" class="form-control" id="IdSenha" name="Senha" placeholder="Senha" required>
                                          <div class="help-block text-right"><a href="">Esqueceu a senha?</a></div>
                                       </div>
                                       <div class="form-group">
                                          <button type="submit" class="btn btn-primary btn-block" name="Logar" id="IdLogar" >Logar</button>
                                          <br>       
                                          <!-- Aqui é a mensagem de Login com sucesso escondida, onde será exibida no momento de validação -->                    
                                          <div class="alert alert-success" id="sucessoLogin" class="row">
                                             <div >Login efetuado com sucesso. Redirecionando...</div>
                                          </div>
                                          <!-- Aqui é a mensagem de erro de login escondida, onde será exibida  no momento de validação -->
                                          <div  class="alert alert-danger" id="falhaLogin" class="row">
                                             <div >Login e senha não conferem, tente novamente!</div>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
               </div>
               </li>
               </ul>
               </li>
               </ul>
            </div>
      </div>
      </nav>
      <!-- FIM Barra de navegação superior-->
      <!-- Modal Termos de uso -->
      <div class="modal fade" id="modal_termos">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Titulo -->
               <div class="modal-header" >
                  <h4 class="modal-title " id="modal_header_termos">Termos de uso</h4>
               </div>
               <!-- Conteúdo -->
               <div  class="modal-body">
                  <h6>
                  A utilização de qualquer serviço disponível na Works atribui, a quem se utilizar de tais serviços, a condição de Usuário (o "Usuário").
                  A utilização por parte do Usuário de qualquer dos serviços disponibilizado pelo WORKS importará na sua adesão e aceitação expressas às Condições Gerais de Uso, em qualquer dos suportes digitais em que se encontre, desde o momento em que o Usuário acesse o mesmo, assim como às Condições Particulares que, de acordo com o caso, sejam aplicáveis.
                  <br><br>
                  O Usuário concorda que somente deverá realizar operações se tiver condições econômicas de arcar com os pagamentos, custos e despesas relativos tanto às operações realizadas, quanto à utilização dos serviços da WORKS. Aplicam-se ainda aos usuários dos serviços WORKS os Termos de Uso e Privacidade do OLX, acessíveis diretamente da Home Page do olx.com.br.
                  <br><br>
                  2.1 Para a utilização dos Serviços disponibilizados pelo WORKS, o Usuário deverá efetuar seu Cadastro para identificação no portal OLX. Para o Cadastro de um Usuário como Pessoa Física na Plataforma WORKS, deverão ser fornecidos dados como nome completo, endereço, CPF, telefone, entre outros dados. Para o Cadastro de um Usuário como Pessoa Jurídica na Plataforma WORKS, deverão ser fornecidos dados como CNPJ, Razão social, Nome Fantasia, entre outros.
                  <br><br>
                  2.2 Os Dados Cadastrais inseridos no formulário deverão ser completos, preenchendo-se todos os espaços obrigatórios com informações exatas, precisas e verdadeiras, sendo o Usuário o único responsável pelos dados fornecidos.
                  <br><br>
                  2.3 O usuário é o único responsável por qualquer operação realizada em sua conta no WORKS, devendo o mesmo, manter em sigilo suas senhas, de forma que o WORKS não será em hipótese alguma responsável por quaisquer prejuízos causados ao usuário ou a terceiros, por divulgação ou utilização indevida destas.
                  <h6>
               </div>
               <!-- Cabeçalho -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!-- FIM - Modal Termos de uso -->
      <!-- Modal de boas vindas e termos de uso -->                    
      <div id="startModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content ">
               <div class="modal-header">
                  <h4 class="modal-title">Bem vindo</h4>
               </div>
               <div class="modal-body">
                  <div id="starModalBackgroud">
                     <img src="imagens/startModal_backgroud.png" class="img-responsive" alt="Cinque Terre" > 
                  </div>
                  <div class="item animated bounceInUp" id="termos">
                     Ao clicar em entrar você concorda com os <br> <a href="termos.html"  data-toggle="modal" data-target="#modal_termos" > Termos de Uso.</a>
                  </div>
                  <!-- FIM - Modal de boas vindas e termos de uso --> 
               </div>
               <form id="formulario_term" >
                  <div class="modal-footer">
                     <div class="item animated bounceInUp" id="buttom_enter"> 
                        <a href="principal.php">
                        <button type="submit" class="btn btn-success" data-dismiss="modal" >ENTRAR</button></a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!--   Modal do LOGIN -->
      <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog" >
            <!-- Modal Header -->
            <div class="modal-content">
               <div class="modal-header" >
                  <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
               </div>
               <!-- Modal body -->
               <div class="modal-body" >
                  <form role="form">
                     <div class="form-group">
                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label >
                        <input type="text" class="form-control" id="usrname" placeholder="Enter email" required>
                     </div>
                     <div class="form-group">
                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label >
                        <input type="text" class="form-control" id="psw" placeholder="Enter password" required>
                     </div>
                     <div class="checkbox">
                        <label><input type="checkbox" value="" checked>Remember me</label>
                     </div>
                     <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                     <button type="submit" class="btn btn-danger btn-block " id="btn_cancel_login" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                     <!-- Modal footer -->
                     <div class="modal-footer">
                  </form>
                  </div>
                  <br>
                  <p class="membro">Ainda não é membro? <a href="#" data-toggle="modal" data-target="#cadModal">Cadastre-se</a></p>
                  <p>Esqueceu a senha? <a href="#">Recuperar senha</a></p>
               </div>
            </div>
         </div>
      </div>
      </div>
      <!--  Fim  do modal do LOGIN  -->
      <!--  Modal do formulario  -->
      <div class="modal fade" id="cadModal"  >
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Formulário de cadastro</h4>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                  <form class="form" role="form" id="formulario_usu">
                     <div class= "logoform" id="imgcontainer" >
                        <img src="Imagens/logo_works_text.png">
                     </div>
                     <br>
                     <div class="form-group">
                        Nome:<br>
                        <input type="text" name="nome" maxlength="40" class="form-control" placeholder="Nome completo"required>
                     </div>
                     <div class="form-group">
                        Telefone:<br>
                        <input type="tel"  name="telefone" class="form-control" maxlength="10" id="telefone" placeholder="(xx)xxxx-xxxx" required>
                     </div>
                     <div class="form-group">
                        E-mail:<br>
                        <input type="email" class="form-control" placeholder="email@dominio.com.br" maxlength="40" id="email" name="email" placeholder="Informe seu E-mail" required>
                     </div>
                     <div class="form-group">
                        Senha:<br>
                        <input type="password" class="form-control" maxlength="20" name="senha" id="senha" placeholder="Digite uma senha" required>
                     </div>
                     <div class="form-group">
                        Confirme sua senha<br>
                        <input type="password" name="senhaConfirma" id="senhaConfirma" maxlength="20" placeholder="Confirme sua senha" class="form-control" required>
                     </div>
                     <!-- Mensagem de cadastro de usuário com sucesso, redirecionado ele para o PrincipalUser-->
                     <div class="alert alert-success" id="EmailCadValido" class="row">
                        <div >Cadastro efetuado com sucesso, primeiro acesso sendo iniciado...</div>
                     </div>
                     <!-- Mensagem quando o email informado já encontra-se cadastrado -->
                     <div  class="alert alert-danger" id="EmailCadNaoValido" class="row">
                        <div >O Email informado já encontra-se cadastrado!</div>
                     </div>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
               <button type="submit" class="btn btn-primary">Salvar</button>
               </div>
               </form>
            </div>
         </div>
      </div>
       <!-- Modal ETAPA -->
      <div class="modal fade" id="modal_etapa">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Titulo -->
               <div class="modal-header" >
                  <h2 class="modal-title ">Só falta uma etapa para concluir seu cadastro!</h2>
               </div>
               <!-- Conteúdo -->
               <div  class="modal-body">
               <form class="form" role="form" id="formulario_etapa">
               <div class="form-group">
                        <label for="tele"><span class="glyphicon glyphicon-user"></span> Informe seu telefone, para que caso seja de seu interesse cadastrar uma oportunidade, você possa ser contatado.</label>
                        <input type="text" class="form-control" name="tele" id="tele" placeholder="(xx)xxxx-xxxx">
                     </div>
               </div>
               <!-- Cabeçalho -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Continuar</button>
               </div>
            </form>
            </div>
         </div>
      </div>
      <!-- FIM - Modal ETAPA -->
      <div id="mapa">
      </div>
      </div>
   </body>
</html>