<?php
//pagina teste 
include('../conexao.php');

$id = $_POST['id'];

$sql = "DELETE FROM usuario WHERE  id = '$id'";
$insert = mysqli_query($cx, $sql);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário deletado com sucesso!');window.location.
          href='suporte.php'</script>";
        }

?>