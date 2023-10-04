<?php
require_once('connect.php');

if(isset($_POST)){
    if(isset($_POST['produit']) && !empty($_POST['produit'])
        && isset($_POST['prix']) && !empty($_POST['prix'])
        && isset($_POST['nombre']) && !empty($_POST['nombre'])){
            $produit = strip_tags($_POST['produit']);
            $prix = strip_tags($_POST['prix']);
            $nombre = strip_tags($_POST['nombre']);

            $sql = "INSERT INTO `liste` (`produit`, `prix`, `nombre`) VALUES (:produit, :prix, :nombre);";

            $query = $db->prepare($sql);

            $query->bindValue(':produit', $produit, PDO::PARAM_STR);
            $query->bindValue(':prix', $prix, PDO::PARAM_STR);
            $query->bindValue(':nombre', $nombre, PDO::PARAM_INT);

            $query->execute();
            $_SESSION['message'] = "Produit ajouté avec succès !";
            header('Location: index.php');
        }
}
require_once('close.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD en PHP</title>
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container mt-5">
<div class="card">
  <div class="card-header">
  Formulaire d'ajout
  </div>

  <div class="card-body">
    <h5 class="card-title">Ajout de produit</h5>
    <p class="card-text">
    <form method="post">

        <div class="row mb-3">
            <label for="inputProduit" class="col-sm-2 col-form-label">Produit</label>
            <div class="col-sm-10">
            <input type="text" name="produit" class="form-control" >
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputPrix" class="col-sm-2 col-form-label">Prix</label>
            <div class="col-sm-10">
            <input type="number" name="prix" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
            <input type="number" name="nombre" class="form-control">
            </div>
        </div>
        <a href="index.php" class="btn btn-danger"><i class="bi bi-arrow-left"></i></a>
        <button type="submit" name="save" class="btn btn-primary"><i class="bi bi-save"></i></button>
</form>
    </p>
    
  </div>
</div>
</div>

<script src="dist/js/bootstrap.js"></script>
</body>
</html>