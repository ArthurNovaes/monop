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

        <a href="obras.php?uf=AC">AC</a>
        <a href="obras.php?uf=AL">AL</a>
        <a href="obras.php?uf=AP">AP</a>
        <a href="obras.php?uf=AM">AM</a>
        <a href="obras.php?uf=BA">BA</a>
        <a href="obras.php?uf=CE">CE</a>
        <a href="obras.php?uf=DF">DF</a>
        <a href="obras.php?uf=ES">ES</a>
        <a href="obras.php?uf=GO">GO</a>
        <a href="obras.php?uf=MA">MA</a>
        <a href="obras.php?uf=MS">MS</a>
        <a href="obras.php?uf=MT">MT</a>
        <a href="obras.php?uf=MG">MG</a>
        <a href="obras.php?uf=PA">PA</a>
        <a href="obras.php?uf=PB">PB</a>
        <a href="obras.php?uf=PR">PR</a>
        <a href="obras.php?uf=PE">PE</a>
        <a href="obras.php?uf=PI">PI</a>
        <a href="obras.php?uf=RJ">RJ</a>
        <a href="obras.php?uf=RN">RN</a>
        <a href="obras.php?uf=RS">RS</a>
        <a href="obras.php?uf=RO">RO</a>
        <a href="obras.php?uf=RR">RR</a>
        <a href="obras.php?uf=SC">SC</a>
        <a href="obras.php?uf=SP">SP</a>
        <a href="obras.php?uf=SE">SE</a>
        <a href="obras.php?uf=TO">TO</a>





	<?php include "footer.html"; ?>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
