<?php

	include_once("conexao.php");
	
	//tabela
	$html = '<table>';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th class=bordas>CÓD. BARRAS</th>';
	$html .= '<th class=bordas>QUANTIDADE COLETADA</th>';
	$html .= '<th class=bordas>QUANTIDADE ERP</th>';
	$html .= '<th class=bordas >DESCRIÇÃO</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';


	
	//diferenca do coletado	
	$result_transacoes = "SELECT * FROM diferenca";
	$resultado_trasacoes = mysqli_query($conexao, $result_transacoes);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		
		$html .= '<tr><td class=bordas>'.$row_transacoes['referencia'] . "</td>";
		$html .= '<td class=bordas style="text-align:center;" >'.$row_transacoes['quantidade_coletada'] . "</td>";
		$html .= '<td class=bordas style="text-align:center;" >'.$row_transacoes['quantidade_sistema'] . "</td>";
		$html .= '<td width=380px class=bordas>'.utf8_encode($row_transacoes['descricao']) . "</td></tr>";		
	}
	
	$html .= '</tbody>';
	$html .= '</table';
	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	//pegar dados do cabecalho
	$result_transacoes = "SELECT * FROM pdf";
	$resultado = mysqli_query($conexao, $result_transacoes);
	while($row = mysqli_fetch_assoc($resultado)){
	
	$cabecalho = "Relatório de contagem divergência";
	$empresa = $row['empresa'];
	$data = date("d/m/Y");
	$fornecedor =$row['fornecedor'];
	$fabricante = $row['fabricante'];

	}

			// Carrega seu HTML
			$dompdf->load_html('
			<table>
			<h2 style="text-align:left;">' .  $cabecalho  .' </h2>
			<tr><td> Empresa: </td>
			<td style="text-align: left;">' . $empresa .'</td></tr>
			<tr><td> Data: </td>
			<td style="text-align:left;">' . $data .'</td></tr>
			<tr><td> Fornecedor: </td>
			<td style="text-align: left;">' . $fornecedor .'</td></tr>
			<tr><td> Fabricante: </td>
			<td style="text-align: left;">' . $fabricante .'</td></tr>
			
			</table>
			
			<style>

			.bordas {
			
				border-style: solid;
				border-width:1px;
					
			}

			h4 {
			heidth :0px;
			}
			
			</style>

			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_divergente.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>