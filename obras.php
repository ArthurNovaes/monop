<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<?php
		if(isset($_GET['uf']))
		{
			$busca=$_GET['uf'];
			echo "<title>Monop - ".$busca."</title>";
		}
	?>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/header.css">

	<link rel="shortcut icon" href="img/icone.ico">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">

		<?php
			include "header.html";
			$string = file_get_contents("convertcsv.json");
			$result = json_decode($string);

			if(!isset($_GET['uf']))
			{
				echo "<title>Monop - Obras</title>";
				echo "<legend><h1>MONITORAMENTO DE OBRAS PÚBLICAS POR ESTADO</h1></legend>";

				include "dashboard.php";
				$dashboard = new Dashboard();
				$dashboard->init();
		?>
				<script type="text/javascript" src="js/jsapi.js"></script>
				<script type="text/javascript">
			      google.load("visualization", "1", {packages:["geochart"]});
			      google.setOnLoadCallback(drawRegionsMap);
			      function drawRegionsMap() {
			        var data = google.visualization.arrayToDataTable([
			          ['Country', 'Quantidade'],
				      ['Rio Grande do Sul', <?php echo $dashboard->QtdObrasPorEstado('RS'); ?>], ['Paraná', <?php echo $dashboard->QtdObrasPorEstado('PR'); ?>],
				      ['Santa Catarina', <?php echo $dashboard->QtdObrasPorEstado('SC'); ?>], ['São Paulo', <?php echo $dashboard->QtdObrasPorEstado('SP'); ?>],
			          ['Rio de Janeiro', <?php echo $dashboard->QtdObrasPorEstado('RJ'); ?>], ['Espírito Santo', <?php echo $dashboard->QtdObrasPorEstado('ES'); ?>],
			          ['Minas Gerais', <?php echo $dashboard->QtdObrasPorEstado('MG'); ?>], ['Distrito Federal', <?php echo $dashboard->QtdObrasPorEstado('DF'); ?>],
			          ['Goiás', <?php echo $dashboard->QtdObrasPorEstado('GO'); ?>], ['Mato Grosso do Sul', <?php echo $dashboard->QtdObrasPorEstado('MS'); ?>],
			          ['Mato Grosso', <?php echo $dashboard->QtdObrasPorEstado('MT'); ?>], ['Rondônia', <?php echo $dashboard->QtdObrasPorEstado('RO'); ?>],
			          ['Acre', <?php echo $dashboard->QtdObrasPorEstado('AC'); ?>], ['Amazonas', <?php echo $dashboard->QtdObrasPorEstado('AM'); ?>],
			          ['Roraima', <?php echo $dashboard->QtdObrasPorEstado('RR'); ?>], ['Pará', <?php echo $dashboard->QtdObrasPorEstado('PA'); ?>],
			          ['Amapá', <?php echo $dashboard->QtdObrasPorEstado('AP'); ?>], ['Tocantins', <?php echo $dashboard->QtdObrasPorEstado('TO'); ?>],
			          ['Maranhão', <?php echo $dashboard->QtdObrasPorEstado('MA'); ?>], ['Piauí', <?php echo $dashboard->QtdObrasPorEstado('PI'); ?>],
			          ['Ceará', <?php echo $dashboard->QtdObrasPorEstado('CE'); ?>], ['Rio Grande do Norte', <?php echo $dashboard->QtdObrasPorEstado('RN'); ?>],
			          ['Paraíba', <?php echo $dashboard->QtdObrasPorEstado('PB'); ?>], ['Pernambuco', <?php echo $dashboard->QtdObrasPorEstado('PE'); ?>],
			          ['Alagoas', <?php echo $dashboard->QtdObrasPorEstado('AL'); ?>], ['Sergipe', <?php echo $dashboard->QtdObrasPorEstado('SE'); ?>],
			          ['Bahia', <?php echo $dashboard->QtdObrasPorEstado('BA'); ?>]
			        ]);

			        var options = {
			        	dataMode: 'regions',
			          	region: 'BR',
				        resolution: 'provinces',
			          	colorAxis: {colors: ['#999999', '#C0C0C0', '#FFAF15']},
			          	backgroundColor: '#fff',
			          	datalessRegionColor: '#fff',
			          	defaultColor: '#f5f5f5',
						displayMode: 'auto'
			        };

			        var chart = new google.visualization.GeoChart(document.getElementById('geochart-colors'));
							google.visualization.events.addListener(chart, 'select', function() {
								var selectionIdx = chart.getSelection()[0].row;
								var stateName = data.getValue(selectionIdx, 0);
								window.open('obras.php?uf=' +stateName);
							});
							chart.draw(data, options);
			      };
			    </script>
			    <br>
			    <div class="row">
			    	<h2>Regiões onde ocorrem obras do PAC</h2><br>
			    	<div class="col-md-2"></div>
					<div class="col-md-5">

			    		<div id="geochart-colors" style="width: 700px; height: 433px;"></div>
			    	</div>
			    	<div class="col-md-3"></div>
		    	</div>
				<?php include "footer.html"; ?>
		<?php 	exit;
			}

			switch ($busca) {
				case 'Acre':
					$busca_aux="AC";
				break;
				case 'Alagoas':
					$busca_aux="AL";
				break;
				case 'Amapá':
					$busca_aux="AP";
				break;
				case 'Amazonas':
					$busca_aux="AM";
				break;
				case 'Bahia':
					$busca_aux="BA";
				break;
				case 'Ceará':
					$busca_aux="CE";
				break;
				case 'Distrito Federal':
					$busca_aux="DF";
				break;
				case 'Espírito Santo':
					$busca_aux="ES";
				break;
				case 'Goiás':
					$busca_aux="GO";
				break;
				case 'Maranhão':
					$busca_aux="MA";
				break;
				case 'Mato Grosso':
					$busca_aux="MT";
				break;
				case 'Mato Grosso do Sul':
					$busca_aux="MS";
				break;
				case 'Minas Gerais':
					$busca_aux="MG";
				break;
				case 'Pará':
					$busca_aux="PA";
				break;
				case 'Paraíba':
					$busca_aux="PB";
				break;
				case 'Paraná':
					$busca_aux="PR";
				break;
				case 'Pernambuco':
					$busca_aux="PE";
				break;
				case 'Piauí':
					$busca_aux="PI";
				break;
				case 'Rio de Janeiro':
					$busca_aux="RJ";
				break;
				case 'Rio Grande do Norte':
					$busca_aux="RN";
				break;
				case 'Rio Grande do Sul':
					$busca_aux="RS";
				break;
				case 'Rondônia':
					$busca_aux="RO";
				break;
				case 'Roraima':
					$busca_aux="RR";
				break;
				case 'Santa Catarina':
					$busca_aux="SC";
				break;
				case 'São Paulo':
					$busca_aux="SP";
				break;
				case 'Sergipe':
					$busca_aux="SE";
				break;
				case 'Tocantins':
					$busca_aux="TO";
				break;
			}
		?>
			<!--<div class="row">-->
				<br>
				<fieldset><legend><h1>Obras do Estado de(o/a) <?php echo $busca; ?></h1></legend>
					<?php
					$i=1;
					$in=0;
					while($i<count($result))
					{
						echo "<div class='row'>";
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


								//echo "</div>";
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
						//$val_lat = $result[$i]->val_lat;
						//$val_long = $result[$i]->val_long;
						//s$emblematica = $result[$i]->emblematica;
						$observacao = $result[$i]->observacao;
						if($observacao=="")
							$observacao="Não foi Informado";

						if(isset($busca_aux))
							$estado = strpos($sig_uf, $busca_aux);
						else
							$estado = strpos($sig_uf, $busca);

						if($estado)
						{
							$in++;
							?>
							<fieldset><legend style="width:30%"; align="center" data-toggle="collapse" data-target="#<?php echo $i; ?>" title="Clique Para Expandir"> <?php echo $dsc_titulo; ?> </legend>
										<!-- <h2> $dsc_titulo</h2> </fieldset><br> -->
						<div id="<?php echo $i; ?>" class="collapse">
							<div class="well" align="center">
								<div class="row">

								<div class="row">
									<!-- 1 -->
									<div class="col-md-1"></div>
									<div class="col-md-5">
										<label>Investimento Total:
										</label>
									</div>
									<div class = "col-md-5">
										<?php echo $investimento_total; ?>
									</div><div class = "col-md-1"></div>
								</div>
								<div class="row">
									<!-- 2		 -->
									<div class="col-md-1"></div>
									<div class="col-md-5">
										<label>Estados onde esta sendo Realizado:
										</label>
									</div>
									<div class="col-md-5">
										<?php echo $sig_uf; ?><br>
									</div><div class = "col-md-1"></div>
								</div>
								<div class="row">
									<!-- 3 -->
									<div class="col-md-1"></div>
									<div class="col-md-5">
										<label>Municipios onde esta sendo Realizado:
										</label>
									</div>
									<div class = "col-md-5">
										<fieldset style="font-size: 11px;"><?php echo $txt_municipios; ?></fieldset>
									</div><div class = "col-md-1"></div>
								</div>
								<div class="row">
									<!-- 4 -->
									<div class="col-md-1"></div>
									<div class="col-md-5">
										<label>Órgão Responsável pela execução do empreendimento:
										</label>
									</div>
									<div class="col-md-5">
										<?php echo $txt_executores; ?><br>
									</div><div class = "col-md-1"></div>
								</div>
								<div class="row">
									<!-- 5 -->
									<div class="col-md-1"></div>
									<div class="col-md-5">
										<label> Órgão Responsável pelo monitoramento do empreendimento:
										</label>
									</div>
									<div class = "col-md-5">
										<?php echo $dsc_orgao; ?>
									</div><div class = "col-md-1"></div>

								</div>
								<div class="row">
									<!-- 6 -->
									<div class="col-md-1"></div>
									<div class="col-md-5">
										<label>Estágio do empreendimento:
										</label>
									</div>
									<div class="col-md-5">
										<?php echo $estagio; ?><br>
									</div><div class = "col-md-1"></div>

								</div>
								<div class="row">
									<!-- 7 -->
									<div class="col-md-1"></div>
									<div class="col-md-5">
										<label>Data limite de atualizações das informações do empreendimento:
										</label>
									</div>
									<div class = "col-md-5">
										<?php echo $dat_ciclo; ?>
									</div><div class = "col-md-1"></div>

								</div>
								<div class="row">
									<!-- 8 -->
									<div class="col-md-1"></div>
									<div class="col-md-5">
										<label>Data em que o empreendimento foi selecionado e incluído na carteira de projetos do PAC:
										</label>
									</div>
									<div class="col-md-5">
										<?php echo $dat_selecao; ?><br>
									</div><div class = "col-md-1"></div>

								</div>
								<div class="row">
									<!-- 9 -->
									<div class="col-md-1"></div>
									<div class="col-md-5">
										<label>Data de conclusão do empreendimento atualizada e revisada:
										</label>
									</div>
									<div class = "col-md-5">
										<?php echo $dat_conclusao_revisada; ?>
									</div><div class = "col-md-1"></div>

								</div>
								<div class="row">
									<!-- 10 -->
									<div class="col-md-1"></div>
									<div class="col-md-5">
										<label>Observação:
										</label>
									</div>
									<div class="col-md-5">
										<?php echo $observacao; ?><br>
									</div><div class = "col-md-1"></div>

								</div>


							</div>
							</fieldset>
						</div>
						<?php }
							$i++;
								}if($in==0){echo "<br><h1><span class='alert alert-warning'>Não Há Dados para esta Situação</span></h1><br><br>";}
						?>
				</fieldset>
		</div>
	</div>
	<?php include "footer.html"; ?>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
