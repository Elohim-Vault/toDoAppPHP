<?php
require "header.php";
require "Usuario.php";
$usuario = new Usuario;
session_start();

$usuario->loadById($_GET['id']);
if($usuario->getId() == NULL){
  $_SESSION['msg'] = "ID inválido";
  header("Location: index.php");
}else{
  if(isset($_POST['enviar'])){
    $_SESSION['msg'] = 'Usuario atualizado com sucesso!';
    $usuario->setLogin($_POST['login']);
    $usuario->setSenha($_POST['senha']);
    $usuario->setFuncao($_POST['funcao']);
    $usuario->update();
    header("Location: index.php");
  }
}
?>

<form method="post" >
  <div class="form-group">
    <label for="exampleFormControlInput1">Login</label>
    <input type="text" class="form-control"  name="login" value="<?php echo $usuario->getLogin() ?>" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Senha</label>
    <input type="text" class="form-control"  name="senha" value="<?php echo $usuario->getSenha() ?>" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Função</label>
    <input type="text" class="form-control"  name="funcao" value="<?php echo $usuario->getFuncao() ?>" required>
  </div>
  <button type="submit" class="btn btn-outline-success" name="enviar">Enviar</button>
</form>

