<?php 
    include "header.php";
    include "connexionPdo.php";
//liste des nationalités
  //construction de la requête
    $texteReq="select n.num, n.libelle as 'libNation', c.libelle as 'libCont' from nationalite n, continent c where n.numContinent=c.num";
    if(!empty($_GET)){
      if($_GET['libelle'] != ""){$texteReq.= " and n.libelle like '%" .$_GET['libelle']."%'";}
      if($_GET['libelle'] != ""){$texteReq.= " and n.libelle like '%" .$_GET['libelle']."%'";}
    }


    $req=$monPdo->prepare();
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->execute();
    $lesNationalites=$req->fetchALL();
//liste des continents
    $reqContinent=$monPdo->prepare("select * from continent");
    $reqContinent->setFetchMode(PDO::FETCH_OBJ);
    $reqContinent->execute();
    $lesContinents=$reqContinent->fetchALL();

    if(!empty($_SESSION['message'])){
      $mesMessages=$_SESSION['message'];
      foreach($mesMessages as $key=>$message){
        echo '<div class="container" style="padding-top: 4%;">
          <div class="alert alert-' . $key . ' alert-dismissible fade show" role="alert">' . $message .
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>';
      }
      $_SESSION['message']=[];
    }
?>


<div class="container" style="margin: 5% auto auto auto">

  
    <div class="row pt-3">
        <div class="col-9"><h2>Liste des nationalités</h2></div>
        <div class="col"><a href="formNationalite.php?action=Ajouter" class="btn btn-success"><i class="fas fa-plus-circle"></i>Créer une nationalité</a></div>
    </div>

    <form action="" method="get" class="border border-primary rounded p-3" style="margin: 1% auto 1% auto">
      <div class="row">
        <div class="col">
          <input type="text" class="form-control" id='libelle' placeholder="Saisir le libellé" name='libelle' value="<?php if($action == "Modifier"){ echo $laNationalite->libelle;} ?>">
        </div>
        <div class="col">
          <select name="continent" class="form-control">
            <?php
              foreach($lesContinents as $continent){
                $selection=$continent->num == $laNationalite->numContinent ? 'selected' : '';
                echo "<option value='$continent->num' $selection>$continent->libelle</option>";
              }
            ?>
          </select>
        </div>
        <div class="col">
          <button type="submit" value="" class="btn btn-success btn-block">Recherche</button>
        </div>
        </div>
    </form>


    <table class="table table-hover table-dark">
        <thead>
            <tr class="d-flex">
            <th scope="col" class="col-md-2">Numéro</th>
            <th scope="col" class="col-md-5">Libellé</th>
            <th scope="col" class="col-md-3">Continent</th>
            <th scope="col" class="col-md-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($lesNationalites as $nationalite){
                echo "<tr class='d-flex'>";
                echo "<td scope='row' class='col-md-2'>" . $nationalite->num . "</td>";
                echo "<td scope='row' class='col-md-5'>" . $nationalite->libNation . "</td>";
                echo "<td scope='row' class='col-md-3'>" . $nationalite->libCont . "</td>";
                echo "<td scope='row' class='col-md-2'><a href='formNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-info'><i class='fas fa-pen'></i></a>";
                echo "<a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer cette nationalité ?' data-suppression='supprimerNationalite.php?num=$nationalite->num' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>" . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include "footer.php";

?>