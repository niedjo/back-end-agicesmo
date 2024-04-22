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

    $requette = $bdd->query("SELECT `code_personnel`, `id_mouv`, `date_et_heure_entree`, `date_et_heure_mouv`, `date_et_heure_sortie`, mouvement.periode_de_travail, personnel.nom_et_prenom 
    FROM `mouvement`, `personnel` 
    WHERE personnel.id = mouvement.code_personnel ORDER BY id_mouv DESC");
    
    $mouvementTable = [];
    $mouvementTable['mouvement'] = [];


    while ($reponse = $requette->fetch()) {
        extract($reponse);
        $mouv = [
            "code_personnel" => strval($code_personnel),
            "id_mouv" => strval($id_mouv),
            "date_et_heure_entree" => $date_et_heure_entree,
            "date_et_heure_mouv" => $date_et_heure_mouv,
            "date_et_heure_sortie" => $date_et_heure_sortie,
            "periode_de_travail" => strval($periode_de_travail),
            "nom_et_prenom" => $nom_et_prenom,
        ];
        
        $mouvementTable['mouvement'][] = $mouv;
    }
    // var_dump($mouvementTable['mouvement'][0]['nom_et_prenom']);
    // echo count($mouvementTable['mouvement']);
    // On envoie le code réponse 200 OK
    
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
    // $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

    for ($i=0; $i < count($mouvementTable['mouvement']); $i++) { 
        $mouvementTable['mouvement'][$i]['date_et_heure_entree'] = openssl_decrypt($mouvementTable['mouvement'][$i]['date_et_heure_entree'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $mouvementTable['mouvement'][$i]['date_et_heure_sortie'] = openssl_decrypt($mouvementTable['mouvement'][$i]['date_et_heure_sortie'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $mouvementTable['mouvement'][$i]['nom_et_prenom'] = openssl_decrypt($mouvementTable['mouvement'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    }
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($mouvementTable);

}
else {
    // mauvaise methode, on gere l'erreur

    http_response_code(405);
    echo json_encode(["message" => "la methode n'est pas autorisee"]);
}