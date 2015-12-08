<?php
class Dashboard {

	public $result;

	public function init(){

		$string = file_get_contents("convertcsv.json");
		$this->result = json_decode($string);
	}

	public function getTotalObrasStatusConcluido(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_estagio == 90)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalObrasStatusEmLicitacao(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_estagio == 40)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalObrasStatusEmContratacao(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_estagio == 5)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalObrasStatusEmObras(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_estagio == 70)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalObrasStatusEmExecucao(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_estagio == 71)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getMediaInvestimento(){
		$media = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->investimento_total!="")
			{
				$media+=$this->result[$i]->investimento_total;
			}

			$i++;
		}
		$media=round($media/$i);
		return $media;
	}
	public function getMaiorInvestimento(){
		$maior = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->investimento_total!="")
			{
				if($maior==0)
					$maior=$this->result[$i]->investimento_total;

				if($maior<$this->result[$i]->investimento_total)
					$maior=$this->result[$i]->investimento_total;
			}
			$i++;
		}
		return $maior;
	}
	public function getMenorInvestimento(){
		$menor = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->investimento_total!="")
			{
				if($menor==0)
					$menor=$this->result[$i]->investimento_total;

				if($menor>$this->result[$i]->investimento_total)
					$menor=$this->result[$i]->investimento_total;
			}
			$i++;
		}
		return $menor;
	}

	// GRAFICO IDN_DIGS POR TIPO
	public function getTotalSubeixoRodovias(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 1000)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoFerrovia(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 1001)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoPorto(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 1002)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoHidrovia(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 1003)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoAeroporto(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 1004)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoDefesa(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 1006)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoComunicacoes(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 1007)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoGeracaoEnergiaEletrica(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 2000)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoTransmissaoEnergiaEletrica(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 2001)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoPetroleoGas(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 2002)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoGeologiaMineracao(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 2003)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoMarinhaMercante(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 2004)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoCombustiveisRenovaveis(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 2005)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoSaneamento(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 3000)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoaguaAreasUrbanas(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 3000)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoPrevencaoAreasRisco(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 3001)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoPavimentacao(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 3002)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoMobilidadeUrbana(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 3003)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoCidadesDigitais(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 3004)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoCidadesHistoricas(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 3005)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoInfraestruturaTuristica(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 3006)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoOlimpiadas(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 3007)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoCasaMulherBrasileira(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 3009)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoUBS(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 4000)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoUPA(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 4001)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoCrechesEPreEscolas(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 4002)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoQuadrasEsportivasEscolas(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 4003)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoCentroArtesEsportesUnificados(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 4004)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoCentroIniciacaoEsporte(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 4005)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoMCMV(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 5000)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoUrbanizacaoAssentamentosPrecarios(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 5001)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoLuzParaTodos(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 6000)
				$total++;
			$i++;
		}
		return $total;
	}
	public function getTotalSubeixoRecursosHidricos(){
		$total = 0;
		$i=0;
		while($i<count($this->result)){
			if($this->result[$i]->idn_digs == 6002)
				$total++;
			$i++;
		}
		return $total;
	}

	public function QtdObrasPorEstado()
	{
		$cont=22;
		/*$busca = strpos($result[$i]->sig_uf, $uf);
		if($busca)
		{
			$cont++;
		}*/
		return $cont;
	}

}
?>
