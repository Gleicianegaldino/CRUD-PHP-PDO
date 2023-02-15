<?php
session_start();

include('banco.php');

$id = $_GET['id'];

$stmt = $pdo->prepare('DELETE FROM pets WHERE id = ?');
$stmt->execute([$id]);

header('location: home.php');



?>
