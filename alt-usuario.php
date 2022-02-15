<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="60">
    <title>Alteração de usuario</title>
</head>
<body>
    <?php
        include 'menu.php';
        include 'conexao.php';
        if(isset($_GET['usuario_id']))
        {
            $usuario_id = $_GET['usuario_id'];
            $query = "SELECT usuario_id,login, senha, foto FROM usuario WHERE usuario_id = $usuario_id ";
            $resultado = mysqli_query($conexao,$query);
            $linha = mysqli_fetch_array($resultado);
        }
       else
       {
              header('Location: http://localhost/locadora/erro.php'); 
              exit;
       }
    ?>
    <h1>Alteração de usuario</h1><hr>
    <form name="Frmfoto" method="post"  action="confalt-usuario.php" enctype="multipart/form-data">
   Login: <input type="text" name="login" autofocus required value="<?php echo $linha['login']; ?>">
   <br><br>
   Senha: <input type="password" name="senha" autofocus required value="<?php echo $linha['senha']; ?>">
   <br><br>
   Foto: <input type="file" name="foto" autofocus required value="<?php echo $linha['foto']; ?>">
   <br><br>
    
   <?php
      echo "<div>
      <a href='img/$_SESSION[foto]' target='_blank'>
      <img src='img/$_SESSION[foto]' 
      width='50' heigth='50' classe='rouded-circle' title= '$_SESSION[login]'> 
      </a><br>";
      mysqli_close($conexao);

    ?>
   <input type="submit" value="Alterar" title="Alterar">
   <input type="hidden" name="usuario_id"value="<?php echo $linha['usuario_id']; ?>">
</form>
</body>
</html>