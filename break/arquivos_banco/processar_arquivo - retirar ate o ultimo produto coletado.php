<?php
// inicia a sessao
session_start();
//conexao com banco
require '../../coletor/arquivos_banco/conexao.php';

//require 'pegar_inicio.php';
//variavel pra saber se fez alguma divida depois que começou a coleta
$contador = 0;

//saber quantos itens foram vendidos depois
$total = 0;

//limpa a quantidade de produtos da tabela config
$sqld = "DELETE FROM config
WHERE total_venda IS NOT NULL";
mysqli_query($conexao, $sqld);

$listagem = mysqli_query($conexao, "SELECT COUNT(id)  FROM vendas;");

//conta
$conta = $listagem->fetch_row();

//recebe o valor
$id2 = $conta;

//se tiver importado
if ($id2[0] > 0)

{

    $listagem = mysqli_query($conexao, "SELECT COUNT(id)  FROM coletor_exportar;");
    //conta
    $contar = $listagem->fetch_row();
    //recebe o valor
    $id = $contar;
    //se nao tiver exportado
    if ($id[0] < 1)
    {

        $_SESSION['msg'] = "<div class='alert alert-danger'> <span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Você ainda não processou!</div>";
        header("Location: ../index.php");

    }
    else
    {

        //pegar os dados de venda
        $listage = mysqli_query($conexao, "SELECT id,referencia, quantidade, data_hora from vendas ;");
        while ($linha = mysqli_fetch_array($listage))

        {

            //pega os dados da consulta while
            $ref = $linha['referencia'];
            $qt = $linha['quantidade'];
            $hora_venda = $linha['data_hora'];
            $id = $linha['id'];

            // echo $ref;
            //  echo "<br>";

            //pegar os dados da coleta
            $listagem = mysqli_query($conexao, "SELECT * from coletor_exportar where referencia = $ref;");
            while ($linha = mysqli_fetch_array($listagem))

            {

                //pega os dados da consulta while
                $referencia = $linha['referencia'];
                $descricao = utf8_encode($linha['descricao']);
                $qtd = $linha['quantidade'];

                $quantidade = $qtd - $qt;

                //echo "esse" . $referencia;
                //echo "<br>";

                //se foi vendido vai ter a referencia igual a da venda
                if ($ref == $referencia)

                {

                    //echo "igual" .$referencia;
                    //echo "<br>";
                    //	echo $hora_venda;
                    //  	echo "<br>";


                    //pegar a data e hora que começou o balanço
                    $listage1 = mysqli_query($conexao, "SELECT min(id), min(hora) as hora FROM coletor_importar LIMIT 1;");

                    //o while repete a criaçao de linhas na tabela igual a quantidade de itens.
                    while ($linha = mysqli_fetch_array($listage1)) {
                        //pega a hora da coleta
                        $hora_inicio = $linha['hora'];


                        //ultima mercadoria coletada
                        $listage2 = mysqli_query($conexao, "SELECT max(id) as id, max(hora) as hora FROM coletor_importar LIMIT 1;");

                        //o while repete a criaçao de linhas na tabela igual a quantidade de itens.
                        while ($linha2 = mysqli_fetch_array($listage2)) {

                            //hora final
                            $hora_final = $linha2['hora'];

                            //echo $hora_final. "<br>";

                            //echo $hora_inicio;

                            //se a venda foi depois que coletou
                            if ($hora_venda > $hora_inicio) {
                                //saber a quantidade de itens que foram retirados
                                $total = $total + $qt;
                                //se ouver produto a ser retirado
                                $contador = 1;

                                if ($hora_venda > $hora_inicio) {


                                    if ($hora_venda <= $hora_final) {

                                        //echo $hora_venda;
                                        //echo  $id;

                                        //se foi atualiza para a nova quantidade
                                        $result_usuario = "UPDATE vendas SET retirar = '$quantidade' WHERE id = '$id'";
                                        $resultado_usuario = mysqli_query($conexao, $result_usuario);

                                        $retirada = "UPDATE coletor_exportar SET quantidade = '$quantidade' WHERE id = '$id';";
                                        $retirar = mysqli_query($conexao, $retirada);

                                        //apos gravar envia a mensagen
                                        $_SESSION['msg'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok icones' aria-hidden='true'></span> Gerado com sucesso!</div>";

                                        //redireciona
                                        //header("Location: ../index.php");

                                        //echo $referencia;
                                        //echo $hora_venda;
                                        echo $quantidade. "<br>";
                                        //echo  $id;


                                    }
                                }
                            }

                        }//esse
                    }
                }
            }
        }

    }

    //se nao tiver produto importado  /*

}
else
{
    //enviando para a sessao a mensagem
    $_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Não tem produto importado !</div>";
    header("Location: ../index.php");
}

//se o contador nao alterou o valor porque nao foi feita nenhuma mudança
if ($contador == 0)
{

    $_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Nehuma venda depois que começou a coletar !</div>";
    header("Location: ../index.php");

}

//inseri a quantidade de itens que foi retirada
$total_vendas = "INSERT INTO config (total_venda) VALUES ('$total')";
$total_vendas = mysqli_query($conexao, $total_vendas);

