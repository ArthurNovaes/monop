<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
</head>
<body>
	
<?php
	//Empreendimentos Regionais do PAC
	$file=file_get_contents("http://repositorio.dados.gov.br/governo-politica/administracao-publica/pac/PAC_REG_2015_06.csv");

	//echo $file;
	$separar_linhas = explode("\n", $file);
	$count = count($separar_linhas);
	$i=1;
?>
<!--<div id="meuMenu">Menu | Menu | Menu</div>-->
	<div class="container">
		<div class="row">

			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>idn_empreendimento</th>
						<th>idn_digs</th>
						<th>dsc_titulo</th>
						<th>investimento_total</th>
						<th>sig_uf</th>
						<th>txt_municipios</th>
						<th>txt_executores</th>
						<th>dsc_orgao</th>
						<th>idn_estagio</th>
						<th>dat_ciclo</th>
						<th>dat_selecao</th>
						<th>dat_conclusao_revisada</th>
						<th>val_lat</th>
						<th>val_long</th>
						<th>emblematica</th>
						<th>observacao</th>
					</tr>
				</thead>
				<tbody>
					
						<?php 
							while($i<$count-1)
							{
								echo "<tr>";
								$dados = explode("\"", $separar_linhas[$i]);
								//$j=0;
								//while($j<count($dados))
								//{
									$ids = explode(",",$dados[0]);
									$idn_empreendimento = utf8_encode($ids[0]);
									$idn_digs = utf8_encode($ids[1]);
									$dsc_titulo = utf8_encode($dados[1]);
									$investimento_total = utf8_encode($dados[2]);
									$sig_uf = utf8_encode($dados[3]);

									//$investimento_total = substr(utf8_encode($dados[2]),1,-1);


									//echo $txt_municipios = utf8_encode($dados[5]);

									//echo "<td>".utf8_encode($dados[$j])."</td>";
									//$uf = strpos($sig_uf,"AL");
									//if($uf)
										echo "<td>".$idn_empreendimento."</td><td>".$idn_digs."</td><td>".$dsc_titulo."</td><td>".$investimento_total."</td><td>".$sig_uf."</td><td>".$dados[4]."</td></tr>";
									

								//	$j++;
								//}
								//echo count($dados)."<br>";
								$i++;
								echo "</tr>";
							}
						?>
					
				</tbody>
			</table>
		</div>
	</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
