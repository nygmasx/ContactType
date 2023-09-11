<?php
require 'header.php';

if (isset($_POST['libelle'])){
    $libelle = $_POST['libelle'];
    $stmt = $pdo->prepare("INSERT INTO type (libelle) VALUES (:libelle)");
    $stmt->bindParam(':libelle', $libelle);
    $stmt->execute();
    header("Location: index.php");
}
?>

<form action="" method="post" class="form-group">
    <label for="">Libellé Type</label>
    <input type="text" name="libelle" id="libelle" class="form-control">
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
