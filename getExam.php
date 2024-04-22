<?php

// phpinInfo
// Headers requis
// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *");

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée
header("Access-Control-Allow-Methods: GET");

// Durée de vie de la requête
header("Access-Control-Max-GRA_D: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // On inclut les fichiers de configuration et d'accès aux données
    
    include("ConstantesBd.php");

    $constantes = new Constant();

    $server = $constantes->server;
    $dbname = $constantes->dbname;
    $username = $constantes->username;
    $password = $constantes->password;

    // connexion a la base de donnne
    $bdd = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    $bdd->exec("set names utf8");

    $requette = $bdd->query("SELECT * FROM `nfs` WHERE 1;");
    
    $examTable = [];
    $examTable['nfs'] = [];


    while ($reponse = $requette->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "WCB" => $WCB,
            "LYM_D" => $LYM_D,
            "MID_D" => $MID_D,
            "GRA_D" => $GRA_D,
            "LYM_P" => $LYM_P,
            "MID_P" => $MID_P,
            "GRA_P" => $GRA_P,
            "RCC" => $RCC,
            "HGB" => $HGB,
            "HCT" => $HCT,
            "MCV" => $MCV,
            "MCH" => $MCH,
            "MCHC" => $MCHC,
            "RDW_SD" => $RDW_SD,
            "RDW_CU" => $RDW_CU,
            "PLT" => $PLT,
            "MPV" => $MPV,
            "PWD" => $PWD,
            "PCT" => $PCT,
            "P_LCR" => $P_LCR
        ];
        
        $examTable['nfs'][] = $pat;
    }
    // var_dump($examTable['nfs'][0]['true_date']);
    // echo count($examTable['nfs']);
    // On envoie le code réponse 200 OK
    
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

    for ($i=0; $i < count($examTable['nfs']); $i++) { 
        $examTable['nfs'][$i]['WCB'] = openssl_decrypt($examTable['nfs'][$i]['WCB'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['LYM_D'] = openssl_decrypt($examTable['nfs'][$i]['LYM_D'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['MID_D'] = openssl_decrypt($examTable['nfs'][$i]['MID_D'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['GRA_D'] = openssl_decrypt($examTable['nfs'][$i]['GRA_D'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['LYM_P'] = openssl_decrypt($examTable['nfs'][$i]['LYM_P'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['MID_P'] = openssl_decrypt($examTable['nfs'][$i]['MID_P'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['GRA_P'] = openssl_decrypt($examTable['nfs'][$i]['GRA_P'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['RCC'] = openssl_decrypt($examTable['nfs'][$i]['RCC'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['HGB'] = openssl_decrypt($examTable['nfs'][$i]['HGB'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['HCT'] = openssl_decrypt($examTable['nfs'][$i]['HCT'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['MCV'] = openssl_decrypt($examTable['nfs'][$i]['MCV'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['MCH'] = openssl_decrypt($examTable['nfs'][$i]['MCH'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['MCHC'] = openssl_decrypt($examTable['nfs'][$i]['MCHC'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['RDW_SD'] = openssl_decrypt($examTable['nfs'][$i]['RDW_SD'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['RDW_CU'] = openssl_decrypt($examTable['nfs'][$i]['RDW_CU'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['PLT'] = openssl_decrypt($examTable['nfs'][$i]['PLT'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['MPV'] = openssl_decrypt($examTable['nfs'][$i]['MPV'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['PWD'] = openssl_decrypt($examTable['nfs'][$i]['PWD'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['PCT'] = openssl_decrypt($examTable['nfs'][$i]['PCT'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['nfs'][$i]['P_LCR'] = openssl_decrypt($examTable['nfs'][$i]['P_LCR'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
    }

    $requette2 = $bdd->query("SELECT * FROM `dosage_hormone` WHERE 1;");
    
    $examTable['dosage_hormone'] = [];


    while ($reponse = $requette2->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "TSH" => $TSH,
            "PSA" => $PSA,
            "PRL" => $PRL,
            "FSH" => $FSH,
            "LH" => $LH
        ];
        
        $examTable['dosage_hormone'][] = $pat;
    }
    // var_dump($examTable['dosage_hormone'][0]['true_date']);
    // echo count($examTable['dosage_hormone']);
    // On envoie le code réponse 200 OK
    
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

    for ($i=0; $i < count($examTable['dosage_hormone']); $i++) { 
        $examTable['dosage_hormone'][$i]['TSH'] = openssl_decrypt($examTable['dosage_hormone'][$i]['TSH'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['dosage_hormone'][$i]['PSA'] = openssl_decrypt($examTable['dosage_hormone'][$i]['PSA'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['dosage_hormone'][$i]['PRL'] = openssl_decrypt($examTable['dosage_hormone'][$i]['PRL'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['dosage_hormone'][$i]['FSH'] = openssl_decrypt($examTable['dosage_hormone'][$i]['FSH'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['dosage_hormone'][$i]['LH'] = openssl_decrypt($examTable['dosage_hormone'][$i]['LH'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
                
    }

    $requette3 = $bdd->query("SELECT * FROM `ecbu` WHERE 1;");
    
    $examTable['ecbu'] = [];

    while ($reponse = $requette3->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "ASPECT" => $ASPECT,
            "COULEUR" => $COULEUR,
            "CELLULES_EPITHELIALE" => $CELLULES_EPITHELIALE,
            "LUECOCYTES" => $LUECOCYTES,
            "HEMATIES" => $HEMATIES,
            "PARASITES" => $PARASITES,
            "CRISTAUX" => $CRISTAUX,
            "CYLINDRES" => $CYLINDRES,
            "CG_M" => $CG_M,
            "CG_P" => $CG_P,
            "BG_M" => $BG_M,
            "BG_P" => $BG_P,
            "PN" => $PN
        ];
        
        $examTable['ecbu'][] = $pat;
    }
    // var_dump($examTable['ecbu'][0]['true_date']);
    // echo count($examTable['ecbu']);
    // On envoie le code réponse 200 OK
    

    for ($i=0; $i < count($examTable['ecbu']); $i++) { 
        $examTable['ecbu'][$i]['ASPECT'] = openssl_decrypt($examTable['ecbu'][$i]['ASPECT'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu'][$i]['COULEUR'] = openssl_decrypt($examTable['ecbu'][$i]['COULEUR'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu'][$i]['CELLULES_EPITHELIALE'] = openssl_decrypt($examTable['ecbu'][$i]['CELLULES_EPITHELIALE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu'][$i]['LUECOCYTES'] = openssl_decrypt($examTable['ecbu'][$i]['LUECOCYTES'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu'][$i]['HEMATIES'] = openssl_decrypt($examTable['ecbu'][$i]['HEMATIES'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu'][$i]['PARASITES'] = openssl_decrypt($examTable['ecbu'][$i]['PARASITES'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu'][$i]['CRISTAUX'] = openssl_decrypt($examTable['ecbu'][$i]['CRISTAUX'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu'][$i]['CYLINDRES'] = openssl_decrypt($examTable['ecbu'][$i]['CYLINDRES'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu'][$i]['CG_M'] = openssl_decrypt($examTable['ecbu'][$i]['CG_M'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu'][$i]['CG_P'] = openssl_decrypt($examTable['ecbu'][$i]['CG_P'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu'][$i]['BG_M'] = openssl_decrypt($examTable['ecbu'][$i]['BG_M'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu'][$i]['BG_P'] = openssl_decrypt($examTable['ecbu'][$i]['BG_P'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu'][$i]['PN'] = openssl_decrypt($examTable['ecbu'][$i]['PN'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
              
    }

    $requette4 = $bdd->query("SELECT * FROM `ecbu_atb` WHERE 1;");
    
    $examTable['ecbu_atb'] = [];


    while ($reponse = $requette4->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "Macroscopie" => $Macroscopie,
            "Volume" => $Volume,
            "Couleur_et_aspect_des_Urines" => $Couleur_et_aspect_des_Urines,
            "Odeur" => $Odeur,
            "Viscositee" => $Viscositee,
            "Microscopie" => $Microscopie,
            "Cocci_Gram_M" => $Cocci_Gram_M,
            "Leucocytes" => $Leucocytes,
            "Cocci_Gram_P" => $Cocci_Gram_P,
            "Cellules_Epithelial" => $Cellules_Epithelial,
            "Bacciles_Gram_M" => $Bacciles_Gram_M,
            "Levures" => $Levures,
            "Bacciles_G_P" => $Bacciles_G_P,
            "Polynucleaires" => $Polynucleaires,
            "Trichomonas" => $Trichomonas,
            "Cepitheliales" => $Cepitheliales,
            "Cristaux" => $Cristaux,
            "Culture" => $Culture,
            "Sensibles" => $Sensibles,
            "Germes_Isolees" => $Germes_Isolees,
            "Intermediaires" => $Intermediaires,
            "Resistants" => $Resistants,
            "conclusion" => $conclusion
        ];
        
        $examTable['ecbu_atb'][] = $pat;
    }
    // var_dump($examTable['ecbu_atb'][0]['true_date']);
    // echo count($examTable['ecbu_atb']);
    // On envoie le code réponse 200 OK
    

    for ($i=0; $i < count($examTable['ecbu_atb']); $i++) { 
        $examTable['ecbu_atb'][$i]['Macroscopie'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Macroscopie'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Volume'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Volume'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Couleur_et_aspect_des_Urines'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Couleur_et_aspect_des_Urines'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Odeur'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Odeur'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Viscositee'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Viscositee'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Microscopie'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Microscopie'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Cocci_Gram_M'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Cocci_Gram_M'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Leucocytes'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Leucocytes'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Cocci_Gram_P'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Cocci_Gram_P'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Cellules_Epithelial'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Cellules_Epithelial'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Bacciles_Gram_M'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Bacciles_Gram_M'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Levures'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Levures'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Bacciles_G_P'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Bacciles_G_P'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Polynucleaires'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Polynucleaires'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Trichomonas'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Trichomonas'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Cepitheliales'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Cepitheliales'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Cristaux'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Cristaux'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Culture'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Culture'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Sensibles'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Sensibles'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Germes_Isolees'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Germes_Isolees'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Intermediaires'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Intermediaires'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['Resistants'] = openssl_decrypt($examTable['ecbu_atb'][$i]['Resistants'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ecbu_atb'][$i]['conclusion'] = openssl_decrypt($examTable['ecbu_atb'][$i]['conclusion'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
             
    }

    $requette5 = $bdd->query("SELECT * FROM `parasitologie` WHERE 1;");
    
    $examTable['parasitologie'] = [];


    while ($reponse = $requette5->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "Selles_KOAP" => $Selles_KOAP,
            "Goute_Epaisse" => $Goute_Epaisse,
            "RFM_SKIN_SNIP" => $RFM_SKIN_SNIP,
        ];
        
        $examTable['parasitologie'][] = $pat;
    }
    // var_dump($examTable['parasitologie'][0]['true_date']);
    // echo count($examTable['parasitologie']);
    // On envoie le code réponse 200 OK
    

    for ($i=0; $i < count($examTable['parasitologie']); $i++) { 
        $examTable['parasitologie'][$i]['Selles_KOAP'] = openssl_decrypt($examTable['parasitologie'][$i]['Selles_KOAP'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['parasitologie'][$i]['Goute_Epaisse'] = openssl_decrypt($examTable['parasitologie'][$i]['Goute_Epaisse'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['parasitologie'][$i]['RFM_SKIN_SNIP'] = openssl_decrypt($examTable['parasitologie'][$i]['RFM_SKIN_SNIP'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
             
    }

    $requette6 = $bdd->query("SELECT * FROM `substrat_biochimie_sanguine` WHERE 1;");
    
    $examTable['substrat_biochimie_sanguine'] = [];


    while ($reponse = $requette6->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "UREE" => $UREE,
            "CREATININE" => $CREATININE,
            "ACIDE_URIQUE" => $ACIDE_URIQUE,
            "ALBUMINE_SANGUIN" => $ALBUMINE_SANGUIN,
            "GLYCEMIE_URGENCE" => $GLYCEMIE_URGENCE,
            "GLYCEMIE_A_JEUNE" => $GLYCEMIE_A_JEUNE,
            "GLYCEMIE_POST_PRANDIALE" => $GLYCEMIE_POST_PRANDIALE,
        ];
        
        $examTable['substrat_biochimie_sanguine'][] = $pat;
    }
    // var_dump($examTable['substrat_biochimie_sanguine'][0]['true_date']);
    // echo count($examTable['substrat_biochimie_sanguine']);
    // On envoie le code réponse 200 OK
    

    for ($i=0; $i < count($examTable['substrat_biochimie_sanguine']); $i++) { 
        $examTable['substrat_biochimie_sanguine'][$i]['UREE'] = openssl_decrypt($examTable['substrat_biochimie_sanguine'][$i]['UREE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['substrat_biochimie_sanguine'][$i]['CREATININE'] = openssl_decrypt($examTable['substrat_biochimie_sanguine'][$i]['CREATININE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['substrat_biochimie_sanguine'][$i]['ACIDE_URIQUE'] = openssl_decrypt($examTable['substrat_biochimie_sanguine'][$i]['ACIDE_URIQUE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['substrat_biochimie_sanguine'][$i]['ALBUMINE_SANGUIN'] = openssl_decrypt($examTable['substrat_biochimie_sanguine'][$i]['ALBUMINE_SANGUIN'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['substrat_biochimie_sanguine'][$i]['GLYCEMIE_URGENCE'] = openssl_decrypt($examTable['substrat_biochimie_sanguine'][$i]['GLYCEMIE_URGENCE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['substrat_biochimie_sanguine'][$i]['GLYCEMIE_A_JEUNE'] = openssl_decrypt($examTable['substrat_biochimie_sanguine'][$i]['GLYCEMIE_A_JEUNE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['substrat_biochimie_sanguine'][$i]['GLYCEMIE_POST_PRANDIALE'] = openssl_decrypt($examTable['substrat_biochimie_sanguine'][$i]['GLYCEMIE_POST_PRANDIALE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
    }


    $requette7 = $bdd->query("SELECT * FROM `hematologie` WHERE 1;");
    
    $examTable['hematologie'] = [];


    while ($reponse = $requette7->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "Groupe_sanguin_et_rhesus" => $Groupe_sanguin_et_rhesus,
            "Electrophorese_HB" => $Electrophorese_HB,
            "TS" => $TS,
            "TC" => $TC,
            "VS" => $VS,
        ];
        
        $examTable['hematologie'][] = $pat;
    }
    // var_dump($examTable['hematologie'][0]['true_date']);
    // echo count($examTable['hematologie']);
    // On envoie le code réponse 200 OK
    

    for ($i=0; $i < count($examTable['hematologie']); $i++) { 
        $examTable['hematologie'][$i]['Groupe_sanguin_et_rhesus'] = openssl_decrypt($examTable['hematologie'][$i]['Groupe_sanguin_et_rhesus'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['hematologie'][$i]['Electrophorese_HB'] = openssl_decrypt($examTable['hematologie'][$i]['Electrophorese_HB'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['hematologie'][$i]['TS'] = openssl_decrypt($examTable['hematologie'][$i]['TS'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['hematologie'][$i]['TC'] = openssl_decrypt($examTable['hematologie'][$i]['TC'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['hematologie'][$i]['VS'] = openssl_decrypt($examTable['hematologie'][$i]['VS'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
    }

    $requette8 = $bdd->query("SELECT * FROM `profile_lipidique` WHERE 1;");
    
    $examTable['profile_lipidique'] = [];


    while ($reponse = $requette8->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "CHOLESTEROL_T" => $CHOLESTEROL_T,
            "TRYCLYCERIDES" => $TRYCLYCERIDES,
            "HDL" => $HDL,
            "LDL" => $LDL,
        ];
        
        $examTable['profile_lipidique'][] = $pat;
    }
    // var_dump($examTable['profile_lipidique'][0]['true_date']);
    // echo count($examTable['profile_lipidique']);
    // On envoie le code réponse 200 OK
    

    for ($i=0; $i < count($examTable['profile_lipidique']); $i++) { 
        $examTable['profile_lipidique'][$i]['CHOLESTEROL_T'] = openssl_decrypt($examTable['profile_lipidique'][$i]['CHOLESTEROL_T'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['profile_lipidique'][$i]['TRYCLYCERIDES'] = openssl_decrypt($examTable['profile_lipidique'][$i]['TRYCLYCERIDES'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['profile_lipidique'][$i]['HDL'] = openssl_decrypt($examTable['profile_lipidique'][$i]['HDL'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['profile_lipidique'][$i]['LDL'] = openssl_decrypt($examTable['profile_lipidique'][$i]['LDL'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
    }

    $requette9 = $bdd->query("SELECT * FROM `enzymes_hepathiques` WHERE 1;");
    
    $examTable['enzymes_hepathiques'] = [];


    while ($reponse = $requette9->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "SGOT_ASAT" => $SGOT_ASAT,
            "SGPT_ALAT" => $SGPT_ALAT,
        ];
        
        $examTable['enzymes_hepathiques'][] = $pat;
    }
    // var_dump($examTable['enzymes_hepathiques'][0]['true_date']);
    // echo count($examTable['enzymes_hepathiques']);
    // On envoie le code réponse 200 OK
    

    for ($i=0; $i < count($examTable['enzymes_hepathiques']); $i++) { 
        $examTable['enzymes_hepathiques'][$i]['SGOT_ASAT'] = openssl_decrypt($examTable['enzymes_hepathiques'][$i]['SGOT_ASAT'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['enzymes_hepathiques'][$i]['SGPT_ALAT'] = openssl_decrypt($examTable['enzymes_hepathiques'][$i]['SGPT_ALAT'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
    }

    $requette10 = $bdd->query("SELECT * FROM `serologie` WHERE 1;");
    
    $examTable['serologie'] = [];

    while ($reponse = $requette10->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "CRP" => $CRP,
            "ASLO" => $ASLO,
            "H_Pylori" => $H_Pylori,
            "Ag_Hbs" => $Ag_Hbs,
            "Ac_HCV" => $Ac_HCV,
            "G_Test" => $G_Test,
            "HIV" => $HIV,
            "CHLAMYDIA" => $CHLAMYDIA,
            "TOXOPLASMOSE" => $TOXOPLASMOSE,
            "RUBEOLE" => $RUBEOLE,
            "WIDAL_FELIX" => $WIDAL_FELIX,
        ];
        
        $examTable['serologie'][] = $pat;
    }
    // var_dump($examTable['serologie'][0]['true_date']);
    // echo count($examTable['serologie']);
    // On envoie le code réponse 200 OK


    for ($i=0; $i < count($examTable['serologie']); $i++) { 
        $examTable['serologie'][$i]['CRP'] = openssl_decrypt($examTable['serologie'][$i]['CRP'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['serologie'][$i]['ASLO'] = openssl_decrypt($examTable['serologie'][$i]['ASLO'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['serologie'][$i]['H_Pylori'] = openssl_decrypt($examTable['serologie'][$i]['H_Pylori'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['serologie'][$i]['Ag_Hbs'] = openssl_decrypt($examTable['serologie'][$i]['Ag_Hbs'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['serologie'][$i]['Ac_HCV'] = openssl_decrypt($examTable['serologie'][$i]['Ac_HCV'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['serologie'][$i]['G_Test'] = openssl_decrypt($examTable['serologie'][$i]['G_Test'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['serologie'][$i]['HIV'] = openssl_decrypt($examTable['serologie'][$i]['HIV'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['serologie'][$i]['CHLAMYDIA'] = openssl_decrypt($examTable['serologie'][$i]['CHLAMYDIA'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['serologie'][$i]['TOXOPLASMOSE'] = openssl_decrypt($examTable['serologie'][$i]['TOXOPLASMOSE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['serologie'][$i]['RUBEOLE'] = openssl_decrypt($examTable['serologie'][$i]['RUBEOLE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['serologie'][$i]['WIDAL_FELIX'] = openssl_decrypt($examTable['serologie'][$i]['WIDAL_FELIX'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
    }

    $requette11 = $bdd->query("SELECT * FROM `bandelette_urinaire` WHERE 1;");
        
    $examTable['bandelette_urinaire'] = [];

    while ($reponse = $requette11->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "PROTEINE" => $PROTEINE,
            "NITRITES" => $NITRITES,
            "GLUCOSE" => $GLUCOSE,
            "CETONES" => $CETONES,
            "BILIRUBINE" => $BILIRUBINE,
            "LEUCOCYTES" => $LEUCOCYTES,
            "HEMATIES" => $HEMATIES,
            "CHLAMYDIA" => $CHLAMYDIA,
            "HUROBILINOGENE" => $HUROBILINOGENE,
            "DENSITE" => $DENSITE,
            "PH" => $PH,
        ];
        
        $examTable['bandelette_urinaire'][] = $pat;
    }
    // var_dump($examTable['bandelette_urinaire'][0]['true_date']);
    // echo count($examTable['bandelette_urinaire']);
    // On envoie le code réponse 200 OK


    for ($i=0; $i < count($examTable['bandelette_urinaire']); $i++) { 
        $examTable['bandelette_urinaire'][$i]['PROTEINE'] = openssl_decrypt($examTable['bandelette_urinaire'][$i]['PROTEINE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['bandelette_urinaire'][$i]['NITRITES'] = openssl_decrypt($examTable['bandelette_urinaire'][$i]['NITRITES'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['bandelette_urinaire'][$i]['GLUCOSE'] = openssl_decrypt($examTable['bandelette_urinaire'][$i]['GLUCOSE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['bandelette_urinaire'][$i]['CETONES'] = openssl_decrypt($examTable['bandelette_urinaire'][$i]['CETONES'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['bandelette_urinaire'][$i]['BILIRUBINE'] = openssl_decrypt($examTable['bandelette_urinaire'][$i]['BILIRUBINE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['bandelette_urinaire'][$i]['LEUCOCYTES'] = openssl_decrypt($examTable['bandelette_urinaire'][$i]['LEUCOCYTES'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['bandelette_urinaire'][$i]['HEMATIES'] = openssl_decrypt($examTable['bandelette_urinaire'][$i]['HEMATIES'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['bandelette_urinaire'][$i]['CHLAMYDIA'] = openssl_decrypt($examTable['bandelette_urinaire'][$i]['CHLAMYDIA'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['bandelette_urinaire'][$i]['HUROBILINOGENE'] = openssl_decrypt($examTable['bandelette_urinaire'][$i]['HUROBILINOGENE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['bandelette_urinaire'][$i]['DENSITE'] = openssl_decrypt($examTable['bandelette_urinaire'][$i]['DENSITE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['bandelette_urinaire'][$i]['PH'] = openssl_decrypt($examTable['bandelette_urinaire'][$i]['PH'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
    }

    $requette12 = $bdd->query("SELECT * FROM `pcv` WHERE 1;");
        
    $examTable['pcv'] = [];

    while ($reponse = $requette12->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "Col" => $Col,
            "LEUCORHEES" => $LEUCORHEES,
            "TEST_A_LA_PROSTATE" => $TEST_A_LA_PROSTATE,
            "PH" => $PH,
            "CELLULES_EPITH" => $CELLULES_EPITH,
            "LEUCOCYTES" => $LEUCOCYTES,
            "LEVURES" => $LEVURES,
            "TRICHOMONAS_VAGINALE" => $TRICHOMONAS_VAGINALE,
            "CG_M" => $CG_M,
            "CG_P" => $CG_P,
            "BG_M" => $BG_M,
            "BG_P" => $BG_P,
            "COCOBACILLES" => $COCOBACILLES,
            "CLUE_CELL" => $CLUE_CELL,
            "FLORE_DE_DODERLEIN_Type" => $FLORE_DE_DODERLEIN_Type,
        ];
        
        $examTable['pcv'][] = $pat;
    }
    // var_dump($examTable['pcv'][0]['true_date']);
    // echo count($examTable['pcv']);
    // On envoie le code réponse 200 OK


    for ($i=0; $i < count($examTable['pcv']); $i++) { 
        $examTable['pcv'][$i]['Col'] = openssl_decrypt($examTable['pcv'][$i]['Col'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv'][$i]['LEUCORHEES'] = openssl_decrypt($examTable['pcv'][$i]['LEUCORHEES'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv'][$i]['TEST_A_LA_PROSTATE'] = openssl_decrypt($examTable['pcv'][$i]['TEST_A_LA_PROSTATE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv'][$i]['CELLULES_EPITH'] = openssl_decrypt($examTable['pcv'][$i]['CELLULES_EPITH'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv'][$i]['LEVURES'] = openssl_decrypt($examTable['pcv'][$i]['LEVURES'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv'][$i]['LEUCOCYTES'] = openssl_decrypt($examTable['pcv'][$i]['LEUCOCYTES'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv'][$i]['TRICHOMONAS_VAGINALE'] = openssl_decrypt($examTable['pcv'][$i]['TRICHOMONAS_VAGINALE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv'][$i]['CG_M'] = openssl_decrypt($examTable['pcv'][$i]['CG_M'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv'][$i]['CG_P'] = openssl_decrypt($examTable['pcv'][$i]['CG_P'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv'][$i]['BG_M'] = openssl_decrypt($examTable['pcv'][$i]['BG_M'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv'][$i]['PH'] = openssl_decrypt($examTable['pcv'][$i]['PH'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv'][$i]['BG_P'] = openssl_decrypt($examTable['pcv'][$i]['BG_P'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv'][$i]['COCOBACILLES'] = openssl_decrypt($examTable['pcv'][$i]['COCOBACILLES'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv'][$i]['CLUE_CELL'] = openssl_decrypt($examTable['pcv'][$i]['CLUE_CELL'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv'][$i]['FLORE_DE_DODERLEIN_Type'] = openssl_decrypt($examTable['pcv'][$i]['FLORE_DE_DODERLEIN_Type'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
    }


    $requette13 = $bdd->query("SELECT * FROM `innogramme_sanguin` WHERE 1;");
    
    $examTable['innogramme_sanguin'] = [];

    while ($reponse = $requette13->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "SODIUM" => $SODIUM,
            "POTASSIUM" => $POTASSIUM,
            "CHLORURE" => $CHLORURE,
            "CALCIUM" => $CALCIUM,
            "MAGNESIUM" => $MAGNESIUM,
        ];
        
        $examTable['innogramme_sanguin'][] = $pat;
    }
    // var_dump($examTable['innogramme_sanguin'][0]['true_date']);
    // echo count($examTable['innogramme_sanguin']);
    // On envoie le code réponse 200 OK


    for ($i=0; $i < count($examTable['innogramme_sanguin']); $i++) { 
        $examTable['innogramme_sanguin'][$i]['SODIUM'] = openssl_decrypt($examTable['innogramme_sanguin'][$i]['SODIUM'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['innogramme_sanguin'][$i]['POTASSIUM'] = openssl_decrypt($examTable['innogramme_sanguin'][$i]['POTASSIUM'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['innogramme_sanguin'][$i]['CHLORURE'] = openssl_decrypt($examTable['innogramme_sanguin'][$i]['CHLORURE'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['innogramme_sanguin'][$i]['CALCIUM'] = openssl_decrypt($examTable['innogramme_sanguin'][$i]['CALCIUM'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['innogramme_sanguin'][$i]['MAGNESIUM'] = openssl_decrypt($examTable['innogramme_sanguin'][$i]['MAGNESIUM'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
    }

    $requette14 = $bdd->query("SELECT * FROM `frottis_sanguin` WHERE 1;");
    
    $examTable['frottis_sanguin'] = [];

    while ($reponse = $requette14->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "Polynucleaire_Neutrophile" => $Polynucleaire_Neutrophile,
            "Polynucleaire_Eosinophile" => $Polynucleaire_Eosinophile,
            "Polynucleaire_Basophile" => $Polynucleaire_Basophile,
            "Mononucleaire_Monocyte" => $Mononucleaire_Monocyte,
            "Mononucleaire_Lymohocytes" => $Mononucleaire_Lymohocytes,
        ];
        
        $examTable['frottis_sanguin'][] = $pat;
    }
    // var_dump($examTable['frottis_sanguin'][0]['true_date']);
    // echo count($examTable['frottis_sanguin']);
    // On envoie le code réponse 200 OK


    for ($i=0; $i < count($examTable['frottis_sanguin']); $i++) { 
        $examTable['frottis_sanguin'][$i]['Polynucleaire_Neutrophile'] = openssl_decrypt($examTable['frottis_sanguin'][$i]['Polynucleaire_Neutrophile'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['frottis_sanguin'][$i]['Polynucleaire_Eosinophile'] = openssl_decrypt($examTable['frottis_sanguin'][$i]['Polynucleaire_Eosinophile'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['frottis_sanguin'][$i]['Polynucleaire_Basophile'] = openssl_decrypt($examTable['frottis_sanguin'][$i]['Polynucleaire_Basophile'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['frottis_sanguin'][$i]['Mononucleaire_Monocyte'] = openssl_decrypt($examTable['frottis_sanguin'][$i]['Mononucleaire_Monocyte'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['frottis_sanguin'][$i]['Mononucleaire_Lymohocytes'] = openssl_decrypt($examTable['frottis_sanguin'][$i]['Mononucleaire_Lymohocytes'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
    }

    $requette15 = $bdd->query("SELECT * FROM `ge` WHERE 1;");
    
    $examTable['ge'] = [];

    while ($reponse = $requette15->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "WIDAL_FELIX" => $WIDAL_FELIX,
            "CRP" => $CRP,
            "Goutte_Epaisse" => $Goutte_Epaisse,
            "Selles_KOAP" => $Selles_KOAP,
        ];
        
        $examTable['ge'][] = $pat;
    }
    // var_dump($examTable['ge'][0]['true_date']);
    // echo count($examTable['ge']);
    // On envoie le code réponse 200 OK


    for ($i=0; $i < count($examTable['ge']); $i++) { 
        $examTable['ge'][$i]['WIDAL_FELIX'] = openssl_decrypt($examTable['ge'][$i]['WIDAL_FELIX'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ge'][$i]['CRP'] = openssl_decrypt($examTable['ge'][$i]['CRP'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ge'][$i]['Goutte_Epaisse'] = openssl_decrypt($examTable['ge'][$i]['Goutte_Epaisse'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['ge'][$i]['Selles_KOAP'] = openssl_decrypt($examTable['ge'][$i]['Selles_KOAP'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
    }

    $requette16 = $bdd->query("SELECT * FROM `pcv_atb` WHERE 1;");
    
    $examTable['pcv_atb'] = [];


    while ($reponse = $requette16->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "Macroscopie" => $Macroscopie,
            "Aspect_des_Leucorhees" => $Aspect_des_Leucorhees,
            "Aspect_du_Col" => $Aspect_du_Col,
            "PH" => $PH,
            "KOH" => $KOH,
            "Microscopie" => $Microscopie,
            "Cocci_Gram_M" => $Cocci_Gram_M,
            "Leucocytes" => $Leucocytes,
            "Cocci_Gram_P" => $Cocci_Gram_P,
            "Hematies" => $Hematies,
            "Flore_du_type" => $Flore_du_type,
            "Cellules_Epithelial" => $Cellules_Epithelial,
            "Bacciles_Gram_M" => $Bacciles_Gram_M,
            "Levures" => $Levures,
            "Bacciles_G_P" => $Bacciles_G_P,
            "Polynucleaires" => $Polynucleaires,
            "Trichomonas" => $Trichomonas,
            "Cepitheliales" => $Cepitheliales,
            "Culture" => $Culture,
            "Sensibles" => $Sensibles,
            "Germes_Isolees" => $Germes_Isolees,
            "Intermediaires" => $Intermediaires,
            "Resistants" => $Resistants,
            "conclusion" => $conclusion
        ];
        
        $examTable['pcv_atb'][] = $pat;
    }
    // var_dump($examTable['pcv_atb'][0]['true_date']);
    // echo count($examTable['pcv_atb']);
    // On envoie le code réponse 200 OK
    

    for ($i=0; $i < count($examTable['pcv_atb']); $i++) { 
        $examTable['pcv_atb'][$i]['Macroscopie'] = openssl_decrypt($examTable['pcv_atb'][$i]['Macroscopie'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Aspect_des_Leucorhees'] = openssl_decrypt($examTable['pcv_atb'][$i]['Aspect_des_Leucorhees'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Aspect_du_Col'] = openssl_decrypt($examTable['pcv_atb'][$i]['Aspect_du_Col'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['PH'] = openssl_decrypt($examTable['pcv_atb'][$i]['PH'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['KOH'] = openssl_decrypt($examTable['pcv_atb'][$i]['KOH'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Microscopie'] = openssl_decrypt($examTable['pcv_atb'][$i]['Microscopie'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Cocci_Gram_M'] = openssl_decrypt($examTable['pcv_atb'][$i]['Cocci_Gram_M'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Leucocytes'] = openssl_decrypt($examTable['pcv_atb'][$i]['Leucocytes'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Cocci_Gram_P'] = openssl_decrypt($examTable['pcv_atb'][$i]['Cocci_Gram_P'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Hematies'] = openssl_decrypt($examTable['pcv_atb'][$i]['Hematies'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Flore_du_type'] = openssl_decrypt($examTable['pcv_atb'][$i]['Flore_du_type'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Cellules_Epithelial'] = openssl_decrypt($examTable['pcv_atb'][$i]['Cellules_Epithelial'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Bacciles_Gram_M'] = openssl_decrypt($examTable['pcv_atb'][$i]['Bacciles_Gram_M'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Levures'] = openssl_decrypt($examTable['pcv_atb'][$i]['Levures'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Bacciles_G_P'] = openssl_decrypt($examTable['pcv_atb'][$i]['Bacciles_G_P'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Polynucleaires'] = openssl_decrypt($examTable['pcv_atb'][$i]['Polynucleaires'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Trichomonas'] = openssl_decrypt($examTable['pcv_atb'][$i]['Trichomonas'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Cepitheliales'] = openssl_decrypt($examTable['pcv_atb'][$i]['Cepitheliales'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Culture'] = openssl_decrypt($examTable['pcv_atb'][$i]['Culture'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Sensibles'] = openssl_decrypt($examTable['pcv_atb'][$i]['Sensibles'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Germes_Isolees'] = openssl_decrypt($examTable['pcv_atb'][$i]['Germes_Isolees'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Intermediaires'] = openssl_decrypt($examTable['pcv_atb'][$i]['Intermediaires'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['Resistants'] = openssl_decrypt($examTable['pcv_atb'][$i]['Resistants'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pcv_atb'][$i]['conclusion'] = openssl_decrypt($examTable['pcv_atb'][$i]['conclusion'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
             
    }

    $requette17 = $bdd->query("SELECT * FROM `pus_atb` WHERE 1;");
    
    $examTable['pus_atb'] = [];


    while ($reponse = $requette17->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "Macroscopie" => $Macroscopie,
            "Aspect_des_Pus" => $Aspect_des_Pus,
            "Microscopie" => $Microscopie,
            "Cocci_Gram_M" => $Cocci_Gram_M,
            "Cocci_Gram_P" => $Cocci_Gram_P,
            "Cellules_Epithelial" => $Cellules_Epithelial,
            "Bacciles_Gram_M" => $Bacciles_Gram_M,
            "Bacciles_G_P" => $Bacciles_G_P,
            "Polynucleaires" => $Polynucleaires,
            "Cepitheliales" => $Cepitheliales,
            "Culture" => $Culture,
            "Sensibles" => $Sensibles,
            "Germes_Isolees" => $Germes_Isolees,
            "Intermediaires" => $Intermediaires,
            "Resistants" => $Resistants,
            "conclusion" => $conclusion
        ];
        
        $examTable['pus_atb'][] = $pat;
    }
    // var_dump($examTable['pus_atb'][0]['true_date']);
    // echo count($examTable['pus_atb']);
    // On envoie le code réponse 200 OK
    

    for ($i=0; $i < count($examTable['pus_atb']); $i++) { 
        $examTable['pus_atb'][$i]['Macroscopie'] = openssl_decrypt($examTable['pus_atb'][$i]['Macroscopie'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pus_atb'][$i]['Aspect_des_Pus'] = openssl_decrypt($examTable['pus_atb'][$i]['Aspect_des_Pus'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pus_atb'][$i]['Microscopie'] = openssl_decrypt($examTable['pus_atb'][$i]['Microscopie'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pus_atb'][$i]['Cocci_Gram_M'] = openssl_decrypt($examTable['pus_atb'][$i]['Cocci_Gram_M'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pus_atb'][$i]['Cocci_Gram_P'] = openssl_decrypt($examTable['pus_atb'][$i]['Cocci_Gram_P'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pus_atb'][$i]['Cellules_Epithelial'] = openssl_decrypt($examTable['pus_atb'][$i]['Cellules_Epithelial'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pus_atb'][$i]['Bacciles_Gram_M'] = openssl_decrypt($examTable['pus_atb'][$i]['Bacciles_Gram_M'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pus_atb'][$i]['Bacciles_G_P'] = openssl_decrypt($examTable['pus_atb'][$i]['Bacciles_G_P'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pus_atb'][$i]['Polynucleaires'] = openssl_decrypt($examTable['pus_atb'][$i]['Polynucleaires'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pus_atb'][$i]['Cepitheliales'] = openssl_decrypt($examTable['pus_atb'][$i]['Cepitheliales'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pus_atb'][$i]['Culture'] = openssl_decrypt($examTable['pus_atb'][$i]['Culture'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pus_atb'][$i]['Sensibles'] = openssl_decrypt($examTable['pus_atb'][$i]['Sensibles'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pus_atb'][$i]['Germes_Isolees'] = openssl_decrypt($examTable['pus_atb'][$i]['Germes_Isolees'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pus_atb'][$i]['Intermediaires'] = openssl_decrypt($examTable['pus_atb'][$i]['Intermediaires'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pus_atb'][$i]['Resistants'] = openssl_decrypt($examTable['pus_atb'][$i]['Resistants'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['pus_atb'][$i]['conclusion'] = openssl_decrypt($examTable['pus_atb'][$i]['conclusion'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
             
    }

    $requette18 = $bdd->query("SELECT * FROM `spermoculture` WHERE 1;");
    
    $examTable['spermoculture'] = [];


    while ($reponse = $requette18->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "Macroscopie" => $Macroscopie,
            "Volume" => $Volume,
            "Odeur" => $Odeur,
            "PH" => $PH,
            "Viscositee" => $Viscositee,
            "Microscopie" => $Microscopie,
            "Cocci_Gram_M" => $Cocci_Gram_M,
            "Leucocytes" => $Leucocytes,
            "Cocci_Gram_P" => $Cocci_Gram_P,
            "Cellules_Epithelial" => $Cellules_Epithelial,
            "Bacciles_Gram_M" => $Bacciles_Gram_M,
            "Levures" => $Levures,
            "Bacciles_G_P" => $Bacciles_G_P,
            "Polynucleaires" => $Polynucleaires,
            "Cepitheliales" => $Cepitheliales,
            "Culture" => $Culture,
            "Sensibles" => $Sensibles,
            "Germes_Isolees" => $Germes_Isolees,
            "Intermediaires" => $Intermediaires,
            "Resistants" => $Resistants,
            "conclusion" => $conclusion
        ];
        
        $examTable['spermoculture'][] = $pat;
    }
    // var_dump($examTable['spermoculture'][0]['true_date']);
    // echo count($examTable['spermoculture']);
    // On envoie le code réponse 200 OK


    for ($i=0; $i < count($examTable['spermoculture']); $i++) { 
        $examTable['spermoculture'][$i]['Macroscopie'] = openssl_decrypt($examTable['spermoculture'][$i]['Macroscopie'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Volume'] = openssl_decrypt($examTable['spermoculture'][$i]['Volume'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Odeur'] = openssl_decrypt($examTable['spermoculture'][$i]['Odeur'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['PH'] = openssl_decrypt($examTable['spermoculture'][$i]['PH'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Viscositee'] = openssl_decrypt($examTable['spermoculture'][$i]['Viscositee'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Microscopie'] = openssl_decrypt($examTable['spermoculture'][$i]['Microscopie'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Cocci_Gram_M'] = openssl_decrypt($examTable['spermoculture'][$i]['Cocci_Gram_M'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Leucocytes'] = openssl_decrypt($examTable['spermoculture'][$i]['Leucocytes'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Cocci_Gram_P'] = openssl_decrypt($examTable['spermoculture'][$i]['Cocci_Gram_P'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Cellules_Epithelial'] = openssl_decrypt($examTable['spermoculture'][$i]['Cellules_Epithelial'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Bacciles_Gram_M'] = openssl_decrypt($examTable['spermoculture'][$i]['Bacciles_Gram_M'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Levures'] = openssl_decrypt($examTable['spermoculture'][$i]['Levures'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Bacciles_G_P'] = openssl_decrypt($examTable['spermoculture'][$i]['Bacciles_G_P'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Polynucleaires'] = openssl_decrypt($examTable['spermoculture'][$i]['Polynucleaires'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Cepitheliales'] = openssl_decrypt($examTable['spermoculture'][$i]['Cepitheliales'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Culture'] = openssl_decrypt($examTable['spermoculture'][$i]['Culture'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Sensibles'] = openssl_decrypt($examTable['spermoculture'][$i]['Sensibles'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Germes_Isolees'] = openssl_decrypt($examTable['spermoculture'][$i]['Germes_Isolees'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Intermediaires'] = openssl_decrypt($examTable['spermoculture'][$i]['Intermediaires'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['Resistants'] = openssl_decrypt($examTable['spermoculture'][$i]['Resistants'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $examTable['spermoculture'][$i]['conclusion'] = openssl_decrypt($examTable['spermoculture'][$i]['conclusion'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
    }

    $requette19 = $bdd->query("SELECT * FROM `test_grocesse` WHERE 1;");
    
    $examTable['test_grocesse'] = [];


    while ($reponse = $requette19->fetch()) {
        extract($reponse);
        $pat = [
            "DateExam" => $DateExam,
            "true_date" => $true_date,
            "Beta_HCG_Plasmique" => $Beta_HCG_Plasmique,
        ];
        
        $examTable['test_grocesse'][] = $pat;
    }
    // var_dump($examTable['test_grocesse'][0]['true_date']);
    // echo count($examTable['test_grocesse']);
    // On envoie le code réponse 200 OK


    for ($i=0; $i < count($examTable['test_grocesse']); $i++) { 
        $examTable['test_grocesse'][$i]['Beta_HCG_Plasmique'] = openssl_decrypt($examTable['test_grocesse'][$i]['Beta_HCG_Plasmique'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
    }

        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($examTable);

}
else {
    // mauvaise methode, on gere l'erreur

    http_response_code(405);
    echo json_encode(["message" => "la methode n'est pas autorisee"]);
}