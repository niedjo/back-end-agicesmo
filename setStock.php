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

    $type_stock = htmlspecialchars(strip_tags($data['type_stock']));
    
    if ($type_stock === "Stock globale") {
        $Nom_Produit = htmlspecialchars(strip_tags($data['Nom_Produit']));
        $qte = htmlspecialchars(strip_tags($data['qte']));
        $qte2 = htmlspecialchars(strip_tags($data['qte2']));
        $prix = htmlspecialchars(strip_tags($data['prix']));
        $date_ravitaillemrnt = htmlspecialchars(strip_tags($data['date_ravitaillemrnt']));
        $date_ravitaillemrnt2 = htmlspecialchars(strip_tags($data['date_ravitaillemrnt2']));
        $date_peremttion = htmlspecialchars(strip_tags($data['date_peremttion']));
        $date_peremttion2 = htmlspecialchars(strip_tags($data['date_peremttion2']));
        $idSaver = htmlspecialchars(strip_tags($data['idSaver']));
        // $status_buy = $data['status_buy']; 
        // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

        // on chiffre nos donnees

        $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
        $vide = "";



        $Nom_Produit = openssl_encrypt($Nom_Produit, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $qte = openssl_encrypt($qte, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $qte2 = openssl_encrypt($qte2, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $prix = openssl_encrypt($prix, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $date_ravitaillemrnt = openssl_encrypt($date_ravitaillemrnt, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $date_ravitaillemrnt2 = openssl_encrypt($date_ravitaillemrnt2, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $date_peremttion = openssl_encrypt($date_peremttion, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $date_peremttion2 = openssl_encrypt($date_peremttion2, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $vide = openssl_encrypt("", 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        
        $date_entree_stock_jour = $vide;
        $date_entree_stock_jour2 = $vide;
        $date_entree_stock_garde = $vide;
        $date_entree_stock_garde2 = $vide;
        $quantitee_stock_globale = $qte;
        $quantitee_stock_globale2 = $qte2;
        $quantitee_stock_jour = $vide;
        $quantitee_stock_jour2 = $vide;
        $quantitee_stock_garde = $vide;
        $quantitee_stock_garde2 = $vide;
        $date_peram = $date_peremttion;
        $date_peram2 = $date_peremttion2;
        // les requetes d'insertion

        $sql1 = "INSERT INTO `stock`(
                `code_personnel`, 
                `nom`, 
                `date_entree_stock_globale`, 
                `date_entree_stock_jour`, 
                `date_entree_stock_garde`, 
                `quantitee_stock_globale`, 
                `quantitee_stock_jour`, 
                `quantitee_stock_garde`, 
                `prix`, 
                `date_peram`, 
                `date_entree_stock_globale2`, 
                `date_entree_stock_jour2`, 
                `date_entree_stock_garde2`, 
                `quantitee_stock_globale2`, 
                `quantitee_stock_jour2`, 
                `quantitee_stock_garde2`, 
                `date_peram2`
                ) 
            VALUES 
            (
                :idSaver,
                :Nom_produit, 
                :date_entree_stock_globale, 
                :date_entree_stock_jour, 
                :date_entree_stock_garde, 
                :quantitee_stock_globale, 
                :quantitee_stock_jour, 
                :quantitee_stock_garde, 
                :prix, 
                :date_peram,
                :date_entree_stock_globale2, 
                :date_entree_stock_jour2, 
                :date_entree_stock_garde2, 
                :quantitee_stock_globale2, 
                :quantitee_stock_jour2, 
                :quantitee_stock_garde2, 
                :date_peram2
                );

            INSERT INTO `gerer_stock`(`id_personnel`) VALUES (:idSaver);
        ";


        $requette1 = $bdd->prepare($sql1);
        $requette1->bindParam(":idSaver", $idSaver);
        $requette1->bindParam(":Nom_produit", $Nom_Produit);
        $requette1->bindParam(":date_entree_stock_globale", $date_ravitaillemrnt);
        $requette1->bindParam(":date_entree_stock_globale2", $date_ravitaillemrnt2);
        $requette1->bindParam(":date_entree_stock_jour", $vide);
        $requette1->bindParam(":date_entree_stock_jour2", $vide);
        $requette1->bindParam(":date_entree_stock_garde", $vide);
        $requette1->bindParam(":date_entree_stock_garde2", $vide);
        $requette1->bindParam(":quantitee_stock_globale", $quantitee_stock_globale);
        $requette1->bindParam(":quantitee_stock_globale2", $quantitee_stock_globale2);
        $requette1->bindParam(":quantitee_stock_jour", $vide);
        $requette1->bindParam(":quantitee_stock_jour2", $vide);
        $requette1->bindParam(":quantitee_stock_garde", $vide);
        $requette1->bindParam(":quantitee_stock_garde2", $vide);
        $requette1->bindParam(":prix", $prix);
        $requette1->bindParam(":date_peram", $date_peram);
        $requette1->bindParam(":date_peram2", $date_peram2);
        $requette1->execute();

    }
    if ($type_stock === "Stock jour") {
        $qte = htmlspecialchars(strip_tags($data['qte']));
        $rubrique = htmlspecialchars(strip_tags($data['rubrique']));
        $qteUpdated = htmlspecialchars(strip_tags($data['qteUpdated']));
        $date_ravitaillemrnt = htmlspecialchars(strip_tags($data['date_ravitaillemrnt']));
        $ID = htmlspecialchars(strip_tags($data['ID']));
        // $status_buy = $data['status_buy']; 
        // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

        // on chiffre nos donnees

        $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';


        $qteUpdated = openssl_encrypt($qteUpdated, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $qte = openssl_encrypt($qte, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $date_ravitaillemrnt = openssl_encrypt($date_ravitaillemrnt, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        
        $date_entree_stock_jour = $date_ravitaillemrnt;
        $quantitee_stock_globale = $qteUpdated;
        $quantitee_stock_jour = $qte;
        $quantitee_stock_garde = $vide;
        // les requetes d'insertion

        if ($rubrique === "1") {
            $sql1 = "UPDATE `stock` SET `date_entree_stock_jour`=:date_entree_stock_jour, `quantitee_stock_globale`=:quantitee_stock_globale, `quantitee_stock_jour`=:quantitee_stock_jour WHERE id_stock=:id_stock";
        } else if ($rubrique === "2") {
            $sql1 = "UPDATE `stock` SET `date_entree_stock_jour2`=:date_entree_stock_jour, `quantitee_stock_globale2`=:quantitee_stock_globale, `quantitee_stock_jour2`=:quantitee_stock_jour WHERE id_stock=:id_stock";
        }
        



        $requette1 = $bdd->prepare($sql1);
        $requette1->bindParam(":id_stock", $ID);
        $requette1->bindParam(":date_entree_stock_jour", $date_entree_stock_jour);
        $requette1->bindParam(":quantitee_stock_globale", $quantitee_stock_globale);
        $requette1->bindParam(":quantitee_stock_jour", $quantitee_stock_jour);
        $requette1->execute();

    }
    if ($type_stock === "Stock garde") {
        $qte = htmlspecialchars(strip_tags($data['qte']));
        $rubrique = htmlspecialchars(strip_tags($data['rubrique']));
        $qteUpdated = htmlspecialchars(strip_tags($data['qteUpdated']));
        $date_ravitaillemrnt = htmlspecialchars(strip_tags($data['date_ravitaillemrnt']));
        $ID = htmlspecialchars(strip_tags($data['ID']));
        // $status_buy = $data['status_buy']; 
        // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

        // on chiffre nos donnees

        $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';


        $qteUpdated = openssl_encrypt($qteUpdated, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $qte = openssl_encrypt($qte, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $date_ravitaillemrnt = openssl_encrypt($date_ravitaillemrnt, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        
        $date_entree_stock_garde = $date_ravitaillemrnt;
        $quantitee_stock_globale = $qteUpdated;
        $quantitee_stock_garde = $qte;
        // les requetes d'insertion

        
        if ($rubrique === "1") {
            $sql1 = "UPDATE `stock` SET `date_entree_stock_garde`=:date_entree_stock_garde, `quantitee_stock_globale`=:quantitee_stock_globale, `quantitee_stock_garde`=:quantitee_stock_garde WHERE id_stock=:id_stock";
        } else if ($rubrique === "2") {
            $sql1 = "UPDATE `stock` SET `date_entree_stock_garde2`=:date_entree_stock_garde, `quantitee_stock_globale2`=:quantitee_stock_globale, `quantitee_stock_garde2`=:quantitee_stock_garde WHERE id_stock=:id_stock";
        }

        $requette1 = $bdd->prepare($sql1);
        $requette1->bindParam(":id_stock", $ID);
        $requette1->bindParam(":date_entree_stock_garde", $date_entree_stock_garde);
        $requette1->bindParam(":quantitee_stock_globale", $quantitee_stock_globale);
        $requette1->bindParam(":quantitee_stock_garde", $quantitee_stock_garde);
        $requette1->execute();

    }
    
    
}

else {
    echo json_encode(['erreur' => 'methode de requette invalide']);
}