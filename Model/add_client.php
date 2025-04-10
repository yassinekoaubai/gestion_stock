<?php
include 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom_client'];
    $prenom = $_POST['prenom_client'];
    $telephone = $_POST['telephone_client'];
    $email = $_POST['adresse_client'];

    $stmt = $connexion->prepare("INSERT INTO client (nom_client ,prenom_client ,telephone_client, adresse_client) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom,  $telephone,  $email]);

    header("Location: ../vue/clients.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Client</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Ajouter un Client</h1>
<form method="post">
    Nom: <input type="text" name="nom_client" required><br>
    prenom:<input type="text" name="prenom_client" required><br>
    telephone<input type="number" name="telephone_client" required><br>
    Email: <input type="email" name="adresse_client"><br>
    <input type="submit" value="Ajouter">
</form>
</body>
</html>