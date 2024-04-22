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
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // $data = json_decode(file_get_contents('php://input'), true);
    
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

    $nameEcho = "Echographie endovaginale";

    if ($nameEcho === "Echographie Pelvienne/Endovaginale") {
        $idPatient = htmlspecialchars(strip_tags($data['idPatient']));
        $prescripteur = htmlspecialchars(strip_tags($data['prescripteur']));
        $dateExamen = htmlspecialchars(strip_tags($data['dateExamen']));
        $indicateur = htmlspecialchars(strip_tags($data['indicateur']));
        $typeMachine = htmlspecialchars(strip_tags($data['typeMachine']));
        $conditionExam = htmlspecialchars(strip_tags($data['conditionExam']));
        $typeSonde = htmlspecialchars(strip_tags($data['typeSonde']));
        $DDR = htmlspecialchars(strip_tags($data['DDR']));
       
        $uterusOrientation = htmlspecialchars(strip_tags($data['uterusOrientation']));
        $taille = htmlspecialchars(strip_tags($data['taille']));
        $myome = htmlspecialchars(strip_tags($data['myome']));
        $simyome_nombre = htmlspecialchars(strip_tags($data['simyome_nombre']));
        $localisation_et_taille_myome = htmlspecialchars(strip_tags($data['localisation_et_taille_myome']));
        $endometre_echogenecite = htmlspecialchars(strip_tags($data['endometre_echogenecite']));
        $endometre_epaisseur = htmlspecialchars(strip_tags($data['endometre_epaisseur']));
        $ovaire_gauche_structure = htmlspecialchars(strip_tags($data['ovaire_gauche_structure']));
        $ovaire_gauche_taille = htmlspecialchars(strip_tags($data['ovaire_gauche_taille']));
        $ovaire_gauche_nbr_follecues_entraux = htmlspecialchars(strip_tags($data['ovaire_gauche_nbr_follecues_entraux']));
        $ovaire_droite_structure = htmlspecialchars(strip_tags($data['ovaire_droite_structure']));
        $ovaire_droite_taille = htmlspecialchars(strip_tags($data['ovaire_droite_taille']));
        $ovaire_droite_nbr_follecules_entraux = htmlspecialchars(strip_tags($data['ovaire_droite_nbr_follecules_entraux']));
        $autres_Trouvailles = htmlspecialchars(strip_tags($data['autres_Trouvailles']));
        $conclusion = htmlspecialchars(strip_tags($data['conclusion']));
        $autresElements_de_conclusion = htmlspecialchars(strip_tags($data['autresElements_de_conclusion']));
        $idSaver = htmlspecialchars(strip_tags($data['idSaver']));
        // $status_buy = $data['status_buy']; 
        // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

        // on chiffre nos donnees

        $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

        $nameEcho = openssl_encrypt($nameEcho, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        // $idPatient = openssl_encrypt($idPatient, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $prescripteur = openssl_encrypt($prescripteur, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $dateExamen = openssl_encrypt($dateExamen, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $indicateur = openssl_encrypt($indicateur, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $typeMachine = openssl_encrypt($typeMachine, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $conditionExam = openssl_encrypt($conditionExam, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $typeSonde = openssl_encrypt($typeSonde, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $DDR = openssl_encrypt($DDR, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $uterusOrientation = openssl_encrypt($uterusOrientation, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $taille = openssl_encrypt($taille, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $myome = openssl_encrypt($myome, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $simyome_nombre = openssl_encrypt($simyome_nombre, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $localisation_et_taille_myome = openssl_encrypt($localisation_et_taille_myome, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $endometre_echogenecite = openssl_encrypt($endometre_echogenecite, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $endometre_epaisseur = openssl_encrypt($endometre_epaisseur, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $ovaire_gauche_structure = openssl_encrypt($ovaire_gauche_structure, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $ovaire_gauche_taille = openssl_encrypt($ovaire_gauche_taille, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $ovaire_gauche_nbr_follecues_entraux = openssl_encrypt($ovaire_gauche_nbr_follecues_entraux, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $ovaire_droite_structure = openssl_encrypt($ovaire_droite_structure, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $ovaire_droite_taille = openssl_encrypt($ovaire_droite_structure, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $ovaire_droite_nbr_follecules_entraux = openssl_encrypt($ovaire_droite_nbr_follecules_entraux, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $autres_Trouvailles = openssl_encrypt($autres_Trouvailles, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $conclusion = openssl_encrypt($conclusion, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $autresElements_de_conclusion = openssl_encrypt($autresElements_de_conclusion, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        
        // les requetes d'insertion

        $sql1 = "INSERT INTO `fiche_imagerie`(
        `code_patient_fi`, 
        `code_personnle_fi`, 
        `date_examen`, 
        `prescripteur`,
        `indicateur`, 
        `type_machine`, 
        `condition_examen`, 
        `type_sonde`, 
        `DDR`, 
        `uterus_orientation`, 
        `taille`, 
        `myometre`, 
        `si_myome_nombre`, 
        `localisation_et_taille_myome`,
        `Endometre_Echogeneticitee`, 
        `epaisseur_de_lendometre`, 
        `structure_de_lovaire_gauche`, 
        `taille_de_lovaire_gauche`, 
        `nombre_de_folecullecules_antraux_de_lovaire_gauche`, 
        `structure_de_lovaire_droite`, 
        `taille_de_lovaire_droite`, 
        `nombre_de_folecullecules_antraux_de_lovaire_droite`, 
        `Autre_trouvailles`, 
        `conclusion`, 
        `Autres_elements_de_conclusion`
        ) 
            VALUES 
        (:idPatient, 
        :idSaver,
        :dateExamen,
        :prescripteur,
        :indicateur,
        :typeMachine,
        :conditionExam,
        :typeSonde,
        :DDR,
        :uterusOrientation,
        :taille,
        :myome,
        :simyome_nombre,
        :localisation_et_taille_myome,
        :endometre_echogenecite,
        :endometre_epaisseur,
        :ovaire_gauche_structure,
        :ovaire_gauche_taille,
        :ovaire_gauche_nbr_follecues_entraux,
        :ovaire_droite_structure,
        :ovaire_droite_taille,
        :ovaire_droite_nbr_follecules_entraux,
        :autres_Trouvailles,
        :conclusion,
        :autresElements_de_conclusion);


        INSERT INTO `type_fiche`(`code_patient_fi_type`, `code_personnel_fi_type`, `type_fiche_imagerie`) VALUES (:idPatient, :idSaver, :nameEcho);
        ";

        $requette1 = $bdd->prepare($sql1);
        $requette1->bindParam(":idPatient", $idPatient);
        $requette1->bindParam(":idSaver", $idSaver);
        $requette1->bindParam(":dateExamen", $dateExamen);
        $requette1->bindParam(":prescripteur", $prescripteur);
        $requette1->bindParam(":indicateur", $indicateur);
        $requette1->bindParam(":typeMachine", $typeMachine);
        $requette1->bindParam(":conditionExam", $conditionExam);
        $requette1->bindParam(":typeSonde", $typeSonde);
        $requette1->bindParam(":DDR", $DDR);
        $requette1->bindParam(":uterusOrientation", $uterusOrientation);
        $requette1->bindParam(":taille", $taille);
        $requette1->bindParam(":myome", $myome);
        $requette1->bindParam(":simyome_nombre", $simyome_nombre);
        $requette1->bindParam(":localisation_et_taille_myome", $localisation_et_taille_myome);
        $requette1->bindParam(":endometre_echogenecite", $endometre_echogenecite);
        $requette1->bindParam(":endometre_epaisseur", $endometre_epaisseur);
        $requette1->bindParam(":ovaire_gauche_structure", $ovaire_gauche_structure);
        $requette1->bindParam(":ovaire_gauche_taille", $ovaire_gauche_taille);
        $requette1->bindParam(":ovaire_gauche_nbr_follecues_entraux", $ovaire_gauche_nbr_follecues_entraux);
        $requette1->bindParam(":ovaire_droite_structure", $ovaire_droite_taille);
        $requette1->bindParam(":ovaire_droite_taille", $ovaire_droite_taille);
        $requette1->bindParam(":ovaire_droite_nbr_follecules_entraux", $ovaire_droite_nbr_follecules_entraux);
        $requette1->bindParam(":autres_Trouvailles", $autres_Trouvailles);
        $requette1->bindParam(":conclusion", $conclusion);
        $requette1->bindParam(":autresElements_de_conclusion", $autresElements_de_conclusion);
        $requette1->bindParam(":nameEcho", $nameEcho);
        $requette1->execute();
    }
    if ($nameEcho === "Echographie Obstetricale depistage premier trimestre") {
        $idPatient = htmlspecialchars(strip_tags($data['idPatient']));
        $prescripteur = htmlspecialchars(strip_tags($data['prescripteur']));
        $dateExamen = htmlspecialchars(strip_tags($data['dateExamen']));
        $indicateur = htmlspecialchars(strip_tags($data['indicateur']));
        $typeMachine = htmlspecialchars(strip_tags($data['typeMachine']));
        $conditionExam = htmlspecialchars(strip_tags($data['conditionExam']));
        $typeSonde = htmlspecialchars(strip_tags($data['typeSonde']));
        $DDR = htmlspecialchars(strip_tags($data['DDR']));

        $uterusOrientation = htmlspecialchars(strip_tags($data['uterusOrientation']));
        $nombre_embryons = htmlspecialchars(strip_tags($data['nombre_embryons']));
        $taille = htmlspecialchars(strip_tags($data['taille']));
        $mobilitee_spontanee = htmlspecialchars(strip_tags($data['mobilitee_spontanee']));
        $activite_cardiaque = htmlspecialchars(strip_tags($data['activite_cardiaque']));
        $frequence_cardiaque = htmlspecialchars(strip_tags($data['frequence_cardiaque']));
        $longueur_cranio_codale = htmlspecialchars(strip_tags($data['longueur_cranio_codale']));
        $sac_gestationnelle = htmlspecialchars(strip_tags($data['sac_gestationnelle']));
        $epaisseur_de_la_clarte_nucale = htmlspecialchars(strip_tags($data['epaisseur_de_la_clarte_nucale']));
        $age_gestationnelle = htmlspecialchars(strip_tags($data['age_gestationnelle']));
        $date_probable_daccouchement = htmlspecialchars(strip_tags($data['date_probable_daccouchement']));
        $autres_Trouvailles = htmlspecialchars(strip_tags($data['autres_Trouvailles']));
        $conclusion = htmlspecialchars(strip_tags($data['conclusion']));
        $autresElements_de_conclusion = htmlspecialchars(strip_tags($data['autresElements_de_conclusion']));
        $idSaver = htmlspecialchars(strip_tags($data['idSaver']));
        // $status_buy = $data['status_buy']; 
        // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

        // on chiffre nos donnees

        $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

        $nameEcho = openssl_encrypt($nameEcho, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        // $idPatient = openssl_encrypt($idPatient, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $prescripteur = openssl_encrypt($prescripteur, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $dateExamen = openssl_encrypt($dateExamen, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $indicateur = openssl_encrypt($indicateur, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $typeMachine = openssl_encrypt($typeMachine, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $conditionExam = openssl_encrypt($conditionExam, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $typeSonde = openssl_encrypt($typeSonde, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $DDR = openssl_encrypt($DDR, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        
        $uterusOrientation = openssl_encrypt($uterusOrientation, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $taille = openssl_encrypt($taille, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $nombre_embryons = openssl_encrypt($nombre_embryons, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $mobilitee_spontanee = openssl_encrypt($mobilitee_spontanee, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $simyome_nombre = openssl_encrypt($simyome_nombre, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $activite_cardiaque = openssl_encrypt($activite_cardiaque, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $frequence_cardiaque = openssl_encrypt($frequence_cardiaque, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $longueur_cranio_codale = openssl_encrypt($longueur_cranio_codale, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $sac_gestationnelle = openssl_encrypt($sac_gestationnelle, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $epaisseur_de_la_clarte_nucale = openssl_encrypt($epaisseur_de_la_clarte_nucale, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $age_gestationnelle = openssl_encrypt($age_gestationnelle, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $date_probable_daccouchement = openssl_encrypt($date_probable_daccouchement, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $autres_Trouvailles = openssl_encrypt($autres_Trouvailles, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $conclusion = openssl_encrypt($conclusion, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $autresElements_de_conclusion = openssl_encrypt($autresElements_de_conclusion, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        
        // les requetes d'insertion

        $sql1 = "INSERT INTO `fiche_imagerie`(
        `code_patient_fi`, 
        `code_personnle_fi`, 
        `date_examen`,
        `prescripteur`, 
        `indicateur`, 
        `type_machine`, 
        `condition_examen`, 
        `type_sonde`, 
        `DDR`, 

        `uterus_orientation`, 
        `taille`,
        `nombre_dembryons`, 
        `mobilite_spontanee`,
        `activitee_cardiaque`,
        `frequence_cardiaque_en_BMP`,
        `longueur_cranio_caudale`,
        `sac_gestationnel_taille`,
        `epaisseur_de_la_clarte_nucale`,
        `age_gestationnel`, 
        `date_probable_daccouchement`, 
        `Autre_trouvailles`, 
        `conclusion`, 
        `Autres_elements_de_conclusion`
        ) 
            VALUES 
        (:idPatient, 
        :idSaver,
        :dateExamen,
        :prescripteur,
        :indicateur,
        :typeMachine,
        :conditionExam,
        :typeSonde,
        :DDR,

        :uterusOrientation,
        :taille,
        :nombre_dembryons,
        :mobilite_spontanee,
        :activitee_cardiaque,
        :frequence_cardiaque_en_BMP,
        :longueur_cranio_caudale,
        :sac_gestationnel_taille,
        :epaisseur_de_la_clarte_nucale,
        :age_gestationnel,
        :date_probable_daccouchement,
        :autres_Trouvailles,
        :conclusion,
        :autresElements_de_conclusion);


        INSERT INTO `type_fiche`(`code_patient_fi_type`, `code_personnel_fi_type`, `type_fiche_imagerie`) VALUES (:idPatient, :idSaver, :nameEcho);
        ";

        $requette1 = $bdd->prepare($sql1);
        $requette1->bindParam(":idPatient", $idPatient);
        $requette1->bindParam(":idSaver", $idSaver);
        $requette1->bindParam(":dateExamen", $dateExamen);
        $requette1->bindParam(":prescripteur", $prescripteur);
        $requette1->bindParam(":indicateur", $indicateur);
        $requette1->bindParam(":typeMachine", $typeMachine);
        $requette1->bindParam(":conditionExam", $conditionExam);
        $requette1->bindParam(":typeSonde", $typeSonde);
        $requette1->bindParam(":DDR", $DDR);

        $requette1->bindParam(":uterusOrientation", $uterusOrientation);
        $requette1->bindParam(":taille", $taille);
        $requette1->bindParam(":nombre_dembryons", $nombre_embryons);
        $requette1->bindParam(":mobilite_spontanee", $mobilitee_spontanee);
        $requette1->bindParam(":activitee_cardiaque", $activite_cardiaque);
        $requette1->bindParam(":frequence_cardiaque_en_BMP", $frequence_cardiaque);
        $requette1->bindParam(":longueur_cranio_caudale", $longueur_cranio_codale);
        $requette1->bindParam(":sac_gestationnel_taille", $sac_gestationnelle);
        $requette1->bindParam(":epaisseur_de_la_clarte_nucale", $epaisseur_de_la_clarte_nucale);
        $requette1->bindParam(":age_gestationnel", $age_gestationnelle);
        $requette1->bindParam(":date_probable_daccouchement", $date_probable_daccouchement);
        $requette1->bindParam(":autres_Trouvailles", $autres_Trouvailles);
        $requette1->bindParam(":conclusion", $conclusion);
        $requette1->bindParam(":autresElements_de_conclusion", $autresElements_de_conclusion);
        $requette1->bindParam(":nameEcho", $nameEcho);
        $requette1->execute();
    }
    if($nameEcho === "Echographie endovaginale"){
        try {
            //code...
            $requet = $bdd->query(
                "SELECT `id_fiche`,`sinon_preciser`,  `aspect_et_localisation_du_placenta` FROM `fiche_imagerie` WHERE id_fiche = 1"
            );
    
            $rechercheTable = [];
            $rechercheTable['informations2'] = [];
    
            while ($reponse = $requet->fetch()) {
                extract($reponse);
                $pat = [
                    "sinon_preciser" => $sinon_preciser,
                    "aspect_et_localisation_du_placenta" => $aspect_et_localisation_du_placenta,
                ];
                
                $rechercheTable['informations2'][] = $pat;
            }
            // var_dump($rechercheTable['informations'][0]['nom_et_prenom']);
            // echo count($rechercheTable['informations']);
            // On envoie le code réponse 200 OK
    
            $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
            
    
            for ($i=0; $i < count($rechercheTable['informations2']); $i++) { 
                $rechercheTable['informations2'][$i]['sinon_preciser'] = openssl_decrypt($rechercheTable['informations2'][$i]['sinon_preciser'], 'aes-256-cbc', 'poefjlhdnslhf9834727%^&*ksdfnjxekjfnjwesdkh', 0, 'ma_iv#29&jhweblo');
                $rechercheTable['informations2'][$i]['aspect_et_localisation_du_placenta'] = openssl_decrypt($rechercheTable['informations2'][$i]['aspect_et_localisation_du_placenta'], 'aes-256-cbc', 'poefjlhdnslhf9834727%^&*ksdfnjxekjfnjwesdkh', 0, 'ma_iv#29&jhweblo');
            }
        } catch (\Throwable $th) {
            echo $th;
        }
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($rechercheTable);
    }
    if ($nameEcho === "Echographie Obstetricale depistage deuxiemme trimestre") {
        $idPatient = htmlspecialchars(strip_tags($data['idPatient']));
        $prescripteur = htmlspecialchars(strip_tags($data['prescripteur']));
        $dateExamen = htmlspecialchars(strip_tags($data['dateExamen']));
        $indicateur = htmlspecialchars(strip_tags($data['indicateur']));
        $typeMachine = htmlspecialchars(strip_tags($data['typeMachine']));
        $conditionExam = htmlspecialchars(strip_tags($data['conditionExam']));
        $typeSonde = htmlspecialchars(strip_tags($data['typeSonde']));
        $DDR = htmlspecialchars(strip_tags($data['DDR']));

        $nombreFoetus = htmlspecialchars(strip_tags($data['nombreFoetus']));
        $mobilitee_spontanee = htmlspecialchars(strip_tags($data['mobilitee_spontanee']));
        $activite_cardiaque = htmlspecialchars(strip_tags($data['activite_cardiaque']));
        $frequence_cardiaque = htmlspecialchars(strip_tags($data['frequence_cardiaque']));
        $age_gestationnelle = htmlspecialchars(strip_tags($data['age_gestationnelle']));
        $date_probable_daccouchement = htmlspecialchars(strip_tags($data['date_probable_daccouchement']));
        
        $diametreBiparietale = htmlspecialchars(strip_tags($data['diametreBiparietale']));
        $contour_de_la_boite_cranienne = htmlspecialchars(strip_tags($data['contour_de_la_boite_cranienne']));
        $aspect_paroie_abdominale_aterieur = htmlspecialchars(strip_tags($data['aspect_paroie_abdominale_aterieur']));
        $longeur_feomale = htmlspecialchars(strip_tags($data['longeur_feomale']));
        $DAT = htmlspecialchars(strip_tags($data['DAT']));
        $poids_foetale = htmlspecialchars(strip_tags($data['poids_foetale']));
        $perimetre_abdominale = htmlspecialchars(strip_tags($data['perimetre_abdominale']));
        $volume_amniotique = htmlspecialchars(strip_tags($data['volume_amniotique']));
        $liquide_amniotique = htmlspecialchars(strip_tags($data['liquide_amniotique']));
        $aspect_du_trophoblaste = htmlspecialchars(strip_tags($data['aspect_du_trophoblaste']));
        $presentation_foetale = htmlspecialchars(strip_tags($data['presentation_foetale']));
        $sexe_du_foetus = htmlspecialchars(strip_tags($data['sexe_du_foetus']));
        
        $autres_Trouvailles = htmlspecialchars(strip_tags($data['autres_Trouvailles']));
        $conclusion = htmlspecialchars(strip_tags($data['conclusion']));
        $autresElements_de_conclusion = htmlspecialchars(strip_tags($data['autresElements_de_conclusion']));
        $idSaver = htmlspecialchars(strip_tags($data['idSaver']));
        // $status_buy = $data['status_buy']; 
        // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

        // on chiffre nos donnees

        $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

        $nameEcho = openssl_encrypt($nameEcho, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        // $idPatient = openssl_encrypt($idPatient, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $prescripteur = openssl_encrypt($prescripteur, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $dateExamen = openssl_encrypt($dateExamen, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $indicateur = openssl_encrypt($indicateur, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $typeMachine = openssl_encrypt($typeMachine, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $conditionExam = openssl_encrypt($conditionExam, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $typeSonde = openssl_encrypt($typeSonde, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $DDR = openssl_encrypt($DDR, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        
        $nombreFoetus = openssl_encrypt($nombreFoetus, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $mobilitee_spontanee = openssl_encrypt($mobilitee_spontanee, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $activite_cardiaque = openssl_encrypt($activite_cardiaque, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $frequence_cardiaque = openssl_encrypt($frequence_cardiaque, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $age_gestationnelle = openssl_encrypt($age_gestationnelle, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $date_probable_daccouchement = openssl_encrypt($date_probable_daccouchement, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

        $diametreBiparietale = openssl_encrypt($diametreBiparietale, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $contour_de_la_boite_cranienne = openssl_encrypt($contour_de_la_boite_cranienne, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $aspect_paroie_abdominale_aterieur = openssl_encrypt($aspect_paroie_abdominale_aterieur, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $longeur_feomale = openssl_encrypt($longeur_feomale, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $DAT = openssl_encrypt($DAT, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $poids_foetale = openssl_encrypt($poids_foetale, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $perimetre_abdominale = openssl_encrypt($perimetre_abdominale, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $volume_amniotique = openssl_encrypt($volume_amniotique, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $liquide_amniotique = openssl_encrypt($liquide_amniotique, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $aspect_du_trophoblaste = openssl_encrypt($aspect_du_trophoblaste, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $presentation_foetale = openssl_encrypt($presentation_foetale, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $sexe_du_foetus = openssl_encrypt($sexe_du_foetus, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        
        $autres_Trouvailles = openssl_encrypt($autres_Trouvailles, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $conclusion = openssl_encrypt($conclusion, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $autresElements_de_conclusion = openssl_encrypt($autresElements_de_conclusion, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        
        // les requetes d'insertion

        $sql1 = "INSERT INTO `fiche_imagerie`(
        `code_patient_fi`, 
        `code_personnle_fi`, 
        `date_examen`, 
        `prescripteur`,
        `indicateur`, 
        `type_machine`, 
        `condition_examen`, 
        `type_sonde`, 
        `DDR`, 
        
        -- `uterus_orientation`, 
        -- `taille`, 
        -- `myometre`, 
        -- `si_myome_nombre`, 
        -- `localisation_et_taille_myome`, 
        -- `Endometre_Echogeneticitee`, 
        -- `epaisseur_de_lendometre`, 
        -- `structure_de_lovaire_gauche`, 
        -- `taille_de_lovaire_gauche`, 
        -- `nombre_de_folecullecules_antraux_de_lovaire_gauche`, 
        -- `structure_de_lovaire_droite`, 
        -- `taille_de_lovaire_droite`, 
        -- `nombre_de_folecullecules_antraux_de_lovaire_droite`,

        `nombre_dembryons`, 
        `mobilite_spontanee`, 
        `activitee_cardiaque`, 
        `frequence_cardiaque_en_BMP`, 

        -- `longueur_cranio_caudale`, 
        -- `sac_gestationnel_taille`, 
        -- `epaisseur_de_la_clarte_nucale`, 

        `age_gestationnel`, 
        `date_probable_daccouchement`, 
        `diametre_bipartiel`, 
        `contour_de_la_boite_craniene`, 
        `aspect_de_la_boite_craniene_abdominale_anterieur`, 
        `longueur_femorale`, 
        `diametre_abdomino_transversale`, 
        `estimation_poids_foetale`, 
        `perimetre_abdominale`, 
        `volume_amniotique`, 
        `liquide_amniotique`, 
        `aspect_du_trophoblaste_ou_placenta`, 
        `presentation_foetale`, 
        `sexe_du_foetus`, 

        -- `sinon_preciser`, 
        -- `aspect_du_contour_de_la_boite_craniene`, 
        -- `aspect_des_ventricules_lateraux`, 
        -- `aspect_de_la_ligne_mediane_craniene`, 
        -- `aspect_des_poumons`, 
        -- `position_du_coeur`, 
        -- `aspect_des_quatres_cavites_cardiaques`, 
        -- `equilibre_des_cavites_thoraciques`, 
        -- `position_et_aspect_de_lestomac`, 
        -- `aspect_des_anses_intestinales`, 
        -- `position_et_aspect_de_la_vessie`, 
        -- `position_et_aspect_des_reins`, 
        -- `presentation_squeletique_et_silhouette`, 
        -- `aspect_du_profil_foetale`, 
        -- `aspect_du_rachis`, 
        -- `presence_des_quatres_membres`, 
        -- `presence_des_trois_aspect_de_membre`, 
        -- `aspect_et_localisation_du_placenta`, 
        -- `presence_et_forme_du_cavum_du_septum_pellucidum`,

        `Autre_trouvailles`, 
        `conclusion`, 
        `Autres_elements_de_conclusion` 
        ) 
            VALUES 
        (:idPatient, 
        :idSaver,
        :dateExamen,
        :prescripteur,
        :indicateur,
        :typeMachine,
        :conditionExam,
        :typeSonde,
        :DDR,

        :nombre_dembryons, 
        :mobilite_spontanee, 
        :activitee_cardiaque, 
        :frequence_cardiaque_en_BMP,

        :age_gestationnel, 
        :date_probable_daccouchement, 
        :diametre_bipartiel, 
        :contour_de_la_boite_craniene, 
        :aspect_de_la_boite_craniene_abdominale_anterieur, 
        :longueur_femorale, 
        :diametre_abdomino_transversale, 
        :estimation_poids_foetale, 
        :perimetre_abdominale, 
        :volume_amniotique, 
        :liquide_amniotique, 
        :aspect_du_trophoblaste_ou_placenta, 
        :presentation_foetale, 
        :sexe_du_foetus, 

        :Autre_trouvailles, 
        :conclusion, 
        :Autres_elements_de_conclusion 

        );


        INSERT INTO `type_fiche`(`code_patient_fi_type`, `code_personnel_fi_type`, `type_fiche_imagerie`) VALUES (:idPatient, :idSaver, :nameEcho);
        ";

        $requette1 = $bdd->prepare($sql1);
        $requette1->bindParam(":idPatient", $idPatient);
        $requette1->bindParam(":idSaver", $idSaver);
        $requette1->bindParam(":dateExamen", $dateExamen);
        $requette1->bindParam(":prescripteur", $prescripteur);
        $requette1->bindParam(":indicateur", $indicateur);
        $requette1->bindParam(":typeMachine", $typeMachine);
        $requette1->bindParam(":conditionExam", $conditionExam);
        $requette1->bindParam(":typeSonde", $typeSonde);
        $requette1->bindParam(":DDR", $DDR);

        $requette1->bindParam(":nombre_dembryons", $nombreFoetus);
        $requette1->bindParam(":mobilite_spontanee", $mobilitee_spontanee);
        $requette1->bindParam(":activitee_cardiaque", $activite_cardiaque);
        $requette1->bindParam(":frequence_cardiaque_en_BMP", $frequence_cardiaque);
        $requette1->bindParam(":age_gestationnel", $age_gestationnelle);
        $requette1->bindParam(":date_probable_daccouchement", $date_probable_daccouchement);
        
        $requette1->bindParam(":diametre_bipartiel", $diametreBiparietale);
        $requette1->bindParam(":contour_de_la_boite_craniene", $contour_de_la_boite_cranienne);
        $requette1->bindParam(":aspect_de_la_boite_craniene_abdominale_anterieur", $aspect_paroie_abdominale_aterieur);
        $requette1->bindParam(":longueur_femorale", $longeur_feomale);
        $requette1->bindParam(":diametre_abdomino_transversale", $DAT);
        $requette1->bindParam(":estimation_poids_foetale", $poids_foetale);
        $requette1->bindParam(":perimetre_abdominale", $perimetre_abdominale);
        $requette1->bindParam(":volume_amniotique", $volume_amniotique);
        $requette1->bindParam(":liquide_amniotique", $liquide_amniotique);
        $requette1->bindParam(":aspect_du_trophoblaste_ou_placenta", $aspect_du_trophoblaste);
        $requette1->bindParam(":presentation_foetale", $presentation_foetale);
        $requette1->bindParam(":sexe_du_foetus", $sexe_du_foetus);

        $requette1->bindParam(":Autre_trouvailles", $autres_Trouvailles);
        $requette1->bindParam(":conclusion", $conclusion);
        $requette1->bindParam(":Autres_elements_de_conclusion", $autresElements_de_conclusion);
        $requette1->bindParam(":nameEcho", $nameEcho);
        $requette1->execute();
    }
    if ($nameEcho === "Echographie Obstetricale depistage deuxiemme et troisieme trimestre") {
        $idPatient = htmlspecialchars(strip_tags($data['idPatient']));
        $prescripteur = htmlspecialchars(strip_tags($data['prescripteur']));
        $dateExamen = htmlspecialchars(strip_tags($data['dateExamen']));
        $indicateur = htmlspecialchars(strip_tags($data['indicateur']));
        $typeMachine = htmlspecialchars(strip_tags($data['typeMachine']));
        $conditionExam = htmlspecialchars(strip_tags($data['conditionExam']));
        $typeSonde = htmlspecialchars(strip_tags($data['typeSonde']));
        $DDR = htmlspecialchars(strip_tags($data['DDR']));

        $nombreFoetus = htmlspecialchars(strip_tags($data['nombreFoetus']));
        $mobilitee_spontanee = htmlspecialchars(strip_tags($data['mobilitee_spontanee']));
        $activite_cardiaque = htmlspecialchars(strip_tags($data['activite_cardiaque']));
        $frequence_cardiaque = htmlspecialchars(strip_tags($data['frequence_cardiaque']));
        $age_gestationnelle = htmlspecialchars(strip_tags($data['age_gestationnelle']));
        $date_probable_daccouchement = htmlspecialchars(strip_tags($data['date_probable_daccouchement']));
        
        $diametreBiparietale = htmlspecialchars(strip_tags($data['diametreBiparietale']));
        $contour_de_la_boite_cranienne = htmlspecialchars(strip_tags($data['contour_de_la_boite_cranienne']));
        $longueur_femorale = htmlspecialchars(strip_tags($data['longeur_feomale']));
        $DAT = htmlspecialchars(strip_tags($data['DAT']));
        $poids_foetale = htmlspecialchars(strip_tags($data['poids_foetale']));
        $aspect_du_contour_de_la_boite_cranienne = htmlspecialchars(strip_tags($data['aspect_du_contour_de_la_boite_cranienne']));
        $aspect_des_poumons = htmlspecialchars(strip_tags($data['aspect_des_poumons']));
        $position_du_coeur = htmlspecialchars(strip_tags($data['position_du_coeur']));
        $aspect_des_4_cavitee_catdiaque = htmlspecialchars(strip_tags($data['aspect_des_4_cavitee_catdiaque']));
        $Equilibre_des_cavitees_thoraciques = htmlspecialchars(strip_tags($data['Equilibre_des_cavitees_thoraciques']));
        $position_et_aspect_vessie = htmlspecialchars(strip_tags($data['position_et_aspect_vessie']));
        $position_et_aspect_reins = htmlspecialchars(strip_tags($data['position_et_aspect_reins']));
        $Presentation_squellete_et_silhouette = htmlspecialchars(strip_tags($data['Presentation_squellete_et_silhouette']));
        $Aspect_du_profile_Foetale = htmlspecialchars(strip_tags($data['Aspect_du_profile_Foetale']));
        $Aspect_du_rachis = htmlspecialchars(strip_tags($data['Aspect_du_rachis']));
        $Presence_des_quatre_membres = htmlspecialchars(strip_tags($data['Presence_des_quatre_membres']));
        $Presence_des_trois_segment_de_membres = htmlspecialchars(strip_tags($data['Presence_des_trois_segment_de_membres']));
        $volume_amniotique = htmlspecialchars(strip_tags($data['volume_amniotique']));
        $volume_amniotique_char = htmlspecialchars(strip_tags($data['volume_amniotique_char']));
        $aspect_du_trophoblaste = htmlspecialchars(strip_tags($data['aspect_du_trophoblaste']));
        $presentation_foetale = htmlspecialchars(strip_tags($data['presentation_foetale']));
        $sexe_du_foetus = htmlspecialchars(strip_tags($data['sexe_du_foetus']));
        $Aspect_de_la_ligne_medianne_cranienne = htmlspecialchars(strip_tags($data['Aspect_de_la_ligne_medianne_cranienne']));
        $Aspect_des_Ventricules_lateraux = htmlspecialchars(strip_tags($data['Aspect_des_Ventricules_lateraux']));
        $sinon_preciser = htmlspecialchars(strip_tags($data['sinon_preciser']));
        $position_et_aspect_de_lestomac = htmlspecialchars(strip_tags($data['position_et_aspect_de_lestomac']));
        $aspect_des_anses_intestinales = htmlspecialchars(strip_tags($data['aspect_des_anses_intestinales']));
        $aspect_et_localisation_du_placenta = htmlspecialchars(strip_tags($data['aspect_et_localisation_du_placenta']));
        $presence_et_forme_du_cavum_du_septum_pellucidum = htmlspecialchars(strip_tags($data['presence_et_forme_du_cavum_du_septum_pellucidum']));
        $aspect_paroie_abdominale_aterieur = htmlspecialchars(strip_tags($data['aspect_paroie_abdominale_aterieur']));
        $perimetre_abdominale = htmlspecialchars(strip_tags($data['perimetre_abdominale']));
        
        $autres_Trouvailles = htmlspecialchars(strip_tags($data['autres_Trouvailles']));
        $conclusion = htmlspecialchars(strip_tags($data['conclusion']));
        $autresElements_de_conclusion = htmlspecialchars(strip_tags($data['autresElements_de_conclusion']));
        $idSaver = htmlspecialchars(strip_tags($data['idSaver']));
        // $status_buy = $data['status_buy']; 
        // $date_Expiration = date('Y-m-d', strtotime('+30 days'));

        // on chiffre nos donnees

        $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';

        $nameEcho = openssl_encrypt($nameEcho, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        // $idPatient = openssl_encrypt($idPatient, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $prescripteur = openssl_encrypt($prescripteur, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $dateExamen = openssl_encrypt($dateExamen, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $indicateur = openssl_encrypt($indicateur, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $typeMachine = openssl_encrypt($typeMachine, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $conditionExam = openssl_encrypt($conditionExam, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $typeSonde = openssl_encrypt($typeSonde, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $DDR = openssl_encrypt($DDR, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        
        $nombreFoetus = openssl_encrypt($nombreFoetus, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $mobilitee_spontanee = openssl_encrypt($mobilitee_spontanee, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $activite_cardiaque = openssl_encrypt($activite_cardiaque, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $frequence_cardiaque = openssl_encrypt($frequence_cardiaque, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $age_gestationnelle = openssl_encrypt($age_gestationnelle, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $date_probable_daccouchement = openssl_encrypt($date_probable_daccouchement, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

        $diametreBiparietale = openssl_encrypt($diametreBiparietale, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $contour_de_la_boite_cranienne = openssl_encrypt($contour_de_la_boite_cranienne, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $longueur_femorale = openssl_encrypt($longueur_femorale, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $DAT = openssl_encrypt($DAT, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $poids_foetale = openssl_encrypt($poids_foetale, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $aspect_du_contour_de_la_boite_cranienne = openssl_encrypt($aspect_du_contour_de_la_boite_cranienne, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $aspect_des_poumons = openssl_encrypt($aspect_des_poumons, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $position_du_coeur = openssl_encrypt($position_du_coeur, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $aspect_des_4_cavitee_catdiaque = openssl_encrypt($aspect_des_4_cavitee_catdiaque, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $Equilibre_des_cavitees_thoraciques = openssl_encrypt($Equilibre_des_cavitees_thoraciques, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $position_et_aspect_vessie = openssl_encrypt($position_et_aspect_vessie, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $volume_amniotique = openssl_encrypt($volume_amniotique, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $liquide_amniotique = openssl_encrypt($volume_amniotique_char, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $position_et_aspect_reins = openssl_encrypt($position_et_aspect_reins, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $Presentation_squellete_et_silhouette = openssl_encrypt($Presentation_squellete_et_silhouette, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $Aspect_du_profile_Foetale = openssl_encrypt($Aspect_du_profile_Foetale, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $Aspect_du_rachis = openssl_encrypt($Aspect_du_rachis, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $Presence_des_quatre_membres = openssl_encrypt($Presence_des_quatre_membres, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $Presence_des_trois_segment_de_membres = openssl_encrypt($Presence_des_trois_segment_de_membres, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $aspect_du_trophoblaste = openssl_encrypt($aspect_du_trophoblaste, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $presentation_foetale = openssl_encrypt($presentation_foetale, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $sexe_du_foetus = openssl_encrypt($sexe_du_foetus, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $Aspect_de_la_ligne_medianne_cranienne = openssl_encrypt($Aspect_de_la_ligne_medianne_cranienne, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $Aspect_des_Ventricules_lateraux = openssl_encrypt($Aspect_des_Ventricules_lateraux, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $sinon_preciser = openssl_encrypt($sinon_preciser, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $position_et_aspect_de_lestomac = openssl_encrypt($position_et_aspect_de_lestomac, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $aspect_des_anses_intestinales = openssl_encrypt($aspect_des_anses_intestinales, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $aspect_et_localisation_du_placenta = openssl_encrypt($aspect_et_localisation_du_placenta, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $presence_et_forme_du_cavum_du_septum_pellucidum = openssl_encrypt($presence_et_forme_du_cavum_du_septum_pellucidum, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $aspect_paroie_abdominale_aterieur = openssl_encrypt($aspect_paroie_abdominale_aterieur, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $perimetre_abdominale = openssl_encrypt($perimetre_abdominale, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

        $autres_Trouvailles = openssl_encrypt($autres_Trouvailles, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $conclusion = openssl_encrypt($conclusion, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $autresElements_de_conclusion = openssl_encrypt($autresElements_de_conclusion, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        
        // les requetes d'insertion

        $sql1 = "INSERT INTO `fiche_imagerie`(
        `code_patient_fi`, 
        `code_personnle_fi`, 
        `date_examen`, 
        `prescripteur`,
        `indicateur`, 
        `type_machine`, 
        `condition_examen`, 
        `type_sonde`, 
        `DDR`, 
        
        -- `uterus_orientation`, 
        -- `taille`, 
        -- `myometre`, 
        -- `si_myome_nombre`, 
        -- `localisation_et_taille_myome`, 
        -- `Endometre_Echogeneticitee`, 
        -- `epaisseur_de_lendometre`, 
        -- `structure_de_lovaire_gauche`, 
        -- `taille_de_lovaire_gauche`, 
        -- `nombre_de_folecullecules_antraux_de_lovaire_gauche`, 
        -- `structure_de_lovaire_droite`, 
        -- `taille_de_lovaire_droite`, 
        -- `nombre_de_folecullecules_antraux_de_lovaire_droite`,

        `nombre_dembryons`, 
        `mobilite_spontanee`, 
        `activitee_cardiaque`, 
        `frequence_cardiaque_en_BMP`, 

        -- `longueur_cranio_caudale`, 
        -- `sac_gestationnel_taille`, 
        -- `epaisseur_de_la_clarte_nucale`, 

        `age_gestationnel`, 
        `date_probable_daccouchement`, 
        `diametre_bipartiel`, 
        `contour_de_la_boite_craniene`, 
        `aspect_de_la_boite_craniene_abdominale_anterieur`, 
        `longueur_femorale`, 
        `diametre_abdomino_transversale`, 
        `estimation_poids_foetale`, 
        `perimetre_abdominale`, 
        `volume_amniotique`, 
        `liquide_amniotique`, 
        `aspect_du_trophoblaste_ou_placenta`, 
        -- `aspect_du_trophoblaste`, 
        `presentation_foetale`, 
        `sexe_du_foetus`, 
        `sinon_preciser`, 
        `aspect_du_contour_de_la_boite_craniene`, 
        `aspect_des_ventricules_lateraux`, 
        `aspect_de_la_ligne_mediane_craniene`, 
        `aspect_des_poumons`, 
        `position_du_coeur`, 
        `aspect_des_quatres_cavites_cardiaques`, 
        `equilibre_des_cavites_thoraciques`, 
        `position_et_aspect_de_lestomac`, 
        `aspect_des_anses_intestinales`, 
        `position_et_aspect_de_la_vessie`, 
        `position_et_aspect_des_reins`, 
        `presentation_squeletique_et_silhouette`, 
        `aspect_du_profil_foetale`, 
        `aspect_du_rachis`, 
        `presence_des_quatres_membres`, 
        `presence_des_trois_aspect_de_membre`, 
        `aspect_et_localisation_du_placenta`, 
        `presence_et_forme_du_cavum_du_septum_pellucidum`,

        `Autre_trouvailles`, 
        `conclusion`, 
        `Autres_elements_de_conclusion` 
        ) 
            VALUES 
        (:idPatient, 
        :idSaver,
        :dateExamen,
        :prescripteur,
        :indicateur,
        :typeMachine,
        :conditionExam,
        :typeSonde,
        :DDR,

        :nombre_dembryons, 
        :mobilite_spontanee, 
        :activitee_cardiaque, 
        :frequence_cardiaque_en_BMP,

        :age_gestationnel, 
        :date_probable_daccouchement, 
        :diametre_bipartiel, 
        :contour_de_la_boite_cranienne,
        :aspect_paroie_abdominale_aterieur,
        :longueur_femorale,
        :DAT, 
        :poids_foetale,
        :perimetre_abdominale,
        :volume_amniotique,
        :liquide_amniotique, 
        :aspect_du_trophoblaste,
        :presentation_foetale, 
        :sexe_du_foetus, 
        :sinon_preciser, 

        :aspect_du_contour_de_la_boite_cranienne, 
        :Aspect_des_Ventricules_lateraux, 
        :Aspect_de_la_ligne_medianne_cranienne, 
        :aspect_des_poumons, 
        :position_du_coeur, 
        :aspect_des_4_cavitee_catdiaque, 
        :Equilibre_des_cavitees_thoraciques, 
        :position_et_aspect_de_lestomac, 
        :aspect_des_anses_intestinales, 
        :position_et_aspect_vessie,
        :position_et_aspect_reins, 
        :Presentation_squellete_et_silhouette, 
        :Aspect_du_profile_Foetale, 
        :Aspect_du_rachis, 
        :Presence_des_quatre_membres, 
        :Presence_des_trois_segment_de_membres, 
        :aspect_et_localisation_du_placenta, 
        :presence_et_forme_du_cavum_du_septum_pellucidum, 

        :Autre_trouvailles, 
        :conclusion, 
        :Autres_elements_de_conclusion 

        );


        INSERT INTO `type_fiche`(`code_patient_fi_type`, `code_personnel_fi_type`, `type_fiche_imagerie`) VALUES (:idPatient, :idSaver, :nameEcho);
        ";

        $requette1 = $bdd->prepare($sql1);
        $requette1->bindParam(":idPatient", $idPatient);
        $requette1->bindParam(":idSaver", $idSaver);
        $requette1->bindParam(":dateExamen", $dateExamen);
        $requette1->bindParam(":prescripteur", $prescripteur);
        $requette1->bindParam(":indicateur", $indicateur);
        $requette1->bindParam(":typeMachine", $typeMachine);
        $requette1->bindParam(":conditionExam", $conditionExam);
        $requette1->bindParam(":typeSonde", $typeSonde);
        $requette1->bindParam(":DDR", $DDR);

        $requette1->bindParam(":nombre_dembryons", $nombreFoetus);
        $requette1->bindParam(":mobilite_spontanee", $mobilitee_spontanee);
        $requette1->bindParam(":activitee_cardiaque", $activite_cardiaque);
        $requette1->bindParam(":frequence_cardiaque_en_BMP", $frequence_cardiaque);
        
        $requette1->bindParam(":age_gestationnel", $age_gestationnelle);
        $requette1->bindParam(":date_probable_daccouchement", $date_probable_daccouchement);
        $requette1->bindParam(":diametre_bipartiel", $diametreBiparietale);
        $requette1->bindParam(":contour_de_la_boite_cranienne", $contour_de_la_boite_cranienne);

        
        $requette1->bindParam(":longueur_femorale", $longueur_femorale);
        $requette1->bindParam(":DAT", $DAT);
        $requette1->bindParam(":aspect_paroie_abdominale_aterieur", $aspect_paroie_abdominale_aterieur);
        $requette1->bindParam(":poids_foetale", $poids_foetale);
        $requette1->bindParam(":perimetre_abdominale", $perimetre_abdominale);
        $requette1->bindParam(":volume_amniotique", $volume_amniotique);
        $requette1->bindParam(":liquide_amniotique", $liquide_amniotique);
        $requette1->bindParam(":aspect_du_trophoblaste", $aspect_du_trophoblaste);
        
        $requette1->bindParam(":presentation_foetale", $presentation_foetale);
        $requette1->bindParam(":sexe_du_foetus", $sexe_du_foetus);
        $requette1->bindParam(":sinon_preciser", $sinon_preciser);
        $requette1->bindParam(":aspect_du_contour_de_la_boite_cranienne", $aspect_du_contour_de_la_boite_cranienne);
        $requette1->bindParam(":Aspect_des_Ventricules_lateraux", $Aspect_des_Ventricules_lateraux);
        $requette1->bindParam(":Aspect_de_la_ligne_medianne_cranienne", $Aspect_de_la_ligne_medianne_cranienne);
        $requette1->bindParam(":aspect_des_poumons", $aspect_des_poumons);
        $requette1->bindParam(":position_du_coeur", $position_du_coeur);
        $requette1->bindParam(":aspect_des_4_cavitee_catdiaque", $aspect_des_4_cavitee_catdiaque);
        $requette1->bindParam(":Equilibre_des_cavitees_thoraciques", $Equilibre_des_cavitees_thoraciques);
        $requette1->bindParam(":position_et_aspect_de_lestomac", $position_et_aspect_de_lestomac);
        $requette1->bindParam(":aspect_des_anses_intestinales", $aspect_des_anses_intestinales);
        $requette1->bindParam(":position_et_aspect_vessie", $position_et_aspect_vessie);
        $requette1->bindParam(":position_et_aspect_reins", $position_et_aspect_reins);
        $requette1->bindParam(":Presentation_squellete_et_silhouette", $Presentation_squellete_et_silhouette);
        $requette1->bindParam(":Aspect_du_profile_Foetale", $Aspect_du_profile_Foetale);
        $requette1->bindParam(":Aspect_du_rachis", $Aspect_du_rachis);
        $requette1->bindParam(":Presence_des_quatre_membres", $Presence_des_quatre_membres);
        $requette1->bindParam(":Presence_des_trois_segment_de_membres", $Presence_des_trois_segment_de_membres);
        $requette1->bindParam(":aspect_et_localisation_du_placenta", $aspect_et_localisation_du_placenta);
        $requette1->bindParam(":presence_et_forme_du_cavum_du_septum_pellucidum", $presence_et_forme_du_cavum_du_septum_pellucidum);

        $requette1->bindParam(":Autre_trouvailles", $autres_Trouvailles);
        $requette1->bindParam(":conclusion", $conclusion);
        $requette1->bindParam(":Autres_elements_de_conclusion", $autresElements_de_conclusion);
        $requette1->bindParam(":nameEcho", $nameEcho);
        $requette1->execute();
    }
    
}

else {
    echo json_encode(['erreur' => 'methode de requette invalide']);
}