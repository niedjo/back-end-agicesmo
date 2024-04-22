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

    $nom_et_prenom = htmlspecialchars(strip_tags($data['nom_et_prenom']));
    $dateDuJour = htmlspecialchars(strip_tags($data['dateDuJour']));
    $dateNais = htmlspecialchars(strip_tags($data['dateNais']));
    $age = htmlspecialchars(strip_tags($data['age']));
    $sexe = htmlspecialchars(strip_tags($data['sexe']));
    $lieu_de_residence = htmlspecialchars(strip_tags($data['lieu_de_residence']));
    $numtel = htmlspecialchars(strip_tags($data['numtel']));
    $select = htmlspecialchars(strip_tags($data['select']));
    $service = htmlspecialchars(strip_tags($data['service']));
    $idSaver = htmlspecialchars(strip_tags($data['idSaver']));
    // $status_buy = $data['status_buy']; 
    // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

    // on chiffre nos donnees

    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

    $nom_et_prenom = openssl_encrypt($nom_et_prenom, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    // $dateDuJour = openssl_encrypt($dateDuJour, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    // $dateNais = openssl_encrypt($dateNais, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    // $age = openssl_encrypt($age, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $sexe = openssl_encrypt($sexe, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $lieu_de_residence = openssl_encrypt($lieu_de_residence, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    // $numtel = openssl_encrypt($numtel, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $select = openssl_encrypt($select, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $service = openssl_encrypt($service, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    
    // les requetes d'insertion

    $sql1 = "INSERT INTO `patient`(`nom_et_prenom`, `date_du_jour`, `date_nais`, `age`, `sexe`, `lieu_de_residence`, `numtel`, `raison_de_la_venue`, `service`) 
        VALUES 
        (:nom_et_prenom,:dateDuJour, :dateNais, :age, :sexe, :lieu_de_residence, :numtel, :raison_de_la_venue, :service);

        INSERT INTO `operation`(`code_personnel`) VALUES (:idSaver);
    ";

    $requette1 = $bdd->prepare($sql1);
    $requette1->bindParam(":nom_et_prenom", $nom_et_prenom);
    $requette1->bindParam(":dateDuJour", $dateDuJour);
    $requette1->bindParam(":dateNais", $dateNais);
    $requette1->bindParam(":age", $age);
    $requette1->bindParam(":sexe", $sexe);
    $requette1->bindParam(":lieu_de_residence", $lieu_de_residence);
    $requette1->bindParam(":numtel", $numtel);
    $requette1->bindParam(":raison_de_la_venue", $select);
    $requette1->bindParam(":service", $service);
    $requette1->bindParam(":idSaver", $idSaver);
    $requette1->execute();
}

else {
    echo json_encode(['erreur' => 'methode de requette invalide']);
}