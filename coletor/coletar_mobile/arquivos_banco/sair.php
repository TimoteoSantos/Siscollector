<?php

session_start();
unset($_SESSION['id'], $_SESSION['usuario'], $_SESSION['senha'], $_SESSION['sessao']) ;
header("Location: ../login.php");