<link rel="stylesheet" type="text/css" href="estilos/estilos.css" />
<?php 

include('conexao.php');

// DEBUGGING
// print '<pre>';
//     print_r($_POST);
// print '</pre>';

//DEBUGGING 
// print '<pre>';
//     print_r($_POST);
// print '</pre>';

 if(!isset($_GET['usuario'])){
    echo '
        <script>
            alert("Usuário não informado");
            location.href = "fetchassoc.php";
        </script>
        ';
 }
 if(isset($_GET['alteracao'])){

    $sql = "UPDATE `team` SET `name` = '$_POST[nome]', `post` = '$_POST[descricao]' WHERE `id` = '$_GET[usuario]'";
    $sql_code = mysqli_query($conexao,$sql);
    
    echo '
        <script>
        window.alert("Alteração realizada com sucesso");
        location.href = "fetchassoc.php"
        </script>
        ';

    mysqli_close($sql_code);

 }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT USER</title>
</head>
<body>
    <fieldset>
        <?php if(isset($_GET['usuario'])) { ?>
        <legend><h2>Alterando dados do usuário ID:<?php print $_GET['usuario'] ?> </h2></legend>
        <form action="edit_user.php?<?php print 'usuario=' . $_GET['usuario'] . '&alteracao=1';?>" method="post">
            <label>NAME (Nome)</label>
            <input name="nome" type="text" value="<?php print($_POST['name']); ?>"/><br/><br/>
            <label>POST (Descrição)</label>
            <input name="descricao" type="text" value="<?php print($_POST['post']); ?>"/>
            <br/><br/>
             <input type="submit" value="Alterar">  <br/><br/>
             <input type="button" id="voltar" value="Clique aqui para voltar"/>          
             <script>
                document.querySelector('#voltar').addEventListener('click',() => {
                    location.href = 'fetchassoc.php';
                })
             </script>
        </form>
    </fieldset>
    <?php } ?>
</body>
</html>