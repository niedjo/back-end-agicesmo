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

    function difference_jours($date1, $date2) {
        $datetime1 = date_create($date1);
        $datetime2 = date_create($date2);
        $interval = date_diff($datetime1, $datetime2);
        if ($datetime1 > $datetime2) {
            $interval->invert = 1;
        }
        return $interval->format('%r%a');
    }

    $bdd = new PDO("mysql:host=$server;dbname=$dbname",$username,$password);
    $bdd->exec("set names utf8");

    $requette = $bdd->query("SELECT * FROM `stock`, `gerer_stock` WHERE stock.id_stock = gerer_stock.id_stock order by gerer_stock.id_stock desc;");
    
    $stocksTable = [];
    $stocksTable['stock'] = [];


    while ($reponse = $requette->fetch()) {
        extract($reponse);
        $st = [
            "id_stock" => strval($id_stock),
            "code_personnel" => strval($code_personnel),
            "nom" => $nom,
            "date_entree_stock_globale" => $date_entree_stock_globale,
            "date_entree_stock_jour" => $date_entree_stock_jour,
            "date_entree_stock_garde" => $date_entree_stock_garde,
            "quantitee_stock_globale" => $quantitee_stock_globale,
            "quantitee_stock_jour" => $quantitee_stock_jour,
            "quantitee_stock_garde" => $quantitee_stock_garde,
            "prix" => $prix,
            "date_peram" => $date_peram,
            "date_entree_stock_globale2" => $date_entree_stock_globale2,
            "date_entree_stock_jour2" => $date_entree_stock_jour2,
            "date_entree_stock_garde2" => $date_entree_stock_garde2,
            "quantitee_stock_globale2" => $quantitee_stock_globale2,
            "quantitee_stock_jour2" => $quantitee_stock_jour2,
            "quantitee_stock_garde2" => $quantitee_stock_garde2,
            "date_peram2" => $date_peram2,
        ];
        
        $stocksTable['stock'][] = $st;
    }
    // var_dump($stocksTable['stock'][0]['nom_et_prenom']);
    // echo count($stocksTable['stock']);
    // On envoie le code réponse 200 OK
    
    $key = 'poefjlhdnslhf9834727%^&*ksdfnjwekjfnjwesdkh';
    // $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');

    for ($i=0; $i < count($stocksTable['stock']); $i++) { 
        $stocksTable['stock'][$i]['nom'] = openssl_decrypt($stocksTable['stock'][$i]['nom'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $stocksTable['stock'][$i]['date_entree_stock_globale'] = openssl_decrypt($stocksTable['stock'][$i]['date_entree_stock_globale'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $stocksTable['stock'][$i]['date_entree_stock_jour'] = openssl_decrypt($stocksTable['stock'][$i]['date_entree_stock_jour'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $stocksTable['stock'][$i]['date_entree_stock_garde'] = openssl_decrypt($stocksTable['stock'][$i]['date_entree_stock_garde'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $stocksTable['stock'][$i]['quantitee_stock_globale'] = openssl_decrypt($stocksTable['stock'][$i]['quantitee_stock_globale'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $stocksTable['stock'][$i]['quantitee_stock_jour'] = openssl_decrypt($stocksTable['stock'][$i]['quantitee_stock_jour'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $stocksTable['stock'][$i]['quantitee_stock_garde'] = openssl_decrypt($stocksTable['stock'][$i]['quantitee_stock_garde'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $stocksTable['stock'][$i]['prix'] = openssl_decrypt($stocksTable['stock'][$i]['prix'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $stocksTable['stock'][$i]['date_peram'] = openssl_decrypt($stocksTable['stock'][$i]['date_peram'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    
        $stocksTable['stock'][$i]['date_entree_stock_globale2'] = openssl_decrypt($stocksTable['stock'][$i]['date_entree_stock_globale2'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $stocksTable['stock'][$i]['date_entree_stock_jour2'] = openssl_decrypt($stocksTable['stock'][$i]['date_entree_stock_jour2'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $stocksTable['stock'][$i]['date_entree_stock_garde2'] = openssl_decrypt($stocksTable['stock'][$i]['date_entree_stock_garde2'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $stocksTable['stock'][$i]['quantitee_stock_globale2'] = openssl_decrypt($stocksTable['stock'][$i]['quantitee_stock_globale2'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $stocksTable['stock'][$i]['quantitee_stock_jour2'] = openssl_decrypt($stocksTable['stock'][$i]['quantitee_stock_jour2'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $stocksTable['stock'][$i]['quantitee_stock_garde2'] = openssl_decrypt($stocksTable['stock'][$i]['quantitee_stock_garde2'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
        $stocksTable['stock'][$i]['date_peram2'] = openssl_decrypt($stocksTable['stock'][$i]['date_peram2'], 'aes-256-cbc', $key, 0, 'ma_iv#29&jhweblo');
    
    }


    // on etait sensee suprimee les stocks perimees et tous ...

   
    // $date_actuelle = date('Y-m-d');
    // for ($i = 0; $i < count($stocksTable['stock']); $i++) {
    //     if (
    //         intval($stocksTable['stock'][$i]['quantitee_stock_globale']) <= 0 && 
    //         intval($stocksTable['stock'][$i]['quantitee_stock_globale']) <= 0 &&
    //         intval($stocksTable['stock'][$i]['quantitee_stock_globale']) <= 0 ||
    //         intval(difference_jours($date_actuelle, $stocksTable['stock'][$i]['date_peram'])) < 1
    //         ) 
    //         {

    //             $id_stock = intval($stocksTable['stock'][$i]['id_stock']);
    //             $sql = "DELETE FROM `gerer_stock` WHERE id_stock = $id_stock; DELETE FROM `stock` WHERE id_stock = $id_stock;";

    //             $requette = $bdd->prepare($sql);
    //             $requette->execute();
    //     } 
    // }
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($stocksTable);

}
else {
    // mauvaise methode, on gere l'erreur

    http_response_code(405);
    echo json_encode(["message" => "la methode n'est pas autorisee"]);
}