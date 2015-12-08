<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title>MonOP</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="shortcut icon" href="img/icone.png">
	<link rel="stylesheet" href="css/header.css">

</head>
<body>
	<div class="container">
		<?php include "header.html"; ?>
	</div>
    	<?php include "dashboard.php";

          $dashboard = new Dashboard();
          $dashboard->init();
     ?>
  </head>
    <h1>MONITORAMENTO DE OBRAS PÚBLICAS</h1>

    <a href="situacao.php?estagio=0">Não informado <span>10</span></a><br>
    <a href="situacao.php?estagio=3">A selecionar <span>10</span></a><br>
    <a href="situacao.php?estagio=5">Em contratação <span>10</span></a><br>
    <a href="situacao.php?estagio=10">Ação Preparat. <span>10</span></a><br>
    <a href="situacao.php?estagio=40">Em licitação de obra <span>10</span></a><br>
    <a href="situacao.php?estagio=41">Em licitação de projeto <span>10</span></a><br>
    <a href="situacao.php?estagio=70">Em obras <span>10</span></a><br>
    <a href="situacao.php?estagio=71">Em execução <span>10</span></a><br>
    <a href="situacao.php?estagio=90">Concluído <span>10</span></a><br>
    <a href="situacao.php?estagio=91">Em operação <span>10</span></a>





	<?php include "footer.html"; ?>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
