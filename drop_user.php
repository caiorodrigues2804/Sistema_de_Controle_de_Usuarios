<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="estilos/estilos.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE USER</title>
</head>
<body>
        <script>

            let confirm;
            confirm = window.confirm('Você tem certeza que quer excluir este usuário??');

            if(confirm){
                location.href = "defi_drop_user.php?<?php print 'usuario=' . $_GET['usuario'] ?>";
            }else{
                window.location.href = 'fetchassoc.php';
            }

        </script>
</body>
</html>