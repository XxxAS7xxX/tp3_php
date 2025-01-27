<?php 
    include "header.php";
    include "connexionPdo.php";
    $action=$_GET['action'];
    $num=$_POST['num'];
    $libelle=$_POST['libelle'];
    $continent=$_POST['continent'];

    if($action == "Modifier"){
    $req=$monPdo->prepare("update nationalite set libelle= :libelle, numContinent= :continent where num = :num");
    $req->bindParam(':libelle',$libelle);
    $req->bindParam(':continent',$continent);

    $req->bindParam(':num',$num);
    }else{
        $req=$monPdo->prepare("insert into nationalite(libelle, numContinent) value(:libelle, :continent)");
        $req->bindParam(':libelle',$libelle);
        $req->bindParam(':continent',$continent);
    }
    $nb=$req->execute();
    $message= $action == "Modifier" ? "modifiée" : "ajoutée";


echo '<div class="container" style="margin: 5% auto auto auto">';
echo '<div class="row">
    <div class="col mt-3">';
if($nb == 1){
    $_SESSION['message']=["success"=>"La nationalité a bien été " . $message];
    // echo '<div class="alert alert-success" role="alert">
    // La nationalité a bien été ' .$message .'
    // </div>';
}else{
    $_SESSION['message']=["success"=>"La nationalité n'a pas été " . $message];
    // echo '<div class="alert alert-danger" role="alert">
    // La nationalité n\'a pas été ' . $message . '
    // </div>';
}
header('location: listeNationalites.php');
exit();
?>
    </div>
</div>
<a href="listeNationalites.php" class="btn btn-primary">Revenir à la liste des nationalités</a>



</div>

<?php include "footer.php";

?>