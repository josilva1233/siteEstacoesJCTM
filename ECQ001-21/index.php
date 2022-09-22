<!doctype html>
<html lang="en">

    <head>
        <!-- meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap-datepicker.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet'>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
            integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">


        <!-- Include Javascript-->
        <script type="text/javascript" src="../js/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="js..//bootstrap-datepicker.pt-BR.min.js"></script>

        <!-- Include Titulo-->
        <link rel="icon" href="title.ico" type="image/x-icon">
        <?php include ('../title.php') ?>

    </head>

    <body>
        <?php include ('../ECQ001-21/cabecalho.php');?>
        <?php
     
      if(!$_SESSION){
       
        echo' <div class="alert alert-warning alert-dismissible fade show" role="alert">';
        echo' <strong>Alert!</strong> Por favor efetuar o login novamente.';
        echo'<button class="btn btn-outline-info text-black rounded-pill"'; echo 'onclick="window.location.href='; echo"'../index.php'"; echo '">login</button>';
        echo' </div>';

      }else{
        include ('../ECQ001-21/main.php');
        
      }
      ?>

        <?php 
        include ('../rodape.php');
        ?>
    </body>

</html>