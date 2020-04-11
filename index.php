<?php
require './Classes/OpenWheatherApi.php';
$openWheater = new OpenWheatherApi();
$clima = $openWheater->getClima();
?>

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">

    <title>temperatura Brusque</title>
</head>
<body>
  <!--cidade-->
  <section>
<div class="container-fluid" id="container">
  <div class="row">
    <div class="col-xl-12" id="cidade">
      <div class="card">
      <div class="title">
        <i class="fa fa-thermometer-full  fa-4x" aria-hidden="true"></i>  
        <h1><?php echo $clima->cidade;?> </h1>
        <h3><?php echo $clima->getData() ?></h3>
        </div>  
        <div class="info_title">
        <h2><?php echo $clima->getTemperaturaCelsius();?>°c <?php echo "/". $clima->getTemperaturaFahrenheit(); ?>°f</h2> 
        </div>       
        <div class="info">
         <h4><?php echo $clima->descricao;?>.</h4>      
         <h4>humidade: <?php echo $clima->humidade;?>%.</h4>
         <h4><?php echo $clima->getPorDoSol()."pm";?>.</h4>
         <h4><?php echo $clima->getAmanhecer()."am";?>.</h4>
         <h4><?php echo $clima->pressao;?>.</h4>
         <h4><?php echo $clima->velocidade;?>km/h.</h4>
         <h4><?php echo $clima->getMilhas();?>m.</h4>
       </div>
       </div>
    </div>
  </div>
</div>
</section>
<!--end cidade-->

<!--init scrip -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
