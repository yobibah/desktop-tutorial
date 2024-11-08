<?php 
$title="Acceuil";
$nav="accueil";
session_start();
require"BECODDI/en_tetec.php";
?>
<link rel="stylesheet" href="index.css">
<section id="presentation">

   
    <div class="txt">
        <p> <h1>Fondée en 2023, BECDD-International est une entreprise pionnière dans le domaine de la gestion environnementale et du développement durable. Basée à Ouagadougou, Burkina Faso, l’entreprise s’est rapidement imposée comme un acteur clé dans la région et à l’international grâce à son expertise et à son engagement envers la protection de l’environnement</p>

<button class="btn"> <a href="BECODDI/service.php.summa">Decouvrir</a> </button>
    </div>

    <div class="present">
    <img src="images/teledetection.jpg" alt="Car Image">
</div>

</section>

<section id="ilus_panne">

   <p class="pa">quelques uns de nos Services ?</p>

</section>


<section id="service">


   <div class="card">
    <div id="col"></div>
    <h2>Agroalimentaire</h2>
    <img src="images/rse agro.webp" alt="">
    <button> <a href="BECODDI/service.php#teledetection">Voir plus </a> </button>
   </div>

   <div class="card">
    <div id="col"></div>
    <h2>Télédétection</h2>
    <img src="images/teledetection4.jpg" alt="">
    <button> <a href="BECODDI/service.php#teledetection">Voir plus </a> </button>
   </div>

   <div class="card">
    <div id="col"></div>
    <h2>Géophysique</h2>
    <img src="images/geophysique.JPG" alt="">
    <button> <a href="BECODDI/service.php#teledetection"">Voir plus </a> </button>
   </div>

   <div class="card">
    <div id="col"></div>
    <h2>hydro-agricoles </h2>
    <img src="images/irrigation-19.jpg" alt="">
    <button> <a href="#ECODDI/service.php#teledetection"">Voir plus </a> </button>
   </div>


</section>

<section id="consultation">
    <div class="para"><p>Nous contacter ?</p></div>

    <div class="consult">
        <form method="post" action="BECODDI/consul.php">
            <input type="text" name="name" id="name" class="nom" placeholder="Nom" required>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
            <input type="email" name="mail" id="mail" placeholder="Adresse e-mail" required>
            <textarea name="message" id="message" placeholder="Message" required></textarea>
            <input type="submit" value="Envoyer">
        </form>
    </div>
</section>

    <section id="exploit">

    <div class="para"><p>Nos Exploit?</p></div>
  
        <div class="ima">
        <div id="col"></div>
        <h2>satistfait</h2>
        <img  src="images/Agroalimentaire_preview.jpg" client="">
    
        </div>

        <div class="ima">
        <div id="col"></div>
        <h2>Travailleurs</h2>
        <img  src="images/environnement.jpg" client="">
       
        </div>
       

</section>
</section>


<?php 

require"BECODDI/pieds.php";
?>