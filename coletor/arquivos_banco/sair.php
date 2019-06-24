<?php

session_start();
//destoi sessao
unset($_SESSION['id'], $_SESSION['usuario'], $_SESSION['senha']);

header("Location: ../v_login.php");