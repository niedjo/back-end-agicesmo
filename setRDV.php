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
    $idSaver = htmlspecialchars(strip_tags($data['idSaver']));
    $DateExam = htmlspecialchars(strip_tags($data['DateExam']));
    $DateRDV = htmlspecialchars(strip_tags($data['DateRDV']));
    $motif = htmlspecialchars(strip_tags($data['motif']));
    // $status_buy = $data['status_buy']; 
    // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

    // on chiffre nos donnees

    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

    $DateExam = openssl_encrypt($DateExam, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $DateRDV = openssl_encrypt($DateRDV, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $motif = openssl_encrypt($motif, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    
    // les requetes d'insertion

    $sql1 = "INSERT INTO `rdv`(
        `code_patient_rdv`, 
        `code_personnel_rdv`, 
        `date_de_prise_en_charge`,
        `date_rdv`,
        `motif`, 
        `contacted`
        )
    VALUES (
        :code_patient_rdv, 
        :code_personnel_rdv, 
        :date_de_prise_en_charge,
        :date_rdv,
        :motif, 
        0
    )";

    $requette1 = $bdd->prepare($sql1);
    $requette1->bindParam(":code_patient_rdv", $idPatient);
    $requette1->bindParam(":code_personnel_rdv", $idSaver);
    $requette1->bindParam(":date_de_prise_en_charge", $DateExam);
    $requette1->bindParam(":date_rdv", $DateRDV);
    $requette1->bindParam(":motif", $motif);
    $requette1->execute();
}

else {
    echo json_encode(['erreur' => 'methode de requette invalide']);
}