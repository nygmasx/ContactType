<?php
    include 'header.php';
var_dump($_SESSION);

print_r($_POST);

    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date']) && isset($_POST['numero']) && isset($_POST['numerofixe']) && isset($_POST['courriel']) && isset($_POST['type'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $date = $_POST['date'];
        $numero = $_POST['numero'];
        $numerofixe = $_POST['numerofixe'];
        $courriel = $_POST['courriel'];
        $type = $_POST['type'];

        $utilisateur = $_SESSION['utilisateur']['id'];
        $stmt = $pdo->prepare("INSERT INTO contact (nom, prenom, date_naissance, num_tel, courriel, id_type, id_utilisateur, num_tel_fixe) VALUES (:nom, :prenom, :date, :numero, :courriel, :id_type, :id_utilisateur, :numtelfixe) ");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':courriel', $courriel);
        $stmt->bindParam(':id_type', $type);
        $stmt->bindParam(':id_utilisateur', $utilisateur);
        $stmt->bindParam(':numtelfixe', $numerofixe);
        $stmt->execute();
        header('Location: index.php');
    }
        $stmt = $pdo->prepare("SELECT * FROM type");
        $stmt->execute();
        $types = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
    <h1 class="text-center">Ajouter un Contact</h1>
    <form action="" method="post" class="form-group">
        <label for="">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control" required>
        <label for="">Prénom</label>
        <input type="text" name="prenom" id="prenom" class="form-control" required>
        <label for="">Date de naissance</label>
        <input type="date" name="date" id="date" class="form-control" required>
        <label for="">Téléphone Portable</label>
        <input type="number" name="numero" id="numero" class="form-control" required>
        <label for="">Téléphone Fixe (facultatif)</label>
        <input type="number" name="numerofixe" id="numerofixe" class="form-control">
        <label for="">Courriel</label>
        <input type="email" name="courriel" id="courriel" class="form-control">
        <label for="">Type</label>
        <select name="type" id="type" class="form-control">
            <?php
            foreach ($types as $typiz){
            ?>
            <option value="<?= $typiz->id ?>"><?= $typiz->libelle ?></option>
            <?php
            }
            ?>
        </select>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
