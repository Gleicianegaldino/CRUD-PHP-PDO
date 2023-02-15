<?php
session_start();

include 'banco.php';

$stmt= $pdo->prepare("INSERT INTO pets (nome, raca, user_id) 
VALUES (?,?,?)");

$stmt->execute([$_POST['nome'], $_POST['breed'], $_SESSION['user_id']]);

header('location:home.php');
?>