<?php
include '../Model/connexion.php';
$clients = $connexion->query("SELECT * FROM client")->fetchAll();

?>


<!DOCTYPE html>
<html>
<head>
    <title>Clients</title>
</head>
<body>
<h1>Liste des Clients</h1>
<a href="index.php">⬅ Retour</a> |
<a href="../Model/add_client.php">Ajouter un client</a>

<table>
    <tr>
        <th>Nom</th>
        <th>prenom</th>
        <th>telephone</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($clients as $client): ?>
    <tr>
        <td><?= htmlspecialchars($client['nom_client']) ?></td>
        <td><?= htmlspecialchars($client['prenom_client'] ?? '') ?></td>
        <td><?= htmlspecialchars($client['telephone_client'] ?? '') ?></td>
        <td><?= htmlspecialchars($client['adresse_client']) ?></td>
        <td>
            <a href="../Model/edit_client.php?id=$client['id'] ?>">Modifier</a> |
            <a href="../Model/delete_client.php?id=delete_client.php?id=<?= $client['id_client'] ?>" onclick="return confirm('Supprimer ce client ?')">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>

</html>

