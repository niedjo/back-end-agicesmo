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

    $DateExam = htmlspecialchars(strip_tags($data['DateExam']));
    $Examen = htmlspecialchars(strip_tags($data['Examen']));
    $true_date = htmlspecialchars(strip_tags($data['true_date']));
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
    
    switch ($Examen) {
        case "Nfs":
            $WCB = htmlspecialchars(strip_tags($data['WCB']));
            $LYM_D = htmlspecialchars(strip_tags($data['LYM_D']));
            $MID_D = htmlspecialchars(strip_tags($data['MID_D']));
            $GRA_D = htmlspecialchars(strip_tags($data['GRA_D']));
            $LYM_P = htmlspecialchars(strip_tags($data['LYM_P']));
            $MID_P = htmlspecialchars(strip_tags($data['MID_P']));
            $GRA_P = htmlspecialchars(strip_tags($data['GRA_P']));
            $RCC = htmlspecialchars(strip_tags($data['RCC']));
            $HGB = htmlspecialchars(strip_tags($data['HGB']));
            $HCT = htmlspecialchars(strip_tags($data['HCT']));
            $MCV = htmlspecialchars(strip_tags($data['MCV']));
            $MCH = htmlspecialchars(strip_tags($data['MCH']));
            $MCHC = htmlspecialchars(strip_tags($data['MCHC']));
            $RDW_SD = htmlspecialchars(strip_tags($data['RDW_SD']));
            $RDW_CU = htmlspecialchars(strip_tags($data['RDW_CU']));
            $PLT = htmlspecialchars(strip_tags($data['PLT']));
            $MPV = htmlspecialchars(strip_tags($data['MPV']));
            $PWD = htmlspecialchars(strip_tags($data['PWD']));
            $PCT = htmlspecialchars(strip_tags($data['PCT']));
            $P_LCR = htmlspecialchars(strip_tags($data['P_LCR']));

            // on chiffre tous ca

            $WCB = openssl_encrypt($WCB, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $LYM_D = openssl_encrypt($LYM_D, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $MID_D = openssl_encrypt($MID_D, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $GRA_D = openssl_encrypt($GRA_D, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $LYM_P = openssl_encrypt($LYM_P, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $MID_P = openssl_encrypt($MID_P, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $GRA_P = openssl_encrypt($GRA_P, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $RCC = openssl_encrypt($RCC, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $HGB = openssl_encrypt($HGB, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $HCT = openssl_encrypt($HCT, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $MCV = openssl_encrypt($MCV, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $MCH = openssl_encrypt($MCH, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $MCHC = openssl_encrypt($MCHC, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $RDW_SD = openssl_encrypt($RDW_SD, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $RDW_CU = openssl_encrypt($RDW_CU, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $PLT = openssl_encrypt($PLT, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $MPV = openssl_encrypt($MPV, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $PWD = openssl_encrypt($PWD, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $PCT = openssl_encrypt($PCT, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $P_LCR = openssl_encrypt($P_LCR, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');


            $sql1 = "INSERT INTO `nfs`(
                `DateExam`, 
                `true_date`, 
                `WCB`,
                `LYM_D`,
                `MID_D`,
                `GRA_D`,
                `LYM_P`,
                `MID_P`,
                `GRA_P`,
                `RCC`,
                `HGB`,
                `HCT`,
                `MCV`,
                `MCH`,
                `MCHC`,
                `RDW_SD`,
                `RDW_CU`,
                `PLT`,
                `MPV`,
                `PWD`,
                `PCT`,
                `P_LCR`
                ) VALUES (
                    \"$DateExam\",
                    \"$true_date\",
                    \"$WCB\",
                    \"$LYM_D\",
                    \"$MID_D\",
                    \"$GRA_D\",
                    \"$LYM_P\",
                    \"$MID_P\",
                    \"$GRA_P\",
                    \"$RCC\",
                    \"$HGB\",
                    \"$HCT\",
                    \"$MCV\",
                    \"$MCH\",
                    \"$MCHC\",
                    \"$RDW_SD\",
                    \"$RDW_CU\",
                    \"$PLT\",
                    \"$MPV\",
                    \"$PWD\",
                    \"$PCT\",
                    \"$P_LCR\"
                    )
            ";

            $requette1 = $bdd->prepare($sql1);
            $requette1->execute();

            break;

        case "Dosage d'Hormones":
            $TSH = htmlspecialchars(strip_tags($data['TSH']));
            $PSA = htmlspecialchars(strip_tags($data['PSA']));
            $PRL = htmlspecialchars(strip_tags($data['PRL']));
            $FSH = htmlspecialchars(strip_tags($data['FSH']));
            $LH = htmlspecialchars(strip_tags($data['LH']));
                    
            // on chiffre tous ca

            $TSH = openssl_encrypt($TSH, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $PSA = openssl_encrypt($PSA, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $PRL = openssl_encrypt($PRL, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $FSH = openssl_encrypt($FSH, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $LH = openssl_encrypt($LH, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
            $sql1 = "INSERT INTO `dosage_hormone`(
                `DateExam`, 
                `true_date`, 
                `TSH`, 
                `PSA`, 
                `PRL`, 
                `FSH`, 
                `LH`
                ) VALUES (
                    \"$DateExam\",
                    \"$true_date\",
                    \"$TSH\",
                    \"$PSA\",
                    \"$PRL\",
                    \"$FSH\",
                    \"$LH\"
                    )";

                $requette1 = $bdd->prepare($sql1);
                $requette1->execute();

            break;
        case "ECBU":
            $ASPECT = htmlspecialchars(strip_tags($data['ASPECT']));
            $COULEUR = htmlspecialchars(strip_tags($data['COULEUR']));
            $CELLULES_EPITHELIALE = htmlspecialchars(strip_tags($data['CELLULES_EPITHELIALE']));
            $LUECOCYTES = htmlspecialchars(strip_tags($data['LUECOCYTES']));
            $HEMATIES = htmlspecialchars(strip_tags($data['HEMATIES']));
            $PARASITES = htmlspecialchars(strip_tags($data['PARASITES']));
            $CRISTAUX = htmlspecialchars(strip_tags($data['CRISTAUX']));
            $CYLINDRES = htmlspecialchars(strip_tags($data['CYLINDRES']));
            $CG_M = htmlspecialchars(strip_tags($data['CG_M']));
            $CG_P = htmlspecialchars(strip_tags($data['CG_P']));
            $BG_M = htmlspecialchars(strip_tags($data['BG_M']));
            $BG_P = htmlspecialchars(strip_tags($data['BG_P']));
            $PN = htmlspecialchars(strip_tags($data['PN']));
                    
            // on chiffre tous ca

            $ASPECT = openssl_encrypt($ASPECT, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $COULEUR = openssl_encrypt($COULEUR, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $CELLULES_EPITHELIALE = openssl_encrypt($CELLULES_EPITHELIALE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $LUECOCYTES = openssl_encrypt($LUECOCYTES, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $HEMATIES = openssl_encrypt($HEMATIES, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $PARASITES = openssl_encrypt($PARASITES, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $CRISTAUX = openssl_encrypt($CRISTAUX, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $CYLINDRES = openssl_encrypt($CYLINDRES, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $CG_M = openssl_encrypt($CG_M, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $CG_P = openssl_encrypt($CG_P, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $BG_M = openssl_encrypt($BG_M, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $BG_P = openssl_encrypt($BG_P, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $PN = openssl_encrypt($PN, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
            $sql1 = "INSERT INTO `ecbu`(
                `DateExam`, 
                `true_date`, 
                `ASPECT`, 
                `COULEUR`, 
                `CELLULES_EPITHELIALE`, 
                `LUECOCYTES`, 
                `HEMATIES`, 
                `PARASITES`, 
                `CRISTAUX`, 
                `CYLINDRES`, 
                `CG_M`, 
                `CG_P`, 
                `BG_M`, 
                `BG_P`, 
                `PN`
                ) VALUES (
                    \"$DateExam\", 
                    \"$true_date\", 
                    \"$ASPECT\", 
                    \"$COULEUR\", 
                    \"$CELLULES_EPITHELIALE\", 
                    \"$LUECOCYTES\", 
                    \"$HEMATIES\", 
                    \"$PARASITES\", 
                    \"$CRISTAUX\", 
                    \"$CYLINDRES\", 
                    \"$CG_M\", 
                    \"$CG_P\", 
                    \"$BG_M\", 
                    \"$BG_P\", 
                    \"$PN\"                   
                    )";

                $requette1 = $bdd->prepare($sql1);
                $requette1->execute();            
                
                
                break;
        case "ECBU ATB":

            $Macroscopie = htmlspecialchars(strip_tags($data['Macroscopie']));
            $Volume = htmlspecialchars(strip_tags($data['Volume']));
            $Couleur_et_aspect_des_Urines = htmlspecialchars(strip_tags($data['Couleur_et_aspect_des_Urines']));
            $PH = htmlspecialchars(strip_tags($data['PH']));
            $Odeur = htmlspecialchars(strip_tags($data['Odeur']));
            $Viscositee = htmlspecialchars(strip_tags($data['Viscositee']));
            $Microscopie = htmlspecialchars(strip_tags($data['Microscopie']));
            $Cocci_Gram_M = htmlspecialchars(strip_tags($data['Cocci_Gram_M']));
            $Leucocytes = htmlspecialchars(strip_tags($data['Leucocytes']));
            $Cocci_Gram_P = htmlspecialchars(strip_tags($data['Cocci_Gram_P']));
            $Cellules_Epithelial = htmlspecialchars(strip_tags($data['Cellules_Epithelial']));
            $Bacciles_Gram_M = htmlspecialchars(strip_tags($data['Bacciles_Gram_M']));
            $Levures = htmlspecialchars(strip_tags($data['Levures']));
            $Bacciles_G_P = htmlspecialchars(strip_tags($data['Bacciles_G_P']));
            $Polynucleaires = htmlspecialchars(strip_tags($data['Polynucleaires']));
            $Trichomonas = htmlspecialchars(strip_tags($data['Trichomonas']));
            $Cepitheliales = htmlspecialchars(strip_tags($data['Cepitheliales']));
            $Cristaux = htmlspecialchars(strip_tags($data['Cristaux']));
            $Culture = htmlspecialchars(strip_tags($data['Culture']));
            $Sensibles = htmlspecialchars(strip_tags($data['Sensibles']));
            $Germes_Isolees = htmlspecialchars(strip_tags($data['Germes_Isolees']));
            $Intermediaires = htmlspecialchars(strip_tags($data['Intermediaires']));
            $Resistants = htmlspecialchars(strip_tags($data['Resistants']));
            $conclusion = htmlspecialchars(strip_tags($data['conclusion']));

            // on chiffre tous ca

            $Macroscopie = openssl_encrypt($Macroscopie, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Volume = openssl_encrypt($Volume, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Couleur_et_aspect_des_Urines = openssl_encrypt($Couleur_et_aspect_des_Urines, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $PH = openssl_encrypt($PH, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Odeur = openssl_encrypt($Odeur, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Viscositee = openssl_encrypt($Viscositee, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Microscopie = openssl_encrypt($Microscopie, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cocci_Gram_M = openssl_encrypt($Cocci_Gram_M, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Leucocytes = openssl_encrypt($Leucocytes, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cocci_Gram_P = openssl_encrypt($Cocci_Gram_P, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cellules_Epithelial = openssl_encrypt($Cellules_Epithelial, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Bacciles_Gram_M = openssl_encrypt($Bacciles_Gram_M, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Levures = openssl_encrypt($Levures, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Bacciles_G_P = openssl_encrypt($Bacciles_G_P, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Polynucleaires = openssl_encrypt($Polynucleaires, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Trichomonas = openssl_encrypt($Trichomonas, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cepitheliales = openssl_encrypt($Cepitheliales, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cristaux = openssl_encrypt($Cristaux, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Culture = openssl_encrypt($Culture, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Sensibles = openssl_encrypt($Sensibles, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Germes_Isolees = openssl_encrypt($Germes_Isolees, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Intermediaires = openssl_encrypt($Intermediaires, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Resistants = openssl_encrypt($Resistants, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $conclusion = openssl_encrypt($conclusion, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

            $sql1 = "INSERT INTO `ecbu_atb`(
                `DateExam`, 
                `true_date`, 
                `Macroscopie`, 
                `Volume`, 
                `Couleur_et_aspect_des_Urines`, 
                `PH`, 
                `Odeur`, 
                `Viscositee`, 
                `Microscopie`, 
                `Cocci_Gram_M`, 
                `Leucocytes`, 
                `Cocci_Gram_P`, 
                `Cellules_Epithelial`, 
                `Bacciles_Gram_M`, 
                `Levures`, 
                `Bacciles_G_P`, 
                `Polynucleaires`, 
                `Trichomonas`,
                `Cepitheliales`, 
                `Cristaux`, 
                `Culture`, 
                `Sensibles`, 
                `Germes_Isolees`, 
                `Intermediaires`, 
                `Resistants`,
                `conclusion`
                ) VALUES (
                    \"$DateExam\", 
                    \"$true_date\", 
                    \"$Macroscopie\",
                    \"$Volume\",
                    \"$Couleur_et_aspect_des_Urines\",
                    \"$PH\",
                    \"$Odeur\",
                    \"$Viscositee\",
                    \"$Microscopie\",
                    \"$Cocci_Gram_M\",
                    \"$Leucocytes\",
                    \"$Cocci_Gram_P\",
                    \"$Cellules_Epithelial\",
                    \"$Bacciles_Gram_M\",
                    \"$Levures\",
                    \"$Bacciles_G_P\",
                    \"$Polynucleaires\",
                    \"$Trichomonas\",
                    \"$Cepitheliales\",
                    \"$Cristaux\",
                    \"$Culture\",
                    \"$Sensibles\",
                    \"$Germes_Isolees\",
                    \"$Intermediaires\",
                    \"$Resistants\",   
                    \"$conclusion\"   
                    )";

                $requette1 = $bdd->prepare($sql1);
                $requette1->execute();    
                            
            break;
        case "PARASITOLOGIE":
            $Selles_KOAP = htmlspecialchars(strip_tags($data['Selles_KOAP']));
            $Goute_Epaisse = htmlspecialchars(strip_tags($data['Goute_Epaisse']));
            $RFM_SKIN_SNIP = htmlspecialchars(strip_tags($data['RFM_SKIN_SNIP']));
            
            // on chiffre tous ca

            $Selles_KOAP = openssl_encrypt($Selles_KOAP, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Goute_Epaisse = openssl_encrypt($Goute_Epaisse, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $RFM_SKIN_SNIP = openssl_encrypt($RFM_SKIN_SNIP, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

            $sql1 = "INSERT INTO `parasitologie`(
                `DateExam`, 
                `true_date`, 
                `Selles_KOAP`, 
                `Goute_Epaisse`, 
                `RFM_SKIN_SNIP`
                ) VALUES (
                    \"$DateExam\", 
                    \"$true_date\", 
                    \"$Selles_KOAP\", 
                    \"$Goute_Epaisse\", 
                    \"$RFM_SKIN_SNIP\"
                    )";

            $requette1 = $bdd->prepare($sql1);
            $requette1->execute();    

            break;
        case "Substrat de biochimie sanguine":

            $UREE = htmlspecialchars(strip_tags($data['UREE']));
            $CREATININE = htmlspecialchars(strip_tags($data['CREATININE']));
            $ACIDE_URIQUE = htmlspecialchars(strip_tags($data['ACIDE_URIQUE']));
            $ALBUMINE_SANGUIN = htmlspecialchars(strip_tags($data['ALBUMINE_SANGUIN']));
            $GLYCEMIE_URGENCE = htmlspecialchars(strip_tags($data['GLYCEMIE_URGENCE']));
            $GLYCEMIE_A_JEUNE = htmlspecialchars(strip_tags($data['GLYCEMIE_A_JEUNE']));
            $GLYCEMIE_POST_PRANDIALE = htmlspecialchars(strip_tags($data['GLYCEMIE_POST_PRANDIALE']));
                   
            // on chiffre tous ca

            $UREE = openssl_encrypt($UREE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $CREATININE = openssl_encrypt($CREATININE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $ACIDE_URIQUE = openssl_encrypt($ACIDE_URIQUE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $ALBUMINE_SANGUIN = openssl_encrypt($ALBUMINE_SANGUIN, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $GLYCEMIE_URGENCE = openssl_encrypt($GLYCEMIE_URGENCE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $GLYCEMIE_A_JEUNE = openssl_encrypt($GLYCEMIE_A_JEUNE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $GLYCEMIE_POST_PRANDIALE = openssl_encrypt($GLYCEMIE_POST_PRANDIALE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            

            $sql1 = "INSERT INTO `substrat_biochimie_sanguine`(
                `DateExam`, 
                `true_date`, 
                `UREE`, 
                `CREATININE`, 
                `ACIDE_URIQUE`, 
                `ALBUMINE_SANGUIN`, 
                `GLYCEMIE_URGENCE`, 
                `GLYCEMIE_A_JEUNE`, 
                `GLYCEMIE_POST_PRANDIALE`
                ) VALUES (
                    \"$DateExam\", 
                    \"$true_date\", 
                    \"$UREE\", 
                    \"$CREATININE\", 
                    \"$ACIDE_URIQUE\", 
                    \"$ALBUMINE_SANGUIN\", 
                    \"$GLYCEMIE_URGENCE\", 
                    \"$GLYCEMIE_A_JEUNE\", 
                    \"$GLYCEMIE_POST_PRANDIALE\"                   
                )";            
                    
                $requette1 = $bdd->prepare($sql1);
                $requette1->execute();    
                
                break;


        case "HEMATOLOGIE":
            
            $Groupe_sanguin_et_rhesus = htmlspecialchars(strip_tags($data['Groupe_sanguin_et_rhesus']));
            $Electrophorese_HB = htmlspecialchars(strip_tags($data['Electrophorese_HB']));
            $TS = htmlspecialchars(strip_tags($data['TS']));
            $TC = htmlspecialchars(strip_tags($data['TC']));
            $VS = htmlspecialchars(strip_tags($data['VS']));
                   
            // on chiffre tous ca

            $Groupe_sanguin_et_rhesus = openssl_encrypt($Groupe_sanguin_et_rhesus, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Electrophorese_HB = openssl_encrypt($Electrophorese_HB, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $TS = openssl_encrypt($TS, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $TC = openssl_encrypt($TC, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $VS = openssl_encrypt($VS, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            

            $sql1 = "INSERT INTO `hematologie`(
                `DateExam`, 
                `true_date`, 
                `Groupe_sanguin_et_rhesus`, 
                `Electrophorese_HB`, 
                `TS`, 
                `TC`, 
                `VS` 
                ) VALUES (
                    \"$DateExam\", 
                    \"$true_date\", 
                    \"$Groupe_sanguin_et_rhesus\", 
                    \"$Electrophorese_HB\", 
                    \"$TS\", 
                    \"$TC\", 
                    \"$VS\"
                    )";

            $requette1 = $bdd->prepare($sql1);
            $requette1->execute();  

            break;
        case "PROFILE LIPIDIQUE":

            $CHOLESTEROL_T = htmlspecialchars(strip_tags($data['CHOLESTEROL_T']));
            $TRYCLYCERIDES = htmlspecialchars(strip_tags($data['TRYCLYCERIDES']));
            $HDL = htmlspecialchars(strip_tags($data['HDL']));
            $LDL = htmlspecialchars(strip_tags($data['LDL']));
                   
            // on chiffre tous ca

            $CHOLESTEROL_T = openssl_encrypt($CHOLESTEROL_T, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $TRYCLYCERIDES = openssl_encrypt($TRYCLYCERIDES, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $HDL = openssl_encrypt($HDL, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $LDL = openssl_encrypt($LDL, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            

            $sql1 = "INSERT INTO `profile_lipidique`(
                `DateExam`, 
                `true_date`, 
                `CHOLESTEROL_T`, 
                `TRYCLYCERIDES`, 
                `HDL`, 
                `LDL` 
                ) VALUES (
                    \"$DateExam\", 
                    \"$true_date\", 
                    \"$CHOLESTEROL_T\", 
                    \"$TRYCLYCERIDES\", 
                    \"$HDL\", 
                    \"$LDL\"
                    )";
            $requette1 = $bdd->prepare($sql1);
            $requette1->execute();  


            break;
        case "Enzymes Hepathiques":
            $SGOT_ASAT = htmlspecialchars(strip_tags($data['SGOT_ASAT']));
            $SGPT_ALAT = htmlspecialchars(strip_tags($data['SGPT_ALAT']));
                   
            // on chiffre tous ca

            $SGOT_ASAT = openssl_encrypt($SGOT_ASAT, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $SGPT_ALAT = openssl_encrypt($SGPT_ALAT, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            

            $sql1 = "INSERT INTO `enzymes_hepathiques`(
                `DateExam`, 
                `true_date`, 
                `SGOT_ASAT`, 
                `SGPT_ALAT` 
                ) VALUES (
                    \"$DateExam\", 
                    \"$true_date\", 
                    \"$SGOT_ASAT\", 
                    \"$SGPT_ALAT\"
                    )";

            $requette1 = $bdd->prepare($sql1);
            $requette1->execute();
            break;

        case "Serologie":
            $CRP = htmlspecialchars(strip_tags($data['CRP']));
            $ASLO = htmlspecialchars(strip_tags($data['ASLO']));
            $H_Pylori = htmlspecialchars(strip_tags($data['H_Pylori']));
            $VDRL_TPHA = htmlspecialchars(strip_tags($data['VDRL_TPHA']));
            $Ag_Hbs = htmlspecialchars(strip_tags($data['Ag_Hbs']));
            $Ac_HCV = htmlspecialchars(strip_tags($data['Ac_HCV']));
            $G_Test = htmlspecialchars(strip_tags($data['G_Test']));
            $HIV = htmlspecialchars(strip_tags($data['HIV']));
            $CHLAMYDIA = htmlspecialchars(strip_tags($data['CHLAMYDIA']));
            $TOXOPLASMOSE = htmlspecialchars(strip_tags($data['TOXOPLASMOSE']));
            $RUBEOLE = htmlspecialchars(strip_tags($data['RUBEOLE']));
            $WIDAL_FELIX = htmlspecialchars(strip_tags($data['WIDAL_FELIX']));
            
            // on chiffre tous ca

            $CRP = openssl_encrypt($CRP, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $ASLO = openssl_encrypt($ASLO, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $H_Pylori = openssl_encrypt($H_Pylori, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $VDRL_TPHA = openssl_encrypt($VDRL_TPHA, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Ag_Hbs = openssl_encrypt($Ag_Hbs, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Ac_HCV = openssl_encrypt($Ac_HCV, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $G_Test = openssl_encrypt($G_Test, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $HIV = openssl_encrypt($HIV, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $CHLAMYDIA = openssl_encrypt($CHLAMYDIA, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $TOXOPLASMOSE = openssl_encrypt($TOXOPLASMOSE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $RUBEOLE = openssl_encrypt($RUBEOLE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $WIDAL_FELIX = openssl_encrypt($WIDAL_FELIX, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            

            $sql1 = "INSERT INTO `serologie`(
                `DateExam`, 
                `true_date`, 
                `CRP`,
                `ASLO`,
                `H_Pylori`,
                `VDRL_TPHA`,
                `Ag_Hbs`,
                `Ac_HCV`,
                `G_Test`,
                `HIV`,
                `CHLAMYDIA`,
                `TOXOPLASMOSE`,
                `RUBEOLE`,
                `WIDAL_FELIX`
                ) VALUES (
                    \"$DateExam\",
                    \"$true_date\",
                    \"$CRP\",
                    \"$ASLO\",
                    \"$H_Pylori\",
                    \"$VDRL_TPHA\",
                    \"$Ag_Hbs\",
                    \"$Ac_HCV\",
                    \"$G_Test\",
                    \"$HIV\",
                    \"$CHLAMYDIA\",
                    \"$TOXOPLASMOSE\",
                    \"$RUBEOLE\",
                    \"$WIDAL_FELIX\"
                    )
            ";

            $requette1 = $bdd->prepare($sql1);
            $requette1->execute();


            break;

        case "BANDELETTE URINAIRE":
            
            $PROTEINE = htmlspecialchars(strip_tags($data['PROTEINE']));
            $NITRITES = htmlspecialchars(strip_tags($data['NITRITES']));
            $GLUCOSE = htmlspecialchars(strip_tags($data['GLUCOSE']));
            $CETONES = htmlspecialchars(strip_tags($data['CETONES']));
            $BILIRUBINE = htmlspecialchars(strip_tags($data['BILIRUBINE']));
            $LEUCOCYTES = htmlspecialchars(strip_tags($data['LEUCOCYTES']));
            $HEMATIES = htmlspecialchars(strip_tags($data['HEMATIES']));
            $HUROBILINOGENE = htmlspecialchars(strip_tags($data['HUROBILINOGENE']));
            $DENSITE = htmlspecialchars(strip_tags($data['DENSITE']));
            $PH = htmlspecialchars(strip_tags($data['PH']));
            
            // on chiffre tous ca

            $PROTEINE = openssl_encrypt($PROTEINE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $NITRITES = openssl_encrypt($NITRITES, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $GLUCOSE = openssl_encrypt($GLUCOSE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $CETONES = openssl_encrypt($CETONES, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $BILIRUBINE = openssl_encrypt($BILIRUBINE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $LEUCOCYTES = openssl_encrypt($LEUCOCYTES, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $HEMATIES = openssl_encrypt($HEMATIES, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $HUROBILINOGENE = openssl_encrypt($HUROBILINOGENE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $DENSITE = openssl_encrypt($DENSITE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $PH = openssl_encrypt($PH, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            

            $sql1 = "INSERT INTO `bandelette_urinaire`(
                `DateExam`, 
                `true_date`, 
                `PROTEINE`,
                `NITRITES`,
                `GLUCOSE`,
                `CETONES`,
                `BILIRUBINE`,
                `LEUCOCYTES`,
                `HEMATIES`,
                `HUROBILINOGENE`,
                `DENSITE`,
                `PH`
                ) VALUES (
                    \"$DateExam\",
                    \"$true_date\",
                    \"$PROTEINE\",
                    \"$NITRITES\",
                    \"$GLUCOSE\",
                    \"$CETONES\",
                    \"$BILIRUBINE\",
                    \"$LEUCOCYTES\",
                    \"$HEMATIES\",
                    \"$HUROBILINOGENE\",
                    \"$DENSITE\",
                    \"$PH\"
                    )
            ";

            $requette1 = $bdd->prepare($sql1);
            $requette1->execute();

            break;

        case "PCV":

            $Col = htmlspecialchars(strip_tags($data['Col']));
            $LEUCORHEES = htmlspecialchars(strip_tags($data['LEUCORHEES']));
            $TEST_A_LA_PROSTATE = htmlspecialchars(strip_tags($data['TEST_A_LA_PROSTATE']));
            $PH = htmlspecialchars(strip_tags($data['PH']));
            $CELLULES_EPITH = htmlspecialchars(strip_tags($data['CELLULES_EPITH']));
            $LEUCOCYTES = htmlspecialchars(strip_tags($data['LEUCOCYTES']));
            $LEVURES = htmlspecialchars(strip_tags($data['LEVURES']));
            $TRICHOMONAS_VAGINALE = htmlspecialchars(strip_tags($data['TRICHOMONAS_VAGINALE']));
            $CG_M = htmlspecialchars(strip_tags($data['CG_M']));
            $CG_P = htmlspecialchars(strip_tags($data['CG_P']));
            $BG_M = htmlspecialchars(strip_tags($data['BG_M']));
            $BG_P = htmlspecialchars(strip_tags($data['BG_P']));
            $COCOBACILLES = htmlspecialchars(strip_tags($data['COCOBACILLES']));
            $CLUE_CELL = htmlspecialchars(strip_tags($data['CLUE_CELL']));
            $FLORE_DE_DODERLEIN_Type = htmlspecialchars(strip_tags($data['FLORE_DE_DODERLEIN_Type']));
            
            // on chiffre tous ca

            $Col = openssl_encrypt($Col, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $LEUCORHEES = openssl_encrypt($LEUCORHEES, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $TEST_A_LA_PROSTATE = openssl_encrypt($TEST_A_LA_PROSTATE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $PH = openssl_encrypt($PH, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $CELLULES_EPITH = openssl_encrypt($CELLULES_EPITH, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $LEUCOCYTES = openssl_encrypt($LEUCOCYTES, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $LEVURES = openssl_encrypt($LEVURES, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $TRICHOMONAS_VAGINALE = openssl_encrypt($TRICHOMONAS_VAGINALE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $CG_M = openssl_encrypt($CG_M, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $CG_P = openssl_encrypt($CG_P, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $BG_M = openssl_encrypt($BG_M, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $BG_P = openssl_encrypt($BG_P, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $COCOBACILLES = openssl_encrypt($COCOBACILLES, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $CLUE_CELL = openssl_encrypt($CLUE_CELL, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $FLORE_DE_DODERLEIN_Type = openssl_encrypt($FLORE_DE_DODERLEIN_Type, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
            $sql1 = "INSERT INTO `pcv`(
                `DateExam`, 
                `true_date`, 
                `Col`, 
                `LEUCORHEES`, 
                `TEST_A_LA_PROSTATE`, 
                `PH`, 
                `CELLULES_EPITH`, 
                `LEUCOCYTES`, 
                `LEVURES`, 
                `TRICHOMONAS_VAGINALE`, 
                `CG_M`, 
                `CG_P`, 
                `BG_M`, 
                `BG_P`, 
                `COCOBACILLES`, 
                `CLUE_CELL`, 
                `FLORE_DE_DODERLEIN_Type`
                ) VALUES (
                    \"$DateExam\", 
                    \"$true_date\", 
                    \"$Col\",
                    \"$LEUCORHEES\",
                    \"$TEST_A_LA_PROSTATE\",
                    \"$PH\",
                    \"$CELLULES_EPITH\",
                    \"$LEUCOCYTES\",
                    \"$LEVURES\",
                    \"$TRICHOMONAS_VAGINALE\",
                    \"$CG_M\",
                    \"$CG_P\",
                    \"$BG_M\",
                    \"$BG_P\",
                    \"$COCOBACILLES\",
                    \"$CLUE_CELL\",
                    \"$FLORE_DE_DODERLEIN_Type\"
                    )";

                $requette1 = $bdd->prepare($sql1);
                $requette1->execute();    

            break;

        case "Innogramme sanguin":

            $SODIUM = htmlspecialchars(strip_tags($data['SODIUM']));
            $POTASSIUM = htmlspecialchars(strip_tags($data['POTASSIUM']));
            $CHLORURE = htmlspecialchars(strip_tags($data['CHLORURE']));
            $CALCIUM = htmlspecialchars(strip_tags($data['CALCIUM']));
            $MAGNESIUM = htmlspecialchars(strip_tags($data['MAGNESIUM']));
                
            // on chiffre tous ca

            $SODIUM = openssl_encrypt($SODIUM, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $POTASSIUM = openssl_encrypt($POTASSIUM, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $CHLORURE = openssl_encrypt($CHLORURE, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $CALCIUM = openssl_encrypt($CALCIUM, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $MAGNESIUM = openssl_encrypt($MAGNESIUM, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');


            $sql1 = "INSERT INTO `innogramme_sanguin`(
                `DateExam`, 
                `true_date`, 
                `SODIUM`, 
                `POTASSIUM`, 
                `CHLORURE`, 
                `CALCIUM`, 
                `MAGNESIUM` 
                ) VALUES (
                    \"$DateExam\", 
                    \"$true_date\", 
                    \"$SODIUM\", 
                    \"$POTASSIUM\", 
                    \"$CHLORURE\", 
                    \"$CALCIUM\", 
                    \"$MAGNESIUM\"
                    )";

            $requette1 = $bdd->prepare($sql1);
            $requette1->execute();  


            break;

        case "Frottis sanguin":
            
            $Polynucleaire_Neutrophile = htmlspecialchars(strip_tags($data['Polynucleaire_Neutrophile']));
            $Polynucleaire_Eosinophile = htmlspecialchars(strip_tags($data['Polynucleaire_Eosinophile']));
            $Polynucleaire_Basophile = htmlspecialchars(strip_tags($data['Polynucleaire_Basophile']));
            $Mononucleaire_Monocyte = htmlspecialchars(strip_tags($data['Mononucleaire_Monocyte']));
            $Mononucleaire_Lymohocytes = htmlspecialchars(strip_tags($data['Mononucleaire_Lymohocytes']));
                
            // on chiffre tous ca

            $Polynucleaire_Neutrophile = openssl_encrypt($Polynucleaire_Neutrophile, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Polynucleaire_Eosinophile = openssl_encrypt($Polynucleaire_Eosinophile, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Polynucleaire_Basophile = openssl_encrypt($Polynucleaire_Basophile, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Mononucleaire_Monocyte = openssl_encrypt($Mononucleaire_Monocyte, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Mononucleaire_Lymohocytes = openssl_encrypt($Mononucleaire_Lymohocytes, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');


            $sql1 = "INSERT INTO `frottis_sanguin`(
                `DateExam`, 
                `true_date`, 
                `Polynucleaire_Neutrophile`, 
                `Polynucleaire_Eosinophile`, 
                `Polynucleaire_Basophile`, 
                `Mononucleaire_Monocyte`, 
                `Mononucleaire_Lymohocytes` 
                ) VALUES (
                    \"$DateExam\", 
                    \"$true_date\", 
                    \"$Polynucleaire_Neutrophile\", 
                    \"$Polynucleaire_Eosinophile\", 
                    \"$Polynucleaire_Basophile\", 
                    \"$Mononucleaire_Monocyte\", 
                    \"$Mononucleaire_Lymohocytes\"
                    )";

            $requette1 = $bdd->prepare($sql1);
            $requette1->execute();  


            break;
        case "GE":

            $WIDAL_FELIX = htmlspecialchars(strip_tags($data['WIDAL_FELIX']));
            $CRP = htmlspecialchars(strip_tags($data['CRP']));
            $Goutte_Epaisse = htmlspecialchars(strip_tags($data['Goutte_Epaisse']));
            $Selles_KOAP = htmlspecialchars(strip_tags($data['Selles_KOAP']));
                   
            // on chiffre tous ca

            $WIDAL_FELIX = openssl_encrypt($WIDAL_FELIX, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $CRP = openssl_encrypt($CRP, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Goutte_Epaisse = openssl_encrypt($Goutte_Epaisse, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Selles_KOAP = openssl_encrypt($Selles_KOAP, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            

            $sql1 = "INSERT INTO `ge`(
                `DateExam`, 
                `true_date`, 
                `WIDAL_FELIX`, 
                `CRP`, 
                `Goutte_Epaisse`, 
                `Selles_KOAP`
                ) VALUES (
                    \"$DateExam\", 
                    \"$true_date\", 
                    \"$WIDAL_FELIX\", 
                    \"$CRP\", 
                    \"$Goutte_Epaisse\", 
                    \"$Selles_KOAP\"
                    )";

            $requette1 = $bdd->prepare($sql1);
            $requette1->execute();  
            break;

        case "PCV ATB":

            $Macroscopie = htmlspecialchars(strip_tags($data['Macroscopie']));
            $Aspect_des_Leucorhees = htmlspecialchars(strip_tags($data['Aspect_des_Leucorhees']));
            $Aspect_du_Col = htmlspecialchars(strip_tags($data['Aspect_du_Col']));
            $PH = htmlspecialchars(strip_tags($data['PH']));
            $KOH = htmlspecialchars(strip_tags($data['KOH']));
            $Microscopie = htmlspecialchars(strip_tags($data['Microscopie']));
            $Cocci_Gram_M = htmlspecialchars(strip_tags($data['Cocci_Gram_M']));
            $Leucocytes = htmlspecialchars(strip_tags($data['Leucocytes']));
            $Cocci_Gram_P = htmlspecialchars(strip_tags($data['Cocci_Gram_P']));
            $Hematies = htmlspecialchars(strip_tags($data['Hematies']));
            $Flore_du_type = htmlspecialchars(strip_tags($data['Flore_du_type']));
            $Cellules_Epithelial = htmlspecialchars(strip_tags($data['Cellules_Epithelial']));
            $Bacciles_Gram_M = htmlspecialchars(strip_tags($data['Bacciles_Gram_M']));
            $Levures = htmlspecialchars(strip_tags($data['Levures']));
            $Bacciles_G_P = htmlspecialchars(strip_tags($data['Bacciles_G_P']));
            $Polynucleaires = htmlspecialchars(strip_tags($data['Polynucleaires']));
            $Trichomonas = htmlspecialchars(strip_tags($data['Trichomonas']));
            $Cepitheliales = htmlspecialchars(strip_tags($data['Cepitheliales']));
            $Culture = htmlspecialchars(strip_tags($data['Culture']));
            $Sensibles = htmlspecialchars(strip_tags($data['Sensibles']));
            $Germes_Isolees = htmlspecialchars(strip_tags($data['Germes_Isolees']));
            $Intermediaires = htmlspecialchars(strip_tags($data['Intermediaires']));
            $Resistants = htmlspecialchars(strip_tags($data['Resistants']));
            $conclusion = htmlspecialchars(strip_tags($data['conclusion']));

            // on chiffre tous ca

            $Macroscopie = openssl_encrypt($Macroscopie, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Aspect_des_Leucorhees = openssl_encrypt($Aspect_des_Leucorhees, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Aspect_du_Col = openssl_encrypt($Aspect_du_Col, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $PH = openssl_encrypt($PH, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $KOH = openssl_encrypt($KOH, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Microscopie = openssl_encrypt($Microscopie, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cocci_Gram_M = openssl_encrypt($Cocci_Gram_M, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Leucocytes = openssl_encrypt($Leucocytes, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cocci_Gram_P = openssl_encrypt($Cocci_Gram_P, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Hematies = openssl_encrypt($Hematies, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Flore_du_type = openssl_encrypt($Flore_du_type, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cellules_Epithelial = openssl_encrypt($Cellules_Epithelial, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Bacciles_Gram_M = openssl_encrypt($Bacciles_Gram_M, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Levures = openssl_encrypt($Levures, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Bacciles_G_P = openssl_encrypt($Bacciles_G_P, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Polynucleaires = openssl_encrypt($Polynucleaires, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Trichomonas = openssl_encrypt($Trichomonas, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cepitheliales = openssl_encrypt($Cepitheliales, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Culture = openssl_encrypt($Culture, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Sensibles = openssl_encrypt($Sensibles, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Germes_Isolees = openssl_encrypt($Germes_Isolees, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Intermediaires = openssl_encrypt($Intermediaires, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Resistants = openssl_encrypt($Resistants, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $conclusion = openssl_encrypt($conclusion, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

            $sql1 = "INSERT INTO `pcv_atb`(
                `DateExam`, 
                `true_date`, 
                `Macroscopie`,
                `Aspect_des_Leucorhees`,
                `Aspect_du_Col`,
                `PH`,
                `KOH`,
                `Microscopie`,
                `Cocci_Gram_M`,
                `Leucocytes`,
                `Cocci_Gram_P`,
                `Hematies`,
                `Flore_du_type`,
                `Cellules_Epithelial`,
                `Bacciles_Gram_M`,
                `Levures`,
                `Bacciles_G_P`,
                `Polynucleaires`,
                `Trichomonas`,
                `Cepitheliales`,
                `Culture`,
                `Sensibles`,
                `Germes_Isolees`,
                `Intermediaires`,
                `Resistants`,
                `conclusion`
                ) VALUES (
                    \"$DateExam\",
                    \"$true_date\",
                    \"$Macroscopie\",
                    \"$Aspect_des_Leucorhees\",
                    \"$Aspect_du_Col\",
                    \"$PH\",
                    \"$KOH\",
                    \"$Microscopie\",
                    \"$Cocci_Gram_M\",
                    \"$Leucocytes\",
                    \"$Cocci_Gram_P\",
                    \"$Hematies\",
                    \"$Flore_du_type\",
                    \"$Cellules_Epithelial\",
                    \"$Bacciles_Gram_M\",
                    \"$Levures\",
                    \"$Bacciles_G_P\",
                    \"$Polynucleaires\",
                    \"$Trichomonas\",
                    \"$Cepitheliales\",
                    \"$Culture\",
                    \"$Sensibles\",
                    \"$Germes_Isolees\",
                    \"$Intermediaires\",
                    \"$Resistants\",
                    \"$conclusion\"
                    )
            ";

            $requette1 = $bdd->prepare($sql1);
            $requette1->execute();
            break;

        case "Pus ATB":

            $Macroscopie = htmlspecialchars(strip_tags($data['Macroscopie']));
            $Aspect_des_Pus = htmlspecialchars(strip_tags($data['Aspect_des_Pus']));
            $Microscopie = htmlspecialchars(strip_tags($data['Microscopie']));
            $Cocci_Gram_M = htmlspecialchars(strip_tags($data['Cocci_Gram_M']));
            $Cocci_Gram_P = htmlspecialchars(strip_tags($data['Cocci_Gram_P']));
            $Cellules_Epithelial = htmlspecialchars(strip_tags($data['Cellules_Epithelial']));
            $Bacciles_Gram_M = htmlspecialchars(strip_tags($data['Bacciles_Gram_M']));
            $Bacciles_G_P = htmlspecialchars(strip_tags($data['Bacciles_G_P']));
            $Polynucleaires = htmlspecialchars(strip_tags($data['Polynucleaires']));
            $Cepitheliales = htmlspecialchars(strip_tags($data['Cepitheliales']));
            $Culture = htmlspecialchars(strip_tags($data['Culture']));
            $Sensibles = htmlspecialchars(strip_tags($data['Sensibles']));
            $Germes_Isolees = htmlspecialchars(strip_tags($data['Germes_Isolees']));
            $Intermediaires = htmlspecialchars(strip_tags($data['Intermediaires']));
            $Resistants = htmlspecialchars(strip_tags($data['Resistants']));
            $conclusion = htmlspecialchars(strip_tags($data['conclusion']));

            // on chiffre tous ca

            $Macroscopie = openssl_encrypt($Macroscopie, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Aspect_des_Pus = openssl_encrypt($Aspect_des_Pus, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Microscopie = openssl_encrypt($Microscopie, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cocci_Gram_M = openssl_encrypt($Cocci_Gram_M, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cocci_Gram_P = openssl_encrypt($Cocci_Gram_P, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cellules_Epithelial = openssl_encrypt($Cellules_Epithelial, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Bacciles_Gram_M = openssl_encrypt($Bacciles_Gram_M, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Bacciles_G_P = openssl_encrypt($Bacciles_G_P, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Polynucleaires = openssl_encrypt($Polynucleaires, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cepitheliales = openssl_encrypt($Cepitheliales, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Culture = openssl_encrypt($Culture, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Sensibles = openssl_encrypt($Sensibles, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Germes_Isolees = openssl_encrypt($Germes_Isolees, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Intermediaires = openssl_encrypt($Intermediaires, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Resistants = openssl_encrypt($Resistants, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $conclusion = openssl_encrypt($conclusion, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

            $sql1 = "INSERT INTO `pus_atb`(
                `DateExam`, 
                `true_date`, 
                `Macroscopie`,
                `Aspect_des_Pus`,
                `Microscopie`,
                `Cocci_Gram_M`,
                `Cocci_Gram_P`,
                `Cellules_Epithelial`,
                `Bacciles_Gram_M`,
                `Bacciles_G_P`,
                `Polynucleaires`,
                `Cepitheliales`,
                `Culture`,
                `Sensibles`,
                `Germes_Isolees`,
                `Intermediaires`,
                `Resistants`,
                `conclusion`
                ) VALUES (
                    \"$DateExam\",
                    \"$true_date\",
                    \"$Macroscopie\",
                    \"$Aspect_des_Pus\",
                    \"$Microscopie\",
                    \"$Cocci_Gram_M\",
                    \"$Cocci_Gram_P\",
                    \"$Cellules_Epithelial\",
                    \"$Bacciles_Gram_M\",
                    \"$Bacciles_G_P\",
                    \"$Polynucleaires\",
                    \"$Cepitheliales\",
                    \"$Culture\",
                    \"$Sensibles\",
                    \"$Germes_Isolees\",
                    \"$Intermediaires\",
                    \"$Resistants\",
                    \"$conclusion\"
                    )
            ";

            $requette1 = $bdd->prepare($sql1);
            $requette1->execute();
            break;

        case "Spermoculture":

            $Macroscopie = htmlspecialchars(strip_tags($data['Macroscopie']));
            $Volume = htmlspecialchars(strip_tags($data['Volume']));
            $PH = htmlspecialchars(strip_tags($data['PH']));
            $Odeur = htmlspecialchars(strip_tags($data['Odeur']));
            $Viscositee = htmlspecialchars(strip_tags($data['Viscositee']));
            $Microscopie = htmlspecialchars(strip_tags($data['Microscopie']));
            $Cocci_Gram_M = htmlspecialchars(strip_tags($data['Cocci_Gram_M']));
            $Leucocytes = htmlspecialchars(strip_tags($data['Leucocytes']));
            $Cocci_Gram_P = htmlspecialchars(strip_tags($data['Cocci_Gram_P']));
            $Cellules_Epithelial = htmlspecialchars(strip_tags($data['Cellules_Epithelial']));
            $Bacciles_Gram_M = htmlspecialchars(strip_tags($data['Bacciles_Gram_M']));
            $Levures = htmlspecialchars(strip_tags($data['Levures']));
            $Bacciles_G_P = htmlspecialchars(strip_tags($data['Bacciles_G_P']));
            $Polynucleaires = htmlspecialchars(strip_tags($data['Polynucleaires']));
            $Cepitheliales = htmlspecialchars(strip_tags($data['Cepitheliales']));
            $Culture = htmlspecialchars(strip_tags($data['Culture']));
            $Sensibles = htmlspecialchars(strip_tags($data['Sensibles']));
            $Germes_Isolees = htmlspecialchars(strip_tags($data['Germes_Isolees']));
            $Intermediaires = htmlspecialchars(strip_tags($data['Intermediaires']));
            $Resistants = htmlspecialchars(strip_tags($data['Resistants']));
            $conclusion = htmlspecialchars(strip_tags($data['conclusion']));

            // on chiffre tous ca

            $Macroscopie = openssl_encrypt($Macroscopie, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Volume = openssl_encrypt($Volume, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $PH = openssl_encrypt($PH, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Odeur = openssl_encrypt($Odeur, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Viscositee = openssl_encrypt($Viscositee, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Microscopie = openssl_encrypt($Microscopie, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cocci_Gram_M = openssl_encrypt($Cocci_Gram_M, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Leucocytes = openssl_encrypt($Leucocytes, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cocci_Gram_P = openssl_encrypt($Cocci_Gram_P, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cellules_Epithelial = openssl_encrypt($Cellules_Epithelial, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Bacciles_Gram_M = openssl_encrypt($Bacciles_Gram_M, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Levures = openssl_encrypt($Levures, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Bacciles_G_P = openssl_encrypt($Bacciles_G_P, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Polynucleaires = openssl_encrypt($Polynucleaires, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Cepitheliales = openssl_encrypt($Cepitheliales, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Culture = openssl_encrypt($Culture, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Sensibles = openssl_encrypt($Sensibles, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Germes_Isolees = openssl_encrypt($Germes_Isolees, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Intermediaires = openssl_encrypt($Intermediaires, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $Resistants = openssl_encrypt($Resistants, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $conclusion = openssl_encrypt($conclusion, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

            $sql1 = "INSERT INTO `spermoculture`(
                `DateExam`, 
                `true_date`, 
                `Macroscopie`, 
                `Volume`, 
                `PH`, 
                `Odeur`, 
                `Viscositee`, 
                `Microscopie`, 
                `Cocci_Gram_M`, 
                `Leucocytes`, 
                `Cocci_Gram_P`, 
                `Cellules_Epithelial`, 
                `Bacciles_Gram_M`, 
                `Levures`, 
                `Bacciles_G_P`, 
                `Polynucleaires`, 
                `Cepitheliales`, 
                `Culture`, 
                `Sensibles`, 
                `Germes_Isolees`, 
                `Intermediaires`, 
                `Resistants`,
                `conclusion`
                ) VALUES (
                    \"$DateExam\", 
                    \"$true_date\", 
                    \"$Macroscopie\",
                    \"$Volume\",
                    \"$PH\",
                    \"$Odeur\",
                    \"$Viscositee\",
                    \"$Microscopie\",
                    \"$Cocci_Gram_M\",
                    \"$Leucocytes\",
                    \"$Cocci_Gram_P\",
                    \"$Cellules_Epithelial\",
                    \"$Bacciles_Gram_M\",
                    \"$Levures\",
                    \"$Bacciles_G_P\",
                    \"$Polynucleaires\",
                    \"$Cepitheliales\",
                    \"$Culture\",
                    \"$Sensibles\",
                    \"$Germes_Isolees\",
                    \"$Intermediaires\",
                    \"$Resistants\",   
                    \"$conclusion\"   
                    )";

                $requette1 = $bdd->prepare($sql1);
                $requette1->execute();    
            
            break;

        case "Test_Grocesse":

            $Beta_HCG_Plasmique = htmlspecialchars(strip_tags($data['Beta_HCG_Plasmique']));

            // on chiffre tous ca

            $Beta_HCG_Plasmique = openssl_encrypt($Beta_HCG_Plasmique, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            

            $sql1 = "INSERT INTO `test_grocesse`(
                `DateExam`, 
                `true_date`, 
                `Beta_HCG_Plasmique`
                ) VALUES (
                    \"$DateExam\", 
                    \"$true_date\", 
                    \"$Beta_HCG_Plasmique\"
                    )";

            $requette1 = $bdd->prepare($sql1);
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