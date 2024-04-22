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

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // On inclut les fichiers de configuration et d'accès aux données
    
    include("ConstantesBd.php");

    $constantes = new Constant();

    $server = $constantes->server;
    $dbname = $constantes->dbname;
    $username = $constantes->username;
    $password = $constantes->password;

    $bdd = new PDO("mysql:host=$server;dbname=$dbname",$username,$password);
    $bdd->exec("set names utf8");

    try {
        $requette = $bdd->query(
            "SELECT 
            `code_patient_sceen`, 
            `code_personnel_screec`, 
            `date_exam`, 
            `true_date`, 
             screening_medicale.age as 'age', 
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
            `autre_observations`, 
            personnel.nom_et_prenom, 
            patient.nom_et_prenom as 'nom'
            FROM `screening_medicale`, `personnel`, `patient`
            WHERE patient.code_patient = screening_medicale.code_patient_sceen 
            AND personnel.id = screening_medicale.code_personnel_screec;"
        );
    
        $screening_medicale_table[] = [];
        $screening_medicale_table['screening_medicale'] = [];
    
        while ($reponse = $requette->fetch()) {
            extract($reponse);
            $pat = [
                "code_patient_sceen" => strval($code_patient_sceen),
                "code_personnel_screec" => strval($code_personnel_screec),
                "date_exam" => $date_exam,
                "true_date" => $true_date,
                "age" => $age,
                "telephone_personne_a_contacter" => $telephone_personne_a_contacter,
                "resultat_examene_biologique" => $resultat_examene_biologique,
                "antecedants_personel" => $antecedants_personel,
                "problemes_de_santes_actuels" => $problemes_de_santes_actuels,
                "tousse_depuis_plus_de_deux_semaines" => $tousse_depuis_plus_de_deux_semaines,
                "transpiration_nocturne" => $transpiration_nocturne,
                "fievre_persistante" => $fievre_persistante,
                "fatigue_ou_perte_dapetit" => $fatigue_ou_perte_dapetit,
                "amaigrissement" => $amaigrissement,
                "contact_avec_un_tuberculeux" => $contact_avec_un_tuberculeux,
                "oederme_de_membre_inferieur" => $oederme_de_membre_inferieur,
                "est_actuelement_sous_traitement_de" => $est_actuelement_sous_traitement_de,
                "date_de_derniere_regle" => $date_de_derniere_regle,
                "gravida_para" => $gravida_para,
                "autre_histoire_medicale" => $autre_histoire_medicale,
                "element_dalergie" => $element_dalergie,
                "profil_toxicologique" => $profil_toxicologique,
                "tension_arteriele" => $tension_arteriele,
                "poids" => $poids,
                "taille" => $taille,
                "indice_de_masse_corporelle" => $indice_de_masse_corporelle,
                "nombre_denfant_accompagnant" => $nombre_denfant_accompagnant,
                "bilan_lesionnel" => $bilan_lesionnel,
                "examen_dentree_anormale" => $examen_dentree_anormale,
                "blessure" => $blessure,
                "abus_de_substance" => $abus_de_substance,
                "gale" => $gale,
                "diarhee" => $diarhee,
                "probleme_dentaire" => $probleme_dentaire,
                "symptomes_de_tuberculoses" => $symptomes_de_tuberculoses,
                "IST" => $IST,
                "statut_nutritionnel_anormale" => $statut_nutritionnel_anormale,
                "descision_ou_action" => $descision_ou_action,
                "autre_observations" => $autre_observations,
    
                "nom_et_prenom" => $nom_et_prenom,
                "nom" => $nom
            ];
            
            $screening_medicale_table['screening_medicale'][] = $pat;
        }
        // var_dump($screening_medicale_table['informations'][0]['nom_et_prenom']);
        // echo count($screening_medicale_table['informations']);
        // On envoie le code réponse 200 OK

        $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
        
    
        for ($i=0; $i < count($screening_medicale_table['screening_medicale']); $i++) { 
            $screening_medicale_table['screening_medicale'][$i]['telephone_personne_a_contacter'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['telephone_personne_a_contacter'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['resultat_examene_biologique'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['resultat_examene_biologique'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['date_exam'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['date_exam'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['age'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['age'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['antecedants_personel'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['antecedants_personel'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['problemes_de_santes_actuels'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['problemes_de_santes_actuels'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['tousse_depuis_plus_de_deux_semaines'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['tousse_depuis_plus_de_deux_semaines'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['transpiration_nocturne'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['transpiration_nocturne'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['fievre_persistante'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['fievre_persistante'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['fatigue_ou_perte_dapetit'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['fatigue_ou_perte_dapetit'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['amaigrissement'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['amaigrissement'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['contact_avec_un_tuberculeux'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['contact_avec_un_tuberculeux'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['oederme_de_membre_inferieur'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['oederme_de_membre_inferieur'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['est_actuelement_sous_traitement_de'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['est_actuelement_sous_traitement_de'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['date_de_derniere_regle'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['date_de_derniere_regle'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['gravida_para'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['gravida_para'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['autre_histoire_medicale'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['autre_histoire_medicale'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['element_dalergie'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['element_dalergie'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            // $screening_medicale_table['screening_medicale'][$i]['element_dalergie'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['element_dalergie'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            // $screening_medicale_table['screening_medicale'][$i]['profil_toxicologique'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['profil_toxicologique'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['profil_toxicologique'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['profil_toxicologique'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['tension_arteriele'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['tension_arteriele'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['poids'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['poids'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['taille'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['taille'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['indice_de_masse_corporelle'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['indice_de_masse_corporelle'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['nombre_denfant_accompagnant'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['nombre_denfant_accompagnant'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['bilan_lesionnel'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['bilan_lesionnel'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['examen_dentree_anormale'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['examen_dentree_anormale'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['blessure'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['blessure'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['abus_de_substance'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['abus_de_substance'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['gale'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['gale'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['diarhee'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['diarhee'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['probleme_dentaire'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['probleme_dentaire'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['symptomes_de_tuberculoses'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['symptomes_de_tuberculoses'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['IST'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['IST'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['statut_nutritionnel_anormale'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['statut_nutritionnel_anormale'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['descision_ou_action'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['descision_ou_action'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['autre_observations'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['autre_observations'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            
            $screening_medicale_table['screening_medicale'][$i]['nom_et_prenom'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['nom_et_prenom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
            $screening_medicale_table['screening_medicale'][$i]['nom'] = openssl_decrypt($screening_medicale_table['screening_medicale'][$i]['nom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        }
        
    } catch (\Throwable $th) {
        echo $th;
    }

        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($screening_medicale_table);

}
else {
    // mauvaise methode, on gere l'erreur

    http_response_code(405);
    echo json_encode(["message" => "la methode n'est pas autorisee"]);
}