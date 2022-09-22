<?php 

if(isset($_POST['nome']) || isset($_POST['senha'])){
    if(strlen($_POST['nome']) == 0 ){

        echo"<script language='javascript' type='text/javascript'>
        alert('O campo login deve ser preenchido');window.location
        .href='index'</script>";

    } else if(strlen($_POST['senha'])== 0){

        echo"<script language='javascript' type='text/javascript'>
        alert('O campo de senha deve ser preenchido');window.location
        .href='index'</script>";

    } else{
        $nome = $cx->real_escape_string($_POST['nome']);
        $senha = $cx->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuario WHERE nome = '$nome' AND senha = '$senha'";
        $sql_query = $cx->query($sql_code) or die ("falha na execução do codigo" . $cx->error);

        $quantidade = $sql_query->num_rows;
        
        if($quantidade == 1){

            $usuario = $sql_query->fetch_assoc();

            if(isset($_SESSION)){
                session_start();
            }

            session_start();
            $_SESSION['nome'] = $usuario['nome'];


            if($usuario['nome'] == "Reduc_1210"){
                header("Location: Reduc/menu");
            } else if($usuario['nome'] == "suportejctm"){
                header("Location: suporte/suporte");
            } else if($usuario['nome'] == "ADMIN"){
                header("Location: selecionar");
            } else if($usuario['nome'] == "Furnas"){
                header("Location: Furnas/index");
            }else if($usuario['nome'] == "ECQ003_21"){ 
                header("Location: ECQ003-21/index");
            }else if($usuario['nome'] == "ECQ007_22"){
                header("Location: ECQ007-22/index");
            }else if($usuario['nome'] == "ECQ002_21"){
                header("Location: ECQ002-21/index");
            }else if($usuario['nome'] == "ECQ001_21"){
                header("Location: ECQ001-21/index");
            }else if($usuario['nome'] == "ECQ004_21"){
                header("Location: ECQ004-21/index");
            }else if($usuario['nome'] == "ECQ005_21"){
                header("Location: ECQ005-21/index");
            }else if($usuario['nome'] == "cimentosliz"){
                header("Location: cimentosliz/index");
            }else if($usuario['nome'] == "Sinfomet"){
                header("Location: SINFOMET/index");
            } else{
               
                echo"<script language='javascript' type='text/javascript'>
                alert('Usauario sem permissão de acesso');window.location
                .href='index'</script>";
            }

            
        } else{

            echo"<script language='javascript' type='text/javascript'>
            alert('Falha ao logar!: Usuario ou senha incorretos');window.location
            .href='index.php'</script>";
        }
    }
}

?>


