<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<?php
		if(isset($_GET['estagio']))
			$busca=$_GET['estagio'];
	?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="shortcut icon" href="img/icone.ico">
	<title>Monop - Situação</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  	<style>
  		a.thumbnail:hover{
  			color: #FFAF15;
  		}
  	</style>

</head>
<body>
	<div class="container">

		<?php
			include "header.html";
			$string = file_get_contents("convertcsv.json");
			$result = json_decode($string);

			if(!isset($_GET['estagio']))
			{
				echo "<legend><h1>MONITORAMENTO DE OBRAS PÚBLICAS POR SITUAÇÃO</h1></legend>";

				include "dashboard.php";
				$dashboard = new Dashboard();
				$dashboard->init();
				?>
				<div class="well">
					<div class="row">
						  <div class="col-xs-6 col-md-3">
						    <a href="?estagio=Não Informado" class="thumbnail">
						      <h1>Não Informado</h1>
						    </a>
						  </div>
						  <div class="col-xs-6 col-md-3">
						    <a href="?estagio=A Selecionar" class="thumbnail">
						      <h1>A Selecionar</h1>
						    </a>
						  </div>
						  <div class="col-xs-6 col-md-3">
						    <a href="?estagio=Em Contratação" class="thumbnail">
						      <h1>Em Contratação</h1>
						    </a>
						  </div>
						  <div class="col-xs-6 col-md-3">
						    <a href="?estagio=Ação Preparatória" class="thumbnail">
						      <h1>Ação Preparatória</h1>
						    </a>
						  </div>
						  <div class="col-xs-6 col-md-3">
						    <a href="?estagio=Em licitação de obra" class="thumbnail">
						      <h1>Em licitação de obra</h1>
						    </a>
						  </div>
						  <div class="col-xs-6 col-md-3">
						    <a href="?estagio=Em licitação de Projeto" class="thumbnail">
						      <h1>Em licitação de Projeto</h1>
						    </a>
						  </div>
						  <div class="col-xs-6 col-md-3">
						    <a href="?estagio=Em obras" class="thumbnail">
						      <h1>Em obras</h1>
						    </a>
						  </div>
						  <div class="col-xs-6 col-md-3">
						    <a href="?estagio=Em execução" class="thumbnail">
						      <h1>Em execução</h1>
						    </a>
						  </div>
						  <div class="col-xs-6 col-md-3">
						    <a href="?estagio=Concluído" class="thumbnail">
						      <h1>Concluído</h1>
						    </a>
						  </div>
						  <div class="col-xs-6 col-md-3">
						    <a href="?estagio=Em Operação" class="thumbnail">
						      <h1>Em Operação</h1>
						    </a>
						  </div>
					</div>
				</div>

				<?php
				include "footer.html";
				exit;
			}
		?>
		<div class="row">
			<br>
			<fieldset><legend><h1>Obras por Situação</h1></legend>
				<?php

				switch ($busca) {
					case 'Não Informado':
						$busca_aux=0;
					break;
					case 'A Selecionar':
						$busca_aux=3;
					break;
					case 'Em contratação':
						$busca_aux=5;
					break;
					case 'Ação Preparatória':
						$busca_aux=10;
					break;
					case 'Em licitação de obra':
						$busca_aux=40;
					break;
					case 'Em licitação de Projeto':
						$busca_aux=41;
					break;
					case 'Em Obras':
						$busca_aux=70;
					break;
					case 'Em Execução':
						$busca_aux=71;
					break;
					case 'Concluído':
						$busca_aux=90;
					break;
					case 'Em Operação':
						$busca_aux=91;
					break;
				}


				$i=1;
				$in=0;
				while($i<count($result))
				{
					$idn_empreendimento = $result[$i]->idn_empreendimento;
					$idn_digs = $result[$i]->idn_digs;
					$dsc_titulo = $result[$i]->dsc_titulo;
					$investimento_total = $result[$i]->investimento_total;
					if($investimento_total=="")
					{
						$investimento_total="Não foi Informado";
					}
					else{
						$investimento_total = "R$ ".number_format($investimento_total,2,",",".");
					}
					$sig_uf = $result[$i]->sig_uf;
					$txt_municipios = $result[$i]->txt_municipios;
					if($txt_municipios=="")
						$txt_municipios="Não foi Informado";
					$txt_executores = $result[$i]->txt_executores;

					if($txt_executores=="")
						$txt_executores="Não foi Informado";

					$dsc_orgao = $result[$i]->dsc_orgao;
					if($dsc_orgao=="")
						$dsc_orgao="Não foi Informado";

					$idn_estagio = $result[$i]->idn_estagio;
					switch ($idn_estagio) {
						case 0: $estagio = "Não informado";
								$descricao_estagio="";
								break;
						case 3: $estagio = "A selecionar";
								$descricao_estagio="Empreendimentos que ainda serão selecionados da área social";
								break;
						case 5: $estagio = "Em contratação";
								$descricao_estagio="Empreendimento selecionado, em processo de envio ou análise de documentação para a contratação.";
								break;
						case 10: $estagio = "Ação Preparatória";
								$descricao_estagio="1-Para a área de Infraestrutura Logística e de Energia: empreendimento em etapa prévia à licitação, à contratação ou ao início da execução. <br>2-Para a área Social e Urbana: empreendimento contratado, em fase de preparação para iniciar a licitação.";
								break;
						case 40: $estagio = "Em licitação de obra";
								$descricao_estagio="Empreendimento em fase de licitação de obra ou licitação concluída, mas sem ordem de serviço.";
								break;
						case 41: $estagio = "Em licitação de projeto";
								$descricao_estagio="Empreendimento cuja meta é a realização de estudo, projeto, plano, assistência técnica ou desenvolvimento institucional, em fase de licitação.";
								break;
						case 70: $estagio = "Em obras";
								$descricao_estagio="Empreendimento com ordem de início autorizada ou obra já iniciada.";
								break;
						case 71: $estagio = "Em execução";
								$descricao_estagio="Empreendimento já iniciado cuja meta é a realização de estudo, projeto, plano, assistência técnica ou desenvolvimento institucional.";
								break;
						case 90: $estagio = "Concluído";
								$descricao_estagio="Empreendimento concluído, ou obra física concluída, ou estudo, projeto ou contratação finalizados.";
								break;
						case 91: $estagio = "Em operação";
								$descricao_estagio="Empreendimento da área de Petróleo e Gás, que já entrou em operação, porém ainda não foi concluído.";
								break;
							break;

						default:
							$estagio = "Não há dados";
							$descricao_estagio="";
							break;
					}
					$dat_ciclo = $result[$i]->dat_ciclo;
					if($dat_ciclo=="")
						$dat_ciclo="Não foi Informado";

					$dat_selecao = $result[$i]->dat_selecao;
					if($dat_selecao=="")
						$dat_selecao="Não foi Informado";

					$dat_conclusao_revisada = $result[$i]->dat_conclusao_revisada;
					if($dat_conclusao_revisada=="")
						$dat_conclusao_revisada="Não foi Informado";
					$observacao = $result[$i]->observacao;
					if($observacao=="")
						$observacao="Não foi Informado";

					if($busca_aux==$idn_estagio)
					{
						$in++;?>
						<fieldset><legend style="width:30%"; align="center" data-toggle="collapse" data-target="#<?php echo $i; ?>"> <?php echo "<strong>".$dsc_titulo."</strong>";//$estagio; ?> </legend>
							<div id="<?php echo $i; ?>" class="collapse">
									<!-- <h2> $dsc_titulo</h2> </fieldset><br> -->
								<div class="well">
										<table style="width:85%">
										<!--<tr>
										<th><label>Nome do Empreendimento: </label></th> <td><?php echo $dsc_titulo; ?><br></td>
										</tr>--><tr>
										<th><label>Investimento Total: </label></th> <td><?php echo $investimento_total; ?><br></td>
										</tr><tr>
										<th><label>Estados onde esta sendo Realizado: </label></th> <td><?php echo $sig_uf; ?><br></td>
										</tr><tr>
										<th><label>Municipios onde esta sendo Realizado: </label></th> <td><?php echo $txt_municipios; ?><br></td>
										</tr><tr>
										<th><label>Órgão Responsável pela execução do empreendimento: </label></th> <td><?php echo $txt_executores; ?><br></td>
										</tr><tr>
										<th><label>Órgão Responsável pelo monitoramento do empreendimento: </label></th> <td><?php echo $dsc_orgao; ?><br></td>
										</tr><tr>
										<th><label>Data limite de atualizações das informações do empreendimento: </label></th> <td><?php echo $dat_ciclo; ?><br></td>
										</tr><tr>
										<th><label>Data em que o empreendimento foi selecionado e incluído na carteira de projetos do PAC: </label> </th> <td><?php echo $dat_selecao; ?><br></td>
										</tr><tr>
										<th><label>Data de conclusão do empreendimento atualizada e revisada: </label> </th> <td><?php echo $dat_conclusao_revisada; ?><br></td>
										</tr><tr>
										<th><label>Observação: </label></th><td><?php echo $observacao; ?><br></td>
										</tr>
										<td></table>
								</div>
							</div>
						</fieldset>
					<?php
					}
					//echo $idn_estagio."<br>";
					$i++;
				}
				if($in==0)
					{echo "<h1><span class='alert alert-warning'>Não Há Dados para a Situação Selecionada</span></h1>";}
			?>
			</fieldset>
		</div>
	</div>
	<?php include "footer.html"; ?>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>
