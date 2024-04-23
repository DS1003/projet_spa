<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
<div class="tout">

    <div class="container">
        <img class="logo" src="assets/img/Logo-Sonatel-Academy.png" alt="">
        <form action="" method="post">
        <div class="login-form">
        <?php if (isset($login)): ?>
                <div class="first"><?php echo htmlspecialchars($login); ?></div>
            <?php endif; ?>
            <label for="email">Adresse Email <span>*</span></label><br>
            <span style="color:red"><?= $validator['emailError'] ?? '' ?></span>
            <input type="text" name="email" id="email" placeholder="Entrez votre adresse email*" >
            <label for="password">Mot de Passe <span>*</span></label>
            <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe*" >
            <span style="color:red"><?= $validator['passwordError'] ?? '' ?></span>
            <button class="btn" >Login</button>
        </div>
        </form>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember"> Se souvenir de moi
            </label>
            <a href="#">Mot de passe Oublié?</a>
        </div>
       
    </div>
</div>
</body>
</html>
