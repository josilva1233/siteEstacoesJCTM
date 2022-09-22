<?php
include('../conexao.php');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap-datepicker.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


    <!-- Include Javascript-->
    <script type="text/javascript" src="../js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../js/bootstrap-datepicker.pt-BR.min.js"></script>
    <script src="../js/jquery.btechco.excelexport.js"></script>
    <script src="../js/jquery.base64.js"></script>


    <!-- Include Titulo-->
    <link rel="icon" href="title.ico" type="image/x-icon">
    <?php include('../title.php') ?>

    <!-- Include javascript altera a data para receber no navegar em PT-BR-->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datapesquisa').datepicker({
                format: "yyyy/mm/dd",
                language: "pt-BR",
                autoclose: true,
                endDate: "0d",
            });
        });
        $(document).ready(function() {
            $('#datapesquisafinal').datepicker({
                format: "yyyy/mm/dd",
                language: "pt-BR",
                autoclose: true,
                endDate: "0d",
            });
        });
    </script>

    <!-- Include javascript exporta para execel-->
    <script>
        $(document).ready(function() {
            $("#btnExport").click(function() {
                $("#tblExport").btechco_excelexport({
                    containerid: "tblExport",
                    datatype: $datatype.Table,
                    filename: 'dados'
                });
            });
        });
    </script>


</head>

<body>
    <div class="container">
        <form class="navbar-form navbar-right" action="" method="get">
            <div class="form-group" >
                <input  placeholder="Selecione data inicial:" autocomplete="off" name="datapesquisa" id="datapesquisa" aria-hidden="false" class="datepicker" required>
                <input  placeholder="Selecione data final:" autocomplete="off" name="datapesquisafinal" id="datapesquisafinal" aria-hidden="false" class="datepicker" required>
                <button type="submit" class="btn btn-default"><i class="btn-light fa fa-search fa-lg"></i></button>
                <button id="btnExport" class="btn btn-outline-dark">Exportar excel</button>
            </div>
        </form>
    </div>

    <br>
<!-- Inicio da tabela em PHP-->
    <?php

    if (isset($_GET['datapesquisa']) || isset($_GET['datapesquisafinal'])) {
        $dado = $_GET['datapesquisa'];
        $dado1 = $_GET['datapesquisafinal'];
    } else {
        $dado = date("Y-m-d");
        $dado1 = date("Y-m-d");
    }

    $sql = "SELECT * FROM ECQ003_21 WHERE dat_coleta BETWEEN '$dado' AND '$dado1' ORDER BY StampTime ASC;";

    $buscar = mysqli_query($cx, $sql);


    if ($buscar->num_rows > 0) {
        echo ' <div class="table-responsive tableContainer">';  //inicio da div encerra antes da tag boby em html(puro)
        echo '<table class="table" id="tblExport">'; //inicio da tabela encerra antes da tag boby em html(puro)
        echo '<thead>';   //inicio das tab html in php inicia e encenrra dentro laço if do php(puro)
        echo '<tr align="center">';
        echo '<th width="5%">' . "Data" . '</th>';
        echo '<th width="5%">' . "Hora" . '</th>';
        echo '<th width="5%">' . "CO"    . '<sub>' . "(ppm)" . '</sub>' . '</th>';
        echo '<th width="5%">' . "SO2"   . '<sub>' . "(ppb)" . '</sub>' . '</th>';
        echo '<th width="5%">' . "NO2"   . '<sub>' . "(ppb)" . '</sub>' . '</th>';
        echo '<th width="5%">' . "O3"   . '<sub>' . "(ppb)" . '</sub>' . '</th>';
        echo '<th width="5%">' . "PM2.5"  . '<sub>' . "(&#181g/m3)" . '</sub>' . '</th>';
        echo '<th width="5%">' . "PM10"   . '<sub>' . "(&#181g/m3)" . '</sub>' . '</th>';
        echo '<th width="5%">' . "TVOC"   . '<sub>' . "(ppm)" . '</sub>' . '</th>';
        echo '<th width="5%">' . "VV"   . '<sub>' . "(m/s)" . '</sub>' . '</th>';
        echo '<th width="5%">' . "DV"   . '<sub>' . "(&#176)   " . '</sub>' . '</th>';
        echo '<th width="5%">' . "TEMP"   . '<sub>' . "(&#176C)" . '</sub>' . '</th>';
        echo '<th width="5%">' . "UMID"   . '<sub>' . "(%)" . '</sub>' . '</th>';
        echo '<th width="5%">' . "ATM"   . '<sub>' . "(mbar)" . '</sub>' . '</th>';
        echo '</tr>';
        echo '</thead>';
    }else{

        //Imagens de carregamento 

        echo' <br>';
        echo' <br>';
        echo' <br>';
        echo' <br>';
        echo' <br>';

        echo' <div class="d-flex justify-content-center">';
    
        echo' <div class="spinner-border" role="status">';
                
        echo' <span class="visually-hidden">Loading...</span> ';

        echo'  </div>';

        echo'Não existe dados no periodo pesquisado ou Estacão sem receber dados';

            
        echo'  </div>';
        echo' <br>';
        echo' <br>';
        echo' <br>';
        echo' <br>';
        echo' <br>';


    
    }
    while ($dados = mysqli_fetch_array($buscar)) {
        $date = $dados['dat_coleta'];
        $hora = $dados['hor_coleta'];
        $CO = $dados['val_coleta'];
        $SO2 = $dados['val_coleta2'];
        $NO2 = $dados['val_coleta3'];
        $O3 = $dados['val_coleta4'];
        $PM25 = $dados['val_coleta5'];
        $PM10 = $dados['val_coleta6'];
        $TVOC = $dados['val_coleta7'];
        $VV = $dados['val_coleta8'];
        $DV = $dados['val_coleta9'];
        $TEMP = $dados['val_coleta10'];
        $UMID = $dados['val_coleta11'];
        $ATM = $dados['val_coleta12'];
    ?>

        <tbody>
            <tr align="center">
                <td scope="row"><?php echo  date('d/m/Y',  strtotime($date)); //convertendo a data para exibir em pt-BR 
                                ?></td>
                <td><?php echo $hora; ?></td>
                <td><?php echo $CO; ?></td>
                <td><?php echo $SO2; ?></td>
                <td><?php echo $NO2; ?></td>
                <td><?php echo $O3; ?></td>
                <td><?php echo $PM25; ?></td>
                <td><?php echo $PM10; ?></td>
                <td><?php echo $TVOC; ?></td>
                <td><?php echo $VV; ?></td>
                <td><?php echo $DV; ?></td>
                <td><?php echo $TEMP; ?></td> 
                <td><?php echo $UMID; ?></td>
                <td><?php echo $ATM; ?></td>
            </tr>
        <?php  } ?>

        </tbody>

        </table> <!-- fechamento da tabela comença em php(puro) termina em html(puro)-->

        </div> <!-- fechamento da div comença em php(puro) termina em html(puro)-->

</body>

</html>



