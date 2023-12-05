<?php
include('header.php');
?>
    <div id="contform">
    <?php
include('config.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $conn->real_escape_string($_POST['email']);
        $senha = $conn->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM ong WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['CNPJ'];
            $_SESSION['nomef'] = $usuario['nomef'];

            header("Location: index.php");

        } else {
            echo "<script> alert('Falha ao logar! E-mail ou senha incorretos!'); </script>";
        }

    }

}
?>
<div id="formulario">
    <div class="tituloform">Login</div>
<form action="" method="POST">
    <div class="detalheform">
    <div class="infoform">
        <label class="letraform">Email: </label>
        <input type="text" name="email" placeholder="Insira o seu email" required>
    </div>
    <div class="infoform">
        <label class="letraform">Senha: </label>
        <input type="password" name="senha" placeholder="Insira a sua senha" required>
    </div>
    </div>
    <div>
        <button id="buttoncriar" type="submit">Entrar</button>
    </div>
    <br><br>
    <div id="naocadastro" style="
    display: flex;
    align-items: center;
    justify-content: center;">  
    <p>Ainda não possue login? </p>     
        <a href="criarong.php" 
        style="color: black;">
                 Cadastrar
        </a>
    </div>
</form>
</div>
<div>
</div>
</div>
</body>
<?php
include('footer.php');
?>