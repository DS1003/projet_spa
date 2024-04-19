<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            height: 100vh;
            width: 100vw;
            background-color: rgb(240, 240, 240);
            display: flex;
        }
        button {
            border: none;
        }
        .content {
            position: relative;
            top: 10%;
            left: 19%;
            height: 82%;
            width: 80%;
/*             border: 2px dashed #009087;
 */            
        }

        /* ------------------------------------- Liste referentiel ---------------------------------------- */
        
        .list-ref {
/*             border: #000000 solid 1px;
 */            height: 100%;
            width: 100%;
            display: flex;
        }
        .cards {
/*             border: rebeccapurple solid 4px;
 */         flex: 4;
            display: flex;
            flex-wrap: wrap;
            gap: .7rem;
        }
        .new-ref {
/*             border: yellowgreen solid 4px;
 */            display: flex;
            position: relative;
            height: 100%;
            width: 25%;
            justify-content: center;
        }
        .card {
            height: 45%;
            width: 24%;
            background-color: white;
            border-radius: 10px;
            box-shadow: #000000 1 1 0 0 0.111;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .card span {
            align-self: flex-start;
            margin-left: 1em;
            font-size: 1em;
            position: relative;
            top: 5%;
        }
        .card p {
                font-size: 1em;
                z-index: 2;
                position: relative;
                top: 20%;
                margin-left: .5em;
        }
        .formulaire {
            height: 55%;
            width: 95%;
            background-color: white;
            border-radius: 10px;
            box-shadow: #000000 1 1 0 0 0.111;
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: .5em;
            span {
                align-self: flex-start;
                margin-left: .5em;
                margin-top: 1em;
                font-weight: 800;
                font-size: 1.2em;
            }
        }
        .formulaire label {
            align-self: flex-start;
            margin-left: 1em;
            font-size: .8em;
            margin-top: 1em;
        }
        .formulaire input {
            width: 95%;
            height: 15%;
            padding-left: 2em;
            border-radius: 5px;
            border: 1px solid gray;
        }
        .formulaire>button {
            height: 3em;
            width: 40%;
            border-radius: 5px;
            background-color: #009087;
            color: white;
            font-weight: 600;
        }
        
        #uploadfile>button  {
            background-color: #009087;
            height: 2em;
            color: white;
            border: none;
        }
        .photo {
            background-color: whitesmoke;
            height: 50%;
            width: 90%;
            position: relative;
            top: 12%;
        }
   </style>
</head>
<body>
           <div class="content">
            <!--  ================================================== Contetenue à intégrér ================================================ --> 
                <div class="list-ref">
                    <div class="cards">
                        <div class="card">
                            <span>...</span>
                            <div class="photo"></div>
                            <p style="font-weight: 600;">Dev Web mobile</p>
                            <p style="color: green;">Active</p>
                        </div>
                        <div class="card">
                            <span>...</span>
                            <div class="photo"></div>
                            <p style="font-weight: 600;">Réferent Digital</p>
                            <p style="color: green;">Active</p>
                        </div>
                        <div class="card">
                            <span>...</span>
                            <div class="photo"></div>
                            <p style="font-weight: 600;">Aws</p>
                            <p style="color: green;">Active</p>
                        </div>
                        <div class="card">
                            <span>...</span>
                            <div class="photo"></div>
                            <p style="font-weight: 600;">Hackeuse</p>
                            <p style="color: green;">Active</p>
                        </div>
                        <div class="card">
                            <span>...</span>
                            <div class="photo"></div>
                            <p style="font-weight: 600;">Developpement Data</p>
                            <p style="color: green;">Active</p>
                        </div>
                    </div>
                    <div class="new-ref">
                        <div class="formulaire">
                            <span>Nouveau Référentiel</span>
                            <label for="">libelle</label>
                            <input type="text" placeholder="Entrez le libelle">
                            <label for="">Description</label>
                            <input type="text" placeholder="Entrez la description">
                            <input id="uploadfile" type="file" name="" value="">
                            
                            <button type="submit">Enregistrer</button>
                        </div>
                    </div>
                </div>

            
           </div>
        </div>
    </div>
</body>
</html>