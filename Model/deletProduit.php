<?php
include 'connexion.php';

if(!empty($_GET['id'])) {
    $sql = "DELETE FROM produit WHERE id_produit=:id";
    $req = $connexion->prepare($sql);
    $req->execute(["id" => $_GET['id']]);
    $req->closeCursor();
    header("Location: ../vue/produit.php");
}
?>