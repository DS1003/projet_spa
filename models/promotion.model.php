<?php

function findPromotion()
{

    // savefile(PATHPROMOTION, $promotion);

    $promotion = loadFile(PATHPROMOTION);

    return $promotion;
}



// filtrer haut de  la page champ de recherche
function recherche($search)
{
    $recherches = findPromotion();
    $result = [];
    foreach ($recherches as  $recherche) {

        if ($recherche["libelle"] == trim($search)) {
            $result[] = $recherche;
        }
    }
    return $result;
}

function enablePromotion($idPromo)
{
    $promotions = findPromotion();
    foreach ($promotions as &$promo) {
        if ($promo["id_promotion"] == $idPromo) {
            $promo["status"] = 1;
        } else {
            $promo["status"] = 0;
        }
    }
    savefile(PATHPROMOTION, $promotions);
}

if (isset($_POST["activation"])) {
    $_SESSION["id_promotion"] = $_POST["activation"];
    $idPromo = $_POST["activation"];
    enablePromotion($idPromo);
}


function findActivePromotion($csvFile) {
    $handle = fopen($csvFile, "r");
    if ($handle !== false) {
        // Ignorer l'en-tête du fichier CSV
        fgetcsv($handle);
        while (($data = fgetcsv($handle)) !== false) {
            // Convertir la ligne CSV en tableau associatif
            $promotion = [
                'id' => $data[0],
                'libelle' => $data[1],
                'dateDebut' => $data[2],
                'dateFin' => $data[3],
                'status' => $data[4]
            ];
            // Vérifier si la promotion est active
            if ($promotion['status'] == 1) {
                fclose($handle);
                return $promotion['id'];
            }
        }
        fclose($handle);
    }
    return null; // Aucune promotion active trouvée
}

$activePromotion = findActivePromotion(PATHPROMOTION);