<?php
//pagina teste 
include('../conexao.php');


$login = $_POST['nome'];
$senha = $_POST['senha'];




$query_select = "SELECT * FROM usuario WHERE nome = '$login'";
$select = mysqli_query($cx, $query_select);
$array = mysqli_fetch_array($select);

$logarray = $array['nome'];

  if(($login == "" || $login == null) || ($senha == "" || $senha == null)) {
     
    if($login == "" || $login == null){
        echo"<script language='javascript' type='text/javascript'>
        alert('O campo login deve ser preenchido');window.location
        .href='suporte.php'</script>";
    }
    if($senha == "" || $senha == null){
        echo"<script language='javascript' type='text/javascript'>
        alert('O campo senha deve ser preenchido');window.location
        .href='suporte.php'</script>";
    }

    }else{
      if($logarray == $login){

        echo"<script language='javascript' type='text/javascript'>
        alert('Esse login já existe');window.location
        .href='suporte.php'</script>";
   

      }else{
        $sql = "INSERT INTO usuario (nome,senha) VALUES ('$login','$senha')";
        $insert = mysqli_query($cx, $sql);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='suporte.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='suporte.php'</script>";
        }
      }
    }
?>