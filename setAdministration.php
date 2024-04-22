<?php

// phpinInfo
// Headers requis
// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *");

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée
header("Access-Control-Allow-Methods: POST");
// OPTIONS

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

    $idPatient = htmlspecialchars(strip_tags($data['idPatient']));
    $DateExam = htmlspecialchars(strip_tags($data['DateExam']));
    $DateActuele = htmlspecialchars(strip_tags($data['DateActuele']));
    $NatureExam = htmlspecialchars(strip_tags($data['NatureExam']));
    $qte = htmlspecialchars(strip_tags($data['qte']));
    $prix = htmlspecialchars(strip_tags($data['prix']));
    $reglement_client = htmlspecialchars(strip_tags($data['reglement_client']));
    $the_reglement = intval($reglement_client);
    $reste_a_payer = htmlspecialchars(strip_tags($data['reste_a_payer']));
    $contenue = htmlspecialchars(strip_tags($data['contenue']));
    $idSaver = htmlspecialchars(strip_tags($data['idSaver']));
    // $status_buy = $data['status_buy']; 
    // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

    // on chiffre nos donnees

    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

    $motif = "Administration";
    $montant_re = "0";


    $montant_re = openssl_encrypt($montant_re, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $DateExam = openssl_encrypt($DateExam, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    // $DateActuele = openssl_encrypt($DateActuele, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $NatureExam = openssl_encrypt($NatureExam, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $qte = openssl_encrypt($qte, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $prix = openssl_encrypt($prix, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $reglement_client1 = openssl_encrypt($reglement_client, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $reste_a_payer1 = openssl_encrypt($reste_a_payer, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $contenue = openssl_encrypt($contenue, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $motif = openssl_encrypt($motif, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    
    // les requetes d'insertion

    // if(intval($reste_a_payer) !== 0){
        $date_de_paiement = openssl_encrypt("", 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $requette2 = $bdd->query("SELECT * FROM `dette` WHERE `code_patient_dette` = $idPatient LIMIT 1");
        $x = count($requette2->fetchAll());
        $reste_a_payer =  intval($reste_a_payer);
        $reglement_client = intval($reglement_client);

        if ($x === 0 && intval($reste_a_payer) !== 0) { // s'il n'a pas deja de dette
            $sql1 = "INSERT INTO `administration`(`code_personnel_admin`, `code_patient_admin`, `true_date`, `nature_du_document`, `prix`, `quantitee`, `contenue_du_document`)
                VALUES (:code_personnel_admin, :code_patient_admin, $DateActuele, :nature_du_document, :prix, :quantitee, :contenue);

                INSERT INTO `effectuer_op`(`code_personnel`, `id_caisse`, `motif`, `montant_aj`, `montant_re`) 
                VALUES (:code_personnel_admin, 1, :motif, :montant_aj, :montant_re);

                UPDATE `caisse` SET `montant_total`= montant_total + $the_reglement WHERE id_caisse = 1;

                INSERT INTO `dette`(`code_patient_dette`, `code_personnel_dette`, `montant_de_dette`, `montant_soldee`) 
                    VALUES ($idPatient, $idSaver, $reste_a_payer, $reglement_client);
                -- UPDATE `caisse` SET `montant_total`= montant_total - :montant_re WHERE id_caisse = 1;
            ";

            $requette1 = $bdd->prepare($sql1);
            $requette1->bindParam(":code_patient_admin", $idPatient);
            $requette1->bindParam(":code_personnel_admin", $idSaver);
            $requette1->bindParam(":nature_du_document", $NatureExam);
            $requette1->bindParam(":quantitee", $qte);
            $requette1->bindParam(":prix", $prix);
            $requette1->bindParam(":contenue", $contenue);
            // $requette1->bindParam(":Nom_de_loperateur", $nom_de_loperateur);
            $requette1->bindParam(":motif", $motif);
            // $requette1->bindParam(":montant_ajoutee", $the_reglement);
            $requette1->bindParam(":montant_aj", $reglement_client1);
            $requette1->bindParam(":montant_re", $montant_re);
            // $requette1->bindParam(":code_patient_dette", $idPatient);
            // $requette1->bindParam(":code_personnel_dette", $idSaver);
            // $requette1->bindParam(":montant_de_dette", $reste_a_payer);
            // $requette1->bindParam(":montant_soldee", $reglement_client);
            $requette1->execute();

        }
    // }
    else if ($x !== 0 && intval($reste_a_payer) !== 0) { // il a deja une dette
            $sql1 = "INSERT INTO `administration`(`code_personnel_admin`, `code_patient_admin`, `true_date`, `nature_du_document`, `prix`, `quantitee`, `contenue_du_document`)
                VALUES (:code_personnel_admin, :code_patient_admin, $DateActuele, :nature_du_document, :prix, :quantitee, :contenue);

                INSERT INTO `effectuer_op`(`code_personnel`, `id_caisse`, `motif`, `montant_aj`, `montant_re`) 
                VALUES (:code_personnel_admin, 1, :motif, :montant_aj, :montant_re);

                UPDATE `caisse` SET `montant_total`= montant_total + $the_reglement WHERE id_caisse = 1;

                -- INSERT INTO `dette`(`code_patient_dette`, `code_personnel_dette`, `montant_de_dette`, `montant_soldee`) 
                --     VALUES ($idPatient, $idSaver, $reste_a_payer, $reglement_client);
                UPDATE `dette` SET `montant_de_dette`=montant_de_dette + $reste_a_payer,`montant_soldee`=montant_soldee + $the_reglement WHERE code_patient_dette = $idPatient;
                -- UPDATE `caisse` SET `montant_total`= montant_total - :montant_re WHERE id_caisse = 1;
            ";

            $requette1 = $bdd->prepare($sql1);
            $requette1->bindParam(":code_patient_admin", $idPatient);
            $requette1->bindParam(":code_personnel_admin", $idSaver);
            $requette1->bindParam(":nature_du_document", $NatureExam);
            $requette1->bindParam(":quantitee", $qte);
            $requette1->bindParam(":prix", $prix);
            $requette1->bindParam(":contenue", $contenue);
            // $requette1->bindParam(":Nom_de_loperateur", $nom_de_loperateur);
            $requette1->bindParam(":motif", $motif);
            // $requette1->bindParam(":montant_ajoutee", $the_reglement);
            $requette1->bindParam(":montant_aj", $reglement_client1);
            $requette1->bindParam(":montant_re", $montant_re);
            // $requette1->bindParam(":code_patient_dette", $idPatient);
            // $requette1->bindParam(":code_personnel_dette", $idSaver);
            $requette1->execute();
    }
    else { // il a deja une dette
            $sql1 = "INSERT INTO `administration`(`code_personnel_admin`, `code_patient_admin`, `true_date`, `nature_du_document`, `prix`, `quantitee`, `contenue_du_document`)
                VALUES (:code_personnel_admin, :code_patient_admin, $DateActuele, :nature_du_document, :prix, :quantitee, :contenue);

                INSERT INTO `effectuer_op`(`code_personnel`, `id_caisse`, `motif`, `montant_aj`, `montant_re`) 
                VALUES (:code_personnel_admin, 1, :motif, :montant_aj, :montant_re);

                UPDATE `caisse` SET `montant_total`= montant_total + $the_reglement WHERE id_caisse = 1;

                -- UPDATE `dette` SET `montant_de_dette`=montant_de_dette + $reste_a_payer,`montant_soldee`=montant_soldee + $the_reglement WHERE code_patient_dette = $idPatient;
                -- UPDATE `caisse` SET `montant_total`= montant_total - :montant_re WHERE id_caisse = 1;
            ";

            $requette1 = $bdd->prepare($sql1);
            $requette1->bindParam(":code_patient_admin", $idPatient);
            $requette1->bindParam(":code_personnel_admin", $idSaver);
            $requette1->bindParam(":nature_du_document", $NatureExam);
            $requette1->bindParam(":quantitee", $qte);
            $requette1->bindParam(":prix", $prix);
            $requette1->bindParam(":contenue", $contenue);
            // $requette1->bindParam(":Nom_de_loperateur", $nom_de_loperateur);
            $requette1->bindParam(":motif", $motif);
            // $requette1->bindParam(":montant_ajoutee", $the_reglement);
            $requette1->bindParam(":montant_aj", $reglement_client1);
            $requette1->bindParam(":montant_re", $montant_re);
            $requette1->execute();
    }

    // $sql1 = "INSERT INTO `laboratoire`
    //     (`code_patient_admin`, `code_personnel_admin`, `nature_du_document`, `quantitee`, `prix`, `expression_des_resultats`, `conclusion`) 
    //     VALUES (:code_patient_admin, :code_personnel_admin, :nature_du_document, :quantitee, :prix, :expression_des_resultats, :conclusion);

    //     INSERT INTO `effectuer_op`(`code_personnel`, `id_caisse`, `motif`, `montant_aj`, `montant_re`) 
    //     VALUES (:code_personnel_admin, 1, :motif, :montant_aj, :montant_re);

    //     UPDATE `caisse` SET `montant_total`= montant_total + $the_reglement WHERE id_caisse = 1;

    //     INSERT INTO `dette`(`code_patient_dette`, `code_personnel_dette`,`date_de_dette`, `montant_de_dette`, `montant_soldee`) 
    //         VALUES ($idPatient, $idSaver, 'fewdwef e', $reste_a_payer, $reglement_client);
    //     -- UPDATE `caisse` SET `montant_total`= montant_total - :montant_re WHERE id_caisse = 1;
    // ";

    // $requette1 = $bdd->prepare($sql1);
    // $requette1->bindParam(":code_patient_admin", $idPatient);
    // $requette1->bindParam(":code_personnel_admin", $idSaver);
    // $requette1->bindParam(":nature_du_document", $NatureExam);
    // $requette1->bindParam(":quantitee", $qte);
    // $requette1->bindParam(":prix", $prix);
    // $requette1->bindParam(":expression_des_resultats", $expression_des_resultats);
    // $requette1->bindParam(":conclusion", $conclusion);
    // // $requette1->bindParam(":Nom_de_loperateur", $nom_de_loperateur);
    // $requette1->bindParam(":motif", $motif);
    // // $requette1->bindParam(":montant_ajoutee", $the_reglement);
    // $requette1->bindParam(":montant_aj", $reglement_client1);
    // $requette1->bindParam(":montant_re", $montant_re);
    // $requette1->execute();

}

else {
    echo json_encode(['erreur' => 'methode de requette invalide']);
}