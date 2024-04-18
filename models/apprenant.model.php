<?php 

function findAllStudents(){
  

    // savefile(PATHAPRENANT, $student);

    $student = loadFile(PATHAPRENANT);

return $student;

}

function findAllReferentiels()
{

    // savefile(PATHREFERENTIEL, $referentiel);

    $referentiel = loadFile(PATHREFERENTIEL);


    return $referentiel;
}



//  filtrer  par email  
function recherche($filtrer){
    $recherches=findAllStudents();
    $result=[];
foreach($recherches as  $recherche ) {  

    if($recherche["email"]==trim($filtrer)){
        $result[]=$recherche;
    }       
}  
return $result;
}

// fonction pagination
$eleByPage=10 ;
$pageEtu = isset($_GET['pageAff']) ? $_GET['pageAff'] : 1;
$totalPage=ceil(count(findAllStudents())/$eleByPage); //ceil() fonction qui arrondit par exee
// echo($pageEtu<1 || $pageEtu>$totalPage);
if($pageEtu<1 || $pageEtu>$totalPage)
header("Location:?page=$page&pageAff=1");
$eleDeb = ($pageEtu-1)*$eleByPage;
$etudiantsPage = array_slice(findAllStudents(), $eleDeb, $eleByPage);




$apprenants =findAllStudents();
$apprenants = $etudiantsPage;
if (isset($_POST["search"])){
    $apprenants= recherche($_POST["search"]);
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