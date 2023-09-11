<?php
    require 'header.php';
    $stmt = $pdo->prepare("SELECT contact.*, type.libelle AS type_libelle FROM contact LEFT JOIN type ON contact.id_type = type.id");
    $stmt->execute();
    $contacts = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h1>Contact</h1>
            <button class="btn btn-primary"><a style="color: #fff; text-decoration: none" href="addcontact.php">Ajouter un Contact</a></button>
        </div>
        <div class="card-body">
            <table class="table table-bordered d-flex flex-wrap">
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Date de naissance</th>
                    <th>Numéro de téléphone portable</th>
                    <th>Numéro de téléphone fixe</th>
                    <th>Courriel</th>
                    <th>Type de Contact</th>
                </tr>
<?php
foreach ($contacts as $contact){
    ?>
    <tr>
        <td><?= $contact->nom ?></td>
        <td> <?= $contact->prenom ?></td>
        <td><?= $contact->date_naissance ?></td>
        <td><?= $contact->num_tel ?></td>
        <td><?= $contact->num_tel_fixe ?></td>
        <td><?= $contact->courriel ?></td>
        <td><?= $contact->type_libelle ?></td>
        <td>
            <button class="btn btn-success"><a class="text-decoration-none text-white" href="updatecontact.php?id=<?= $contact->id ?>">Edit</a></button>
            <button class="btn btn-danger"><a class="text-decoration-none text-white" href="deletecontact.php?id=<?= $contact->id ?>">Delete</a></button>
        </td>
    </tr>
    <?php
}
?>
            </table>
        </div>
    </div>
</div>


