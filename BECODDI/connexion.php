<?php 
require"en_tete.php";
?>

<link rel="stylesheet" href="../css/inscription.css">


    <form  method="post" action="connex_cl.php">

    <input type="email" id="email" name="email" required placeholder="email">
    <input type="password" id="pass" name="pass" required  placeholder="mots de passes">
    <div class="connexion">
    <p><a href="inscription.php">s'inscrire</a></p>
    </div>
           
        
        <input type="submit" name="connexion" value="connexion">

    </form>

    <?php 
require"pie.php";

?>