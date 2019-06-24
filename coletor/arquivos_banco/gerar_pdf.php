
<?php

	include_once("conexao.php");
	
	//tabela
	$html = '<table >';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th class=bordas>CÓD. BARRAS</th>';
	$html .= '<th class=bordas>QUANTIDADE</th>';
	$html .= '<th class=bordas >DESCRIÇÃO</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';

		
	$result_transacoes = "SELECT * FROM coletor_exportar";
	$resultado_trasacoes = mysqli_query($conexao, $result_transacoes);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		
		$html .= '<tr><td class=bordas>'.$row_transacoes['referencia'] . "</td>";
		$html .= '<td class=bordas style="text-align:center;" >'.$row_transacoes['quantidade'] . "</td>";
		$html .= '<td width=480px class=bordas>'.utf8_encode($row_transacoes['descricao']) . "</td></tr>";
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
	
	$cabecalho = "Relatório de contagem";
	$empresa = $row['empresa'];
	$data = date("d/m/Y");
	$fornecedor =$row['fornecedor'];
	$fabricante = $row['fabricante'];

	}


	$cabeca = "Relatório de contagem";
	$empr = "Não selecionado";
	$dat = date("d/m/Y h:i:s");
	$forn = "Não selecionado";
	$fab = "Não selecionado";


	$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM pdf");
  //conta
  $contar = $listagem->fetch_row();
  //recebe o valor
  $id = $contar;
  //se nao tiver exportado
  if ($id[0] <> 0 ) {





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


}else{


			// Carrega seu HTML
			$dompdf->load_html('
			<table>
			<h2 style="text-align:left;">' .  $cabeca  .' </h2>
			<tr><td> Empresa: </td>
			<td style="text-align: left;">' . $empr .'</td></tr>
			<tr><td> Data: </td>
			<td style="text-align:left;">' . $dat .'</td></tr>
			<tr><td> Fornecedor: </td>
			<td style="text-align: left;">' . $forn .'</td></tr>
			<tr><td> Fabricante: </td>
			<td style="text-align: left;">' . $fab .'</td></tr>
			
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



}



	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_contagem.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>