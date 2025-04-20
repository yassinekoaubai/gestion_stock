<?php
include 'connexion.php':
if (
!empty ($_POST ['nom'] )
&& !empty (S_POST ['prenom'] )
&& !empty ($_POST['telephone'] )
&& !empty($_POST ['adresse' ])
){

$sql = "INSERT INTO Fournisseur(nom, prenom, telephone, adresse)
VALUES (?, ?, ?, ?)";
$req = $connexion-›prepare($sql) ;

$req-›execute(array (
        $_POST ['nom' ],
        $_POST ['prenom'],
        $_POST [' telephone'],
        $_ POST ['adresse']
));
if ( $req->rowCount() !=0) {
    $_SESSION[ 'message'] ['text'] = "Fournisseur ajouté avec succès";
    $_SESSION[ 'message'] ['type'] = "success";
    }else{
        $_SESSION[ 'message'] ['text'] = "Une erreur s'est produite lors de l'ajout du client";
        $_SESSION [ 'message'] ['type'] = "danger";
    }
    }else{
            S_SESSION [ 'message'] ['text'] ="Une information obligatoire non rensignée";
            S_SESSION [ 'message'] ['type'] = "danger";

        }
    
        
            header ('Location: •-/vue/client-php');    












client
Aa ab
1 sur 4
1):
if ( Sreq->rowCount() |=8) ‹
S_SESSION [ 'message'] ['text'] = "client ajouté avec succès";
S_SESSION [ 'message'] ['type'] = "success";
Jelse {
S_SESSION [ 'message'] ['text'] = "Une erreur s'est produite lors de l'ajout du client";
S_SESSION [ 'message'] ['type'] = "danger";
else {
S_SESSION [ 'message'] ['text'] ="Une information obligatoire non rensignée";
S_SESSION [ 'message'] ['type'] = "danger";
header ('Location: •-/vue/client-php');