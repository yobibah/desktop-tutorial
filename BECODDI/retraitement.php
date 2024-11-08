<?php


$nom = $_POST["nom"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];
$mdp =$_POST["mdp"];
$id= $_POST["id"];

echo $id;

 try {
    $bdd = new PDO('mysql:host=localhost; dbname=site_auto; charset="uft8','root', '');
    $bdd  ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd  -> exec("SET NAMES 'utf8mb4'");
 }
 catch(Exception $e) {
    echo $e ->getMessage();
    exit();
 }
 

 $req= $bdd -> prepare('UPDATE users set  nom= :nom, email= :email, prenom= :prenom,mdp= :mdp where id = :id LIMIT 1');
 $req ->bindValue(':nom',$nom);
 $req ->bindValue(':email',$email);
 $req ->bindValue(':prenom',$prenom);
 $req ->bindValue(':telephone',$telephone);
 $req ->bindValue(':mdp',$mdp);

 echo $id;

 $exc=$req ->execute();


?>