<?php
require 'arquivos_banco/conexao.php';
require 'arquivos_banco/login_verificar.php';
//pega o usuario da sessao
$usuario = $_SESSION['usuario'];
?>

<!-- menu -->
<div>
<nav class="menu">
	
	<ul>
		<li> <a href="index.php" id="a"> <img src="logo.png" height="22px" alt=""> SisCollector	</a></li>
		
	
		<li><a href="#">Configuração</a>

			<ul>
				

				<li><a href="v_configuracao.php">Configuração</a></li>
				<li><a href="../contagem_cega/" target="blank" id="red">UP Sessão</a></li>
				<li><a href="../break/" target="blank" id="red"> Break Vendas</a></li>

				
			</ul>
		</li>



		<li> <a href="#"> Processamento </a>
			
			<ul>
				
			
				<li><a href="v_processar.php">Processar Coleta</a></li>
				<li><a href="v_baixar.php">Exportar Arquivos</a></li>


			</ul>
		</li>



		<li><a href="#">Coletas </a>

			<ul>				
				<li><a href="v_importar_arquivo_erp.php">Importar Arquivo ERP Mercadorias</a></li>
					<li><a href="v_importar_arquivo.php">Importar Arquivo Coletor Externo</a></li>
				<li><a href="v_coleta.php">Gerenciar Coleta</a></li>
				<li><a href="../coletar_mobile/index.php" target="blank">Coletar dados Integrado</a></li>
				
			</ul>

		</li>

		<li><a href="#">Integrar Server</a>
			
			<ul>
				<li><a href="v_baixar_integracao.php">Exportar</a></li>
				<li><a href="v_importar_integracao.php">Importar</a></li>
			</ul>
			
		</li>

		<li><a href="v_pesquisa_preco.php">Pesquisa de preço</a> </li>

		<li><a href="#">Cadastro</a>
			
			<ul>
				<li><a href="v_usuario.php">Usuário</a></li>

				<!-- <li><a href="#">Empresas</a></li> -->
				
			</ul>
			
		</li>
		
		<li> <a href="#"> Olá, <?php echo $usuario ;?> ! </a>
			
			<ul> 
			
				<li> <a href="arquivos_banco/sair.php" id="red"> Sair </a> </li>
			</ul>
			
		</li>

 </li>

	</ul>

</nav>
</div>
	<!-- fim do menu -->