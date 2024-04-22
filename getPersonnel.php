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

    $requette = $bdd->query("SELECT id, nom_et_prenom, mot_de_passe, nom_statut, code_statut, periode_de_travail FROM personnel, posseder_statut WHERE personnel.id = posseder_statut.code_statut");
    
    $personnelsTable = [];
    $personnelsTable['personnel'] = [];


    while ($reponse = $requette->fetch()) {
        extract($reponse);
        $per = [
            "id" => strval($id),
            "nom_et_prenom" => $nom_et_prenom,
            "mot_de_passe" => $mot_de_passe,
            "nom_statut" => $nom_statut,
            "periode_de_travail" => strval($periode_de_travail),
        ];
        
        $personnelsTable['personnel'][] = $per;
    }
    // var_dump($personnelsTable['personnel'][0]['nom_et_prenom']);
    // echo count($personnelsTable['personnel']);
    // On envoie le code réponse 200 OK
    
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
    // $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

    for ($i=0; $i < count($personnelsTable['personnel']); $i++) { 
        $personnelsTable['personnel'][$i]['nom_et_prenom'] = openssl_decrypt($personnelsTable['personnel'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $personnelsTable['personnel'][$i]['mot_de_passe'] = openssl_decrypt($personnelsTable['personnel'][$i]['mot_de_passe'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $personnelsTable['personnel'][$i]['nom_statut'] = openssl_decrypt($personnelsTable['personnel'][$i]['nom_statut'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    }
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($personnelsTable);

}
else {
    // mauvaise methode, on gere l'erreur

    http_response_code(405);
    echo json_encode(["message" => "la methode n'est pas autorisee"]);
}