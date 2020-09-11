<?php

require_once "Usuario.php";
    session_start();
    $usuario = new Usuario;
    $usuario->loadById($_GET['id']);
    $usuario->delete();
    $_SESSION['msg'] = 'Usuario deletado com sucesso!';
    header("location: index.php");
?>