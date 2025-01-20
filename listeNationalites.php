<?php 
    include "header.php";
    include "connexionPdo.php";
    $req=$monPdo->prepare("select * from nationalite");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->execute();
    $lesNationalites=$req->fetchALL();
?>

<main role="main">
<div class="container" style="margin: 5% auto auto auto">
    <div class="row pt-3">
        <div class="col-9"><h2>Liste des nationalités</h2></div>
        <div class="col"><a href="formAjoutNationalite" class="btn btn-success"><i class="fas fa-plus-circle"></i>Créer une nationalité</a></div>
           
    </div>

    <table class="table table-hover table-dark">
        <thead>
            <tr class="d-flex">
            <th scope="col" class="col-md-2">Numéro</th>
            <th scope="col" class="col-md-8">Libellé</th>
            <th scope="col" class="col-md-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($lesNationalites as $nationalite){
                echo "<tr>";
                echo "<td scope='row' class='col-md-2'>" . $nationalite->num . "</td>";
                echo "<td scope='row' class='col-md-8'>" . $nationalite->libelle . "</td>";
                echo "<td scope='row' class='col-md-2'><a href='' class='btn btn-info'><i class='fas fa-pen'></i></a>";
                echo "<a href='' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>" . "</td>";
                echo "</tr>";
            }
            ?>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>

            </tr>
            <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            </tr>
        </tbody>
    </table>
</div>

</main>

<?php include "footer.php";

?>