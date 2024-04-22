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

    $rubrique = htmlspecialchars(strip_tags($data['rubrique']));
    
    $id = htmlspecialchars(strip_tags($data['id']));
    $qte = htmlspecialchars(strip_tags($data['qte']));
    $prix = htmlspecialchars(strip_tags($data['prix']));
    $date_ravitaillemrnt = htmlspecialchars(strip_tags($data['date_ravitaillemrnt']));
    $date_peremttion = htmlspecialchars(strip_tags($data['date_peremttion']));

    // on chiffre nos donnees

    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

    
    $qte = openssl_encrypt($qte, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $prix = openssl_encrypt($prix, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $date_ravitaillemrnt = openssl_encrypt($date_ravitaillemrnt, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $date_peremttion = openssl_encrypt($date_peremttion, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        
        // les requetes d'insertion
        if (intval($rubrique) === 1) {
            $sql1 = "UPDATE `stock` 
                SET `date_entree_stock_globale` = :date_entree_stock_globale, `quantitee_stock_globale`= :quantitee_stock_globale,`prix` = :prix,`date_peram`= :date_peram 
                WHERE id_stock = $id;
            ";
        }
        else if (intval($rubrique) === 2) {
            $sql1 = "UPDATE `stock` 
                SET `date_entree_stock_globale2` = :date_entree_stock_globale, `quantitee_stock_globale2`= :quantitee_stock_globale,`prix` = :prix,`date_peram2`= :date_peram 
                WHERE id_stock = $id;
            ";
        }


        $requette1 = $bdd->prepare($sql1);
        $requette1->bindParam(":date_entree_stock_globale", $date_ravitaillemrnt);
        $requette1->bindParam(":quantitee_stock_globale", $qte);
        $requette1->bindParam(":prix", $prix);
        $requette1->bindParam(":date_peram", $date_peremttion);
        $requette1->execute();



    
}

else {
    echo json_encode(['erreur' => 'methode de requette invalide']);
}