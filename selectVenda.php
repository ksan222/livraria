<?php
require('conecta.php');
$query = "SELECT * FROM `livros`";
$result = mysqli_query($conexao, $query);

$query_clientes = "SELECT * FROM `clientes`";
$result_clientes = mysqli_query($conexao, $query_clientes)


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Vendas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/reset.css">
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>
    <main>
        <nav class="menu__livraria">
            <a href="cadastrolivro.php">Cadastro de Livros</a> |
            <a href="autor.html">Cadastro de Autores</a> |
            <a href="editora.html">Cadastro de Editora</a> |
            <a href="generos.html">Cadastro de Gêneros</a> |
            <a href="clientes.html">Cadastro de Clientes</a> |
            <a href="selectVenda.php">Cadatro de Vendas</a>
        </nav>

        <fieldset class="novo">
            <legend class="legenda">Cadastro de Vendas:</legend>
            <form action="vendas.php" method="post" class="formulario">
                <select name="idlivro" id="idlivro" class="select" placeholder="Selecione o Código do Livro">
                    <option value="">Selecione o livro</option><br><br>
                    <?php
                    while ($linha = mysqli_fetch_assoc($result)) {
                    ?>

                        <option value="<?php echo $linha['idlivro']; ?>"><?php echo $linha['titulo']; ?></option>
                    <?php  } ?>
                </select><br><br>

                <input type="text" name="valor" id="valor" placeholder="Valor" required><br><br>

                <select name="cliente" id="cliente" class="select">
                    <option value="">Selecione o cliente</option>
                    <?php
                    while ($linha = mysqli_fetch_assoc($result_clientes)) {
                    ?>

                        <option value="<?php echo $linha['idcliente']; ?>"><?php echo $linha['nome_cli']; ?></option>
                    <?php  } ?>
                </select><br><br>

                <input type="date" name="data" id="data" placeholder="Data da Venda" required>

                <input type="reset" value="Limpar" name="limpar" class="bttn__limpar">
                <input type="submit" value="Enviar" name="enviar" class="bttn_salvar">
            </form>
        </fieldset>
    </main>
</body>

</html>