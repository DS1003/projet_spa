<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="promotions">
	<h2 style="font-size: 1.1em; position:relative; left:30px; color: #009780;">Référentiels(Promotion <?php echo $activePromotion !== null ? $activePromotion : 'Aucune promotion active' ?>)</h2>
	<span>Référentiels * Création</span>
</div>
<div class="content">
    <!--  ================================================== Contetenue à intégrér ================================================ -->
    <div class="list-ref">
        <div class="cards">
            <?php 
                $refs = findAllReferentiels();
                if (isset($_POST["searh"])) {
                    $refs = recherche($_POST["search"]);
                }

                foreach ($refs as $referent) :  
                    // ---- filtrer referentiel par promo
                    if ($referent['id_promotion'] <= $activePromotion && $referent['id_promotion'] != null) {
            ?>
            <div class="card">
                <span>...</span>
                <div class="photo"><img style="height: 170px;" src="<?= $referent['image'] ?>" onchange="this.form.submit()" name="toappofref" value="<?= $refselcted = $referent['nom'] ?>" alt=""></div>
                <p style="font-weight: 600;"><?= $referent['nom'] ?></p>
                <p style="color: green; cursor: pointer;"><?= $referent['statut'] ?></p>
            </div>
            <?php
                }
                endforeach; 
		    ?>
        </div>
        <form class="new-ref" method="post" enctype="multipart/form-data">
            <input type="hidden" name="add-ref">
            <label class="toggle">
                <input type="checkbox" name="toactivepromo">
                <span class="slider"></span>
            </label>
            <div class="formulaire" >
                <span>Nouveau Référentiel</span>
                <label for="">libelle</label>
                <input type="text" placeholder="Entrez le libelle" name="nom">
                <label for="">Description</label>
                <input type="description" placeholder="Entrez la description" name="description">
                <input id="uploadfile" type="file" name="image" value="image">
                <button type="submit">Enregistrer</button>
                <input type="hidden">
            </div>
        </form>
    </div>
</div>