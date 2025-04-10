<?php
include 'header.php';
include '../Model/categorie.php';
include '../Model/function.php';
if (!empty($_GET['id'])) {
    $produits = getProduit($_GET['id']);
}
?>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action="<?= !empty($_GET['id']) ? "../Model/modifyProduit.php" : "../Model/ajoutProduit.php" ?>" method="post">
                <label for="nom_produit">Nom du produit</label>
                <input type="text" value="<?= !empty($_GET['id']) ? $produits['nom_produit'] : "" ?>" name="nom_produit" id="nom_produit" placeholder="Veuillez saisir le nom">
                <input type="hidden" value="<?= !empty($_GET['id']) ? $produits['id_produit'] : "" ?>" name="id_produit" id="id_produit">

                <label for="id_categorie">Catégorie</label>
                <select name="id_categorie" id="id_categorie">
                    <?php
                    $selected_category_id = null;
                    if (!empty($_GET['id']) && isset($produits['id_categorie'])) {
                        $selected_category_id = $produits['id_categorie'];
                    }
                    while ($ligne = $req->fetch(PDO::FETCH_ASSOC)):
                        $current_category_id = $ligne['id_categorie'];
                        $current_category_name = $ligne['nom_categorie'];

                        $is_selected = ($selected_category_id !== null && $current_category_id == $selected_category_id);
                    ?>
                        <option value="<?= htmlspecialchars($current_category_id) ?>" <?= $is_selected ? 'selected' : '' ?>>
                            <?= htmlspecialchars($current_category_name) ?>
                        </option>
                    <?php endwhile; ?>
                </select>
                <label for="prix_unitaire">Prix unitaire</label>
                <input type="number" value="<?= !empty($_GET['id']) ? $produits['prix_unitaire'] : "" ?>" name="prix_unitaire" id="prix_unitaire" placeholder="Veuillez saisir le prix unitaire">

                <label for="date_fabrication">Date de la fabrication</label>
                <input type="date" value="<?= !empty($_GET['id']) ? $produits['date_fabrication'] : "" ?>" name="date_fabrication" id="date_fabrication">

                <label for="date_expiration">Date de l'expiration</label>
                <input type="date" value="<?= !empty($_GET['id']) ? $produits['date_expiration'] : "" ?>" name="date_expiration" id="date_expiration">

                <button type="submit">Valider</button>
                <?php if (!empty($_SESSION['message']['text'])) { ?>
                    <div class="alert <?= $_SESSION['message']['type'] ?>">
                        <?= $_SESSION['message']['text'] ?>
                    </div>
                <?php } ?>
            </form>

        </div>
        <div class="box">
            <table id="datatable" class="display">
                <thead>
                    <tr>
                        <th>Nom produit</th>
                        <th>Catégorie</th>
                        <th>Prix unitaire</th>
                        <th>Date fabrication</th>
                        <th>Date expiration</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $produits = getProduit();
                    if (!empty($produits) && is_array($produits)) {
                        foreach ($produits as $key => $value) {
                    ?>
                            <tr>
                                <td><?= $value['nom_produit'] ?></td>
                                <td><?= $value['nom_categorie'] ?></td>
                                <td><?= $value['prix_unitaire'] ?></td>
                                <td><?= date('d/m/y', strtotime($value['date_fabrication'])) ?></td>
                                <td><?= date('d/m/y', strtotime($value['date_expiration'])) ?></td>
                                <td><a href="?id=<?= $value['id_produit'] ?>"><i class='bx bx-edit-alt'></i><a href="../Model/deletProduit.php?id=<?= $value['id_produit'] ?>"><i class='bx bxs-trash-alt'></i></a></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>
<script src="../Public/js/jquery.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    });
</script>
<?php
include 'footer.php';
?>