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

    $idPatient = htmlspecialchars(strip_tags($data['idPatient']));
    $ID = htmlspecialchars(strip_tags($data['ID']));
    $dateExamen = htmlspecialchars(strip_tags($data['dateExamen']));
    $true_date = htmlspecialchars(strip_tags($data['true_date']));
    $indicateur = htmlspecialchars(strip_tags($data['indicateur']));
    $voie_exam = htmlspecialchars(strip_tags($data['voie_exam']));
    $conditionRealisation = htmlspecialchars(strip_tags($data['conditionRealisation']));
    $nombreFoetus2 = htmlspecialchars(strip_tags($data['nombreFoetus2']));
    $type_grossese = htmlspecialchars(strip_tags($data['type_grossese']));
    $membrane = htmlspecialchars(strip_tags($data['membrane']));
    $activite_cardiaque3 = htmlspecialchars(strip_tags($data['activite_cardiaque3']));
    $RFC = htmlspecialchars(strip_tags($data['RFC']));
    $MAF = htmlspecialchars(strip_tags($data['MAF']));
    $AC = htmlspecialchars(strip_tags($data['AC']));
    $DAT = htmlspecialchars(strip_tags($data['DAT']));
    $LCC = htmlspecialchars(strip_tags($data['LCC']));
    $BIP = htmlspecialchars(strip_tags($data['BIP']));
    $clarte_nucale = htmlspecialchars(strip_tags($data['clarte_nucale']));
    $HC = htmlspecialchars(strip_tags($data['HC']));
    $femur = htmlspecialchars(strip_tags($data['femur']));
    $terme = htmlspecialchars(strip_tags($data['terme']));
    $Morphologie_du_pole_Cephalique = htmlspecialchars(strip_tags($data['Morphologie_du_pole_Cephalique']));
    $abdomen = htmlspecialchars(strip_tags($data['abdomen']));
    $aspect_des_membres = htmlspecialchars(strip_tags($data['aspect_des_membres']));
    $liquide_amniotique1 = htmlspecialchars(strip_tags($data['liquide_amniotique1']));
    $localisation_trophoblaste = htmlspecialchars(strip_tags($data['localisation_trophoblaste']));
    $aspect_du_trophoblaste2 = htmlspecialchars(strip_tags($data['aspect_du_trophoblaste2']));
    $deroulement = htmlspecialchars(strip_tags($data['deroulement']));
    $conclusion4 = htmlspecialchars(strip_tags($data['conclusion4']));
    
    
    $idSaver = htmlspecialchars(strip_tags($data['idSaver']));
    // $status_buy = $data['status_buy']; 
    // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

    // on chiffre nos donnees

    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

    $ID = openssl_encrypt($ID, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $dateExamen = openssl_encrypt($dateExamen, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $indicateur = openssl_encrypt($indicateur, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $voie_exam = openssl_encrypt($voie_exam, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $conditionRealisation = openssl_encrypt($conditionRealisation, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $nombreFoetus2 = openssl_encrypt($nombreFoetus2, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $type_grossese = openssl_encrypt($type_grossese, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $membrane = openssl_encrypt($membrane, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $activite_cardiaque3 = openssl_encrypt($activite_cardiaque3, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $RFC = openssl_encrypt($RFC, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $MAF = openssl_encrypt($MAF, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $AC = openssl_encrypt($AC, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $DAT = openssl_encrypt($DAT, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $LCC = openssl_encrypt($LCC, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $BIP = openssl_encrypt($BIP, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $clarte_nucale = openssl_encrypt($clarte_nucale, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $HC = openssl_encrypt($HC, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $femur = openssl_encrypt($femur, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $terme = openssl_encrypt($terme, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Morphologie_du_pole_Cephalique = openssl_encrypt($Morphologie_du_pole_Cephalique, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $abdomen = openssl_encrypt($abdomen, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $aspect_des_membres = openssl_encrypt($aspect_des_membres, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $liquide_amniotique1 = openssl_encrypt($liquide_amniotique1, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $localisation_trophoblaste = openssl_encrypt($localisation_trophoblaste, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $aspect_du_trophoblaste2 = openssl_encrypt($aspect_du_trophoblaste2, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $deroulement = openssl_encrypt($deroulement, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $conclusion4 = openssl_encrypt($conclusion4, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    
    // les requetes d'insertion

    $sql1 = "INSERT INTO `echo2et`
    (
        `code_patient_echo2eT`, 
        `code_personnel_echo2eT`, 
        `ID`, 
        `date_exam`, 
        `true_date`, 
        `indicateur`, 
        `voie_exam`, 
        `condition_realisation`, 
        `nombre_foetus`, 
        `type_grossece`, 
        `membrane`, 
        `activitee_cardiaque`, 
        `RFC`, 
        `MAF`, 
        `AC`, 
        `DAT`, 
        `LCC`, 
        `BIP`, 
        `clarte_nucale`, 
        `HC`, 
        `femur`, 
        `terme`, 
        `morphologie_pole_cephalique`, 
        `abdomen`, 
        `aspect_des_membres`, 
        `liquide_amniotique`, 
        `localisation_du_trophoblaste`, 
        `aspect_du_trophoblaste`,
        `deroulement`, 
        `conclusion`
        )

        VALUE

        (
        :code_patient_echo2eT, 
        :code_personnel_echo2eT, 
        :ID, 
        :date_exam, 
        $true_date, 
        :indicateur, 
        :voie_exam, 
        :condition_realisation, 
        :nombre_foetus, 
        :type_grossece, 
        :membrane, 
        :activitee_cardiaque, 
        :RFC, 
        :MAF, 
        :AC, 
        :DAT, 
        :LCC, 
        :BIP, 
        :clarte_nucale, 
        :HC, 
        :femur, 
        :terme, 
        :morphologie_pole_cephalique, 
        :abdomen, 
        :aspect_des_membres, 
        :liquide_amniotique, 
        :localisation_du_trophoblaste, 
        :aspect_du_trophoblaste,
        :deroulement, 
        :conclusion
        )
    ";

    $requette1 = $bdd->prepare($sql1);
    $requette1->bindParam(":code_patient_echo2eT", $idPatient);
    $requette1->bindParam(":code_personnel_echo2eT", $idSaver);
    $requette1->bindParam(":ID", $ID);
    $requette1->bindParam(":date_exam", $dateExamen);
    $requette1->bindParam(":indicateur", $indicateur);
    $requette1->bindParam(":voie_exam", $voie_exam);
    $requette1->bindParam(":condition_realisation", $conditionRealisation);
    $requette1->bindParam(":nombre_foetus", $nombreFoetus2);
    $requette1->bindParam(":type_grossece", $type_grossese);
    $requette1->bindParam(":membrane", $membrane);
    $requette1->bindParam(":activitee_cardiaque", $activite_cardiaque3);
    $requette1->bindParam(":RFC", $RFC);
    $requette1->bindParam(":MAF", $MAF);
    $requette1->bindParam(":AC", $AC);
    $requette1->bindParam(":DAT", $DAT);
    $requette1->bindParam(":LCC", $LCC);
    $requette1->bindParam(":BIP", $BIP);
    $requette1->bindParam(":clarte_nucale", $clarte_nucale);
    $requette1->bindParam(":HC", $HC);
    $requette1->bindParam(":femur", $femur);
    $requette1->bindParam(":terme", $terme);
    $requette1->bindParam(":morphologie_pole_cephalique", $Morphologie_du_pole_Cephalique);
    $requette1->bindParam(":abdomen", $abdomen);
    $requette1->bindParam(":aspect_des_membres", $aspect_des_membres);
    $requette1->bindParam(":liquide_amniotique", $liquide_amniotique1);
    $requette1->bindParam(":localisation_du_trophoblaste", $localisation_trophoblaste);
    $requette1->bindParam(":aspect_du_trophoblaste", $aspect_du_trophoblaste2);
    $requette1->bindParam(":deroulement", $deroulement);
    $requette1->bindParam(":conclusion", $conclusion4);
    $requette1->execute();
    
}

else {
    echo json_encode(['erreur' => 'methode de requette invalide']);
}