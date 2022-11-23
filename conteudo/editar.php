<?php 
    
    include("classe/conexao.php");

    session_start();
    // print '<pre>';
    // print_r($_SESSION);
    // print '</pre>';

    $id_usuario = $_GET['usuario'];
    $id_usuario = intval($id_usuario);
    // print $id_usuario . ' TIPO ' . gettype($id_usuario);

    if(!isset($_GET['usuario'])){
        echo "<script> alert('Código do usuário não foi informado'); location.href='index.php' </script>";
    }

    if($_GET['p'] = 'cadastrar1'){
    if(isset($_POST['nome'])){          
    

    // $sql = "UPDATE `usuario` (`nome`,`sobrenome`,`sexo`,`email`,`senha`,`niveldeacesso`) SET ('$_POST[nome]','$_POST[sobrenome]','$_POST[sexo]','$_POST[email]','$_POST[senha]','$_POST[niveldeacesso]') WHERE `codigo` = '$id_usuario'";
    // print $sql;
    $sql = "UPDATE `usuario` SET `nome` = '$_POST[nome]', `sobrenome` = '$_POST[sobrenome]', `sexo` = '$_POST[sexo]', `email` = '$_POST[email]',`senha` = '$_POST[senha]', `niveldeacesso` = '$_POST[niveldeacesso]', `datadecadastro` = CURRENT_TIMESTAMP WHERE `codigo` = '$id_usuario';";
    mysqli_query($conexao,$sql);    
    print 'Dados do usuário: ' . $id_usuario . ' foi alterado com sucesso';   
    mysqli_close($conexao);
    session_destroy();
   
 }
} else{

    $sql_code = "SELECT * FROM `usuario` WHERE `codigo` = '$id_usuario'";
    $sql_query = mysqli_query($sql_code,$conexao);
  

    if(!$sql_query){
        print 'Ops!! Acabou de acontecer um erro. ' . mysqli_connect_error();
    }
 
    $linha = $sql_query->fetch_assoc();
    mysqli_close($conexao);
}

// print_r($_SESSION);

?>

<h1>Editar dados do Usuário</h1>
<a href="index.php?p=inicial">Voltar</a><br/>
<!-- <input type="button" value="Limpar tabela" id="limpar"><br/><br/> -->
<script>
    document.querySelector('#limpar').addEventListener('click', () => {
        window.location.href = 'limpar.php';
    })
</script>
<form action="index.php?p=editar&usuario=<?php print $id_usuario?>" method="POST">
 
 
    <label for="nome">Nome: </label>
    <input name="nome" value="<?php print $_SESSION['nome']; ?>" required type="text">
    <p class="espaco"></p>

    <label for="sobrenome">Sobrenome: </label>
    <input name="sobrenome" value="<?php print $_SESSION['sobrenome']; ?>" required type="text">
    <p class="espaco"></p>

    <label for="email">E-mail: </label>
    <input name="email" value="<?php print $_SESSION['email']; ?>" required type="text">
    <p class="espaco"></p>

    <label for="sexo">Sexo</label>
    <select required name="sexo">
        <option value="">Selecione</option>
        <option value="1">Masculino</option>
        <option value="2">Feminino</option>
    </select>
    <br/><br/>
    <label for="niveldeacesso">Nível de Acesso</label>
    <select required name="niveldeacesso">
        <option value="">Selecione o nível de acesso</option>
        <option value="1">Básico</option>
        <option value="2">Administrador</option>
    </select>

    <br/><br/>
    <label for="senha">Senha: </label>
    A senha deve ter entre 8 e 16 caracteres. <br/>
    <input name="senha" value="" required type="text">
    <p class="espaco"></p>
 
    <label for="rsenha">Repita a senha: </label>
    <input name="rsenha" value="" required type="text">
    <p class="espaco"></p>
 
    <input type="submit" value="Salvar" name="confirmar"/>

</form>