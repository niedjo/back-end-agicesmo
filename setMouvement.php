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
    
    $entree = htmlspecialchars(strip_tags($data['entree']));

    if ($entree === "OUI") {
        $idSaver = htmlspecialchars(strip_tags($data['idSaver']));
        $MouvementActuel = htmlspecialchars(strip_tags($data['MouvementActuel']));
        $date_et_heure_sortie = htmlspecialchars(strip_tags($data['date_et_heure_sortie']));
        $periode_de_travail = htmlspecialchars(strip_tags($data['periode_de_travail']));
        // $status_buy = $data['status_buy']; 
        // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

        // on chiffre nos donnees

        $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

        $date_et_heure_sortie = openssl_encrypt($date_et_heure_sortie, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        
        // les requetes d'insertion

        $sql1 = "UPDATE `mouvement` SET `date_et_heure_sortie`= :date_et_heure_sortie WHERE id_mouv = :id_mouv";

        $requette1 = $bdd->prepare($sql1);
        $requette1->bindParam(":id_mouv", $MouvementActuel);
        $requette1->bindParam(":date_et_heure_sortie", $date_et_heure_sortie);
        $requette1->execute();
    }

    else {
        $idSaver = htmlspecialchars(strip_tags($data['idSaver']));
        $date_et_heure_entree = htmlspecialchars(strip_tags($data['date_et_heure_entree']));
        $periode_de_travail = htmlspecialchars(strip_tags($data['periode_de_travail']));
        // $status_buy = $data['status_buy']; 
        // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

        // on chiffre nos donnees

        $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

        $date_et_heure_entree = openssl_encrypt($date_et_heure_entree, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $date_et_heure_sortie = openssl_encrypt("", 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

        // les requetes d'insertion

        $sql1 = "INSERT INTO `mouvement`
        (
            `code_personnel`, 
            `date_et_heure_entree`, 
            `date_et_heure_sortie`, 
            `periode_de_travail`
        ) VALUES 
        (
            :code_personnel,
            :date_et_heure_entree,
            :date_et_heure_sortie,
            :periode_de_travail
        )";

        $requette1 = $bdd->prepare($sql1);
        $requette1->bindParam(":code_personnel", $idSaver);
        $requette1->bindParam(":date_et_heure_entree", $date_et_heure_entree);
        $requette1->bindParam(":date_et_heure_sortie", $date_et_heure_sortie);
        $requette1->bindParam(":periode_de_travail", $periode_de_travail);
        $requette1->execute();
    }
}

else {
    echo json_encode(['erreur' => 'methode de requette invalide']);
}