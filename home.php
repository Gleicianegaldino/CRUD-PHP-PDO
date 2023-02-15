<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('location: index.php');
    exit();
}

include'banco.php';

$stmt = $pdo->prepare('SELECT * FROM pets WHERE user_id = ?');
$stmt->execute(array($_SESSION['user_id']));

$pets = $stmt->fetchALL();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
    </head>
    <body>
        <h1>Seja bem-vindo (a) <?=$_SESSION['username']?></h1>
        <a href="logout.php">Sair</a>

        <table>
            <?php foreach($pets as $index => $pet): ?>
            <tr>
                <td><?= $pet['nome'] ?></td>
                <td><?= $pet['raca'] ?></td>
                <td><a href="delete.php?id=<?= $pet['id'] ?>"> Remover</td>
            </tr>
            <?php endforeach ?>
        </table>
        <form action="save.php" method="POST">
            <h2>Novo pet</h2>
            <input type="text" name="nome" placeholder="Nome">
            <input type="text" name="breed" placeholder="Raça">
            <input type="submit" value="Salvar">
        </form>
    
    </body>
</html>