<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
	
<?php
	//Empreendimentos Regionais do PAC
	$file=file_get_contents("http://repositorio.dados.gov.br/governo-politica/administracao-publica/pac/PAC_REG_2015_06.csv");
	//$file=file_get_contents("http://repositorio.dados.gov.br/governo-politica/administracao-publica/pac/PAC_2015_06.csv");
	//echo $file;
	$separar_linhas = explode("\n", $file);
	$count = count($separar_linhas);
	$i=1;
?>
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
								$dados = explode(",", $separar_linhas[$i]);
								$j=0;
								while($j<count($dados))
								{
									//if($dados[4]=="AL")
										echo "<td>".utf8_encode($dados[$j])."</td>";

									$j++;
								}
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
</body>
</html>
