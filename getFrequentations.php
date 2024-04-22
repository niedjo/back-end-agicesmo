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

    $bdd = new PDO("mysql:host=$server;dbname=$dbname",$username,$password);
    $bdd->exec("set names utf8");

    $requette = $bdd->query("SELECT * FROM `patient`, `operation` WHERE patient.code_patient = operation.code_patient;");
    
    $patientsTable = [];
    $patientsTable['patients'] = [];


    /**
     * `code_patient`,
     * `nom_et_prenom`, 
     * `date_du_jour`, 
     * `date_nais`, 
     * `age`, 
     * `sexe`, 
     * `lieu_de_residence`, 
     * `numtel`, 
     * `raison_de_la_venue`, 
     * `service`
     */
    while ($reponse = $requette->fetch()) {
        extract($reponse);
        $pat = [
            "code_patient" => strval($code_patient),
            "nom_et_prenom" => $nom_et_prenom,
            "date_du_jour" => $date_du_jour,
            "date_nais" => $date_nais,
            "age" => strval($age),
            "sexe" => $sexe,
            "lieu_de_residence" => $lieu_de_residence,
            "numtel" => strval($numtel),
            // "raison_de_la_venue" => $raison_de_la_venue,
            // "service" => $service,
            "code_personnel" => strval($code_personnel),
        ];
        
        $patientsTable['patients'][] = $pat;
    }
    // var_dump($patientsTable['patients'][0]['nom_et_prenom']);
    // echo count($patientsTable['patients']);
    // On envoie le code réponse 200 OK
    
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

    /**
     * `code_patient`,
     * `nom_et_prenom`, 
     * `date_du_jour`, 
     * `date_nais`, 
     * `age`, 
     * `sexe`, 
     * `lieu_de_residence`, 
     * `numtel`, 
     * `raison_de_la_venue`, 
     * `service`
     */
    for ($i=0; $i < count($patientsTable['patients']); $i++) { 
        $patientsTable['patients'][$i]['nom_et_prenom'] = openssl_decrypt($patientsTable['patients'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $patientsTable['patients'][$i]['sexe'] = openssl_decrypt($patientsTable['patients'][$i]['sexe'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $patientsTable['patients'][$i]['lieu_de_residence'] = openssl_decrypt($patientsTable['patients'][$i]['lieu_de_residence'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        // $patientsTable['patients'][$i]['raison_de_la_venue'] = openssl_decrypt($patientsTable['patients'][$i]['raison_de_la_venue'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        // $patientsTable['patients'][$i]['service'] = openssl_decrypt($patientsTable['patients'][$i]['service'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    }
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($patientsTable);

}
else {
    // mauvaise methode, on gere l'erreur

    http_response_code(405);
    echo json_encode(["message" => "la methode n'est pas autorisee"]);
}