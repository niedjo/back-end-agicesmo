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

    // les donnees a inserer (securisees)
    $name = htmlspecialchars(strip_tags($data['nom']));
    $mdp = htmlspecialchars(strip_tags($data['password']));
    $type_compte = htmlspecialchars(strip_tags($data['type_compte']));
    // $status_buy = $data['status_buy']; 
    // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

    // on chiffre nos donnees

    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

    $name = openssl_encrypt($name, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $mdp = openssl_encrypt($mdp, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $type_compte = openssl_encrypt($type_compte, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    // les requetes d'insertion

    $sql1 = "INSERT INTO `personnel` (`nom_et_prenom`, `mot_de_passe`, `periode_de_travail`) 
    VALUES (:nom, :mdp, 0)
    ";

    $requette1 = $bdd->prepare($sql1);
    $requette1->bindParam(":nom", $name);
    $requette1->bindParam(":mdp", $mdp);
    $requette1->execute();

    $ids = $bdd->query("SELECT * FROM personnel WHERE 1");
    while ($a = $ids->fetch()) {
        $id = $a['id'];
    }

    
    $sql2 = "INSERT INTO `posseder_statut`(`nom_statut`, `code_statut`) 
        VALUES 
        (:type_compte, :id)
    ";

    $requette2 = $bdd->prepare($sql2);
    $requette2->bindParam(":type_compte", $type_compte);
    $requette2->bindParam(":id", $id);
    $requette2->execute();
}

else {
    echo json_encode(['erreur' => 'methode de requette invalide']);
}