<?php 
$title="inscription";
$nav="inscription";
require"en_tete.php";


?>
<link rel="stylesheet" href="../css/inscription.css">

<div id="inscription_"></div>
    <form action="insc_traitement.php" method="post">
       
        <input type="text" id="nom" name="nom" required placeholder="nom">

      
        <input type="email" id="email" name="email" required placeholder="email">

      
        <input type="tel" id="telephone" name="telephone" required placeholder="telephone">

        <input type="password" id="pass" name="pass" required  placeholder="mots de passes">
        <div class="connexion">
    <p><a href="connexion.php">se connecter</a></p>
    </div>
        <input type="submit" name="connexion" value="inscription">
    </form>



    <?php 
require"pie.php";

?>