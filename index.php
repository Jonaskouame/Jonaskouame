<?php
//reads the variables sent via POST from AT gateway
$sessionId = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text = $_POST["text"];

if ($text == "")¨{
// this is the first request> Note how we start the response with CON
$response = "CON what would you want to check\n";
$response .= "1. FACEBOOK No \n";
$response .= "2. WHATSAPP";
} else if ($text == "1") {
//   Business logic for the first level response
$response = "CON choisir une option \n";
$response .= "1. Alerte Fake-news \n";
$response .= "2. Demander une vérification";
   
} else if ($text == "2") {
// Business logic for the first level response
// this is a terminal request. Note how we start with END.
$response = "END your phone number".$phoneNumber;
} else if ($text == "1*1") {
// this is a second level response where the user selected 1 in the first instance
}$AlerteFakenews = "ATTENTION info publiée le 10 Octobre 2021 sur le sujet: Place disponible Fonction publique CI est un Fake. Ne pas ouvrir le formulaire, Ne pas relayer, Ne pas effectuer les opérations incluses";

// this a terminal request. Note how we start with END
$response = "END your AlerteFakenews is".$AlerteFakenews

else if ($text =="1*2") {
// this is a second level response where the user selected 1 in the first instance
 $login = "S'enregistrer";

//  this is a terminal request. Note how we start with END
$response = "END your login".$login;

}
// echo the response to the API. the response depend on the statement that is fulfilled in each instance
header ('content-type; text/plain');
echo $response
?>