<?php

// phpinInfo
// Headers requis
// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *");

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée
header("Access-Control-Allow-Methods: POST");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    // connexion a la base de donnne
    include("ConstantesBd.php");

    $constantes = new Constant();

    $server = $constantes->server;
    $dbname = $constantes->dbname;
    $username = $constantes->username;
    $password = $constantes->password;

    // connexion a la base de donnne
    $bdd = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $idPatient = htmlspecialchars(strip_tags($data['idPatient']));
    $reglement_client = htmlspecialchars(strip_tags($data['reglement_client']));
    $the_reglement = intval($reglement_client);
    $reste_a_payer = htmlspecialchars(strip_tags($data['reste_a_payer']));
    $idSaver = htmlspecialchars(strip_tags($data['idSaver']));

    // les requetes d'insertion

        $requette2 = $bdd->query("SELECT * FROM `dette` WHERE `code_patient_dette` = $idPatient LIMIT 1");
        $x = count($requette2->fetchAll());
        $reste_a_payer =  intval($reste_a_payer);

        if ($x === 0 && intval($reste_a_payer) !== 0) { // s'il n'a pas deja de dette
            $sql1 = "INSERT INTO `dette`(`code_patient_dette`, `code_personnel_dette`, `montant_de_dette`, `montant_soldee`) 
                    VALUES ($idPatient, $idSaver, $reste_a_payer, $reglement_client);";

            $requette1 = $bdd->prepare($sql1);
            $requette1->execute();

        }
        else if ($x !== 0 && intval($reste_a_payer) !== 0) { // il a deja une dette
            $sql1 = "UPDATE `dette` SET `montant_de_dette`=montant_de_dette + $reste_a_payer,`montant_soldee`=montant_soldee + $the_reglement WHERE code_patient_dette = $idPatient;
            ";

            $requette1 = $bdd->prepare($sql1);
            $requette1->execute();
        }
        else { // il a deja une dette
            $sql1 = "UPDATE `caisse` SET `montant_total`= montant_total + $the_reglement WHERE id_caisse = 1;
            ";

            $requette1 = $bdd->prepare($sql1);
            $requette1->execute();
        }

}

else {
    echo json_encode(['erreur' => 'methode de requette invalide']);
}