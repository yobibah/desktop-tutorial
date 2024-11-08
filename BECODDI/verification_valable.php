<?php 
function _verification_mails(string $email):bool{
   if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    return true;
   }
   else{
    return false;
   }
}
?>