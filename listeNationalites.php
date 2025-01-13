<?php 
    include "header.php";
    include "connexionPdo.php";
    $req=$monPdo->prepare("select * from nationalite");
    $req->setFetchMode
?>

<main role="main">
<div class="container">

</div>

</main>

<?php include "footer.php";

?>