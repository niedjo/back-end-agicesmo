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
    
    include("ConstantesBd.php");

    $constantes = new Constant();

    $server = $constantes->server;
    $dbname = $constantes->dbname;
    $username = $constantes->username;
    $password = $constantes->password;

    // connexion a la base de donnne
    $bdd = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

    $cesmo = htmlspecialchars(strip_tags($data['cesmo']));

    switch ($cesmo) {

        // on va te gerer apres 

        case "Laboratoire":
            $newDateExam = htmlspecialchars(strip_tags($data['newDateExam']));
            $DateExam = htmlspecialchars(strip_tags($data['DateExam']));
            $expression_des_resultats = htmlspecialchars(strip_tags($data['expression_des_resultats']));
            $responsable = htmlspecialchars(strip_tags($data['responsable']));
        
            $expression_des_resultats = openssl_encrypt($expression_des_resultats, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            // $responsable = openssl_encrypt($responsable, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
            // les requetes d'insertion
        
        
            $sql1 = "UPDATE `laboratoire` SET `date_exam`= :newDate_exam, `code_personnel_lab` = :responsable, `expression_des_resultats`=:expression_des_resultats, `status_don`=1 WHERE `true_date` = :date_exam";
        
            $requette1 = $bdd->prepare($sql1);
            $requette1->bindParam(":newDate_exam", $newDateExam);
            $requette1->bindParam(":expression_des_resultats", $expression_des_resultats);
            $requette1->bindParam(":responsable", $responsable);
            $requette1->bindParam(":date_exam", $DateExam);
            $requette1->execute();
            break;

        case "Consultation":
            
            $newDateExam = htmlspecialchars(strip_tags($data['newDateExam']));
            $DateExam = htmlspecialchars(strip_tags($data['DateExam']));
            $expression_des_resultats = htmlspecialchars(strip_tags($data['expression_des_resultats']));
            $responsable = htmlspecialchars(strip_tags($data['responsable']));
            $responsable = intval($responsable);


            $expression_des_resultats = openssl_encrypt($expression_des_resultats, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
            // les requetes d'insertion
        
        
            $sql1 = "UPDATE `consultation` SET `date_consultation`= :newDate_exam, `resultat`= :expression_des_resultats, `code_personnel_cons`= $responsable, `status_don`=1 WHERE `true_date` = :date_exam";
        
            $requette1 = $bdd->prepare($sql1);
            $requette1->bindParam(":newDate_exam", $newDateExam);
            $requette1->bindParam(":expression_des_resultats", $expression_des_resultats);
            $requette1->bindParam(":date_exam", $DateExam);
            $requette1->execute();

            break;

        case "Soin":

            $newDateExam = htmlspecialchars(strip_tags($data['newDateExam']));
            $DateExam = htmlspecialchars(strip_tags($data['DateExam']));
            $responsable = htmlspecialchars(strip_tags($data['responsable']));
            $responsable = intval($responsable);

            
            // les requetes d'insertion
        
        
            $sql1 = "UPDATE `soin` SET `date_exam`= :newDate_exam, `code_personnel_soin`= $responsable, `status_don`=1 WHERE `true_date` = :date_exam";
        
            $requette1 = $bdd->prepare($sql1);
            $requette1->bindParam(":newDate_exam", $newDateExam);
            $requette1->bindParam(":date_exam", $DateExam);
            $requette1->execute();

            break;

        case "Echographie t1t2":

            $newDateExam = htmlspecialchars(strip_tags($data['newDateExam']));
            $DateExam = htmlspecialchars(strip_tags($data['DateExam']));
            $responsable = htmlspecialchars(strip_tags($data['responsable']));
            $responsable = intval($responsable);
            
            // les requetes d'insertion

        
        
            $sql1 = "UPDATE `imagerie` SET `date_exam`= :newDate_exam, `code_personnel_imagerie`= $responsable, `status_don`=1 WHERE `true_date` = :date_exam";
        
            $requette1 = $bdd->prepare($sql1);
            $requette1->bindParam(":newDate_exam", $newDateExam);
            $requette1->bindParam(":date_exam", $DateExam);
            $requette1->execute();

            break;

        case "Screening medicale":

            $newDateExam = htmlspecialchars(strip_tags($data['newDateExam']));
            $DateExam = htmlspecialchars(strip_tags($data['DateExam']));
            $resultat = htmlspecialchars(strip_tags($data['resultat']));
            $responsable = htmlspecialchars(strip_tags($data['responsable']));
            $responsable = intval($responsable);
            
            // on chiffre tous ca

            $resultat = openssl_encrypt($resultat, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

            // les requetes d'insertion
        
            $sql1 = "UPDATE `screening_medicale_conta` SET `date_exam`= :newDate_exam, `code_personnel_scr`= :code_personnel_scr, `resultat`= :resultat, `status_don`= 1 WHERE `true_date` = :date_exam";
        
            $requette1 = $bdd->prepare($sql1);
            $requette1->bindParam(":newDate_exam", $newDateExam);
            $requette1->bindParam(":date_exam", $DateExam);
            $requette1->bindParam(":code_personnel_scr", $responsable);
            $requette1->bindParam(":resultat", $resultat);
            $requette1->execute();

            break;

        case "Administration":

            $newDateExam = htmlspecialchars(strip_tags($data['newDateExam']));
            $DateExam = htmlspecialchars(strip_tags($data['DateExam']));
            $contenue = htmlspecialchars(strip_tags($data['contenue']));
            $responsable = htmlspecialchars(strip_tags($data['responsable']));
            $responsable = intval($responsable);
            
            // on chiffre tous ca

            $contenue = openssl_encrypt($contenue, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

            // les requetes d'insertion
        
            $sql1 = "UPDATE `administration` SET `date_administration`= :newDate_exam, `code_personnel_admin`= :code_personnel_admin, `contenue_du_document`= :resultat, `status_don`= 1 WHERE `true_date` = :date_exam";
        
            $requette1 = $bdd->prepare($sql1);
            $requette1->bindParam(":newDate_exam", $newDateExam);
            $requette1->bindParam(":date_exam", $DateExam);
            $requette1->bindParam(":code_personnel_admin", $responsable);
            $requette1->bindParam(":resultat", $contenue);
            $requette1->execute();

            break;

        case "Vaccination":

            $newDateExam = htmlspecialchars(strip_tags($data['newDateExam']));
            $DateExam = htmlspecialchars(strip_tags($data['DateExam']));
            $observation = htmlspecialchars(strip_tags($data['observation']));
            $responsable = htmlspecialchars(strip_tags($data['responsable']));
            $responsable = intval($responsable);
            
            // on chiffre tous ca

            $observation = openssl_encrypt($observation, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

            // les requetes d'insertion
        
            $sql1 = "UPDATE `vaccination` SET `date_exam`= :newDate_exam, `code_personnel_vacc`= :code_personnel_vacc, `observation`= :resultat, `status_don`= 1 WHERE `true_date` = :date_exam";
        
            $requette1 = $bdd->prepare($sql1);
            $requette1->bindParam(":newDate_exam", $newDateExam);
            $requette1->bindParam(":date_exam", $DateExam);
            $requette1->bindParam(":code_personnel_vacc", $responsable);
            $requette1->bindParam(":resultat", $observation);
            $requette1->execute();

            break;
        
        default:
            # code...
            break;
    }

}

else {
    echo json_encode(['erreur' => 'methode de requette invalide']);
}