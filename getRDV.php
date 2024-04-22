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

    $requette = $bdd->query("SELECT `id_rdv`,`code_patient_rdv`, `code_personnel_rdv`, `date_de_prise_en_charge`, `date_rdv`, `motif`, `contacted`, patient.nom_et_prenom, personnel.nom_et_prenom as 'nom_personnel', patient.numtel
    FROM `rdv`, `personnel`, `patient` 
    WHERE patient.code_patient = rdv.code_patient_rdv AND personnel.id = rdv.code_personnel_rdv ORDER BY id_rdv DESC");
    
    $RDVtable = [];
    $RDVtable['RDV'] = [];


    while ($reponse = $requette->fetch()) {
        extract($reponse);
        $rdv = [
            "id_rdv" => strval($id_rdv),
            "code_patient_rdv" => strval($code_patient_rdv),
            "code_personnel_rdv" => strval($code_personnel_rdv),
            "date_de_prise_en_charge" => $date_de_prise_en_charge,
            "date_rdv" => $date_rdv,
            "motif" => $motif,
            "contacted" => strval($contacted),
            "numtel" => $numtel,
            "nom_et_prenom" => $nom_et_prenom,
            "nom_personnel" => $nom_personnel,
        ];
        
        $RDVtable['RDV'][] = $rdv;
    }
    // var_dump($RDVtable['RDV'][0]['nom_et_prenom']);
    // echo count($RDVtable['RDV']);
    // On envoie le code réponse 200 OK
    
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
    // $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

    for ($i=0; $i < count($RDVtable['RDV']); $i++) { 
        $RDVtable['RDV'][$i]['date_de_prise_en_charge'] = openssl_decrypt($RDVtable['RDV'][$i]['date_de_prise_en_charge'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $RDVtable['RDV'][$i]['date_rdv'] = openssl_decrypt($RDVtable['RDV'][$i]['date_rdv'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $RDVtable['RDV'][$i]['motif'] = openssl_decrypt($RDVtable['RDV'][$i]['motif'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $RDVtable['RDV'][$i]['nom_et_prenom'] = openssl_decrypt($RDVtable['RDV'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $RDVtable['RDV'][$i]['nom_personnel'] = openssl_decrypt($RDVtable['RDV'][$i]['nom_personnel'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    }
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($RDVtable);

}
else {
    // mauvaise methode, on gere l'erreur

    http_response_code(405);
    echo json_encode(["message" => "la methode n'est pas autorisee"]);
}