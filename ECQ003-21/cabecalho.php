<!-- includes-->

<link rel="icon" href="title.ico" type="image/x-icon">

<?php
header('Content-Type: text/html; charset=utf-8');
include('../sessao.php');
include('../conexao.php');


if (!isset($_SESSION)) {
  session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>

        <header class="container-fluid" id="estilo">
            <br>
            <!-- botões e configurações de menus -->
            <div class="container">
                <div class="row">
                    <div id="estilo" class="col">
                        <img class="especifico1" src="../Imagens/Logo.png">
                    </div>
                    <div id="estilo2" class="col">
                        <img class="especifico" src="../Imagens/Logo - LAGIZ_SEM FUNDO.png">
                    </div>
                    <div id="estilo2" class="col">
                        <img class="especifico" src="../Imagens/logo_IEPRO.png">
                    </div>
                    <div id="estilo2" class="col">
                        <img class="especifico" src="../Imagens/MicrosoftTeams-image.png">
                    </div>
                </div>
  
                <div class="row">
                    <div class="col">
                        <h1>
                            Visualizador de dados
                        </h1>
                    </div>
                </div>
                <div class="col">
                    <h6>
                        Esta&#231&#227o compacta de monitoramento Ambiental
                    </h6>
                    <h3>
                        <?php
          if (!$_SESSION) {
            echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">';
            echo ' <strong>Alert!</strong> Por favor efetuar o login novamente.';
            //botão login
            echo '<button class="btn btn-outline-info text-black rounded-pill"';
            echo 'onclick="window.location.href=';
            echo "'../index'";
            echo '">login</button>';
            echo ' </div>';
          } else {
 
            echo "(Modelo ECMQAr-5 Serial:"." ".$_SESSION['nome'].")";
            //botão sair 
            echo '<br>';

         //   echo '<button class="btn btn-outline-info text-light rounded-pill"';
         //   echo 'onclick="window.location.href=';
         //  echo "'../index.php'";
         //   echo '">Sair</button>';

         echo ' </div>';
            echo ' </h3>';
            //FINAL DA TAG H6
            echo ' </div>';


            // meta tags
            echo '  <nav id="navbar-example2" class="container-fluid">';
            echo '   <ul>';
            echo '     <li class="nav dropdown">';

            echo '<button style="margin: 0 15px;" class="btn btn-outline-info text-light rounded-pill"';
            echo 'onclick="window.location.href=';
            echo "'index'";
            echo '">Tabela</button>';

            echo '<a class="btn btn-outline-info text-light rounded-pill" data-bs-toggle="dropdown"';
            echo 'href=';
            echo "'grafico1'";
            echo ' role="button" aria-expanded="false">Graficos</a>';
          }
          //fechamento da tag PHP
          ?>
                        <!-- botões e configurações de menus -->
                        <ul class="dropdown-menu">
                            <li class="dropdown-item" onclick="window.location.href='grafico1'">CO</li>
                            <li class="dropdown-item" onclick="window.location.href='grafico2'">SO2</li>
                            <li class="dropdown-item" onclick="window.location.href='grafico3'">NO2</li>
                            <li class="dropdown-item" onclick="window.location.href='grafico4'">O3</li>
                            <li class="dropdown-item" onclick="window.location.href='grafico5'">PM2.5</li>
                            <li class="dropdown-item" onclick="window.location.href='grafico6'">PM10</li>
                            <li class="dropdown-item" onclick="window.location.href='grafico7'">TVOC</li>
                            <li class="dropdown-item" onclick="window.location.href='grafico8'">VV</li>
                            <li class="dropdown-item" onclick="window.location.href='grafico9'">DV</li>
                            <li class="dropdown-item" onclick="window.location.href='grafico10'">TEMP</li>
                            <li class="dropdown-item" onclick="window.location.href='grafico11'">UMID</li>
                            <li class="dropdown-item" onclick="window.location.href='grafico12'">ATM</li>
                        </ul>
                        <button style="margin: 0 15px;" class="btn btn-outline-info text-light rounded-pill"
                            onclick="window.location.href='../index'">Sair</button>
                        </li>

                        </ul>
                        </nav>

                        <!-- Include Javascript-->
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
                            rel="stylesheet"
                            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                            crossorigin="anonymous">
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                            crossorigin="anonymous">
                        </script>

                        <hr>

                </div>
        </header>
    </body>

</html>