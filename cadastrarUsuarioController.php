<?php
require_once 'usuarioDAO.php';
require_once 'clienteDTO.php';
require_once 'telefoneDTO.php';

$nome = $_POST["nome"];
$ddd = $_POST["ddd"];
$telefone = $_POST["telefone"];

$clienteDTO = new ClienteDTO();
$clienteDTO->setNome($nome);

$telefoneDTO = new TelefoneDTO();
$telefoneDTO->setDdd($ddd);
$telefoneDTO->setTelefone($telefone);

$usuarioDAO = new UsuarioDAO();
$usuarioDAO->salvar($clienteDTO, $telefoneDTO);

header("location: home.php");
?>