<?php

include 'banco.php';

$username = $_POST['username'];
$senha = $_POST['senha'];

$stmt = $pdo->prepare("INSERT INTO usuario (username, password) VALUES (?,?)");

$stmt->execute([$username,$senha]);

header('location:index.php');

?>