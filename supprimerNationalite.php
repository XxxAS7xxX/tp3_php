<?php 
    include "header.php";
    include "connexionPdo.php";
    $num=$_GET['num'];

    $req=$monPdo->prepare("delete from nationalite where num = :num");
    $req->bindParam(':num',$num);
    $nb=$req->execute();


// echo '<div class="container" style="margin: 5% auto auto auto">';
// echo '<div class="row">
//     <div class="col mt-3">';
if($nb == 1){
    $_SESSION['message']=["success"=>"La nationalité a bien été supprimée"];
   
}else{
    $_SESSION['message']=["danger"=>"La nationalité n'a pas été supprimée"];
}
header('location: listeNationalites.php');
exit();
?>
<!-- </div></div> -->
<a href="listeNationalites.php" class="btn btn-primary">Revenir à la liste des nationalités</a>

<!--</div> -->

<?php include "footer.php";

?>