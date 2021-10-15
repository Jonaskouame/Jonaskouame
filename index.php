<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Choisir une option Réseaux Sociaux \n";
    $response .= "1. FACEBOOK \n";
    $response .= "2. WHATSAPP";

} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Effectuer une opération \n";
    $response .= "1. Consulter une Alerte Fake-news \n";
    $response .= "2. Demander une vérification d'information \n";

} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "END Information non disponible".$phoneNumber;

} else if($text == "1*1") { 
    // This is a second level response where the user selected 1 in the first instance
    $accountNumber  = "Cette information est un Fake-news";

    // This is a terminal request. Note how we start the response with END
    $response = "END Your account number is ".$accountNumber;

}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
