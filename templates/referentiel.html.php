<div class="promotions">
	<h2 style="font-size: 1.1em;">Référentiels(Promotion <?php echo $activePromotion !== null ? $activePromotion : 'Aucune promotion active' ?>)</h2>
	<span>Référentiels * Création</span>
</div>

<div class="referent">

	<div class="main">
		<?php
		$refs = findAllReferentiels();
		if (isset($_POST["search"])) {
			$refs = recherche($_POST["search"]);
		}

		
		
		foreach ($refs as $referent) :  
			// ---- filtrer referentiel par promo
			if ($referent['id_promotion'] <= $activePromotion) {
		
		?>


			<div class="img">
				<span class="points">
					<ul>
						<li></li>
						<li></li>
						<li></li>
					</ul> 
				</span>
					<img src="<?= $referent['image'] ?>" onchange="this.form.submit()" name="toappofref" value="<?= $refselcted = $referent['nom'] ?>" alt="">
				<div class="ref">
					<span><?= $referent['nom'] ?></span> <br>
					<span class="active"><?= $referent['statut'] ?></span>
				</div>
			</div>

		<?php
	
			}
			endforeach; 
		
		?>

	</div>

	<div class="formRef">
		<h4>Noueau Référentiel</h4>
		<span>Libelle</span> <br>

		<i class="fa-regular fa-user" class="first-user"></i>
		<input type="text" class="libelle" placeholder=" entrer le Libelle"> <br>
		<i class="fa-regular fa-user" class="twon-user"></i>
		<textarea name="text" id="desc" cols="10" rows="5" placeholder="entrer la  descrition"></textarea>
		<button class="btn">Enregistrer</button>
	</div>
</div>