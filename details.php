<?php
session_start();

// On inclut la connexion à la base
require_once('connect.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    // On écrit notre requête
    $sql = 'SELECT * FROM `liste` WHERE `id`=:id';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On attache les valeurs
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On stocke le résultat dans un tableau associatif
    $produit = $query->fetch();

    if(!$produit){
        header('Location: index.php');
    }
}else{
    header('Location: details.php');
}

require_once('close.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">

</head>
<body>
    <div class="container mt-5">
    <div class="card">
    <div class="card-header">
        <h1>Détails du produit <i><?= $produit['produit'] ?></i> <a href="index.php" class="btn btn-light float-end"><i class="bi bi-arrow-left-circle float-end"></i></a> </h1>
    </div>
    <div class="card-body">
        <p>ID : <?= $produit['id'] ?></p>
        <p>Produit : <?= $produit['produit'] ?></p>
        <p>Prix : <?= $produit['prix'] ?></p>
        <p>Nombre : <?= $produit['nombre'] ?></p>
        <p>
            <a href="edit.php?id=<?= $produit['id'] ?>" class="btn btn-primary"><i class="bi bi-pen"></i></a>  
            <a href="delete.php?id=<?= $produit['id'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></p>
    </div>
    </div>
    </div>
</body>
</html>


