<?php
include "header.php";
include "Usuario.php";

if(isset($_POST['enviar'])){
    $usuario = new Usuario();
    $usuario->setLogin($_POST['login']);
    $usuario->setSenha($_POST['senha']);
    $usuario->setFuncao($_POST['funcao']);
    $usuario->insert();
    header("Location: index.php");
}
?>

<form method="post">
<div class="form-group">
  <label for="exampleFormControlInput1">Login</label>
  <input type="text" class="form-control"  name="login" required>
</div>
<div class="form-group">
  <label for="exampleFormControlInput1">Senha</label>
  <input type="text" class="form-control"  name="senha" required>
</div>
<div class="form-group">
  <label for="exampleFormControlInput1">Função</label>
  <input type="text" class="form-control"  name="funcao" required>
</div>
<button type="submit" class="btn btn-outline-success" name="enviar">Enviar</button>
</form>
