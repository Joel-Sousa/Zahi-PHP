<html>
<head></head>
<body>
<center>
<a href="index.php"><input type="button" value=Cadastrar></a>
</center>
<?php
require_once 'usuarioDAO.php';

$usuarioDAO = new UsuarioDAO();
$usuario = $usuarioDAO->listar();

// var_dump($usuario);
echo "<br><br>";
echo "<table border=1 align='center'>";
echo "<tr>";
echo "<td>Nome</td>";
echo "<td>DDD</td>";
echo "<td>Telefone</td>";
echo "<td>Alterar</td>";
echo "<td>Excluir</td>";
echo "</tr>";
foreach ($usuario as $u) {
    echo "<tr>";
    echo "<td>{$u["nome"]}</td>";
    echo "<td>{$u["ddd"]}</td>";
    echo "<td>{$u["telefone"]}</td>";
    echo "<td><a href='alterarUsuario.php?idCliente={$u["id"]}'><input type=button value=Alterar></a></td>";
    echo "<td><a href='excluirUsuarioController.php?idCliente={$u["id"]}&idTelefone={$u["cliente_id"]}'><input type=button value=Excluir></a></td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>
