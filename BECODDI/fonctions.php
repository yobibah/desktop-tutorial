<?php 
function verification_mails():string{
    $alp='AZERTYUIOPQSDFJKLMWXCVBNGH';
    $code_secret='';
    for ($i= 0; $i< 6; $i++) {
        $indexAleatoiere=rand(0,strlen($alp)-1);
        $code_secret.=$alp[$indexAleatoiere];
    }
    return $code_secret;

}
echo verification_mails();
?>

