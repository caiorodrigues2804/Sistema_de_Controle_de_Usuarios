<?php 

$id_usuario = intval($_GET['usuario']);

include('classe/conexao.php');
mysqli_query($conexao,"DELETE FROM `usuario` WHERE `codigo` = '$id_usuario'");

echo "<script> 
    alert('Foi excluido com sucesso');
    location.href = 'index.php';
</script>";

?>