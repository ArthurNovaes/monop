<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<?php 
		$busca=$_GET['uf'];
		echo "<title>Dados ".$busca."</title>";
	?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
	
<?php
$string = file_get_contents("convertcsv2.json");
$result = json_decode($string);
//$result[1]->idn_empreendimento;
//var_dump($result);

//echo $result->FIELD1;
 
?>
	<div class="container">
		<div class="row">
			
				<?php
					$i=1;
					while($i<count($result))
					{
						//echo "<fieldset class='fieldset'>";
							
						$idn_empreendimento = $result[$i]->idn_empreendimento;
						$idn_digs = $result[$i]->idn_digs;
						$dsc_titulo = $result[$i]->dsc_titulo;
						$investimento_total = $result[$i]->investimento_total;
						if($investimento_total=="")
						{
							$investimento_total="Não Informado";
						}
						$sig_uf = $result[$i]->sig_uf;
						$txt_municipios = $result[$i]->txt_municipios;
						$txt_executores = $result[$i]->txt_executores;
						$dsc_orgao = $result[$i]->dsc_orgao;
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
						$dat_selecao = $result[$i]->dat_selecao;
						$dat_conclusao_revisada = $result[$i]->dat_conclusao_revisada;
						$val_lat = $result[$i]->val_lat;
						$val_long = $result[$i]->val_long;
						$emblematica = $result[$i]->emblematica;
						$observacao = $result[$i]->observacao;


						$estado = strpos($sig_uf, $busca);
						if($estado)
						{
							echo "<h2>".$dsc_titulo."</h2>";
							echo "<h4>Investimento Total: </h4>".$investimento_total;
							echo "<h4>Estados onde esta sendo Realizado: </h4>".$sig_uf;
							echo "<h4>Municipios onde esta sendo Realizado: </h4>".$txt_municipios;
							echo "<h4>Órgão Responsável pela execução do empreendimento: </h4>".$txt_executores;
							echo "<h4>Órgão Responsável pelo monitoramento do empreendimento: </h4>".$dsc_orgao;
							echo "<h4>Estágio do empreendimento: </h4>".$estagio; //fazer a descrição.. modal...
							echo "<h4>Data limite de atualizações das informações do empreendimento: </h4>".$dat_ciclo;
							echo "<h4>Data em que o empreendimento foi selecionado e incluído na carteira de projetos do PAC: </h4>".$dat_selecao;
							echo "<h4>Data de conclusão do empreendimento atualizada e revisada: </h4>".$dat_conclusao_revisada;
							echo "<h4>Observação: </h4>".$observacao;
						}
						$i++;
					}					
				?>

		</div>
	</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
</body>
</html>
