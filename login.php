<?php

session_start();

include 'banco.php';

$username = $_POST['username'];
$senha = $_POST['senha'];

$stmt = $pdo->prepare(" SELECT * FROM usuario WHERE username = ? AND password = ? ");

$stmt->execute([$username,$senha]);

$linhas= $stmt->fetchALL();

if(sizeof($linhas) == 0){
    header('location: index.php');
    exit();
}

$_SESSION['username'] = $linhas[0]['username'];
$_SESSION['user_id'] = $linhas[0]['id'];

header('location: home.php');


?>