<?php
session_start();

require '../../coletor/arquivos_banco/conexao.php';

//verificar se a sessao foi ativada
$sessao_contar = mysqli_query($conexao, "SELECT COUNT(sessao) as sessao  FROM config WHERE sessao > 0");
$sessao2 = $sessao_contar->fetch_row();
//se a sessao foi ativada
if ($sessao2[0] > 0)

{

        $btnLogin = filter_input(INPUT_POST, 'btnLogin');
        if ($btnLogin)
        {
            $usuario = filter_input(INPUT_POST, 'usuario');
            $senha = filter_input(INPUT_POST, 'senha');
            $sessao = filter_input(INPUT_POST, 'sessao');

            //echo "$usuario - $senha";
            if ((!empty($usuario)) and (!empty($senha)))
            {
                //Gerar a senha criptografa
                //echo password_hash($senha, PASSWORD_DEFAULT);
                //Pesquisar o usuário no BD
                $result_usuario = "SELECT id, usuario, senha FROM usuarios WHERE usuario='$usuario' LIMIT 1";
                $resultado_usuario = mysqli_query($conexao, $result_usuario);
                if ($resultado_usuario)
                {
                    $row_usuario = mysqli_fetch_assoc($resultado_usuario);
                    if (password_verify($senha, $row_usuario['senha']))
                    {
                        $_SESSION['id'] = $row_usuario['id'];
                        $_SESSION['usuario'] = $row_usuario['usuario'];
                        $_SESSION['sessao'] = $sessao;

                        header("Location: ../index.php");
                        $_SESSION['msg'] = "<span class='alerta'><span> Olá $usuario! <audio src='bem_vindo.mp3' autoplay></audio> </span>";

                    }
                    else
                    {
                        $_SESSION['msg'] = "<span class='alerta'><span> Login errado :( <audio src='erro.mp3' autoplay></audio> </span>";
                        header("Location: ../login.php");
                    }
                }
            }
            else
            {
                $_SESSION['msg'] = "<span class='alerta'><span> Login errado :( <audio src='erro.mp3' autoplay></audio> </span>";
                header("Location: ../login.php");
            }
        }
        else
        {
            $_SESSION['msg'] = "<span class='alerta'><span> Login errado :( <audio src='erro.mp3' autoplay></audio> </span>";
            header("Location: ../login.php");
        }

    

}
else
{

    $btnLogin = filter_input(INPUT_POST, 'btnLogin');
    if ($btnLogin)
    {
        $usuario = filter_input(INPUT_POST, 'usuario');
        $senha = filter_input(INPUT_POST, 'senha');
        $sessao = filter_input(INPUT_POST, 'sessao');

        //echo "$usuario - $senha";
        if ((!empty($usuario)) and (!empty($senha)))
        {
            //Gerar a senha criptografa
            //echo password_hash($senha, PASSWORD_DEFAULT);
            //Pesquisar o usuário no BD
            $result_usuario = "SELECT id, usuario, senha FROM usuarios WHERE usuario='$usuario' LIMIT 1";
            $resultado_usuario = mysqli_query($conexao, $result_usuario);
            if ($resultado_usuario)
            {
                $row_usuario = mysqli_fetch_assoc($resultado_usuario);
                if (password_verify($senha, $row_usuario['senha']))
                {
                    $_SESSION['id'] = $row_usuario['id'];
                    $_SESSION['usuario'] = $row_usuario['usuario'];
                    $_SESSION['sessao'] = $sessao;

                    header("Location: ../index.php");
                    $_SESSION['msg'] = "<span class='alerta'><span> Olá $usuario! <audio src='bem_vindo.mp3' autoplay></audio> </span>";

                }
                else
                {
                    $_SESSION['msg'] = "<span class='alerta'><span> Login errado :( <audio src='erro.mp3' autoplay></audio> </span>";
                    header("Location: ../login.php");
                }
            }
        }
        else
        {
            $_SESSION['msg'] = "<span class='alerta'><span> Login errado :( <audio src='erro.mp3' autoplay></audio> </span>";
            header("Location: ../login.php");
        }
    }
    else
    {
        $_SESSION['msg'] = "<span class='alerta'><span> Login errado :( <audio src='erro.mp3' autoplay></audio> </span>";
        header("Location: ../login.php");
    }

}


