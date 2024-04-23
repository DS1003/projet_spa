<?php

function findAllReferentiels() {

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


function addref($nom, $description, $imagePath, $toactivepromo) {
    $uploadref = findAllReferentiels();
    foreach ($uploadref as &$ref) {
        $ref['image'] = $imagePath; // Enregistrer le chemin de l'image dans les données du référentiel
    }
    savefile(PATHREFERENTIEL, $uploadref);
}
/*
if (isset($_POST["add-ref"])) {
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $id_promo = $_POST["toactivepromo"];

    // Traitement du téléchargement de l'image
    $imagePath = uploadImage($_FILES['image']); // Utiliser $_FILES au lieu de $_REQUEST
    var_dump($_FILES['image']);
    // Ajout du référentiel avec le chemin de l'image
    addref($nom, $description, $imagePath, $id_promo);
}

// Fonction pour gérer le téléchargement de l'image
 */

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






// Fonction pour vérifier si un référentiel existe déjà dans le fichier CSV
function isRefExists($nom) {
    $filePath = PATHREFERENTIEL; // Chemin vers le fichier CSV

    if (file_exists($filePath)) {
        $file = fopen($filePath, 'r');
        while (($line = fgetcsv($file)) !== false) {
            if ($line[2] == $nom) { // Vérifier si le nom du référentiel existe déjà
                fclose($file);
                return true; // Le référentiel existe déjà
            }
        }
        fclose($file);
    }

    return false; // Le référentiel n'existe pas encore
}

function uploadImage($file) {
    $targetDir = PATHREFERENTIEL; // Répertoire où enregistrer les images téléchargées
    $targetFile = $targetDir . basename($file["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $newFileName = uniqid() . '.' . $imageFileType; // Générer un nom de fichier unique

    // Vérifier si le fichier est une image réelle
    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        // Vérifier la taille de l'image (optionnel)
        // if ($file["size"] > 500000) {
        //     echo "Désolé, votre fichier est trop volumineux.";
        //     return false;
        // }
        
        // Déplacer le fichier téléchargé vers le répertoire de destination avec le nouveau nom
        if (move_uploaded_file($file["tmp_name"], $targetDir . $newFileName)) {
            return $targetDir . $newFileName;
        } else {
            echo "Une erreur s'est produite lors du téléchargement de votre fichier.";
            return false;
        }
    } else {
        echo "Le fichier téléchargé n'est pas une image.";
        return false;
    }
}

function addRefToCSV($nom, $image, $statut, $id_promotion) {
    $filePath = PATHREFERENTIEL; // Chemin vers le fichier CSV

    // Télécharger l'image et obtenir son chemin
    $imagePath = uploadImage($image);
    if ($imagePath === false) {
        echo "Erreur lors du téléchargement de l'image.";
        return false;
    }

    // Lire le contenu actuel du fichier CSV s'il existe
    $data = [];
    if (file_exists($filePath)) {
        $file = fopen($filePath, 'r');
        while (($line = fgetcsv($file)) !== false) {
            $data[] = $line; // Ajouter la ligne au tableau
        }
        fclose($file);
    }

    // Ajouter une nouvelle ligne pour le référentiel
    $newRow = [count($data) + 1, $imagePath, $nom, $statut, $id_promotion];
    $data[] = $newRow;

    // Réécrire le fichier CSV avec les nouvelles données
    $file = fopen($filePath, 'w');
    foreach ($data as $line) {
        fputcsv($file, $line);
    }
    fclose($file);

    return true; // Indiquer que l'opération s'est terminée avec succès
}

if (isset($_POST["add-ref"])) {
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $image = $_FILES["image"];
    $statut = "Active"; // Statut par défaut
    $id_promotion = isset($_POST["toactivepromo"]) ? $activePromotion : null;

    // Vérifier si les champs nom et description sont vides
    if (empty($nom) && empty($description)) {
        echo "Les champs nom et description sont obligatoires.";
    } elseif (empty($nom)) {
        echo "Le champ nom est obligatoire.";
    } elseif (empty($description)) {
        echo "Le champ description est obligatoire.";
    } elseif (isRefExists($nom)) {
        echo "Un référentiel avec ce nom existe déjà.";
    } else {
        // Ajouter le référentiel au fichier CSV
        if (addRefToCSV($nom, $image, $statut, $id_promotion)) {
            echo "Le référentiel a été ajouté avec succès au fichier CSV.";
        } else {
            echo "Une erreur s'est produite lors de l'ajout du référentiel au fichier CSV.";
        }
    }
}


