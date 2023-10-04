<?php
// On inclut la connexion à la base
require_once('connect.php');
// On écrit notre requête
$sql = 'SELECT * FROM `liste`';
// On prépare la requête
$query = $db->prepare($sql);
// On exécute la requête
$query->execute();
// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);
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
  La liste des produits disponibles <a href="add.php" class="btn btn-primary float-end"><i class="bi bi-plus-circle"></i></a>
  </div>

  <div class="card-body">
    <h5 class="card-title">Affichage des produits</h5>
    <p class="card-text">
    <table class="table table-hover">
        <thead>
            <th>#ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Actions</th>
        </thead>
        <tbody>
        <?php
            foreach($result as $produit){
        ?>
                <tr>
                    <td><?= $produit['id'] ?></td>
                    <td><?= $produit['produit'] ?></td>
                    <td><?= $produit['prix'] ?></td>
                    <td><?= $produit['nombre'] ?></td>
                    <td>
                      <a href="details.php?id=<?= $produit['id'] ?>"><i class="bi bi-eye"></i></a>  
                      <a href="edit.php?id=<?= $produit['id'] ?>"><i class="bi bi-pen"></i></a>  
                      <a href="delete.php?id=<?= $produit['id'] ?>"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    </p>
    
  </div>
</div>
</div>
  

<script src="dist/js/bootstrap.js"></script>
</body>
</html>