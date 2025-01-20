<?php 
    include "header.php";
?>

<div class="container" style="margin: 5% auto auto auto">
<h2 class="text-center">Ajouter une nationalité</h2>
   <form action="valideAjoutNationalite.php" method="post" class="col-md-6 offset-md-3 border border-dark p-3 rounded">
        <div class="form-group">
            <label for="libelle">Libellé</label>
            <input type="text" class="form-control" id='libelle' placeholder="Saisir le libellé" name='libelle'>
        </div>
        <div class="row">
            <div class="col"><a href="listeNationalites.php" class='btn btn-warning btn-block'>Revenir à la liste</a></div>
            <div class="col"><button type="submit" class='btn btn-success btn-block'>Ajouter</button></div>
        </div>
   </form>
</div>
<?php include "footer.php";
?>