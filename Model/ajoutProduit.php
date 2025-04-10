<?php
session_reset();
include 'connexion.php';

if (
    !empty($_POST['nom_produit']) 
    && !empty($_POST['id_categorie']) 
    && !empty($_POST['prix_unitaire'])
    && !empty($_POST['date_fabrication'])
    && !empty($_POST['date_expiration'])
) {
    $sql = "INSERT INTO produit (nom_produit, id_categorie, prix_unitaire, date_fabrication, date_expiration) VALUES (?, ?, ?, ?, ?)";
    $req = $connexion->prepare($sql);
    $req->execute(array(
        $_POST['nom_produit'],
        $_POST['id_categorie'],
        $_POST['prix_unitaire'],
        $_POST['date_fabrication'],
        $_POST['date_expiration']
    ));

    if ($req->rowCount()!=0) {
        $_SESSION['message']['text'] = "produit ajouté avec succés";
        $_SESSION['message']['type'] = "success";
    }else {
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout de l'article";
        $_SESSION['message']['type'] = "danger";
    }
} else {
    $_SESSION['message']['text'] = "Une information obligatoire non rensignée";
    $_SESSION['message']['type'] = "danger";
}

header('Location: ../vue/produit.php');
exit();
?>