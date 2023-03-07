
<?php
session_start();

$pdo = require 'connexion.php';

if($_POST){
    $nom = htmlentities($_POST['nom']);
    if($nom === '')
    {
        $error = "Entrez un produit";
    }elseif(strlen($_POST['nom']) < 3) {
        $error = "Nombre de caractères insuffisants";
    }
}

$sql = "SELECT * 
        FROM produits";

$result = $pdo->query($sql);


$produits=$result->fetchAll();

if (isset($_POST['produit_id']) {      
    $stmt = $pdo->prepare('SELECT produit FROM produits WHERE id = id');   
    $stmt->execute([$_POST['produit_id']]);    
    $produit = $stmt->fetch;      
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>devoir 2 php intermédiaire</title>
</head>
<body>

    <ul>
    <?php foreach ($produits as $produit) : ?>
        <li>
            <?php echo $produit['nom'] ?>
            <?php echo $produit['prix'] . "euros"?>
            <button type="button" class="btn btn-light btn-sm">
                <a href="panier.php">Ajouter au panier</a>
            </button>
        </li>
    <?php endforeach; ?>
    </ul>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

	
  
	   
	
