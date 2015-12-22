<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title>MonOP</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="shortcut icon" href="img/icone.png">

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
	<div class="container">
		<div class="well" align="justify">
			<h2>Este projeto tem por objetivo apresentar os dados abertos do governo através de uma consulta via web e organiza-los tornando-os acessíveis para que qualquer pessoa que tenha acesso a internet possa entender o que os dados significam, especificamente para a situação de obras públicas no estado de Alagoas.</h2>
		</div>
	</div>
		<script type="text/javascript" src="js/jsapi.js"></script>
		<script type="text/javascript">
			google.load("visualization", "1", {packages:["corechart"]});
			google.setOnLoadCallback(drawChart);
			function drawChart() {

				var data = google.visualization.arrayToDataTable([
					['Estagio', 'TotalObras'],
					['Em Execução', <?php echo $dashboard->getTotalObrasStatusEmExecucao(); ?>],
					['Em Obras', <?php echo $dashboard->getTotalObrasStatusEmObras(); ?>],
					['Em contratação', <?php echo $dashboard->getTotalObrasStatusEmContratacao(); ?>],
					['Em licitação de obra', <?php echo $dashboard->getTotalObrasStatusEmLicitacao(); ?>],
					['Concluído', <?php echo $dashboard->getTotalObrasStatusConcluido();?>]
				]);

				var options = {
					title: 'Status das Obras',
					colors: ['#999999', '#ffaf15', '#e3a842', '#cf9e4b', '#c9c9c9'],
					backgroundColor: 'fff',

				};

				var chart = new google.visualization.PieChart(document.getElementById('piechart'));
				function selectHandler() {
		          var selectedItem = chart.getSelection()[0];
		          if (selectedItem) {
		            var topping = data.getValue(selectedItem.row, 0);
		            window.open('situacao.php?estagio=' +topping);
		            //alert('The user selected ' + topping);
		          }
		        }

        google.visualization.events.addListener(chart, 'select', selectHandler);

				chart.draw(data, options);
			}
		</script>
		<!--<script type="text/javascript">
			google.load("visualization", "1", {packages:["corechart"]});
			google.setOnLoadCallback(drawChart);
			function drawChart() {
				var data = google.visualization.arrayToDataTable([
					["Element", "Density", { role: "style" } ],
					["Médio", <?php //echo $dashboard->getMediaInvestimento(); ?>, "#b87333"],
					["Maior", <?php //echo $dashboard->getMaiorInvestimento(); ?>, "silver"],
					["Menor", <?php //echo $dashboard->getMenorInvestimento(); ?>, "gold"],
				]);

				var view = new google.visualization.DataView(data);
				view.setColumns([0, 1,
												 { calc: "stringify",
													 sourceColumn: 1,
													 type: "string",
													 role: "annotation" },
												 2]);

				var options = {
					title: "Investimento",
					width: 600,
					height: 300,
					bar: {groupWidth: "95%"},
					legend: { position: "none" },
				};
				var chart = new google.visualization.ColumnChart(document.getElementById("piechart2"));
				chart.draw(view, options);
				}
		</script>-->
		<script type="text/javascript">
			google.load("visualization", "1", {packages:["corechart"]});
			google.setOnLoadCallback(drawChart);
			function drawChart() {

				var data = google.visualization.arrayToDataTable([
					['Estagio', 'TotalObras'],
					['Rodovias', <?php echo $dashboard->getTotalSubeixoRodovias(); ?>],
					['Ferrovia', <?php echo $dashboard->getTotalSubeixoRodovias(); ?>],
					['Porto', <?php echo $dashboard->getTotalSubeixoRodovias(); ?>],
					['Hidrovia', <?php echo $dashboard->getTotalSubeixoRodovias(); ?>],
					['Aeroporto', <?php echo $dashboard->getTotalSubeixoAeroporto(); ?>],
					['Defesa', <?php echo $dashboard->getTotalSubeixoDefesa(); ?>],
					['Comunicações', <?php echo $dashboard->getTotalSubeixoComunicacoes(); ?>],
					['Geração de Energia Elétrica', <?php echo $dashboard->getTotalSubeixoGeracaoEnergiaEletrica(); ?>],
					['Transmissão de Energia Elétrica', <?php echo $dashboard->getTotalSubeixoTransmissaoEnergiaEletrica(); ?>],
					['Petróleo e Gás Natural', <?php echo $dashboard->getTotalSubeixoPetroleoGas(); ?>],
					['Geologia e Mineração', <?php echo $dashboard->getTotalSubeixoGeologiaMineracao(); ?>],
					['Marinha Mercante', <?php echo $dashboard->getTotalSubeixoMarinhaMercante(); ?>],
					['Combustíveis Renováveis', <?php echo $dashboard->getTotalSubeixoCombustiveisRenovaveis(); ?>],
					['Saneamento', <?php echo $dashboard->getTotalSubeixoSaneamento(); ?>],
					['Água em áreas urbanas', <?php echo $dashboard->getTotalSubeixoaguaAreasUrbanas(); ?>],
					['Prevenção em áreas de risco', <?php echo $dashboard->getTotalSubeixoPrevencaoAreasRisco(); ?>],
					['Pavimentação', <?php echo $dashboard->getTotalSubeixoPavimentacao(); ?>],
					['Mobilidade Urbana', <?php echo $dashboard->getTotalSubeixoMobilidadeUrbana(); ?>],
					['Cidades Digitais', <?php echo $dashboard->getTotalSubeixoCidadesDigitais(); ?>],
					['Cidades Históricas', <?php echo $dashboard->getTotalSubeixoCidadesHistoricas(); ?>],
					['Infraestrutura Turística', <?php echo $dashboard->getTotalSubeixoInfraestruturaTuristica(); ?>],
					['Olimpíadas', <?php echo $dashboard->getTotalSubeixoOlimpiadas(); ?>],
					['Casa da Mulher Brasileira', <?php echo $dashboard->getTotalSubeixoCasaMulherBrasileira(); ?>],
					['UBS', <?php echo $dashboard->getTotalSubeixoUBS(); ?>],
					['UPA', <?php echo $dashboard->getTotalSubeixoUPA(); ?>],
					['Creches e Pré-Escolas', <?php echo $dashboard->getTotalSubeixoCrechesEPreEscolas(); ?>],
					['Quadras Esportivas nas Escolas', <?php echo $dashboard->getTotalSubeixoQuadrasEsportivasEscolas(); ?>],
					['Centro de Artes e Esportes Unificados', <?php echo $dashboard->getTotalSubeixoCentroArtesEsportesUnificados(); ?>],
					['Centro de Iniciação ao Esporte', <?php echo $dashboard->getTotalSubeixoCentroIniciacaoEsporte(); ?>],
					['MCMV', <?php echo $dashboard->getTotalSubeixoMCMV(); ?>],
					['Urbanização de assentamentos precários', <?php echo $dashboard->getTotalSubeixoUrbanizacaoAssentamentosPrecarios(); ?>],
					['Luz para Todos', <?php echo $dashboard->getTotalSubeixoLuzParaTodos(); ?>],
					['Recursos Hídricos', <?php echo $dashboard->getTotalSubeixoRecursosHidricos();?>]
				]);

				var options = {
					title: 'Tipo e Subeixo do Empreendimento',
					backgroundColor: 'fff'

				};

				var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

				chart.draw(data, options);
			}
		</script>
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
		<div class="container">
			<h1>Charts, only!</h1>
			<div class="row" align="center">
		        <div class="col-md-5">
		          <div id="piechart" style="width: 600px; height: 400px;"></div>
		        </div>
		        <div class="col-md-1"></div>
		        <div class="col-md-5">
							<div class="well">
								<h1>Investimento</h1>
		          				<?php
									echo "<a href=busca.php?search=".$dashboard->getMaiorInvestimento()." class='a'>
											<h2>Maior: R$ ".number_format($dashboard->getMaiorInvestimento(),2,",",".")."</h2></a>";
									echo "<a href=busca.php?search=".$dashboard->getMenorInvestimento().">
											<h2>Menor: R$ ".number_format($dashboard->getMenorInvestimento(),2,",",".")."</h2></a>";
								?>
			        </div>
		        </div>
		    </div>

		    <div class="row" align="center">
		    	<div class="col-md-5">
		          <div id="piechart3" style="width: 600px; height: 400px;"></div>
		        </div>
		    	<div class="col-md-5"><b>Regiões onde ocorrem obras do PAC</b>
		    		<div id="geochart-colors" style="width: 700px; height: 433px;"></div>
		    	</div>


		    </div>
		</div>
	<?php include "footer.html"; ?>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
