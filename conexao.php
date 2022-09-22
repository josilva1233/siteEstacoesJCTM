<?php 
/* Conexão com mysql phpmyadmim */
$dsn = 'localhost';
$dbse = 'banco_dados';
$user = 'FWS';
$password = 'fws';

//iniciando a conexão com o banco de dados 
$cx = mysqli_connect( $dsn, $user, $password, $dbse) or die( ' Erro na conexão com o banco de dados' );
?>