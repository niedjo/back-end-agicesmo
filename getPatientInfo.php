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

// if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
//     header('HTTP/1.0 401 Unauthorized');
//     return ;
// }


if($_SERVER['REQUEST_METHOD'] == 'GET'){
//     $token = $_SERVER['HTTP_AUTHORIZATION'];
//     if ($token !== 'Bearer mytoken') {
//     http_response_code(401);
//     echo json_encode(array('message' => 'Unauthorized'));
//     exit;
// }
// else{
    $data = json_decode(file_get_contents('php://input'), true);
    

    // On inclut les fichiers de configuration et d'accès aux données
    
    include("ConstantesBd.php");

    $constantes = new Constant();

    $server = $constantes->server;
    $dbname = $constantes->dbname;
    $username = $constantes->username;
    $password = $constantes->password;

    $bdd = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    $bdd->exec("set names utf8");


    // $search = htmlspecialchars(strip_tags($data['search']));
    $search = 1;
    // $search = htmlspecialchars(strip_tags($_GET['search']), ENT_QUOTES, 'UTF-8');

    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
    // $limit = htmlspecialchars(strip_tags($data['limit']));
    $limit = "";
    if ($limit === "") {
        $requette1 = $bdd->query(
            "SELECT * FROM `patient`, `operation` 
            WHERE patient.code_patient = operation.code_patient
            -- AND patient.code_patient = $search
            -- AND concat(`nom_et_prenom`, `date_du_jour`, `date_nais`, `age`, `sexe`, `lieu_de_residence`, `numtel`, `raison_de_la_venue`, `service`) 
            -- LIKE ('%$search%') 
            ORDER BY patient.code_patient asc
            ;"
        );
    
        $rechercheTable = [];
        $rechercheTable['informations'] = [];

        while ($reponse = $requette1->fetch()) {
            extract($reponse);
            $pat = [
                "code_patient" => strval($code_patient),
                "nom_et_prenom" => $nom_et_prenom,
                "date_du_jour" => $date_du_jour,
                "date_nais" => $date_nais,
                "age" => strval($age),
                "sexe" => $sexe,
                "lieu_de_residence" => $lieu_de_residence,
                "numtel" => strval($numtel),
                "raison_de_la_venue" => $raison_de_la_venue,
                "service" => $service,
                "code_personnel" => strval($code_personnel),
            ];
            
            $rechercheTable['informations'][] = $pat;
        }
        // var_dump($rechercheTable['informations'][0]['nom_et_prenom']);
        // echo count($rechercheTable['informations']);
        // On envoie le code réponse 200 OK
        

        for ($i=0; $i < count($rechercheTable['informations']); $i++) { 
            $rechercheTable['informations'][$i]['nom_et_prenom'] = openssl_decrypt($rechercheTable['informations'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations'][$i]['sexe'] = openssl_decrypt($rechercheTable['informations'][$i]['sexe'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations'][$i]['lieu_de_residence'] = openssl_decrypt($rechercheTable['informations'][$i]['lieu_de_residence'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations'][$i]['raison_de_la_venue'] = openssl_decrypt($rechercheTable['informations'][$i]['raison_de_la_venue'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations'][$i]['service'] = openssl_decrypt($rechercheTable['informations'][$i]['service'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        }


        $requette2 = $bdd->query(
            "SELECT `code_patient_lab`, `code_personnel_lab`, `date_exam`, `true_date`, `nature_examen`, `quantitee`, `prix`, `expression_des_resultats`, `conclusion`, personnel.nom_et_prenom, patient.nom_et_prenom as 'nom', status_don	 
            FROM `laboratoire`, `personnel`, `patient` 
            WHERE personnel.id = laboratoire.code_personnel_lab 
            AND patient.code_patient = laboratoire.code_patient_lab;"
        );
    
        $rechercheTable['informations1'] = [];

        while ($reponse = $requette2->fetch()) {
            extract($reponse);
            $pat = [
                "code_patient_lab" => strval($code_patient_lab),
                "code_personnel_lab" => strval($code_personnel_lab),
                "nom" => $nom,
                "date_exam" => $date_exam,
                "true_date" => $true_date,
                "nature_examen" => $nature_examen,
                "quantitee" => $quantitee,
                "prix" => $prix,
                "expression_des_resultats" => $expression_des_resultats,
                "conclusion" => $conclusion,
                "nom_et_prenom" => $nom_et_prenom,
                "status_don" => strval($status_don),
                // "sexe" => $sexe,
                // "lieu_de_residence" => $lieu_de_residence,
                // "numtel" => $numtel,
                // "raison_de_la_venue" => $raison_de_la_venue,
                // "service" => $service,
                // "code_personnel" => $code_personnel,
            ];
            
            $rechercheTable['informations1'][] = $pat;
        }
        // var_dump($rechercheTable['informations'][0]['nom_et_prenom']);
        // echo count($rechercheTable['informations']);
        // On envoie le code réponse 200 OK
        

        for ($i=0; $i < count($rechercheTable['informations1']); $i++) { 
            $rechercheTable['informations1'][$i]['nature_examen'] = openssl_decrypt($rechercheTable['informations1'][$i]['nature_examen'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations1'][$i]['quantitee'] = openssl_decrypt($rechercheTable['informations1'][$i]['quantitee'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations1'][$i]['prix'] = openssl_decrypt($rechercheTable['informations1'][$i]['prix'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations1'][$i]['expression_des_resultats'] = openssl_decrypt($rechercheTable['informations1'][$i]['expression_des_resultats'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations1'][$i]['conclusion'] = openssl_decrypt($rechercheTable['informations1'][$i]['conclusion'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations1'][$i]['nom_et_prenom'] = openssl_decrypt($rechercheTable['informations1'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations1'][$i]['nom'] = openssl_decrypt($rechercheTable['informations1'][$i]['nom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        }

        $requette3 = $bdd->query(
            "SELECT 
            `code_patient_fi`, 
            `code_personnle_fi`, 
            `date_examen`, 
            `true_date`, 
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
            `nombre_dembryons`, 
            `mobilite_spontanee`, 
            `activitee_cardiaque`, 
            `frequence_cardiaque_en_BMP`, 
            `longueur_cranio_caudale`, 
            `sac_gestationnel_taille`, 
            `epaisseur_de_la_clarte_nucale`, 
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
            `Autres_elements_de_conclusion`, 
            personnel.nom_et_prenom, 
            patient.nom_et_prenom as 'nom', 
            type_fiche.type_fiche_imagerie 
            FROM `fiche_imagerie`, `personnel`, `patient`, `type_fiche`
            WHERE personnel.id = fiche_imagerie.code_personnle_fi 
            AND type_fiche.code_personnel_fi_type = personnel.id
            AND patient.code_patient = fiche_imagerie.code_patient_fi
            AND type_fiche.code_patient_fi_type = patient.code_patient
            AND fiche_imagerie.code_patient_fi = type_fiche.code_patient_fi_type
            AND fiche_imagerie.code_personnle_fi = type_fiche.code_personnel_fi_type
            AND fiche_imagerie.id_fiche = type_fiche.id_fi_type
            AND fiche_imagerie.id_fiche != 1
            ORDER BY fiche_imagerie.id_fiche DESC;"
        );
    
        $rechercheTable['informations2'] = [];

        while ($reponse = $requette3->fetch()) {
            extract($reponse);
            $pat = [
                "code_patient_fi" => strval($code_patient_fi),
                "code_personnle_fi" => strval($code_personnle_fi),
                "date_examen" => $date_examen,
                "true_date" => $true_date,
                "prescripteur" => $prescripteur,
                "indicateur" => $indicateur,
                "type_machine" => $type_machine,
                "condition_examen" => $condition_examen,
                "type_sonde" => $type_sonde,
                "DDR" => $DDR,
                "uterus_orientation" => strval($uterus_orientation),
                "taille" => strval($taille),
                "myometre" => strval($myometre),
                "si_myome_nombre" => strval($si_myome_nombre),
                "localisation_et_taille_myome" => strval($localisation_et_taille_myome),
                "Endometre_Echogeneticitee" => strval($Endometre_Echogeneticitee),
                "epaisseur_de_lendometre" => strval($epaisseur_de_lendometre),
                "structure_de_lovaire_gauche" => strval($structure_de_lovaire_gauche),
                "taille_de_lovaire_gauche" => strval($taille_de_lovaire_gauche),
                "nombre_de_folecullecules_antraux_de_lovaire_gauche" => strval($nombre_de_folecullecules_antraux_de_lovaire_gauche),
                "structure_de_lovaire_droite" => strval($structure_de_lovaire_droite),
                "taille_de_lovaire_droite" => strval($taille_de_lovaire_droite),
                "nombre_de_folecullecules_antraux_de_lovaire_droite" => strval($nombre_de_folecullecules_antraux_de_lovaire_droite),
                "nombre_dembryons" => strval($nombre_dembryons),
                "mobilite_spontanee" => strval($mobilite_spontanee),
                "activitee_cardiaque" => strval($activitee_cardiaque),
                "frequence_cardiaque_en_BMP" => strval($frequence_cardiaque_en_BMP),
                "longueur_cranio_caudale" => strval($longueur_cranio_caudale),
                "sac_gestationnel_taille" => strval($sac_gestationnel_taille),
                "epaisseur_de_la_clarte_nucale" => strval($epaisseur_de_la_clarte_nucale),
                "age_gestationnel" => strval($age_gestationnel),
                "date_probable_daccouchement" => strval($date_probable_daccouchement),
                "diametre_bipartiel" => strval($diametre_bipartiel),
                "contour_de_la_boite_craniene" => strval($contour_de_la_boite_craniene),
                "aspect_de_la_boite_craniene_abdominale_anterieur" => strval($aspect_de_la_boite_craniene_abdominale_anterieur),
                "longueur_femorale" => strval($longueur_femorale),
                "diametre_abdomino_transversale" => strval($diametre_abdomino_transversale),
                "estimation_poids_foetale" => strval($estimation_poids_foetale),
                "perimetre_abdominale" => strval($perimetre_abdominale),
                "volume_amniotique" => strval($volume_amniotique),
                "liquide_amniotique" => strval($liquide_amniotique),
                "aspect_du_trophoblaste_ou_placenta" => strval($aspect_du_trophoblaste_ou_placenta),
                "presentation_foetale" => strval($presentation_foetale),
                "sexe_du_foetus" => strval($sexe_du_foetus),
                "sinon_preciser" => strval($sinon_preciser),
                "aspect_du_contour_de_la_boite_craniene" => strval($aspect_du_contour_de_la_boite_craniene),
                "aspect_des_ventricules_lateraux" => strval($aspect_des_ventricules_lateraux),
                "aspect_de_la_ligne_mediane_craniene" => strval($aspect_de_la_ligne_mediane_craniene),
                "aspect_des_poumons" => strval($aspect_des_poumons),
                "position_du_coeur" => strval($position_du_coeur),
                "aspect_des_quatres_cavites_cardiaques" => strval($aspect_des_quatres_cavites_cardiaques),
                "equilibre_des_cavites_thoraciques" => strval($equilibre_des_cavites_thoraciques),
                "position_et_aspect_de_lestomac" => strval($position_et_aspect_de_lestomac),
                "aspect_des_anses_intestinales" => strval($aspect_des_anses_intestinales),
                "position_et_aspect_de_la_vessie" => strval($position_et_aspect_de_la_vessie),
                "position_et_aspect_des_reins" => strval($position_et_aspect_des_reins),
                "presentation_squeletique_et_silhouette" => strval($presentation_squeletique_et_silhouette),
                "aspect_du_profil_foetale" => strval($aspect_du_profil_foetale),
                "aspect_du_rachis" => strval($aspect_du_rachis),
                "presence_des_quatres_membres" => strval($presence_des_quatres_membres),
                "presence_des_trois_aspect_de_membre" => strval($presence_des_trois_aspect_de_membre),
                "aspect_et_localisation_du_placenta" => strval($aspect_et_localisation_du_placenta),
                "presence_et_forme_du_cavum_du_septum_pellucidum" => strval($presence_et_forme_du_cavum_du_septum_pellucidum),
                "type_fiche_imagerie" => strval($type_fiche_imagerie),
                "Autre_trouvailles" => strval($Autre_trouvailles),
                "conclusion" => strval($conclusion),
                "Autres_elements_de_conclusion" => strval($Autres_elements_de_conclusion),
                "nom_et_prenom" => $nom_et_prenom,
                "nom" => $nom,
            ];
            
            $rechercheTable['informations2'][] = $pat;
        }
        // var_dump($rechercheTable['informations'][0]['nom_et_prenom']);
        // echo count($rechercheTable['informations']);
        // On envoie le code réponse 200 OK
        

        for ($i=0; $i < count($rechercheTable['informations2']); $i++) { 
            $rechercheTable['informations2'][$i]['indicateur'] = openssl_decrypt($rechercheTable['informations2'][$i]['indicateur'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['type_machine'] = openssl_decrypt($rechercheTable['informations2'][$i]['type_machine'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['date_examen'] = openssl_decrypt($rechercheTable['informations2'][$i]['date_examen'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['prescripteur'] = openssl_decrypt($rechercheTable['informations2'][$i]['prescripteur'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['condition_examen'] = openssl_decrypt($rechercheTable['informations2'][$i]['condition_examen'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['type_sonde'] = openssl_decrypt($rechercheTable['informations2'][$i]['type_sonde'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['DDR'] = openssl_decrypt($rechercheTable['informations2'][$i]['DDR'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['uterus_orientation'] = openssl_decrypt($rechercheTable['informations2'][$i]['uterus_orientation'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['taille'] = openssl_decrypt($rechercheTable['informations2'][$i]['taille'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['myometre'] = openssl_decrypt($rechercheTable['informations2'][$i]['myometre'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['si_myome_nombre'] = openssl_decrypt($rechercheTable['informations2'][$i]['si_myome_nombre'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['localisation_et_taille_myome'] = openssl_decrypt($rechercheTable['informations2'][$i]['localisation_et_taille_myome'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['Endometre_Echogeneticitee'] = openssl_decrypt($rechercheTable['informations2'][$i]['Endometre_Echogeneticitee'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['epaisseur_de_lendometre'] = openssl_decrypt($rechercheTable['informations2'][$i]['epaisseur_de_lendometre'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['structure_de_lovaire_gauche'] = openssl_decrypt($rechercheTable['informations2'][$i]['structure_de_lovaire_gauche'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['taille_de_lovaire_gauche'] = openssl_decrypt($rechercheTable['informations2'][$i]['taille_de_lovaire_gauche'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['nombre_de_folecullecules_antraux_de_lovaire_gauche'] = openssl_decrypt($rechercheTable['informations2'][$i]['nombre_de_folecullecules_antraux_de_lovaire_gauche'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['structure_de_lovaire_droite'] = openssl_decrypt($rechercheTable['informations2'][$i]['structure_de_lovaire_droite'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['structure_de_lovaire_droite'] = openssl_decrypt($rechercheTable['informations2'][$i]['structure_de_lovaire_droite'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['taille_de_lovaire_droite'] = openssl_decrypt($rechercheTable['informations2'][$i]['taille_de_lovaire_droite'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['taille_de_lovaire_droite'] = openssl_decrypt($rechercheTable['informations2'][$i]['taille_de_lovaire_droite'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['nombre_de_folecullecules_antraux_de_lovaire_droite'] = openssl_decrypt($rechercheTable['informations2'][$i]['nombre_de_folecullecules_antraux_de_lovaire_droite'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['nombre_dembryons'] = openssl_decrypt($rechercheTable['informations2'][$i]['nombre_dembryons'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['mobilite_spontanee'] = openssl_decrypt($rechercheTable['informations2'][$i]['mobilite_spontanee'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['activitee_cardiaque'] = openssl_decrypt($rechercheTable['informations2'][$i]['activitee_cardiaque'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['frequence_cardiaque_en_BMP'] = openssl_decrypt($rechercheTable['informations2'][$i]['frequence_cardiaque_en_BMP'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['longueur_cranio_caudale'] = openssl_decrypt($rechercheTable['informations2'][$i]['longueur_cranio_caudale'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['sac_gestationnel_taille'] = openssl_decrypt($rechercheTable['informations2'][$i]['sac_gestationnel_taille'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['epaisseur_de_la_clarte_nucale'] = openssl_decrypt($rechercheTable['informations2'][$i]['epaisseur_de_la_clarte_nucale'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['age_gestationnel'] = openssl_decrypt($rechercheTable['informations2'][$i]['age_gestationnel'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['date_probable_daccouchement'] = openssl_decrypt($rechercheTable['informations2'][$i]['date_probable_daccouchement'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['diametre_bipartiel'] = openssl_decrypt($rechercheTable['informations2'][$i]['diametre_bipartiel'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['contour_de_la_boite_craniene'] = openssl_decrypt($rechercheTable['informations2'][$i]['contour_de_la_boite_craniene'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['aspect_de_la_boite_craniene_abdominale_anterieur'] = openssl_decrypt($rechercheTable['informations2'][$i]['aspect_de_la_boite_craniene_abdominale_anterieur'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['longueur_femorale'] = openssl_decrypt($rechercheTable['informations2'][$i]['longueur_femorale'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['diametre_abdomino_transversale'] = openssl_decrypt($rechercheTable['informations2'][$i]['diametre_abdomino_transversale'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['estimation_poids_foetale'] = openssl_decrypt($rechercheTable['informations2'][$i]['estimation_poids_foetale'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['perimetre_abdominale'] = openssl_decrypt($rechercheTable['informations2'][$i]['perimetre_abdominale'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['volume_amniotique'] = openssl_decrypt($rechercheTable['informations2'][$i]['volume_amniotique'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['liquide_amniotique'] = openssl_decrypt($rechercheTable['informations2'][$i]['liquide_amniotique'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['aspect_du_trophoblaste_ou_placenta'] = openssl_decrypt($rechercheTable['informations2'][$i]['aspect_du_trophoblaste_ou_placenta'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['presentation_foetale'] = openssl_decrypt($rechercheTable['informations2'][$i]['presentation_foetale'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['sexe_du_foetus'] = openssl_decrypt($rechercheTable['informations2'][$i]['sexe_du_foetus'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['sinon_preciser'] = openssl_decrypt($rechercheTable['informations2'][$i]['sinon_preciser'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['aspect_du_contour_de_la_boite_craniene'] = openssl_decrypt($rechercheTable['informations2'][$i]['aspect_du_contour_de_la_boite_craniene'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['aspect_des_ventricules_lateraux'] = openssl_decrypt($rechercheTable['informations2'][$i]['aspect_des_ventricules_lateraux'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['aspect_de_la_ligne_mediane_craniene'] = openssl_decrypt($rechercheTable['informations2'][$i]['aspect_de_la_ligne_mediane_craniene'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['aspect_des_poumons'] = openssl_decrypt($rechercheTable['informations2'][$i]['aspect_des_poumons'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['position_du_coeur'] = openssl_decrypt($rechercheTable['informations2'][$i]['position_du_coeur'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['aspect_des_quatres_cavites_cardiaques'] = openssl_decrypt($rechercheTable['informations2'][$i]['aspect_des_quatres_cavites_cardiaques'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['equilibre_des_cavites_thoraciques'] = openssl_decrypt($rechercheTable['informations2'][$i]['equilibre_des_cavites_thoraciques'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['position_et_aspect_de_lestomac'] = openssl_decrypt($rechercheTable['informations2'][$i]['position_et_aspect_de_lestomac'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['aspect_des_anses_intestinales'] = openssl_decrypt($rechercheTable['informations2'][$i]['aspect_des_anses_intestinales'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['position_et_aspect_de_la_vessie'] = openssl_decrypt($rechercheTable['informations2'][$i]['position_et_aspect_de_la_vessie'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['position_et_aspect_des_reins'] = openssl_decrypt($rechercheTable['informations2'][$i]['position_et_aspect_des_reins'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['presentation_squeletique_et_silhouette'] = openssl_decrypt($rechercheTable['informations2'][$i]['presentation_squeletique_et_silhouette'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['aspect_du_profil_foetale'] = openssl_decrypt($rechercheTable['informations2'][$i]['aspect_du_profil_foetale'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['aspect_du_rachis'] = openssl_decrypt($rechercheTable['informations2'][$i]['aspect_du_rachis'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['presence_des_quatres_membres'] = openssl_decrypt($rechercheTable['informations2'][$i]['presence_des_quatres_membres'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['presence_des_trois_aspect_de_membre'] = openssl_decrypt($rechercheTable['informations2'][$i]['presence_des_trois_aspect_de_membre'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['aspect_et_localisation_du_placenta'] = openssl_decrypt($rechercheTable['informations2'][$i]['aspect_et_localisation_du_placenta'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['presence_et_forme_du_cavum_du_septum_pellucidum'] = openssl_decrypt($rechercheTable['informations2'][$i]['presence_et_forme_du_cavum_du_septum_pellucidum'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['type_fiche_imagerie'] = openssl_decrypt($rechercheTable['informations2'][$i]['type_fiche_imagerie'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['Autre_trouvailles'] = openssl_decrypt($rechercheTable['informations2'][$i]['Autre_trouvailles'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['conclusion'] = openssl_decrypt($rechercheTable['informations2'][$i]['conclusion'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['Autres_elements_de_conclusion'] = openssl_decrypt($rechercheTable['informations2'][$i]['Autres_elements_de_conclusion'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['nom_et_prenom'] = openssl_decrypt($rechercheTable['informations2'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations2'][$i]['nom'] = openssl_decrypt($rechercheTable['informations2'][$i]['nom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        }
        

        $requette4 = $bdd->query(
            "SELECT `code_personnel_achat`, `code_patient_achat`, `date_achat`, `intrant_retire`, `forme`, `unite_de_mesure`, `unite_de_vente`, `quantitee`, `prix`, personnel.nom_et_prenom, patient.nom_et_prenom as 'nom' 
            FROM `achat`, `personnel`, `patient` 
            WHERE personnel.id = achat.code_personnel_achat 
            AND patient.code_patient = achat.code_patient_achat;
            ;"
        );
    
        $rechercheTable['informations3'] = [];

        while ($reponse = $requette4->fetch()) {
            extract($reponse);
            $pat = [
                "code_personnel_achat" => strval($code_personnel_achat),
                "code_patient_achat" => strval($code_patient_achat),
                "date_achat" => $date_achat,
                "intrant_retire" => $intrant_retire,
                "forme" => $forme,
                "unite_de_mesure" => $unite_de_mesure,
                "unite_de_vente" => $unite_de_vente,
                "quantitee" => $quantitee,
                "prix" => $prix,
                "nom_et_prenom" => $nom_et_prenom,
                "nom" => $nom,
            ];
            
            $rechercheTable['informations3'][] = $pat;
        }
        // var_dump($rechercheTable['informations'][0]['nom_et_prenom']);
        // echo count($rechercheTable['informations']);
        // On envoie le code réponse 200 OK
        

        for ($i=0; $i < count($rechercheTable['informations3']); $i++) { 
            $rechercheTable['informations3'][$i]['intrant_retire'] = openssl_decrypt($rechercheTable['informations3'][$i]['intrant_retire'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations3'][$i]['forme'] = openssl_decrypt($rechercheTable['informations3'][$i]['forme'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations3'][$i]['unite_de_mesure'] = openssl_decrypt($rechercheTable['informations3'][$i]['unite_de_mesure'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations3'][$i]['unite_de_vente'] = openssl_decrypt($rechercheTable['informations3'][$i]['unite_de_vente'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations3'][$i]['quantitee'] = openssl_decrypt($rechercheTable['informations3'][$i]['quantitee'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations3'][$i]['prix'] = openssl_decrypt($rechercheTable['informations3'][$i]['prix'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations3'][$i]['nom_et_prenom'] = openssl_decrypt($rechercheTable['informations3'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations3'][$i]['nom'] = openssl_decrypt($rechercheTable['informations3'][$i]['nom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        }





        $requette5 = $bdd->query(
            "SELECT `code_patient_soin`, `code_personnel_soin`, `date_exam`, `true_date`, `nature_examen`, `quantitee`, `prix`, `responsable`, `status_don`, personnel.nom_et_prenom, patient.nom_et_prenom as 'nom' 
            FROM `soin`, `personnel`, `patient` 
            WHERE personnel.id = soin.code_personnel_soin 
            AND patient.code_patient = soin.code_patient_soin;"
        );
    
        $rechercheTable['informations4'] = [];

        while ($reponse = $requette5->fetch()) {
            extract($reponse);
            $pat = [
                "code_patient_soin" => strval($code_patient_soin),
                "code_personnel_soin" => strval($code_personnel_soin),
                "date_exam" => $date_exam,
                "true_date" => $true_date,
                "nature_examen" => $nature_examen,
                "responsable" => $responsable,
                "quantitee" => $quantitee,
                "prix" => $prix,
                "status_don" => strval($status_don),
                "nom_et_prenom" => $nom_et_prenom,
                "nom" => $nom,
            ];
            
            $rechercheTable['informations4'][] = $pat;
        }
        // var_dump($rechercheTable['informations'][0]['nom_et_prenom']);
        // echo count($rechercheTable['informations']);
        // On envoie le code réponse 200 OK
        

        for ($i=0; $i < count($rechercheTable['informations4']); $i++) { 
            $rechercheTable['informations4'][$i]['nature_examen'] = openssl_decrypt($rechercheTable['informations4'][$i]['nature_examen'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations4'][$i]['responsable'] = openssl_decrypt($rechercheTable['informations4'][$i]['responsable'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations4'][$i]['quantitee'] = openssl_decrypt($rechercheTable['informations4'][$i]['quantitee'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations4'][$i]['prix'] = openssl_decrypt($rechercheTable['informations4'][$i]['prix'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations4'][$i]['nom_et_prenom'] = openssl_decrypt($rechercheTable['informations4'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $rechercheTable['informations4'][$i]['nom'] = openssl_decrypt($rechercheTable['informations4'][$i]['nom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        }


    $requette6 = $bdd->query("SELECT `code_patient_dette`, `code_personnel_dette`, `date_de_dette`, `montant_de_dette`, `montant_soldee`, patient.nom_et_prenom, personnel.nom_et_prenom as 'nom_personnel' 
    FROM `dette`, `patient`, `personnel` 
    WHERE patient.code_patient = dette.code_patient_dette AND personnel.id = dette.code_personnel_dette
    AND date_de_paiement IS null");
    
    $rechercheTable['informations5'] = [];


    while ($reponse = $requette6->fetch()) {
        extract($reponse);
        $det = [
            "code_patient_dette" => strval($code_patient_dette),
            "code_personnel_dette" => strval($code_personnel_dette),
            "date_de_dette" => $date_de_dette,
            "montant_de_dette" => strval($montant_de_dette),
            "montant_soldee" => strval($montant_soldee),
            "nom_et_prenom" => $nom_et_prenom,
            "nom_personnel" => $nom_personnel,
        ];
        
        $rechercheTable['informations5'][] = $det;
    }
    // var_dump($rechercheTable['informations5'][0]['nom_et_prenom']);
    // echo count($rechercheTable['informations5']);
    // On envoie le code réponse 200 OK
    
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
    // $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

    for ($i=0; $i < count($rechercheTable['informations5']); $i++) { 
        // $rechercheTable['informations5'][$i]['date_de_dette'] = openssl_decrypt($rechercheTable['informations5'][$i]['date_de_dette'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations5'][$i]['nom_et_prenom'] = openssl_decrypt($rechercheTable['informations5'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations5'][$i]['nom_personnel'] = openssl_decrypt($rechercheTable['informations5'][$i]['nom_personnel'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    }

    $requette7 = $bdd->query(
        "SELECT 
        `code_patient_echo2eT`, 
        `code_personnel_echo2eT`, 
        echo2et.ID as 'ID_Echo', 
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
        `conclusion`, 
        personnel.nom_et_prenom, 
        patient.nom_et_prenom as 'nom' 
        FROM `echo2et`, patient, personnel 
        WHERE patient.code_patient = echo2et.code_patient_echo2eT 
        AND personnel.id = code_personnel_echo2eT
    ");

    $rechercheTable['informations6'] = [];


    while ($reponse = $requette7->fetch()) {
        extract($reponse);
        $ech = [
            "code_patient_echo2eT" => strval($code_patient_echo2eT),
            "code_personnel_echo2eT" => strval($code_personnel_echo2eT),
            "ID_Echo" => $ID_Echo,
            "date_exam" => $date_exam,
            "true_date" => $true_date,
            "indicateur" => $indicateur,
            "voie_exam" => $voie_exam,
            "condition_realisation" => $condition_realisation,
            "nombre_foetus" => $nombre_foetus,
            "type_grossece" => $type_grossece,
            "membrane" => $membrane,
            "activitee_cardiaque" => $activitee_cardiaque,
            "RFC" => $RFC,
            "MAF" => $MAF,
            "AC" => $AC,
            "DAT" => $DAT,
            "LCC" => $LCC,
            "BIP" => $BIP,
            "clarte_nucale" => $clarte_nucale,
            "HC" => $HC,
            "femur" => $femur,
            "terme" => $terme,
            "morphologie_pole_cephalique" => $morphologie_pole_cephalique,
            "abdomen" => $abdomen,
            "aspect_des_membres" => $aspect_des_membres,
            "liquide_amniotique" => $liquide_amniotique,
            "localisation_du_trophoblaste" => $localisation_du_trophoblaste,
            "aspect_du_trophoblaste" => $aspect_du_trophoblaste,
            "deroulement" => $deroulement,
            "conclusion" => $conclusion,
            "nom_et_prenom" => $nom_et_prenom,
            "nom" => $nom,
        ];
        
        $rechercheTable['informations6'][] = $ech;
    }

    for ($i=0; $i < count($rechercheTable['informations6']); $i++) { 
        // $rechercheTable['informations5'][$i]['date_de_dette'] = openssl_decrypt($rechercheTable['informations5'][$i]['date_de_dette'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['ID_Echo'] = openssl_decrypt($rechercheTable['informations6'][$i]['ID_Echo'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['date_exam'] = openssl_decrypt($rechercheTable['informations6'][$i]['date_exam'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['indicateur'] = openssl_decrypt($rechercheTable['informations6'][$i]['indicateur'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['voie_exam'] = openssl_decrypt($rechercheTable['informations6'][$i]['voie_exam'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['condition_realisation'] = openssl_decrypt($rechercheTable['informations6'][$i]['condition_realisation'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['nombre_foetus'] = openssl_decrypt($rechercheTable['informations6'][$i]['nombre_foetus'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['type_grossece'] = openssl_decrypt($rechercheTable['informations6'][$i]['type_grossece'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['membrane'] = openssl_decrypt($rechercheTable['informations6'][$i]['membrane'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['activitee_cardiaque'] = openssl_decrypt($rechercheTable['informations6'][$i]['activitee_cardiaque'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['RFC'] = openssl_decrypt($rechercheTable['informations6'][$i]['RFC'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['MAF'] = openssl_decrypt($rechercheTable['informations6'][$i]['MAF'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['AC'] = openssl_decrypt($rechercheTable['informations6'][$i]['AC'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['DAT'] = openssl_decrypt($rechercheTable['informations6'][$i]['DAT'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['LCC'] = openssl_decrypt($rechercheTable['informations6'][$i]['LCC'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['BIP'] = openssl_decrypt($rechercheTable['informations6'][$i]['BIP'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['clarte_nucale'] = openssl_decrypt($rechercheTable['informations6'][$i]['clarte_nucale'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['HC'] = openssl_decrypt($rechercheTable['informations6'][$i]['HC'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['femur'] = openssl_decrypt($rechercheTable['informations6'][$i]['femur'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['terme'] = openssl_decrypt($rechercheTable['informations6'][$i]['terme'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['morphologie_pole_cephalique'] = openssl_decrypt($rechercheTable['informations6'][$i]['morphologie_pole_cephalique'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['abdomen'] = openssl_decrypt($rechercheTable['informations6'][$i]['abdomen'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['aspect_des_membres'] = openssl_decrypt($rechercheTable['informations6'][$i]['aspect_des_membres'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['liquide_amniotique'] = openssl_decrypt($rechercheTable['informations6'][$i]['liquide_amniotique'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['localisation_du_trophoblaste'] = openssl_decrypt($rechercheTable['informations6'][$i]['localisation_du_trophoblaste'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['aspect_du_trophoblaste'] = openssl_decrypt($rechercheTable['informations6'][$i]['aspect_du_trophoblaste'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['deroulement'] = openssl_decrypt($rechercheTable['informations6'][$i]['deroulement'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['conclusion'] = openssl_decrypt($rechercheTable['informations6'][$i]['conclusion'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['nom_et_prenom'] = openssl_decrypt($rechercheTable['informations6'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations6'][$i]['nom'] = openssl_decrypt($rechercheTable['informations6'][$i]['nom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    }

    $requette8 = $bdd->query("SELECT `code_personnel_cons`, `code_patient_cons`, `date_consultation`, `true_date`, `type_de_consultation`, `quantitee`, `prix`, `resultat`, `status_don`, patient.nom_et_prenom, personnel.nom_et_prenom as 'nom_personnel' 
        FROM `consultation`, `patient`, `personnel` 
        WHERE patient.code_patient = consultation.code_patient_cons 
        AND personnel.id = consultation.code_personnel_cons;"
    );
    
    $rechercheTable['informations7'] = [];


    while ($reponse = $requette8->fetch()) {
        extract($reponse);
        $det = [
            "code_personnel_cons" => strval($code_personnel_cons),
            "code_patient_cons" => strval($code_patient_cons),
            "date_consultation" => $date_consultation,
            "true_date" => $true_date,
            "type_de_consultation" => $type_de_consultation,
            "quantitee" => $quantitee,
            "prix" => $prix,
            "resultat" => $resultat,
            "status_don" => strval($status_don),
            "nom_et_prenom" => $nom_et_prenom,
            "nom_personnel" => $nom_personnel,
        ];
        
        $rechercheTable['informations7'][] = $det;
    }
    // var_dump($rechercheTable['informations5'][0]['nom_et_prenom']);
    // echo count($rechercheTable['informations5']);
    // On envoie le code réponse 200 OK
    
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
    // $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

    for ($i=0; $i < count($rechercheTable['informations7']); $i++) { 
        // $rechercheTable['informations5'][$i]['date_de_dette'] = openssl_decrypt($rechercheTable['informations5'][$i]['date_de_dette'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations7'][$i]['type_de_consultation'] = openssl_decrypt($rechercheTable['informations7'][$i]['type_de_consultation'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations7'][$i]['quantitee'] = openssl_decrypt($rechercheTable['informations7'][$i]['quantitee'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations7'][$i]['prix'] = openssl_decrypt($rechercheTable['informations7'][$i]['prix'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations7'][$i]['resultat'] = openssl_decrypt($rechercheTable['informations7'][$i]['resultat'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations7'][$i]['nom_et_prenom'] = openssl_decrypt($rechercheTable['informations7'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations7'][$i]['nom_personnel'] = openssl_decrypt($rechercheTable['informations7'][$i]['nom_personnel'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    }
    $requette9 = $bdd->query("SELECT `code_patient_imagerie`, `code_personnel_imagerie`, `date_exam`, `true_date`, `nature_exam`, `quantitee`, `prix`, `status_don`, patient.nom_et_prenom, personnel.nom_et_prenom as 'nom_personnel' 
        FROM `imagerie`, `patient`, `personnel` 
        WHERE patient.code_patient = imagerie.code_patient_imagerie 
        AND personnel.id = imagerie.code_personnel_imagerie;"
    );
    
    $rechercheTable['informations8'] = [];


    while ($reponse = $requette9->fetch()) {
        extract($reponse);
        $det = [
            "code_patient_imagerie" => strval($code_patient_imagerie),
            "code_personnel_imagerie" => strval($code_personnel_imagerie),
            "date_exam" => $date_exam,
            "true_date" => $true_date,
            "nature_exam" => $nature_exam,
            "quantitee" => $quantitee,
            "prix" => $prix,
            "status_don" => strval($status_don),
            "nom_et_prenom" => $nom_et_prenom,
            "nom_personnel" => $nom_personnel,
        ];
        
        $rechercheTable['informations8'][] = $det;
    }
    // var_dump($rechercheTable['informations5'][0]['nom_et_prenom']);
    // echo count($rechercheTable['informations5']);
    // On envoie le code réponse 200 OK
    
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
    // $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

    for ($i=0; $i < count($rechercheTable['informations8']); $i++) { 
        // $rechercheTable['informations5'][$i]['date_de_dette'] = openssl_decrypt($rechercheTable['informations5'][$i]['date_de_dette'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations8'][$i]['nature_exam'] = openssl_decrypt($rechercheTable['informations8'][$i]['nature_exam'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations8'][$i]['quantitee'] = openssl_decrypt($rechercheTable['informations8'][$i]['quantitee'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations8'][$i]['prix'] = openssl_decrypt($rechercheTable['informations8'][$i]['prix'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations8'][$i]['nom_et_prenom'] = openssl_decrypt($rechercheTable['informations8'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations8'][$i]['nom_personnel'] = openssl_decrypt($rechercheTable['informations8'][$i]['nom_personnel'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    }

    $requette10 = $bdd->query("SELECT `code_personnel_scr`, `code_patient_scr`, `date_exam`, `true_date`, `prix`, `quantitee`, `resultat`, `status_don`, patient.nom_et_prenom, personnel.nom_et_prenom as 'nom_personnel' 
        FROM `screening_medicale_conta`, `patient`, `personnel` 
        WHERE patient.code_patient = screening_medicale_conta.code_patient_scr 
        AND personnel.id = screening_medicale_conta.code_personnel_scr;"
    );
    
    $rechercheTable['informations9'] = [];


    while ($reponse = $requette10->fetch()) {
        extract($reponse);
        $det = [
            "code_patient_scr" => strval($code_patient_scr),
            "code_personnel_scr" => strval($code_personnel_scr),
            "date_exam" => $date_exam,
            "true_date" => $true_date,
            "quantitee" => $quantitee,
            "prix" => $prix,
            "resultat" => $resultat,
            "status_don" => strval($status_don),
            "nom_et_prenom" => $nom_et_prenom,
            "nom_personnel" => $nom_personnel,
        ];
        
        $rechercheTable['informations9'][] = $det;
    }
    // var_dump($rechercheTable['informations5'][0]['nom_et_prenom']);
    // echo count($rechercheTable['informations5']);
    // On envoie le code réponse 200 OK
    
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
    // $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

    for ($i=0; $i < count($rechercheTable['informations9']); $i++) { 
        // $rechercheTable['informations5'][$i]['date_de_dette'] = openssl_decrypt($rechercheTable['informations5'][$i]['date_de_dette'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations9'][$i]['quantitee'] = openssl_decrypt($rechercheTable['informations9'][$i]['quantitee'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations9'][$i]['prix'] = openssl_decrypt($rechercheTable['informations9'][$i]['prix'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations9'][$i]['resultat'] = openssl_decrypt($rechercheTable['informations9'][$i]['resultat'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations9'][$i]['nom_et_prenom'] = openssl_decrypt($rechercheTable['informations9'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations9'][$i]['nom_personnel'] = openssl_decrypt($rechercheTable['informations9'][$i]['nom_personnel'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    }
    
    $requette11 = $bdd->query("SELECT `code_personnel_admin`, `code_patient_admin`, `date_administration`, `true_date`, `nature_du_document`, `prix`, `quantitee`, `contenue_du_document`, `status_don`, patient.nom_et_prenom, personnel.nom_et_prenom as 'nom_personnel' 
        FROM `administration`, `patient`, `personnel` 
        WHERE patient.code_patient = administration.code_patient_admin 
        AND personnel.id = administration.code_personnel_admin;"
    );
    
    $rechercheTable['informations10'] = [];


    while ($reponse = $requette11->fetch()) {
        extract($reponse);
        $det = [
            "code_patient_admin" => strval($code_patient_admin),
            "code_personnel_admin" => strval($code_personnel_admin),
            "date_administration" => $date_administration,
            "true_date" => $true_date,
            "nature_du_document" => $nature_du_document,
            "quantitee" => $quantitee,
            "prix" => $prix,
            "contenue_du_document" => $contenue_du_document,
            "status_don" => strval($status_don),
            "nom_et_prenom" => $nom_et_prenom,
            "nom_personnel" => $nom_personnel,
        ];
        
        $rechercheTable['informations10'][] = $det;
    }
    // var_dump($rechercheTable['informations5'][0]['nom_et_prenom']);
    // echo count($rechercheTable['informations5']);
    // On envoie le code réponse 200 OK
    
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
    // $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

    for ($i=0; $i < count($rechercheTable['informations10']); $i++) { 
        // $rechercheTable['informations5'][$i]['date_de_dette'] = openssl_decrypt($rechercheTable['informations5'][$i]['date_de_dette'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations10'][$i]['nature_du_document'] = openssl_decrypt($rechercheTable['informations10'][$i]['nature_du_document'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations10'][$i]['quantitee'] = openssl_decrypt($rechercheTable['informations10'][$i]['quantitee'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations10'][$i]['prix'] = openssl_decrypt($rechercheTable['informations10'][$i]['prix'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations10'][$i]['contenue_du_document'] = openssl_decrypt($rechercheTable['informations10'][$i]['contenue_du_document'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations10'][$i]['nom_et_prenom'] = openssl_decrypt($rechercheTable['informations10'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations10'][$i]['nom_personnel'] = openssl_decrypt($rechercheTable['informations10'][$i]['nom_personnel'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    }

    
    $requette12 = $bdd->query("SELECT `code_patient_vacc`, `code_personnel_vacc`, `date_exam`, `true_date`, `date_rendez-vous`, `nature_du_vaccin`, `quantitee`, `prix`, `observation`, `status_don`, patient.nom_et_prenom, personnel.nom_et_prenom as 'nom_personnel' 
        FROM `vaccination`, `patient`, `personnel` 
        WHERE patient.code_patient = vaccination.code_patient_vacc 
        AND personnel.id = vaccination.code_personnel_vacc;"
    );
    
    $rechercheTable['informations11'] = [];


    while ($reponse = $requette12->fetch()) {
        extract($reponse);
        $det = [
            "code_patient_vacc" => strval($code_patient_vacc),
            "code_personnel_vacc" => strval($code_personnel_vacc),
            "date_exam" => $date_exam,
            "true_date" => $true_date,
            "nature_du_vaccin" => $nature_du_vaccin,
            "quantitee" => $quantitee,
            "prix" => $prix,
            "observation" => $observation,
            "status_don" => strval($status_don),
            "nom_et_prenom" => $nom_et_prenom,
            "nom_personnel" => $nom_personnel,
        ];
        
        $rechercheTable['informations11'][] = $det;
    }
    // var_dump($rechercheTable['informations5'][0]['nom_et_prenom']);
    // echo count($rechercheTable['informations5']);
    // On envoie le code réponse 200 OK
    
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
    // $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

    for ($i=0; $i < count($rechercheTable['informations11']); $i++) { 
        $rechercheTable['informations11'][$i]['nature_du_vaccin'] = openssl_decrypt($rechercheTable['informations11'][$i]['nature_du_vaccin'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations11'][$i]['quantitee'] = openssl_decrypt($rechercheTable['informations11'][$i]['quantitee'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations11'][$i]['prix'] = openssl_decrypt($rechercheTable['informations11'][$i]['prix'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations11'][$i]['observation'] = openssl_decrypt($rechercheTable['informations11'][$i]['observation'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations11'][$i]['nom_et_prenom'] = openssl_decrypt($rechercheTable['informations11'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $rechercheTable['informations11'][$i]['nom_personnel'] = openssl_decrypt($rechercheTable['informations11'][$i]['nom_personnel'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    }


    }
    
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($rechercheTable);

}

    
// }
else {
    // mauvaise methode, on gere l'erreur

    http_response_code(405);
    echo json_encode(["message" => "la methode n'est pas autorisee"]);
}