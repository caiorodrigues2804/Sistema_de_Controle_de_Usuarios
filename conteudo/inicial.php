<?php 

include("classe/conexao.php");

$sql_code = "SELECT * FROM `usuario`";
$sql_query = mysqli_query($conexao,$sql_code);
$linha=$sql_query->fetch_assoc();

$sexo[1] = "Masculino";
$sexo[2] = "Feminino";

$niveldeacesso[1] = "Básico";
$niveldeacesso[2] = "Administrador";


?>
<h1>Usuário</h1>
<a href="index.php?p=cadastrar">Cadastrar um usuário</a>
<p class="espaco"></p>
<table border="1" cellpadding="10">
    <?php 
    
    include('classe/conexao.php');

    $sql = "SELECT * FROM `usuario`";
    
    mysqli_query($conexao,$sql);
    

    ?>
    <tr class="titulo">
        <td>Nome</td>
        <td>Sobrenome</td>
        <td>Sexo</td>
        <td>E-mail</td>
        <td>Nível de Acesso</td>
        <td>Data de cadastro</td>
        <td>Ação</td>
    </tr>
    <?php 
    do{
    ?>
    <tr>
        <?php 
    
        if(!isset($_SESSION)){
            session_start(); 
        }           

        if(isset($linha['nome'])){        
        $_SESSION['nome'] = $linha['nome'];
        $_SESSION['sobrenome'] = $linha['sobrenome'];
        $_SESSION['sexo'] = $linha['sexo'];
        $_SESSION['email'] = $linha['email'];
        $_SESSION['niveldeacesso'] = $linha['niveldeacesso'];
        }

        ?>
        <?php if(isset($linha['nome'])) {?>
        <td><?php echo $linha['nome']; ?></td>
        <td><?php echo $linha['sobrenome']; ?></td>
        <td><?php echo $sexo[$linha['sexo']]; ?></td>
        <td><?php echo $linha['email']; ?></td>
        <td><?php echo $niveldeacesso[$linha['niveldeacesso']]; ?></td>
        <td><?php 
        $d = explode(" ",$linha['datadecadastro']);
        $data = explode("-",$d[0]);
        echo "$data[2]/$data[1]/$data[0] às $d[1]";
        ?></td>
        <td>
            <a href="index.php?p=editar&usuario=<?php echo $linha['codigo']; ?>">Editar</a> |
            <a href="index.php?p=deletar&usuario=<?php echo $linha['codigo']; ?>">Deletar</a>
        </td>
    </tr>
 
    <?php } } while($linha = $sql_query->fetch_assoc()); ?>
</table>

