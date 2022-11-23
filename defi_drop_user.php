<?php 

include('fetchassoc.php');

$sql = "DELETE FROM team WHERE id = '$_GET[usuario]'";
mysqli_query($conexao,$sql);

echo '<script>
      alert("Usuário deletado com sucesso");
      location.href = "fetchassoc.php"
      </script>';
?>