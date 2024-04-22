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

    $requette = $bdd->query("SELECT `code_personnel`, `id_caisse`, `motif`, `date_et_heure_op`, `montant_aj`, `montant_re`, personnel.nom_et_prenom 
    FROM `effectuer_op`, `personnel` 
    WHERE personnel.id = effectuer_op.code_personnel;");
    
    $caisseTable = [];
    $caisseTable['caisse'] = [];


    while ($reponse = $requette->fetch()) {
        extract($reponse);
        $caisse = [
            "id_caisse" => strval($id_caisse),
            "code_personnel" => strval($code_personnel),
            "motif" => $motif,
            "date_et_heure_op" => $date_et_heure_op,
            "montant_aj" => $montant_aj,
            "montant_re" => $montant_re,
            "nom_et_prenom" => $nom_et_prenom,
        ];
        
        $caisseTable['caisse'][] = $caisse;
    }
    // var_dump($caisseTable['caisse'][0]['nom_et_prenom']);
    // echo count($caisseTable['caisse']);
    // On envoie le code réponse 200 OK
    
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
    // $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

    for ($i=0; $i < count($caisseTable['caisse']); $i++) { 
        // $caisseTable['caisse'][$i]['date_de_dette'] = openssl_decrypt($caisseTable['caisse'][$i]['date_de_dette'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $caisseTable['caisse'][$i]['motif'] = openssl_decrypt($caisseTable['caisse'][$i]['motif'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $caisseTable['caisse'][$i]['nom_et_prenom'] = openssl_decrypt($caisseTable['caisse'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $caisseTable['caisse'][$i]['montant_aj'] = openssl_decrypt($caisseTable['caisse'][$i]['montant_aj'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $caisseTable['caisse'][$i]['montant_re'] = openssl_decrypt($caisseTable['caisse'][$i]['montant_re'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    }
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($caisseTable);

}
else {
    // mauvaise methode, on gere l'erreur

    http_response_code(405);
    echo json_encode(["message" => "la methode n'est pas autorisee"]);
}