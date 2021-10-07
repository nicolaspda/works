<!DOCTYPE html>
<?php
   require("verificarLogin.php");
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
      <script type="text/javascript" src="js/login_google.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OverlappingMarkerSpiderfier/1.0.3/oms.min.js"></script>
      <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
      <meta name="google-signin-client_id" content="52339897156-d0fpf83h51iecll02pomhk8lo21lc9ce.apps.googleusercontent.com">      
      <script type="text/javascript" src="js/clickActions.js"></script>
      <script src="js/maps.js"></script>
      <title>Works</title>
   </head>
   <body>
      <!-- Menu lateral HOME-->
      <div id="mySidenav" class="sidenav">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav();$('#painel').hide();$('#vaga').hide();$('#vagasUser').hide();">&times;</a>
         <div id="painel">
            <div id="starModalBackgroud">
               <img src="imagens/painelBackground.png"> 
            </div>
            <hr>
            <button type="button" class="btn btn-default btn btn-block" id="clica">Inserir anúncio</button>
            <button type="button" id="listSolicitacoes" class="btn btn-default btn btn-block">Meus anúncios</button>
            <button type="button" class="btn btn-default btn btn-block">Histórico de solicitações</button>
            <button type="button" class="btn btn-default btn btn-block">Inserir anúncio em destaque</button>
            <button type="button" class="btn btn-default btn btn-block" id="cadastro">Meu cadastro</button>
            <br>
            <hr>
         </div>
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
            <div id="recebe_dados" class="dadosOpornunidade" style="color:#A4A4A4"></div>
            <hr>
            <button type="button" class="btn btn-default btn btn-block" id="voltar_vaga">Voltar</button>
            <hr>
         </div>
         <div id="vagasUser" >
            <div id="starModalBackgroud">
               <img src="imagens/minhasOpsBackgroud2.png" class="img-responsive" > 
            </div>
            <hr>
            <!-- TABELA CONTENDO O RESULTADO DA PESQUISA DE OPORTUNIDADES POR USUARIO(SESSAO)  -->        
            <div class="table" >
               <table class="table table-hover table-sm"  style="width:100%" style = "max-width:350px;">
                  <thead>
                     <tr>
                        <th style="width:17%">ID</th>
                        <th style="width:44%">Título</th>
                        <th style="width:26%">Situação</th>
                        <th style="width:22%">Alterar</th>
                        <th style="width:22%">Excluir</th>
                     </tr>
                  </thead>
                  <tbody id="tableHolder">
                     <?php include 'mostra_vagas_user.php';?>
                  </tbody>
               </table>
            </div>
            <!-- FIM - TABELA CONTENDO O RESULTADO DA PESQUISA DE OPORTUNIDADES POR USUARIO(SESSAO)  -->        
            <hr>
            <button type="button" class="btn btn-default btn btn-block" id="voltar">Voltar</button>
            <hr>
         </div>
         <br>        
      </div>
      <!-- FIM Menu lateral HOME-->
      <div id="main">
         <!-- Inicio de todo conteudo que ficara abaixo do menu lateral-->
         <!-- botao da slide lateral-->
         <a href="#" title="Expandir">
            <div class="btn" id="btnside_expande"  onclick="openNav(), $('#painel').show();$('#vaga').hide();$('#vagasUser').hide();" >
               <i class="glyphicon glyphicon-menu-right" id="icon_seta">
               </i>
            </div>
      </div>
      </a>
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
               <!-- ul alinhada a direita da navbar-->
               <ul class="nav navbar-nav navbar-right">
                    <li class="nav-link" id="btnSair"><a href="logout.php" onclick="remove();signOut();">Sair</a></li>
                  <li>
                     <a  class="nav-link" onclick="openNav()" class="glyphicon glyphicon-user" >
                        <!-- PHP dentro do link inserindo o nome de usuario registrado da sessao-->
                        <?php
                           echo $_SESSION["Nome"];  
                           ?>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <!-- FIM Barra de navegação superior-->
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
      <!--  FORMULARIO DA OPORTUNIDADE  -->
      <div class="modal fade" id="cadVaga">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Cadastre a oportunidade</h4>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                  <form  id="formulario_op">
                     <br>
                     <div class="form-group">
                        Título:<br>
                        <input type="text" name="name" maxlength="40" class="form-control" required>
                     </div>
                     <div class="form-group">
                        Descrição:<br>
                        <textarea name="descricao" class="form-control" rows="5" placeholder="Informe uma breve descrição" required></textarea>
                     </div>
                     <div class="form-group">
                        Valor:<br>
                        <input type="text" class="form-control" placeholder="R$" maxlength="40" name="valor">
                     </div>
                     <div class= "logoform" id="imgcontainer" >
                        <input type="file" accept="image/*" multiple >
                     </div>
                     <br>
                     <input type="text" name="id_vaga" id="id_vagas" readonly style="border:0;">
                     <br>
                     <div class="form-group">
                        <select required name="categoria">
                           <option value="" selected>Categoria 1</option>
                           <option value="informatica">Informática</option>
                           <option value="casa_e_jardim">Casa e Jardim</option>
                           <option value="autos">Automóveis</option>
                           <option value="servicos">Serviços domésticos</option>
                           <option value="aulas">Aulas e instruções</option>
                           <option value="pets">Animais e pets</option>
                           <option value="consultoria">Consultoria</option>
                           <option value="eventos">Eventos</option>
                           <option value="estetica">Estética e beleza</option>
                           <option value="saude">Saúde e cuidados</option>
                        </select>
                     </div>
                     <!-- CAT INFORMATICA -->
                     <div class="form-group">
                        <select name="categoria2[]" id="informatica2" class="esconde_select">
                           <option value="" selected>Categoria 2</option>
                           <option value="formatar">Formatar</option>
                           <option value="limpar">Limpar</option>
                           <option value="reparar">Reparar</option>
                           <option value="instalar">Instalar</option>
                           <option value="aulas">Aulas e instruções</option>
                           <option value="trocar">Trocar</option>
                           <option value="programar">Programar</option>
                           <option value="transporte">Transporte</option>
                           <option value="celular">Smartphones</option>
                           <option value="sistemas">Sistemas diversos</option>
                        </select>
                     </div>
                     <!-- CAT Casa e Jardim -->
                     <div class="form-group">
                        <select name="categoria2[]" id="casa2" class="esconde_select">
                           <option value="" selected>Categoria 2</option>
                           <option value="pintar">Pintar</option>
                           <option value="limpar">Limpar</option>
                           <option value="cortar">Cortar</option>
                           <option value="reformas">Reformas</option>
                           <option value="reparar">Reparar</option>
                           <option value="instalar">Instalar</option>
                           <option value="decorar">Decorar</option>
                           <option value="trocar">Trocar</option>
                           <option value="transporte">Serviços de transporte</option>
                           <option value="vidracaria">Vidraçaria</option>
                           <option value="servicos">Serviços gerais</option>
                        </select>
                     </div>
                     <!-- CAT Automóveis -->
                     <div class="form-group">
                        <select name="categoria2[]" id="autos2" class="esconde_select">
                           <option value="" selected>Categoria 2</option>
                           <option value="pintar">Pintar</option>
                           <option value="lavar">Lavar</option>
                           <option value="limpar">Limpar</option>
                           <option value="reparar">Reparar</option>
                           <option value="instalar">Instalar</option>
                           <option value="transporte">Serviços de transporte</option>
                           <option value="eletrica">Elétrica</option>
                           <option value="servicos">Serviços gerais</option>
                        </select>
                     </div>
                     <!-- CAT Serviços domésticos -->
                     <div class="form-group">
                        <select name="categoria2[]" id="servicos2" class="esconde_select">
                           <option value="" selected>Categoria 2</option>
                           <option value="servicos">Serviços gerais</option>
                           <option value="passar">Passar</option>
                           <option value="limpar">Limpar</option>
                           <option value="cozinhar">Cozinhar</option>
                           <option value="lavar">Lavar</option>
                           <option value="organizar">Organizar</option>
                        </select>
                     </div>
                     <!-- CAT Aulas e instruções -->
                     <div class="form-group">
                        <select name="categoria2[]" id="aulas2" class="esconde_select">
                           <option value="" selected>Categoria 2</option>
                           <option value="direcao">Aulas de direção</option>
                           <option value="idiomas">Idiomas</option>
                           <option value="particulares">Aulas particulares</option>
                           <option value="musica">Música</option>
                           <option value="arte">Dança e arte</option>
                           <option value="concursos">Para concursos</option>
                           <option value="esportes">Esportes</option>
                           <option value="marciais">Artes marciais</option>
                        </select>
                     </div>
                     <!-- CAT Animais e PETS -->
                     <div class="form-group">
                        <select name="categoria2[]" id="pets2" class="esconde_select">
                           <option value="" selected>Categoria 2</option>
                           <option value="adestrador">Adestrador</option>
                           <option value="passeador">Passeador</option>
                           <option value="banho_e_tosa">Banho e/ou Tosa</option>
                           <option value="companheiro">Companheiro(a) de passeio</option>
                           <option value="procriar">Macho ou Fêmea para procriar</option>
                        </select>
                     </div>
                     <!-- CAT Consultoria -->
                     <div class="form-group">
                        <select name="categoria2[]" id="consultoria2" class="esconde_select">
                           <option value="" selected>Categoria 2</option>
                           <option value="contador">Contador</option>
                           <option value="administrativo">Auxílio administrativo</option>
                           <option value="tradutor">Tradutor</option>
                           <option value="advogado">Advogado</option>
                           <option value="seguranca">Segurança particular</option>
                           <option value="detetive">Detetive</option>
                        </select>
                     </div>
                     <!-- CAT Eventos -->
                     <div class="form-group">
                        <select name="categoria2[]" id="eventos2" class="esconde_select">
                           <option value="" selected>Categoria 2</option>
                           <option value="promoter">Promoter</option>
                           <option value="free">FreeLancer</option>
                           <option value="dj">DJ</option>
                           <option value="bartender">Bartender</option>
                           <option value="garcom">Garçom</option>
                           <option value="animacao">Animação</option>
                           <option value="bandas">Bandas</option>
                           <option value="seguranca">Segurança</option>
                           <option value="fotografia">Fotografia</option>
                        </select>
                     </div>
                     <!-- CAT Estetica e Beleza -->
                     <div class="form-group">
                        <select name="categoria2[]" id="estetica2" class="esconde_select">
                           <option value="" selected>Categoria 2</option>
                           <option value="cabeleireiro">Cabeleireiro</option>
                           <option value="manicure">Manicure e/ou Pedicure</option>
                           <option value="maquiadora">Maquiadora</option>
                           <option value="personal_estilo">Personal Stylist</option>
                           <option value="outros">Outros</option>
                        </select>
                     </div>
                     <!-- CAT Saúde e cuidados -->
                     <div class="form-group">
                        <select name="categoria2[]" id="saude2" class="esconde_select">
                           <option value="" selected>Categoria 2</option>
                           <option value="enfermeira">Enfermeira</option>
                           <option value="cuidador">Cuidador(a)</option>
                           <option value="personal_trainer">Personal trainer</option>
                           <option value="psicologo">Psicólogo</option>
                           <option value="outros">Outros</option>
                        </select>
                     </div>
                     <!-- ENVIANDO LAT LONG DO MARKER, depois tem q esconder ele-->
                     <input type="text" class="form-control" name="lat">
                     <br>
                     <input type="text" class="form-control" name="lng">
                     <br>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
               <button type="button" class="btn btn-secondary" style="float: left" id="alterar_marker">Escolher no mapa o local do anúncio</button>
               <button type="button" class="btn btn-secondary" id="cancelar_marker" data-dismiss="modal">Cancelar</button>
               <button type="submit" class="btn btn-primary">Salvar</button>
               </div>
               </form>
            </div>
         </div>
      </div>
      <!--  Modal do formulario  -->
      <div class="modal fade" id="dadosModal"  >
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Meus dados</h4>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                  <form class="form" role="form" id="formulario_altera_usu">
                     <div class= "logoform" id="imgcontainer" >
                        <img src="Imagens/logo_works_text.png">
                     </div>
                     <br>
                     <div class="form-group">
                        Nome:<br>
                        <input type="text" name="nome" maxlength="40" class="form-control" value="<?php echo htmlspecialchars($_SESSION["Nome"]); ?>"  disabled >
                     </div>
                     <div class="form-group">
                        Telefone:<br>
                        <input type="tel"  name="telefone" class="form-control desabilitado" maxlength="10" placeholder="(xx)xxxx-xxxx" value="<?php echo htmlspecialchars($_SESSION["Telefone"]); ?>" disabled>
                     </div>
                     <div class="form-group">
                        E-mail:<br>
                        <input type="email" class="form-control" maxlength="40" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION["Email"]); ?>" disabled>
                     </div>
                     <div class="form-group">
                        Senha:<br>
                        <input type="password" class="form-control desabilitado" maxlength="20" name="senha" id="senha" placeholder="Digite uma senha" disabled>
                     </div>
                     <div class="form-group">
                        Confirme sua senha<br>
                        <input type="password" name="senhaConfirma" id="senhaConfirma" maxlength="20" placeholder="Confirme sua senha" class="form-control desabilitado" disabled>
                     </div>
                     <!-- Mensagem de cadastro de usuário com sucesso, redirecionado ele para o PrincipalUser-->
                     <div class="alert alert-success" id="DadosValidos" class="row">
                        <div>Dados atualizados com sucesso!</div>
                     </div>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
               	<button type="button" class="btn btn-secondary" id="alterar">Alterar dados</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
               <button type="submit" class="btn btn-primary">Salvar</button>
               </div>
               </form>
            </div>
         </div>
      </div>
  <!-- Modal EXCLUI VAGA -->
      <div class="modal fade" id="modal_exclui">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Titulo -->
               <div class="modal-header" >
                  <h3 class="modal-title ">Tem certeza que deseja excluir essa oportunidade?</h3>
               </div>
               <!-- Conteúdo -->
               <div  class="modal-body">
               <form class="form" role="form" id="formulario_exclui">
               <div class="form-group">             	
               		ID: <input type="text" name="id_vaga" id="id_vaga" readonly style="border:0;">         	
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
      <!-- FIM - Modal EXCLUI-->
      <div id="mapa">
      </div>
      </div>
   </body>
</html>