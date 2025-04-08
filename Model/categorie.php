<?php 
include "connexion.php";

$sql = "SELECT * FROM categorie";
$req = $connexion->prepare($sql);
$req->execute();

?>