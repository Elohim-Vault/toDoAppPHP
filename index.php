<?php
include "header.php";
include_once("Usuario.php");
session_start();
$usuario = new Usuario;
$resultado = $usuario::listFunc();



?>
<body>
<?php if(isset($_SESSION['msg'])):?>
<h1><?php echo $_SESSION['msg']; ?></h1>

<?php session_destroy(); endif?>

<table class="table table-striped">
  <thead class=>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Login</th>
      <th scope="col">Senha</th>
      <th scope="col">Função</th>
    </tr>
  </thead>
  <?php foreach($resultado as $key => $value): ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $value['id']; ?></th>
      <td><?php echo $value['login']; ?></td>
      <td><?php echo $value['senha']; ?></td>
      <td><?php echo $value['funcao']; ?></td>
      <td><a href="editar.php?id=<?php echo $value['id']?>"><button type="button" class="btn btn-outline-warning" name="editar">Editar</button></td>
      <td><a href="deletar.php?id=<?php echo $value['id']?>"><button type="button" class="btn btn-outline-danger" name="deletar">Deletar</button></td>
    </tr>
<?php endforeach; ?>
<a href="criar.php"><button type="button" id="btnInserir" class="btn btn-outline-success" name="criar">Inserir usuario</button></a>
</table>
</body>