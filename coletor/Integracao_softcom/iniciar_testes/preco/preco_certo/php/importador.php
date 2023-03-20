<?php

require_once "conexaosql.php";
require_once "conexaomysql.php";
require_once "AtualizarPreco.php";
require_once "VerificarCadastro.php";
require_once "VerificarCadastroMERC.php";
$data =  date('Y/m/d');
$codigo = 0;

try{

    $Conexao    = Conexao::getConnection();
     $query      = $Conexao->query("SELECT [Código da Mercadoria] as cod , [Fabricante], [Mercadoria]  FROM [cadastro de mercadorias] where [Código da Mercadoria]  < 2 ;");
    $produtos   = $query->fetchAll();

 }catch(Exception $e){

    echo $e->getMessage();
    exit;

 }
            foreach($produtos as $produto) {

                $codSQL = $produto['cod'];
                $fabricanteSQL = $produto['Fabricante'];
                $mercadoriaSQL = $produto['Mercadoria'];

$codigo = VerificarCadastroMERC($conmy, $codSQL);

if (isset($codigo)){}else{

$query = "INSERT INTO cadastro(codprod, fabricante, mercadoria) VALUES ('$codSQL', '$fabricanteSQL', '$mercadoriaSQL');" ;

    if (mysqli_query($conmy, $query)) {

    }
}

}

try{

    $Conexao    = Conexao::getConnection();
    $query      = $Conexao->query("SELECT [Código da Mercadoria] as cod , [PrecoGrade], [PrecoGrade], [Loja]  FROM [cadastro de mercadoriasLojas]  where [Código da Mercadoria]  < 2 ;");
    $produtos   = $query->fetchAll();

 }catch(Exception $e){

    echo $e->getMessage();
    exit;

 }
            foreach($produtos as $produto) {

                $codSQL = $produto['cod'];
                $precoSQL = $produto['PrecoGrade'];
                $lojaSQL = $produto['Loja'];

//verificar se é uma mercadoria nova
$codigo = VerificarCadastro($conmy, $codSQL,$lojaSQL);

if (isset($codigo)){}else{

$query = "INSERT INTO precosloja(cod, preco, loja,data) VALUES ('$codSQL', '$precoSQL', '$lojaSQL','$data');" ;

    if (mysqli_query($conmy, $query)) {

    }
}

    $result = "SELECT * FROM precosloja where loja = '$lojaSQL' AND cod = '$codSQL' ";
    $resultado = mysqli_query($conmy, $result);

        while($linha = mysqli_fetch_array($resultado)){

            $precomerc = $linha['preco'];
            $lojamerc = $linha['loja'];
            $codmerc = $linha['cod'];

if ($precomerc <> $precoSQL){
    
//alterar preco das mercadorias
AtualizarPreco($conmy, $codSQL, $precoSQL, $lojaSQL, $data);

        }
    }

}