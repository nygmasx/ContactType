<?php
include 'header.php';

if (isset($_POST['nom']) && isset($_POST['motdepasse'])){
    $nom = $_POST['nom'];
    $motdepasse = $_POST["motdepasse"];
    if (!empty($nom) && !empty($motdepasse)){

        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE nom_utilisateur = :nom");
        $stmt->bindParam(':nom', $nom);
        $stmt->execute();
        $utilisateur = $stmt->fetch(PDO::FETCH_OBJ);
        if (!$utilisateur){
            ?>
            <script>
                alert("Nom d'utilisateur incorrect");
            </script>
            <?php
        } else {
            if (password_verify($motdepasse, $utilisateur->mot_de_passe)){
                $_SESSION['utilisateur'] = [
                        "id" => $utilisateur->id,
                ];
                header('Location: index.php');
                exit;
            } else {
                ?>
                <script>
                    alert("Mot de passe incorrect");
                </script>
                <?php
            }
        }
    }else{
        ?>
            <script>
                alert('Veuillez remplir tous les champs.')
            </script>
<?php
}



}
?>

<h1 class="text-center">Connexion</h1>

<form action="" method="post" class="form-group">
    <label for="">Nom d'utilisateur</label>
    <input type="text" name="nom" id="nom" class="form-control">
    <label for="">Mot de passe</label>
    <input type="password" name="motdepasse" id="motdepasse" class="form-control">
    <button type="submit" class="btn btn-primary">Connexion</button>
</form>
