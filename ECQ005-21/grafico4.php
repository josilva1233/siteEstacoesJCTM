<?php include('cabecalho.php'); ?>

<!doctype html>
<html lang="br-en">

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


        <!-- Include Javascript-->
        <script type="text/javascript" src="../js/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../js/bootstrap-datepicker.pt-BR.min.js"></script>

        <!-- Include Titulo-->
        <link rel="icon" href="title.ico" type="image/x-icon">
        <?php include('../title.php'); ?>

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

        <!-- Include Javascript google charts-->

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Data', 'O3 (µg/m3)'],

                //conexão com phpmyadmin
                <?php
                
                include('../conexao.php');
                if (isset($_GET['datapesquisa']) || isset($_GET['datapesquisafinal'])){
                    $dado = $_GET['datapesquisa'];
                    $dado1 = $_GET['datapesquisafinal'];
                }else {
                    $dado = date("Y/m/d");
                    $dado1 = date("Y/m/d");
                }
            
                //StampTime criado para ordenar os dados como chave primária
                $sql = "SELECT * FROM ECQ005_21 WHERE dat_coleta BETWEEN '$dado' AND '$dado1' ORDER BY StampTime ASC;";

                $buscar = mysqli_query($cx, $sql);

                while ($dados = mysqli_fetch_array($buscar)) {
                    $date = $dados['dat_coleta'];
                    $hora = $dados['hor_coleta'];
                    $O3 = $dados['val_coleta4'];

                ?>['<?php echo  date('d/m/Y',  strtotime($date)); //convertendo a data para exibir em pt-BR;?> <?php echo $hora;?>',
                    <?php echo $O3;?>],

                <?php  } ?>

            ]);

            var options = {

                height: '490',
                chartArea: {
                    'width': '90%',
                },
                title: 'ECMQAr-5',

                vAxis: {

                    ticks: <?php echo $O3; ?>,
                    textStyle: {
                        fontSize: 12,
                    }

                },

                hAxis: {

                    slantedText: true,
                    slantedTextAngle: 45,
                    textStyle: {
                        fontSize: 12,
                    }
                },
                curveType: 'function',
                pointSize: 5,

                legend: {
                    position: 'top'
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
        </script>

    </head>

    <body>
        <!--Botão de pesquisa data-->
        <div class="container">
            <form class="navbar-form navbar-right" action="" method="get">
                <div class="form-group">

                    <input placeholder="Selecione data inicial:" autocomplete="off" name="datapesquisa"
                        id="datapesquisa" aria-hidden="false" class="datepicker" required>
                    <input placeholder="Selecione data final:" autocomplete="off" name="datapesquisafinal"
                        id="datapesquisafinal" aria-hidden="false" class="datepicker" required>
                    <button type="submit" class="btn btn-default"><i class="btn-light fa fa-search fa-lg"></i></button>
                </div>
            </form>
        </div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <!--Renderização do grafico Google Charts-->

        <div class="container-sm" id="curve_chart">
            <!--Imagens de carregamento-->

            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <br>
        <!--Include rodapé-->
        <?php include ('../rodape.php'); ?>

    </body>

</html>