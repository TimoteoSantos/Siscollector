<?php

session_start();
require "conexao.php";

phpinfo();

if(isset($_FILES["file"])) {
  $arquivo = $_FILES["file"];
  $pasta_destino = "../arquivo";
 var_dump( $caminho_arquivo = $pasta_destino . "/" . $arquivo["name"]);

  if(move_uploaded_file($arquivo["tmp_name"], $caminho_arquivo)) {
    $sql = "TRUNCATE coletar";
    mysqli_query($conexao, $sql);

    $sql = "LOAD DATA LOCAL INFILE '$caminho_arquivo'
            REPLACE INTO TABLE coletar
            FIELDS TERMINATED BY ';'";
    mysqli_query($conexao, $sql);

    $_SESSION['msg'] = "<div class='alert alert-success'>Verificar importação!</div>";
  //  header("Location: ../v_importar_arquivo_erp.php");
  } else {
    $_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Não foi possível mover o arquivo para o destino!</div>";
   // header("Location: ../v_importar_arquivo_erp.php");
  }
} else {
  $_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Nenhum arquivo enviado!</div>";
  //header("Location: ../v_importar_arquivo_erp.php");
}
