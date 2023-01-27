<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row croisiere mb-5">
    <?php
    flash('reservationdelete_message');
    echo $_SESSION['user_name']
    ?>

    <?php foreach ($data['reserv'] as $key) { ?>
        <div class="row croisiere mb-5" style="background-color: gainsboro !important;">
            <div class="col-md-4">
                <img src="<?= URLROOT . "/uploads/" . $key->image ?>" width="100%" height="100%"">
                        </div>
                        <div class=" col-md-5 p-3">
                <p class="nuit"><?= $key->nbr_nuit ?>Nuits</p>
                <h4 class="title_vg"><?= $key->title ?></h4>
                <p><img width="30px" height="30px" src="<?= URLROOT . "/uploads/" . $key->image ?>" alt="cruise"> <?= $key->nom  ?></p>
                <p><span class="depart_dep">Port de départ :</span> <?= $key->portdep  ?> </p>
                <p><span class="depart_dep">L'escale à :</span>

                    <?php foreach ($data['traget'] as $key2) {
                        if ($key->id_croisiere == $key2->id_cr) {

                            echo "<p>" . $key2->nom . "\t(" . $key2->pays . ")" . "<br></p>";
                        };
                    }
                    ?>

                </p>


            </div>
            <div class="col-md-3 text-center p-3" id="prix_div">

                <p class="prix"> <?= $key->taman  ?><span class="mad">MAD</span></p>
                <p class="mad"><?= $key->type  ?></p>
                <a href="<?= URLROOT . "/client/cancel/" . $key->id_reserv ?>" value="<?= $key->id_croisiere ?>" class="btn btn-outline-primary mb-3">cancel</a>
                <p class="depart_dep"><?= $key->date_depart ?>
                <p>
            </div>
        </div>
    <?php } ?>
    <?php require APPROOT . '/views/inc/footer.php'; ?>