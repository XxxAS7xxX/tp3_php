<?php 
    include "header.php";
    include "connexionPdo.php";
    $libelle=$_POST['libelle'];

    $req=$monPdo->prepare("insert into nationalite(libelle) value(:libelle)");
    $req->bindParam(':libelle',$libelle);
    $req->setFetchMode(PDO::FETCH_OBJ);
    $nb=$req->execute();
echo '<div class="container" style="margin: 5% auto auto auto">';
echo '<div class="row">
    <div class="col mt-3">';
if($nb == 1){
    echo '<div class="alert alert-success" role="alert">
    La nationalité a bien été ajoutée
    </div>';
}else{
    echo '<div class="alert alert-danger" role="alert">
    La nationalité n\'a pas été ajoutée §
    </div>';
}
?>
    </div>
</div>
<a href="listeNationalites.php" class="btn btn-primary">Revenir à la liste des nationalités</a>



</div>

<?php include "footer.php";

?>