<?php
require_once 'app/Config.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title><?= Config::PAGE_TITLE ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS Bootstrap -->
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <style>
    body {
      font-family: 'Arimo', sans-serif;
      padding-top: 50px;
    }

    .menu-bar {
      position: absolute;
      top: 20px;
      left: 50%;
      height: 14px;
      margin-left: -10px;
    }

    .bars {
      display: block;
      width: 20px;
      height: 3px;
      background-color: #333;
      box-shadow: 0 5px 0 #333, 0 10px 0 #333;
    }

    .menu {
      display: none;
      width: 100%;
      padding: 30px 10px 50px;
      margin: 0 auto;
      text-align: center;
      background-color: #fff;
    }

    .menu ul {
      margin-bottom: 0;
    }

    .menu a {
      color: #333;
      text-transform: uppercase;
      opacity: 0.8;
    }

    .menu a:hover {
      text-decoration: none;
      opacity: 1;
    }
  </style>
</head>

<body>
  <div class="container">
    <link href="http://fonts.googleapis.com/css?family=Arimo:400" rel="stylesheet">

    <a class="menu-bar" data-toggle="collapse" href="#menu">
      <span class="bars"></span>
    </a>
    <div class="collapse menu" id="menu">
      <ul class="list-inline">
        <li><a href="index.php">Home</a></li>
        <li><a href="exercicio1.php">Exerc&iacute;cio 1</a></li>
        <li><a href="exercicio2.php">Exerc&iacute;cio 2</a></li>
        <li><a href="exercicio3.php">Exerc&iacute;cio 3</a></li>
      </ul>
    </div>

    <div class="container">
      <div class="row text-center">
        <h2>Prova Processo Seletivo Superl&oacute;gica</h2>
        <small>Clique para expandir o menu e acessar os exerc&iacute;cios.</small>
      </div>
    </div>


  </div>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  

</body>

</html>