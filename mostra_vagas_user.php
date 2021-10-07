<!DOCTYPE html>


<?php

if(!isset($_SESSION)){
    session_start();
}

	require("conexao.php"); 
	$idUsuario = $_SESSION['idusuario'];

    $sql = "SELECT id, name, valor, tempoAtivo, situacao FROM anuncios WHERE FKusuarioID = '$idUsuario' ";
	  $result = mysqli_query($link, $sql);
    
    

	while($row = $result->fetch_assoc()) {

     ?>
       	 <tr> 
         <td><center> <?php echo $row['id']; ?> <br></center></td> 
	     <td><center><?php echo $row['name']; ?><br></center></td> 
         <td><center><?php echo $row['situacao']; ?><br></center></td> 
         <td><center><img src="imagens/alterarBtn.png"  width="20px" height="20px" data-id="<?php echo htmlspecialchars($row["id"]); ?>" class="alterar"><br></center></td>  
         <td><center><img src='imagens/excluirBtn.png'  width='20px' height='20px' data-id="<?php echo htmlspecialchars($row["id"]); ?>" class="lixo"><br></center></td>
     </tr> 
    <?php   
    }
    
?>


</html>
