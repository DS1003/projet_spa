<div class="promotions">
    <h2>promotions</h2>
    <span>Promos * Liste</span>
</div>

<div class="containe">

    <div class="dev">
        <div class="promo">
            <span>List Des Promotions <span class="un">(6)</span></span>
        </div>
        <form action="" class="input">
            <input type="text" placeholder="Recherche ici ..." class="text" name="search">
            <!-- <img src="public/images/equipement.png" alt="" class="equipement"  width="5%" height="100%"> -->
            <a href="#"> <button><i class="fa-solid fa-plus"></i>nouvel</button></a>

        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Libelle</th>
                <th>DateDebut</th>
                <th>DateFin</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php

            $promos = findPromotion();
            if (isset($_POST["search"])) {
                $promos = recherche($_POST["search"]);
            }

            $Promotion = findPromotion();
            foreach ($promos as $promo) :  ?>
                <tr>
                    <td><?= $promo['libelle'] ?> </td>
                    <td><?= $promo['dateDebut'] ?></td>
                    <td><?= $promo['dateFin'] ?></td>
                    <form action="" method="POST">
                        <td><input type="checkbox" onchange="this.form.submit()" value="<?= $promo['id_promotion'] ?>" name="activation" <?= $promo['status'] == '1' ? 'checked ' : '' ?>class="check"></td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>