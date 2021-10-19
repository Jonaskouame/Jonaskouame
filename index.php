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
    $response .= "2. Demander une vérification d'info \n";

} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "END Information non disponible".$phoneNumber;

} else if($text == "1*1") { 
    // This is a second level response where the user selected 1 in the first instance
    $accountNumber  = ",Cette information est un Fake-news, Ne pas ouvrir le formulaire, Ne pas relayer, Ne pas effectuer les instructions incluses.";

    // This is a terminal request. Note how we start the response with END
    $response = "END Fbk name: XXXX, Date:10/01/21, Heure: 12h45 ".$accountNumber;

} else if($text == "1*2") {
    // This is a second level response where the user selected 1 in the first instance
    $response = "CON vous devez vous enregistrer pour faire demande de vérification. (vous serez debité de 100 F CFA par demande) \n";

    // This is a terminal request. Note how we start the response with END
    $response = "END 1. S'enregistrer".$accountNumber;

} elseif ($text == "1*2") {
            // when use response with option Laravel
            $response = "CON Please enter your first name. ";
} elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 2 && $level == 3) {
            $response = "CON Please enter your last name";
} elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 2 && $level == 4) {
            $response = "CON Please enter your email";
} elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 2 && $level == 5) {
            // save data in the database
            $response = "END Your data has been captured successfully! Thank you for registering for Laravel online classes at HLAB.";
}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
