<?php
include 'connexion.php';
$id = $_GET['id'];
$client = $connexion->prepare("SELECT * FROM client WHERE id_client = ?");
$client->execute([$id]);
$client = $client->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom_client'];
    $prenom = $_POST['prenom_client'];
    $telephone= $_POST['telephone_client'];
    $email = $_POST['adresse_client'];


    $stmt = $connexion->prepare("UPDATE client SET nom_client=?, prenom_client=? ,telephone_client=? ,adresse_client=? WHERE id_client=?");
    $stmt->execute([$nom,  $prenom, $telephone , $email, $id]);

    header("Location: ../vue/clients.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Client</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Modifier le Client</h1>
<form method="post">
    Nom: <input type="text" name="nom" value="<?= htmlspecialchars($client['nom_client']) ?>" required><br>
    prenom: <input type="text" name="prenom" value="<?= htmlspecialchars($client['prenom_client']) ?>"><br>
    Nom: <input type="number" name="telephone" value="<?= htmlspecialchars($client['telephone_client']) ?>" ><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($client['adresse_client']) ?>"><br>
    <input type="submit" value="Enregistrer">
</form>
</body>
</html>