<?php
require_once 'usuarioDAO.php';
require_once 'clienteDTO.php';
require_once 'telefoneDTO.php';

$id = $_POST["id"];
$nome = $_POST["nome"];
$cliente_id = $_POST["cliente_id"];
$ddd = $_POST["ddd"];
$telefone = $_POST["telefone"];

$clienteDTO = new ClienteDTO();
$clienteDTO->setId($id);
$clienteDTO->setNome($nome);

$telefoneDTO = new TelefoneDTO();
$telefoneDTO->setId($id);
$telefoneDTO->setDdd($ddd);
$telefoneDTO->setTelefone($telefone);

$usuarioDAO = new UsuarioDAO();
$usuarioDAO->alterar($clienteDTO,$telefoneDTO);

header("location: home.php");
?>