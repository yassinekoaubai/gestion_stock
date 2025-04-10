<?php
include 'connexion.php';

$id = $_GET['id'];
$stmt = $connexion->prepare("DELETE FROM client WHERE id_client = ?");
$stmt->execute([$id]);

header("Location: ../vue/clients.php");
