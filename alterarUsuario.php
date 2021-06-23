<html>
<head>
<?php
require_once 'usuarioDAO.php';
$idCliente = $_GET["idCliente"];

$usuaroDAO = new UsuarioDAO();
$usuario = $usuaroDAO->getById($idCliente);
?>

</head>
<body>
	<br>
	<br>
	<form action="alterarUsuarioController.php" method="post">
		<table border=0 align="center">
			<tr>
				<td><input type="hidden" name=id value="<?php echo $usuario["id"]?>"></td>
				<td><input type="hidden" name=cliente_id value="<?php echo $usuario["cliente_id"]?>"></td>
			</tr>
			<tr>
				<td>Nome:</td>
				<td><input type="text" name=nome value="<?php echo $usuario["nome"]?>"></td>
			</tr>
			<tr>
				<td>DDD: </td>
				<td><input type="text" name=ddd value="<?php echo $usuario["ddd"]?>" maxlength="2"></td>
			</tr>
			<tr>
				<td>Telefone: </td>
				<td><input type="text" name=telefone value="<?php echo $usuario["telefone"]?>" maxlength="9"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Alterar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
