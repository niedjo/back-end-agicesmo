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

    $dateRetrait = htmlspecialchars(strip_tags($data['dateRetrait']));
    $DateActuele = htmlspecialchars(strip_tags($data['DateActuele']));
    $MontantRetiree = htmlspecialchars(strip_tags($data['MontantRetiree']));
    $MontantRetiree = intval($MontantRetiree);

    $Motif = htmlspecialchars(strip_tags($data['Motif']));
    $idSaver = htmlspecialchars(strip_tags($data['idSaver']));
    // $status_buy = $data['status_buy']; 
    // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

    // on chiffre nos donnees

    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
    $montant_ajoutee = "0";

    $dateRetrait = openssl_encrypt($dateRetrait, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    
    $MontantR = strval($MontantRetiree);

    $MontantRetiree1 = openssl_encrypt($MontantR, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Motif = openssl_encrypt($Motif, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    
    $montant_ajoutee = openssl_encrypt($montant_ajoutee, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    
    $idSaver = intval($idSaver);
    
    // les requetes d'insertion
    $sql1 = "INSERT INTO `effectuer_op`(`code_personnel`, `id_caisse`, `Motif`, `montant_aj`, `montant_re`)
    VALUES (:idSaver, 1, :Motif, :montant_aj, :montant_re);

    UPDATE `caisse` SET `montant_total`= montant_total - $MontantRetiree WHERE `id_caisse` = 1;
    ";

    $requette1 = $bdd->prepare($sql1);
    $requette1->bindParam(":idSaver", $idSaver);
    $requette1->bindParam(":Motif", $Motif);
    $requette1->bindParam(":montant_aj", $montant_ajoutee);
    $requette1->bindParam(":montant_re", $MontantRetiree1);
    $requette1->execute();

}

else {
    echo json_encode(['erreur' => 'methode de requette invalide']);
}