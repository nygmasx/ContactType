<?php
include 'header.php';

if (isset($_POST['nom']) && isset($_POST['motdepasse'])){
    $nom = $_POST['nom'];
    $motdepasse = $_POST["motdepasse"];
    $motdepasse = password_hash($motdepasse, PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE nom_utilisateur = :nom");
    $stmt->bindParam(':nom', $nom);
    $stmt->execute();
    $utilisateur = $stmt->fetch(PDO::FETCH_OBJ);
    if ($utilisateur){
        ?>
            <script>
                alert("Ce nom d'utilisateur existe déjà");
            </script>
        <?php
    } else {

        $stmt = $pdo->prepare("INSERT INTO utilisateur (nom_utilisateur, mot_de_passe) VALUES (:nom, :motdepasse)");
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":motdepasse", $motdepasse);
        $stmt->execute();
        header('Location: index.php');
    }
}
?>

<h1 class="text-center">Inscription</h1>

<form action="" method="post" class="form-group">
    <label for="">Nom d'utilisateur</label>
    <input type="text" name="nom" id="nom" class="form-control">
    <label for="">Mot de passe</label>
    <input type="password" name="motdepasse" id="motdepasse" class="form-control">
    <button type="submit" class="btn btn-primary">Inscription</button>
</form>
