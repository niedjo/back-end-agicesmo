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
    $DateExam = htmlspecialchars(strip_tags($data['DateExam']));
    $True_date = htmlspecialchars(strip_tags($data['True_date']));
    // $True_date = strval($True_date);
    $age = htmlspecialchars(strip_tags($data['age']));
    $telephone_personne_a_contacter = htmlspecialchars(strip_tags($data['telephone_personne_a_contacter']));
    $antecedents_personnels = htmlspecialchars(strip_tags($data['antecedents_personnels']));
    $problemes_de_santee_actuels = htmlspecialchars(strip_tags($data['problemes_de_santee_actuels']));
    $Tousse = htmlspecialchars(strip_tags($data['Tousse']));
    $Transpiration_nocturne = htmlspecialchars(strip_tags($data['Transpiration_nocturne']));
    $Fievre_persistante = htmlspecialchars(strip_tags($data['Fievre_persistante']));
    $Fatigue_ou_perte_appeti = htmlspecialchars(strip_tags($data['Fatigue_ou_perte_appeti']));
    $Amaigrissement = htmlspecialchars(strip_tags($data['Amaigrissement']));
    $Contact_avec_un_Tuberculeux = htmlspecialchars(strip_tags($data['Contact_avec_un_Tuberculeux']));
    $OMI = htmlspecialchars(strip_tags($data['OMI']));
    $est_actuelement_sous_traitement_de = htmlspecialchars(strip_tags($data['est_actuelement_sous_traitement_de']));
    $DDR = htmlspecialchars(strip_tags($data['DDR']));
    $Gravida_para = htmlspecialchars(strip_tags($data['Gravida_para']));
    $Autre_histoires_medicales = htmlspecialchars(strip_tags($data['Autre_histoires_medicales']));
    $alergies = htmlspecialchars(strip_tags($data['alergies']));
    $toxico = htmlspecialchars(strip_tags($data['toxico']));
    $TensionArteriel = htmlspecialchars(strip_tags($data['TensionArteriel']));
    $Poids = htmlspecialchars(strip_tags($data['Poids']));
    $taille = htmlspecialchars(strip_tags($data['taille']));
    $Indice_masse_corporelle = htmlspecialchars(strip_tags($data['Indice_masse_corporelle']));
    $nbr_enfant_accompagnant = htmlspecialchars(strip_tags($data['nbr_enfant_accompagnant']));
    $bilan_lesionnel = htmlspecialchars(strip_tags($data['bilan_lesionnel']));
    $resultatExamBiologique = htmlspecialchars(strip_tags($data['resultatExamBiologique']));
    $Examen_entree_anormales = htmlspecialchars(strip_tags($data['Examen_entree_anormales']));
    $Blessures = htmlspecialchars(strip_tags($data['Blessures']));
    $Abus_de_substances = htmlspecialchars(strip_tags($data['Abus_de_substances']));
    $Gale1 = htmlspecialchars(strip_tags($data['Gale1']));
    $Diarhee = htmlspecialchars(strip_tags($data['Diarhee']));
    $Problemes_dentaires = htmlspecialchars(strip_tags($data['Problemes_dentaires']));
    $Symptomes_de_Tuberculeux = htmlspecialchars(strip_tags($data['Symptomes_de_Tuberculeux']));
    $IST1 = htmlspecialchars(strip_tags($data['IST1']));
    $Statut_Nutritionnel_Anormale = htmlspecialchars(strip_tags($data['Statut_Nutritionnel_Anormale']));
    $descisions_ou_actions = htmlspecialchars(strip_tags($data['descisions_ou_actions']));
    $conclusion = htmlspecialchars(strip_tags($data['conclusion']));
    $idSaver = htmlspecialchars(strip_tags($data['idSaver']));
    // $status_buy = $data['status_buy']; 
    // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

    // on chiffre nos donnees

    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

    $DateExam = openssl_encrypt($DateExam, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $age = openssl_encrypt($age, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $telephone_personne_a_contacter = openssl_encrypt($telephone_personne_a_contacter, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $antecedents_personnels = openssl_encrypt($antecedents_personnels, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $problemes_de_santee_actuels = openssl_encrypt($problemes_de_santee_actuels, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Tousse = openssl_encrypt($Tousse, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Transpiration_nocturne = openssl_encrypt($Transpiration_nocturne, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Fievre_persistante = openssl_encrypt($Fievre_persistante, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Fatigue_ou_perte_appeti = openssl_encrypt($Fatigue_ou_perte_appeti, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Amaigrissement = openssl_encrypt($Amaigrissement, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Contact_avec_un_Tuberculeux = openssl_encrypt($Contact_avec_un_Tuberculeux, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $OMI = openssl_encrypt($OMI, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $est_actuelement_sous_traitement_de = openssl_encrypt($est_actuelement_sous_traitement_de, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $DDR = openssl_encrypt($DDR, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Gravida_para = openssl_encrypt($Gravida_para, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Autre_histoires_medicales = openssl_encrypt($Autre_histoires_medicales, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $alergies = openssl_encrypt($alergies, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $toxico = openssl_encrypt($toxico, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $TensionArteriel = openssl_encrypt($TensionArteriel, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Poids = openssl_encrypt($Poids, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $taille = openssl_encrypt($taille, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Indice_masse_corporelle = openssl_encrypt($Indice_masse_corporelle, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $nbr_enfant_accompagnant = openssl_encrypt($nbr_enfant_accompagnant, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $bilan_lesionnel = openssl_encrypt($bilan_lesionnel, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $resultatExamBiologique = openssl_encrypt($resultatExamBiologique, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Examen_entree_anormales = openssl_encrypt($Examen_entree_anormales, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Blessures = openssl_encrypt($Blessures, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Abus_de_substances = openssl_encrypt($Abus_de_substances, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Gale1 = openssl_encrypt($Gale1, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Diarhee = openssl_encrypt($Diarhee, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Problemes_dentaires = openssl_encrypt($Problemes_dentaires, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Symptomes_de_Tuberculeux = openssl_encrypt($Symptomes_de_Tuberculeux, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $IST1 = openssl_encrypt($IST1, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $Statut_Nutritionnel_Anormale = openssl_encrypt($Statut_Nutritionnel_Anormale, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $descisions_ou_actions = openssl_encrypt($descisions_ou_actions, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    $conclusion = openssl_encrypt($conclusion, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    
    // les requetes d'insertion

    $sql1 = "INSERT INTO `screening_medicale`
    (
        `code_patient_sceen`, 
        `code_personnel_screec`, 
        `date_exam`, 
        `true_date`, 
        `age`, 
        `telephone_personne_a_contacter`, 
        `resultat_examene_biologique`,
        `antecedants_personel`, 
        `problemes_de_santes_actuels`, 
        `tousse_depuis_plus_de_deux_semaines`, 
        `transpiration_nocturne`, 
        `fievre_persistante`, 
        `fatigue_ou_perte_dapetit`, 
        `amaigrissement`, 
        `contact_avec_un_tuberculeux`, 
        `oederme_de_membre_inferieur`, 
        `est_actuelement_sous_traitement_de`, 
        `date_de_derniere_regle`, 
        `gravida_para`, 
        `autre_histoire_medicale`, 
        `element_dalergie`, 
        `profil_toxicologique`, 
        `tension_arteriele`, 
        `poids`, 
        `taille`, 
        `indice_de_masse_corporelle`, 
        `nombre_denfant_accompagnant`, 
        `bilan_lesionnel`, 
        `examen_dentree_anormale`, 
        `blessure`, 
        `abus_de_substance`, 
        `gale`, 
        `diarhee`, 
        `probleme_dentaire`, 
        `symptomes_de_tuberculoses`, 
        `IST`, 
        `statut_nutritionnel_anormale`, 
        `descision_ou_action`, 
        `autre_observations`
    )
    
    VALUES

    (
        :code_patient_sceen, 
        :code_personnel_screec, 
        :date_exam, 
        $True_date, 
        :age, 
        :telephone_personne_a_contacter, 
        :resultat_examene_biologique,
        :antecedants_personel, 
        :problemes_de_santes_actuels, 
        :tousse_depuis_plus_de_deux_semaines, 
        :transpiration_nocturne, 
        :fievre_persistante, 
        :fatigue_ou_perte_dapetit, 
        :amaigrissement, 
        :contact_avec_un_tuberculeux, 
        :oederme_de_membre_inferieur, 
        :est_actuelement_sous_traitement_de, 
        :date_de_derniere_regle, 
        :gravida_para, 
        :autre_histoire_medicale, 
        :element_dalergie, 
        :profil_toxicologique, 
        :tension_arteriele, 
        :poids, 
        :taille, 
        :indice_de_masse_corporelle, 
        :nombre_denfant_accompagnant, 
        :bilan_lesionnel, 
        :examen_dentree_anormale, 
        :blessure, 
        :abus_de_substance, 
        :gale, 
        :diarhee, 
        :probleme_dentaire, 
        :symptomes_de_tuberculoses, 
        :IST, 
        :statut_nutritionnel_anormale, 
        :descision_ou_action, 
        :autre_observations
        )
    ";

    $requette1 = $bdd->prepare($sql1);
    $requette1->bindParam(":code_patient_sceen", $idSaver);
    $requette1->bindParam(":code_personnel_screec", $idPatient);
    $requette1->bindParam(":date_exam", $DateExam);
    $requette1->bindParam(":age", $age);
    $requette1->bindParam(":telephone_personne_a_contacter", $telephone_personne_a_contacter);
    $requette1->bindParam(":resultat_examene_biologique", $resultatExamBiologique);
    $requette1->bindParam(":antecedants_personel", $antecedents_personnels);
    $requette1->bindParam(":problemes_de_santes_actuels", $problemes_de_santee_actuels);
    $requette1->bindParam(":tousse_depuis_plus_de_deux_semaines", $Tousse);
    $requette1->bindParam(":transpiration_nocturne", $Transpiration_nocturne);
    $requette1->bindParam(":fievre_persistante", $Fievre_persistante);
    $requette1->bindParam(":fatigue_ou_perte_dapetit", $Fatigue_ou_perte_appeti);
    $requette1->bindParam(":amaigrissement", $Amaigrissement);
    $requette1->bindParam(":contact_avec_un_tuberculeux", $Contact_avec_un_Tuberculeux);
    $requette1->bindParam(":oederme_de_membre_inferieur", $OMI);
    $requette1->bindParam(":est_actuelement_sous_traitement_de", $est_actuelement_sous_traitement_de);
    $requette1->bindParam(":date_de_derniere_regle", $DDR);
    $requette1->bindParam(":gravida_para", $Gravida_para);
    $requette1->bindParam(":autre_histoire_medicale", $Autre_histoires_medicales);
    $requette1->bindParam(":element_dalergie", $alergies);
    $requette1->bindParam(":profil_toxicologique", $toxico);
    $requette1->bindParam(":tension_arteriele", $TensionArteriel);
    $requette1->bindParam(":poids", $Poids);
    $requette1->bindParam(":taille", $taille);
    $requette1->bindParam(":indice_de_masse_corporelle", $Indice_masse_corporelle);
    $requette1->bindParam(":nombre_denfant_accompagnant", $nbr_enfant_accompagnant);
    $requette1->bindParam(":bilan_lesionnel", $bilan_lesionnel);
    $requette1->bindParam(":examen_dentree_anormale", $Examen_entree_anormales);
    $requette1->bindParam(":blessure", $Blessures);
    $requette1->bindParam(":abus_de_substance", $Abus_de_substances);
    $requette1->bindParam(":gale", $Gale1);
    $requette1->bindParam(":diarhee", $Diarhee);
    $requette1->bindParam(":probleme_dentaire", $Problemes_dentaires);
    $requette1->bindParam(":symptomes_de_tuberculoses", $Symptomes_de_Tuberculeux);
    $requette1->bindParam(":IST", $IST1);
    $requette1->bindParam(":statut_nutritionnel_anormale", $Statut_Nutritionnel_Anormale);
    $requette1->bindParam(":descision_ou_action", $descisions_ou_actions);
    $requette1->bindParam(":autre_observations", $conclusion);
    $requette1->execute();
    
}

else {
    echo json_encode(['erreur' => 'methode de requette invalide']);
}