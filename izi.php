<?php
$connexion=mysqli_connect("localhost", "root", "");
$req=mysqli_select_db($connexion,"izikot");
$nom =$_POST["nom"];
$prenom = $_POST["prenom"];
$email= $_POST["email"];
$sujet =$_POST["sujet"];
$message =$_POST["message"];
$msg="merci pour votre visite";
$msg1="vérifier votre adresse mail";
function Verifmail($mail)
{
    $dent = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]';
    $domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)';
    $regex = '/^' . $dent . '+' . '(\.' . $dent . '+)*' . '@' . '(' . $domain . '{1,63}\.)+' . $domain . '{2,63}$/i';
    if (preg_match($regex, $mail) == false) {
        return false;}
    else {return true;}
}
if(isset($nom)  && isset($prenom) && isset($email)  && isset($sujet) && isset($message)&& Verifmail($email) )
{
    $quer= "INSERT INTO client(`nom`, `prenom`, `email`, `sujet`,`message`) VALUES
('$nom','$prenom', '$email','$sujet','$message') ";

    mysqli_query($connexion,$quer) or die(mysqli_error($connexion));
   echo '<script type="text/javascript">window.alert("'.$msg.'"); window.location="acceuil.html";
 </script>';
}
elseif(!verifmail($email))
       {echo '<script type="text/javascript">window.alert("'.$msg1.'"); window.location="acceuil.html";</script>';}
else
{echo "";}
$connexion->close();
