<?php
include('../conexao.php');

$id = $_POST['id'];
$status = 'concluido';

$sql = "UPDATE suportejctm  SET posicao = ('$status')  WHERE id = ('$id')";

$insert = mysqli_query($cx, $sql);

if($insert){
  echo"<script language='javascript' type='text/javascript'>
  alert('arquivado com sucesso!');window.location.
  href='suporte.php'</script>";
}

?>




