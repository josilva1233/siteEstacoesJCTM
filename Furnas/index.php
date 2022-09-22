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
        <?php include ('../Furnas/cabecalho.php');?>
        <?php
     
      if(!$_SESSION){
       
        echo' <div class="alert alert-warning alert-dismissible fade show" role="alert">';
        echo' <strong>Alert!</strong> Por favor efetuar o login novamente.';
        echo'<button class="btn btn-outline-info text-black rounded-pill"'; echo 'onclick="window.location.href='; echo"'../index.php'"; echo '">login</button>';
        echo' </div>';

      }else{

  
        include ('../Furnas/main.php');
      }
      ?>

        <?php include ('../rodape.php');?>



        <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Hello, world! This is a toast message.
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </body>
<!-- Init code chat-milvus //--><script src=https://chat.api.milvus.com.br/apichat/widget/script/a3c1408855/d1b220e92c32def5fcc0ebb34820160a42272a07b2733236c5923b8194a37c7714a282fe91bfee9b435e76433cf25ce9d1cb49fb7ff390f6766ef24a128bc41c5819f0167e94eef4d7019fabfb989e64999ad206d7d5d3650e7808e908fbf7a2b0656b67f3></script><!-- End code chat-milvus //-->
</html>