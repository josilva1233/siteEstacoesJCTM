<?php
//pagina teste 
include('../conexao.php');
include('../sessao.php');
include('../title.php');
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
            id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>

        <link rel="stylesheet" href="../main.css">
    </head>

    <body id="estilo">
        <div class="container">
            <div class="row align-items-start">

                <div class="col">
                    <?php
                // conexão banco de dados 
              
                //quantidades de chamados atendidos
                echo '<div class="col">';
                echo ' <h1>Status</h1>';
                $total = 0;
                $n = 1;
                $query3 = "SELECT * FROM suportejctm WHERE posicao = 'concluido' ";
                $query3 = $cx->query($query3);
                $total = $query3->num_rows;

                $total2 = 0;
                $n2 = 1;
                $query4 = "SELECT * FROM suportejctm WHERE posicao = 'pendente' ";
                $query4 = $cx->query($query4);
                $total2 = $query4->num_rows;


                echo '<b> Finalizado: ' . $total . '</b>';
                echo '<br>';
                echo '<b> Pendente: ' . $total2 . '</b>';
                echo '</div>';

                ?>

                </div>


                <div class="col">
                    <h1>Cadastrar de Usuario </h1>
                    <form method="POST" action="cadastro.php">
                        <label>Login:</label>
                        <input type="text" name="nome" id="login">
                        <br>
                        <label>Senha:</label>
                        <input type="password" name="senha" id="senha">
                        <br>
                        <input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
                    </form>

                    <button style="margin: 0 15px;" class="btn btn btn-primary"
                        onclick="window.location.href='../index.php'">Retornar a tela inicial</button>

                </div>
                <div class="col">

                    <?php

               

                echo '<h1>Usuario cadastrados</h1>';

                // consulta no banco de dados   
                $query = sprintf("SELECT * FROM usuario");
                // executa a query
                $dados = mysqli_query($cx, $query);
                // transforma os dados em um array
                $linha = mysqli_fetch_assoc($dados);
                // calcula quantos dados retornaram
                $total = mysqli_num_rows($dados);
                // se o número de resultados for maior que zero, mostra os dados
                if ($total > 0) {
                    // inicia o loop que vai mostrar todos os dados
                    do {
                        
                ?>

                    <div class="container" >
                        <p>
                            <?= $linha['nome'] ?> id <?= $linha['id'] ?>
                        <form method="POST" action="deletar.php">
                            <input type='none' name="id" id="id" value="<?= $linha['id'] ?>">

                            <input type="submit" value="deletar" id="deletar" name="deletar">
                            </p>
                        </form>
                    </div>
                    <?php
       
                        // finaliza o loop que vai mostrar os dados
                    } while ($linha = mysqli_fetch_assoc($dados));
                    // fim do if
                }
                ?>
                </div>
                <div class="col">
                    <h1>Chamados abertos</h1>
                    <?php
                // conexão banco de dados 
               
                // consulta no banco de dados   
                $query2 = sprintf("SELECT * FROM suportejctm WHERE posicao = 'pendente'");
                // executa a query
                $dados2 = mysqli_query($cx, $query2);
                // transforma os dados em um array
                $linha2 = mysqli_fetch_assoc($dados2);
                // calcula quantos dados retornaram
                $total2 = mysqli_num_rows($dados2);
                // se o número de resultados for maior que zero, mostra os dados
                if ($total2 > 0) {


                    // inicia o loop que vai mostrar todos os dados
                    do {
                ?>

                    <div>

                        <p><?= $linha2['usuario'] ?> <br><?= $linha2['email'] ?> <br><?= $linha2['msg'] ?><br> id
                            <?= $linha2['id'] ?>

                        <form method="POST" action="arquivar.php">
                            <input name="id" value="<?= $linha2['id'] ?>">
                            <input type="submit" value="arquivar" id="deletar" name="deletar">
                            </p>
                        </form>

                    </div>

                    <?php
                        // finaliza o loop que vai mostrar os dados
                    } while ($linha2 = mysqli_fetch_assoc($dados2));
                    // fim do if

                } else {
                    echo "Nao possui chamados abertos";
                }
                ?>
                </div>

            </div>
    </body>

</html>
<?php
// tira o resultado da busca da memória
mysqli_free_result($dados);
mysqli_free_result($dados2);
mysqli_free_result($query3);

?>

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