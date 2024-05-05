<?php

if (isset($_POST["new-referentiel"])) {
    $state_ref = $_POST["status_hidden"];
    $libelle = trim($_POST["libelle"]);
    $description = trim($_POST["description"]);
    $selectedImage = "";
    // Vérification si un fichier image a été téléchargé
    if (!empty($_FILES["image"]["name"])) {
        $selectedImage = $_FILES["image"]["name"];
    }
    if (empty($libelle) && empty($description)) {
        $libEmptyOrNull = true;
        $descEmptyOrNull = true;
    } else {
        if (!empty($libelle) && empty($description)) {
            $libEmptyOrNull = false;
            $descEmptyOrNull = true;
        }

        if (empty($libelle) && !empty($description)) {
            $libEmptyOrNull = true;
            $descEmptyOrNull = false;
        }
    }
    foreach ($referentiels as $ref) {
        if (strtolower($ref["libelle"]) == strtolower($libelle) && (int)$state_ref == 1) {
            $refAlreadyExists = true;
            break;
        }
    }
    if (!$refAlreadyExists && !empty($libelle) && !empty($description)) {
        if ((int)$state_ref == 0) {
            saveReferentiel($state_ref, $libelle, $description, $selectedImage, 0);
        } else {
            saveReferentiel($state_ref, $libelle, $description, $selectedImage, $activeNumberPromo);
        }
        $_POST["libelle"] = "";
        $_POST["description"] = "";
        $referentiels = findAllReferentiels();
    }
    include("../templates/partial/layout.html.php");
}


function saveReferentiel($state_ref, $libelle, $description, $selectedImage, $activeNumberPromo)
{
    $referentiel["libelle"] = $libelle;
    $referentiel["description"] = $description;
    $referentiel["etat"] = $state_ref;
    $referentiel["promotion"] = $activeNumberPromo;

    // Vérification si un fichier image a été téléchargé
    if (!empty($selectedImage)) {
        $referentiel["image"] = saveReferentielImage($selectedImage);
    } else {
        $referentiel["image"] = ""; // Enregistre une chaîne vide si aucun fichier image n'est sélectionné
    }


    saveFile("referentiel.csv", $referentiel);
}

function saveReferentielImage($imageFile)
{
    $targetDirectory = "../public/images/";
    $targetFile = $targetDirectory . basename($imageFile);
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
    return $targetFile;
}
