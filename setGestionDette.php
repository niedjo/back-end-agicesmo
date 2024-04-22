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

    $id = htmlspecialchars(strip_tags($data['id']));
    $montant = htmlspecialchars(strip_tags($data['montant']));
    $idSaver = htmlspecialchars(strip_tags($data['idSaver']));
    // $status_buy = $data['status_buy']; 
    // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

    // on chiffre nos donnees

    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

    $motif = "Gestion De Dette";
    $montant_re = "0";


    $montant_re = openssl_encrypt($montant_re, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $montant1 = openssl_encrypt($montant, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $montant = intval($montant);
    $motif = openssl_encrypt($motif, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    
    // les requetes d'insertion

    $sql1 = "INSERT INTO `effectuer_op`(`code_personnel`, `id_caisse`, `motif`, `montant_aj`, `montant_re`) 
                VALUES (:code_personnel_soin, 1, :motif, :montant_aj, :montant_re);

                UPDATE `caisse` SET `montant_total`= montant_total + $montant WHERE id_caisse = 1;

                DELETE FROM `dette` WHERE code_patient_dette = $id;
            ";

    $requette1 = $bdd->prepare($sql1);
    $requette1->bindParam(":code_personnel_soin", $idSaver);
    $requette1->bindParam(":motif", $motif);
    $requette1->bindParam(":montant_aj", $montant1);
    $requette1->bindParam(":montant_re", $montant_re);
    $requette1->execute();

}

else {
    echo json_encode(['erreur' => 'methode de requette invalide']);
}