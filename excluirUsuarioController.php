<?php
require_once 'usuarioDAO.php';

$id = $_GET["idCliente"];
$cliente_id = $_GET["idTelefone"];

$usuarioDAO = new UsuarioDAO();
$usuarioDAO->excluir($id,$cliente_id);

header("location: home.php");
?>