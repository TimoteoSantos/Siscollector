<?php

session_start();
unset($_SESSION['id'], $_SESSION['usuario'], $_SESSION['senha']);
header("Location: ../login.php");