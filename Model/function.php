<?php 
include 'connexion.php';

function getProduit($id=null){
    if(!empty($id)) {
        $sql = "SELECT id_produit, nom_produit, nom_categorie, produit.id_categorie, prix_unitaire, date_expiration, date_fabrication FROM produit INNER JOIN categorie ON produit.id_categorie = categorie.id_categorie WHERE id_produit=?";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array($id));
        return $req->fetch();
    } else {
        $sql = "SELECT id_produit, nom_produit, nom_categorie, produit.id_categorie, prix_unitaire, date_expiration, date_fabrication FROM produit INNER JOIN categorie ON produit.id_categorie = categorie.id_categorie";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}
?>