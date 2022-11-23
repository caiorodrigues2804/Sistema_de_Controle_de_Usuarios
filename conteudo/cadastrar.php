<?php 
 

    include("classe/conexao.php");

    if($_GET['p'] = 'cadastrar1'){
    if(isset($_POST['nome'])){    
      
    $sql = "INSERT into `usuario`(`nome`,`sobrenome`,`sexo`,`email`,`senha`,`niveldeacesso`) VALUES ('$_POST[nome]','$_POST[sobrenome]','$_POST[sexo]','$_POST[email]','$_POST[senha]','$_POST[niveldeacesso]')";

    if(mysqli_query($conexao,$sql)){
        print 'Foi cadastrado com sucesso';
        header('Location: sucesso.php');
    } else {
        print mysqli_connect_error();
    }

    mysqli_close($conexao);
 }
}
    // if(isset($_POST['confirmar'])){

    //  //1 - Registro do dados
    // if(!isset($_SESSION))
    //     session_start();

    //   foreach($_POST as $chave=>$valor)
    //     $_SESSION[$chave] = $valor;

    // // 2 - Validação dos dados

    //     if(strlen($_SESSION['nome']) == 0)
    //     $erro[] = "Preencha o nome.";

    //     if(strlen($_SESSION['sobrenome']) == 0)
    //     $erro[] = "Preencha o sobrenome.";

    //     if(substr_count($_SESSION['email'], '@') != 1 || substr_count($_SESSION['email'], '.') < 1 || substr_count($_SESSION['email'], '.') > 2)
    //     $erro[] = "Preencha o e-mail corretamente.";

    //     if(strlen($_SESSION['niveldeacesso']) == 0)
    //     $erro[] = "Preecha o nível de acesso.";
        
    //     if(strlen($_SESSION['senha']) < 8 || strlen($_SESSION['senha']) > 16)
    //     $erro[] = "Preecha a senha corretamente.";

    //     if(strcmp($_SESSION['senha'], $_SESSION['rsenha']) != 0)
    //     $erro[] = "As senhas não correspondem.";
    
    // // 3 - Inserção no banco e redirecionamento
    //     // if(count($erro) == 0){

    //         $sql_code = "INSERT INTO `usuario` (
    //             `nome`,
    //             `sobrenome`,
    //             `email`,
    //             `senha`,
    //             `sexo`,
    //             `niveldeacesso`,
    //             `datadecadastro`)
    //             VALUES(
    //            '$_SESSION[nome]',
    //            '$_SESSION[sobrenome]',
    //            '$_SESSION[email]',
    //            '$_SESSION[senha]',
    //            '$_SESSION[sexo]',
    //            '$_SESSION[niveldeacesso]',
    //             )";

            // $confirma = $mysqli->query($sql_code) or die($mysqli->error);

            // if($confirma){

            //     unset($_SESSION[nome],
            //     $_SESSION[sobrenome],
            //     $_SESSION[email],
            //     $_SESSION[senha],
            //     $_SESSION[sexo],
            //     $_SESSION[niveldeacesso],
            //     $_SESSION[datadecadastro]);

            //     echo "<script> location.href = 'index.php?p=inicial'; </script>";

            // }else{
            //     $erro[] = $confirma;
            // }

        // }
  
    
  
?>
<h1>Cadastrar Usuário</h1>
<?php 
  // if($erro > 0){
    //  echo "<div class='erro'>";
    //  foreach($erro as $valor) 
    //  echo "$valor <br/>";

    //  echo "</div>";
// }
?>
<a href="index.php?p=inicial">Voltar</a><br/>
<input type="button" value="Limpar tabela" id="limpar"><br/><br/>
<script>
    document.querySelector('#limpar').addEventListener('click', () => {
        window.location.href = 'limpar.php';
    })
</script>
<form action="index.php?p=cadastrar" method="POST">

    <label for="nome">Nome: </label>
    <input name="nome" value="" required type="text">
    <p class="espaco"></p>

    <label for="sobrenome">Sobrenome: </label>
    <input name="sobrenome" value="" required type="text">
    <p class="espaco"></p>

    <label for="email">E-mail: </label>
    <input name="email" value="" required type="text">
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
        <option value="">Selecione</option>
        <option value="1">Básico</option>
        <option value="2">Administrador</option>
    </select>

    <br/><br/>
    <label for="senha">Senha: </label>
    A senha deve ter entre 8 e 16 caracteres. <br/>
    <input name="senha" value="" required type="password">
    <p class="espaco"></p>
 
    <label for="rsenha">Repita a senha: </label>
    <input name="rsenha" value="" required type="password">
    <p class="espaco"></p>

    <input type="submit" value="Salvar" name="confirmar"/>

</form>