<?php
$users = [1, 1]; //listerTab('datas/users.csv');


if (!empty($_POST)) {
    //$login = $_POST['login'];
    //$password = $_POST['password'];
    extract($_POST);
    $validator = validerDonneesLogin($email, $password);

    if (!empty($validator['login']) && !empty($validator['password'])) {
        extract($validator);
        $login = login($users, $login, $password);
        if (isset($login['userConnect'])) {
            $_SESSION['user'] = $login['userConnect'];
           // dd($_SESSION);
            header('Location: ?page=promotions');
        }
    }
}



function validerDonneesLogin($login, $password)
{
    $erreur = [];

    if (empty($login)) {
        $erreur['emailError'] = "Veuillez renseigner votre email";
    } elseif (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
        $erreur['emailError'] = "Le format de l'email n'est pas valide";
    }

    if (empty($password)) {
        $erreur['passwordError'] = "Veuillez renseigner votre mot de passe";
    }

    if (!empty($erreur)) {
        return $erreur;
    } else {
        return ['login' => $login, 'password' => $password];
    }
}

function login($users, $login, $password)
{
    $userConnect = false;

    foreach ($users as $user) {
        if ($user['email'] == $login && password_verify($password, $user['mot_de_passe'])) {
            if ($user["etat"] == "1") {
                $userConnect = $user;
                break; // Utilisateur trouvé et connecté, pas besoin de continuer la boucle
            } elseif ($user['etat'] == "0") {
                return "Compte suspendu, veuillez contacter l'administrateur.";
            }
        }
    }

    if ($userConnect === false) {
        return "Identifiant ou mot de passe incorrect.";
    }

    return ['userConnect' => $userConnect];
}

