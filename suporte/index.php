<?php
//pagina teste 
include('../conexao.php');


$email = $_POST['email'];
$nome = $_POST['usuario'];
$mensagem = $_POST['msg'];
$status = "pendente";

//INSERT INTO `suportejctm`(`email`, `nome`, `msg`, `id`) VALUES ([value-1],[value-2],[value-3],[value-4])

$sql1 = "INSERT INTO suportejctm (email,usuario,msg,posicao)  VALUES ('$email','$nome','$mensagem','$status')";
$insert = mysqli_query($cx, $sql1);

//Seleciona informação do banco de dados do tipo ID
$sql2 = "SELECT * FROM suportejctm ORDER BY id DESC";
$select = mysqli_query($cx, $sql2);
$dados = mysqli_fetch_array($select);

$data = date('Ymd');
$id = $dados['id'];

//Exibe com javascript na tela do usuário informando o numero de ID para controle.
if($insert){
 echo"<script language='javascript' type='text/javascript'>
 alert('mensagem enviada com sucesso! Numero de chamado e: $data$id, obrigado $nome');window.location.
  href='http://hidromet.ddns.com.br/siteEstacoes/index'</script>";
}



?>




