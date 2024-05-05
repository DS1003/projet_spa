<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion ODC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            width: 100vw;
            background-color: rgb(240, 240, 240);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .connexion {
            height: 35rem;
            width: 28rem;
            position: relative;
            left: 2.5%;
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .logo {
            height: 3em;
            width: 7.5em;
            position: absolute;
            left: 7%;
            top: 3%;
        }

        .part1 {
            height: 15em;
            width: 100%;
            background-color: white;
            position: absolute;
            top: 15%;
            border-radius: 1em;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .alertmsg {
            height: 2.7rem;
            width: 90%;
            border: 1px solid red;
            position: absolute;
            top: 5%;
            border-radius: 0.5em;
            background-color: rgba(255, 0, 0, 0.329);
            color: rgb(184, 0, 0);
            text-align: center;
            display: flex;
            justify-content: center;
        }

        h1 {
            font-size: 1rem;
            align-self: center;
            z-index: 2;
        }

        .pseudo {
            height: 6rem;
            width: 100%;
            border-radius: 0.5em;
            position: absolute;
            top: 31%;
            left: 5%;
            display: flex;
            flex-direction: column;
        }

        .pseudo-input {
            height: 2.7rem;
            width: 90%;
            border-radius: 0.5em;
            border: 0.5px solid gray;
            position: absolute;
            top: 25%;
            padding: 10px;
        }

        .label-pseudo {
            font-size: 0.85em;
            font-weight: 100;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: rgb(0, 0, 0);
        }

        span {
            color: red;
        }

        .mdp {
            height: 6rem;
            width: 100%;
            border-radius: 0.5em;
            position: absolute;
            top: 65%;
            left: 5%;
            display: flex;
            flex-direction: column;
        }

        .part2 {
            width: 100%;
            height: 2rem;
            position: absolute;
            top: 62%;
        }

        .divlog {
            width: 100%;
            position: absolute;
            bottom: 22%;
            height: 10%;
        }

        .login {
            height: 100%;
            width: 100%;
            background-color: rgb(0, 170, 170);
            border: none;
            border-radius: 0.5em;
            cursor: pointer;
            font-size: 1em;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 600;
            color: white;
        }

        .fa-eye-slash {
            position: absolute;
            left: 82%;
            top: 40%;
        }
    </style>
</head>

<body>
    <form class="connexion" action="" method="post">

        <input type="hidden" name="page" value="1">

        <img class="logo" src="../public/images/logo-SA.png" alt="">
        <div class="part1">
            <div class="alertmsg">
                <h1>Email et mot de passe obligatoire !</h1>
            </div>
            <div class="pseudo">
                <label class="label-pseudo" for="">Email Address <span>*</span></label>
                <input type="email" class="pseudo-input" placeholder="Entrer votre email">
            </div>
            <div class="mdp">
                <label class="label-pseudo" for="">Mot de passe <span>*</span></label>
                <input type="password" class="pseudo-input" placeholder="Entrer votre mot de passe">
                <i class="fa-solid fa-eye-slash" style="color: #000000;"></i>
            </div>
        </div>
        <div class="part2">
            <input type="checkbox">
            <label for="" style="position: absolute; left: 5%; top: 0; font-size: 0.9em; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Remember me</label>
            <a href="" style="color: rgb(0, 146, 156); position: absolute; left: 65%;">Mot de passe oublié ?</a>
        </div>
        <div class="divlog">
            <button class="login" type="submit">Login</button>
        </div>
    </form>
</body>

</html>