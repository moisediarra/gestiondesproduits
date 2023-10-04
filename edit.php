<?php
require_once('connect.php');
if(isset($_POST)){
    if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['produit']) && !empty($_POST['produit'])
        && isset($_POST['prix']) && !empty($_POST['prix'])
        && isset($_POST['nombre']) && !empty($_POST['nombre']))
        {
            $id = strip_tags($_GET['id']);
            $produit = strip_tags($_POST['produit']);
            $prix = strip_tags($_POST['prix']);
            $nombre = strip_tags($_POST['nombre']);
            $sql = "UPDATE `liste` SET `produit`=:produit, `prix`=:prix, `nombre`=:nombre WHERE `id`=:id;";
            $query = $db->prepare($sql);
            $query->bindValue(':produit', $produit, PDO::PARAM_STR);
            $query->bindValue(':prix', $prix, PDO::PARAM_STR);
            $query->bindValue(':nombre', $nombre, PDO::PARAM_INT);
            $query->bindValue(':id', $id, PDO::PARAM_INT);

            $query->execute();
            header('Location: index.php');
        }
}
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `liste` WHERE `id`=:id;";
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch();
}
require_once('close.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container mt-5">
<div class="card-body">
    <h5 class="card-title">Modifier un produit</h5>
    <p class="card-text">
    <form method="post">

    <div class="row mb-3">
            <label for="inputProduit" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
            <input type="text" name="id" class="form-control" value="<?= $result['id'] ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputProduit" class="col-sm-2 col-form-label">Produit</label>
            <div class="col-sm-10">
            <input type="text" name="produit" class="form-control" value="<?= $result['produit'] ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputProduit" class="col-sm-2 col-form-label">Prix</label>
            <div class="col-sm-10">
            <input type="text" name="prix" class="form-control" value="<?= $result['prix'] ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputProduit" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
            <input type="text" name="nombre" class="form-control" value="<?= $result['nombre'] ?>">
            </div>
        </div>

        

        <p>
        <a href="index.php" class="btn btn-danger"><i class="bi bi-arrow-left"></i></a>
        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i></button>
        </p>
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
    </form>
    </div>
    </div>
    
</body>
</html>
