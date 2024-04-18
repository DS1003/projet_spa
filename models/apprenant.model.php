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


function listPresence()
{
    // savefile(PATHPRESENCE, $presence);

    $presence = loadFile(PATHPRESENCE);
    return $presence;
}

// filtrer haut de  la page champ de recherche
function recherche1($search)
{
    $recherches = listPresence();
    $result = [];
    foreach ($recherches as  $recherche) {
        if ($recherche["matricule"] == trim($search)) {
            $result[] = $recherche;
        }
    }
    return $result;
}


// filtre et pagination 
$presences = listPresence();
$eleByPage = 6;
$pageEtu = $_GET['pageAff'] ?? 1;
$_SESSION['affichePresence'] = $_REQUEST;
function filtrerPresences($presences)
{

    $sess = $_SESSION["affichePresence"];
    @$statut_filtre = $sess['status'];
    @$referentiel_filtre = $sess['referenciel'];

    return ($statut_filtre == "" || $presences["status"] == $statut_filtre) &&
        ($referentiel_filtre == "" ||  $presences["referenciel"] == $referentiel_filtre);
}
$listeFiltre = array_filter($presences, 'filtrerPresences');

$totalPage = ceil(count($listeFiltre) / $eleByPage);

if ($pageEtu < 1 || $pageEtu > $totalPage)
    $pageEtu = 0;
$eleDeb = ($pageEtu - 1) * $eleByPage;
$etudiantsPage = array_slice($listeFiltre, $eleDeb, $eleByPage);


$presence = listPresence();
$presence = $etudiantsPage;
if (isset($_POST["search"])) {
    $presence = recherche($_POST["search"]);
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