<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="60">
    <title>Cadastro de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <?php


    include 'menu.php';


    ?>
</head>
<body>
    <h1>Cadastro de Usuario</h1><hr>
    <form name="FrmUsuario" method="post"  action="" enctype="multipart/form-data">
   login: <input type="text" name="login" autofocus required><br><br>
   senha: <input type="password" name="senha" required><br><br>
   foto: <input type="file" name="foto" required><br><br>
   
   <input type="submit" name="Enviar">
</form>
</body>
</html>

<?php

if(isset($_POST['login']) && isset($_POST['senha']) && isset($_FILES['foto']))
{
$pasta = "img/";
 $pastafoto = $pasta.basename(
$_FILES['foto']['name']);
$foto =$_FILES['foto']['name'];
$resultado = move_uploaded_file($_FILES['foto']['tmp_name'], $pastafoto);

$resultado = move_uploaded_file($_FILES['foto']['tmp_name'], $pastafoto);

if(isset ($_FILES['foto']['type']))
{
    
}







    if($resultado)
    {
        echo "Foto enviada com sucesso!";
    }

$login = $_POST['login'];
$senhalogin = md5($_POST['senha']);
include 'conexao.php';
$query = "INSERT INTO usuario VALUES(null,'$login','$senhalogin', '$foto')";
$resultado = mysqli_query($conexao, $query);

if($resultado)
{
    echo "Usuário(a) cadastrado(a) com sucesso!";
}

else{
        echo "Erro ao cadastrar usuário(a)".mysqli_error($conexao);

}
}

include 'conexao.php';
if(!empty($_SESSION['logado']))
{
include 'lista-usuario.php';
};

?>