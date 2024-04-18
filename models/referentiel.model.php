<?php

function findAllReferentiels()
{

    // savefile(PATHREFERENTIEL, $referentiel);

    $referentiel = loadFile(PATHREFERENTIEL);


    return $referentiel;
}



// filtrer haut de  la page champ de recherche
function recherche($search)
{
    $recherches = findAllReferentiels();
    $result = [];
    foreach ($recherches as  $recherche) {

        if ($recherche["nom"] == trim($search)) {
            $result[] = $recherche;
        }
    }
    return $result;
}


function findActivePromotion($csvFile)
{
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


