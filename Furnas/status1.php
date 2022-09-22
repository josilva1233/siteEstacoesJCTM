<?php
include('../conexao.php');

   $StampTime = $_POST['StampTime'];
   $status1 = $_POST['status1'];
   $status2 = $_POST['status2'];

   //$sql = "UPDATE furnas SET status1 = '$status2' WHERE val_coleta LIKE '%$status1%'";
   $sql = "UPDATE furnas SET status2 = '$status2' WHERE val_coleta2  LIKE '%$status1%' AND StampTime  LIKE '%$StampTime%'  ";
   $insert = mysqli_query($cx, $sql);
   if ($insert){
        echo"<script language='javascript' type='text/javascript'> window.location.href='index'</script>";
   }





