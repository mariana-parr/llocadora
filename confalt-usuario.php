<?php

include 'menu.php';

if(isset($_POST['usuario_id'])&& 
    isset($_POST['login']) && 
    isset($_POST['senha'])
    && isset($_FILES['foto']))
{   
    $usuario_id = $_POST['usuario_id'];
    $login = $_POST['login'];
    $senhalogin = md5($_POST['senha']);
    
    $pasta = "img/";
 $pastafoto = $pasta.basename(
$_FILES['foto']['name']);
$foto =$_FILES['foto']['name'];
$resultado = move_uploaded_file(
    $_FILES['foto']['tmp_name'], $pastafoto);
    if($resultado)
    {
        echo "Foto enviada com sucesso!";
    }
    
    include 'conexao.php';
    $query = "UPDATE usuario SET login='$login',senha='$senhalogin',foto='$foto' WHERE usuario_id=$usuario_id";
    //echo $query
    $resultado = mysqli_query($conexao,$query);
//NOW pega a data e a hora e retorna

if($resultado)
{   
    echo "A usuario: $login foi alterada com sucesso!";
}
else
{  
    echo "A usuario não pode ser alterada!";
    mysqli_error($conexao);

}

}
?>