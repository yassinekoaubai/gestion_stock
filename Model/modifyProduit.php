<?php
session_start();
include 'connexion.php';

if (
    !empty($_POST['nom_produit']) 
    && !empty($_POST['id_categorie']) 
    && !empty($_POST['prix_unitaire'])
    && !empty($_POST['date_fabrication'])
    && !empty($_POST['date_expiration'])
    && !empty($_POST['id_produit'])
) {
    $sql = "UPDATE produit SET nom_produit=?, id_categorie=?, prix_unitaire=?, date_fabrication=?, date_expiration=? WHERE id_produit=?";
    $req = $connexion->prepare($sql);
    $req->execute(array(
        $_POST['nom_produit'],
        $_POST['id_categorie'],
        $_POST['prix_unitaire'],
        $_POST['date_fabrication'],
        $_POST['date_expiration'],
        $_POST['id_produit']
    ));

    if ($req->rowCount()!=0) {
        $_SESSION['message']['text'] = "produit modifié avec succés";
        $_SESSION['message']['type'] = "success";
    }else {
        $_SESSION['message']['text'] = "Rien a été modifié";
        $_SESSION['message']['type'] = "warning";
    }
} else {
    $_SESSION['message']['text'] = "Une information obligatoire non rensignée";
    $_SESSION['message']['type'] = "danger";
}


header('Location: ../vue/produit.php');
exit()
?>