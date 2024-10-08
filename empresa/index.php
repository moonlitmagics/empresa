<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Empresa</title>
</head>

<body>
    
    <h2>Cadastro Funcionário</h2>

    <form action="cadastrar_funcionario.php" method="get">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>
 
        <label for="salario">Salário:</label>
        <input type="number" id="salario" name="salario" required><br><br>
 
        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo" required><br><br>
 
        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required><br><br>
 
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br><br>
 
        <input type="submit" value="Cadastrar">
    </form>

    <section id="funcionarios">

    <?php
    function renderTemplate($funcionario){
        include "template.php";
 
    }

    //setando as informações do banco de dados
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = "";
    $banco_de_dados = 'empresa' ;
 
    //criando um objeto dessa conexão
    $conexão= new mysqli_connect($servidor, $usuario, $senha, $banco_de_dados);
    $consulta = $conexão->query('insert into funcionarios (nome, salario, cargo, idade, telefone ) 
    values("Jungkook", 3.000, "Cantor", 25,"6799999999")');
    var_dump($consulta);
 
//criando objeto de mysqli_result
    $selectFuncionarios = $conexão->query ('select * from funcionarios');
 
//criando um objeto de resposta mysqili_result para todos os items    
    $rowFuncionarios= $selectFuncionarios->fetch_all(MYSQLI_ASSOC);

    //salvar informaçoes.
    $nome = $_GET['nome'];
    $salario = $_GET['salario'];
    $cargo = $_GET['cargo'];
    $idade = $_GET['idade'];
    $telefone = $_GET['telefone'];

    $inserirFuncionario = $conexão->query('insert into funcionarios (nome, salario, cargo, idade, telefone ) values (".$nome.", ".$salario.", ".$cargo.", ".$idade.", ".$telefone.")');

    //fechando conexão
    $conexão->close();


    //iterando sobre todos os items da tabela
    //semrpe que passsar em um item de $rowfuncionario, esse item é guardado em uma nova variavel linha (funcionario)
 
     foreach($rowFuncionarios as $funcionarios){
        //sempre que passar em um funcionario vai chamar o template colocando as informações da linha(funcionario)
        renderTemplate($funcionario);
     };
 
?>
    </section>
   
</body>
</html>