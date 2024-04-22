<?php

// phpinInfo
// Headers requis
// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *");

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée
header("Access-Control-Allow-Methods: GET");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // On inclut les fichiers de configuration et d'accès aux données
    
    include("ConstantesBd.php");

    $constantes = new Constant();

    $server = $constantes->server;
    $dbname = $constantes->dbname;
    $username = $constantes->username;
    $password = $constantes->password;

    // connexion a la base de donnne
    $bdd = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    $bdd->exec("set names utf8");

    $requette = $bdd->query("SELECT `code_patient_dette`, `code_personnel_dette`, `date_de_dette`, `montant_de_dette`, `montant_soldee`, patient.nom_et_prenom, personnel.nom_et_prenom as 'nom_personnel' 
    FROM `dette`, `patient`, `personnel` 
    WHERE patient.code_patient = dette.code_patient_dette AND personnel.id = dette.code_personnel_dette
    AND date_de_paiement IS null");
    
    $detteTable = [];
    $detteTable['dette'] = [];


    while ($reponse = $requette->fetch()) {
        extract($reponse);
        $det = [
            "code_patient_dette" => strval($code_patient_dette),
            "code_personnel_dette" => strval($code_personnel_dette),
            "date_de_dette" => $date_de_dette,
            "montant_de_dette" => strval($montant_de_dette),
            "montant_soldee" => strval($montant_soldee),
            "nom_et_prenom" => $nom_et_prenom,
            "nom_personnel" => $nom_personnel,
        ];
        
        $detteTable['dette'][] = $det;
    }
    // var_dump($detteTable['dette'][0]['nom_et_prenom']);
    // echo count($detteTable['dette']);
    // On envoie le code réponse 200 OK
    
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
    // $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

    for ($i=0; $i < count($detteTable['dette']); $i++) { 
        // $detteTable['dette'][$i]['date_de_dette'] = openssl_decrypt($detteTable['dette'][$i]['date_de_dette'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $detteTable['dette'][$i]['nom_et_prenom'] = openssl_decrypt($detteTable['dette'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $detteTable['dette'][$i]['nom_personnel'] = openssl_decrypt($detteTable['dette'][$i]['nom_personnel'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    }
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($detteTable);

}
else {
    // mauvaise methode, on gere l'erreur

    http_response_code(405);
    echo json_encode(["message" => "la methode n'est pas autorisee"]);
}