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
        <div class="col"><a href="formNationalite.php?action=Ajouter" class="btn btn-success"><i class="fas fa-plus-circle"></i>Créer une nationalité</a></div>
           
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
                echo "<td scope='row' class='col-md-2'><a href='formNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-info'><i class='fas fa-pen'></i></a>";
                echo "<a href='#modalSuppression' data-toggle='modal' data-suppression='supprimerNationalite.php?num=$nationalite->num' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>" . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</main>
<div id="modalSuppression" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation de suppression</h5>
      </div>
      <div class="modal-body">
        <p>Voulez vous supprimer cette nationalité</p>
      </div>
      <div class="modal-footer">
        <a href="" class="btn btn-secondary" data-dismiss="modal">Ne pas supprimer</a>
        <a href="" class="btn btn-primary" id="btnSuppr">Supprimer</a>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php";

?>