<?php require APPROOT . '/views/inc/header.php';
flash('reservationadd_message');
?>



<div class="container availability-form">
    <div class="row">
        <div class="col-lg-12 bg-white shadow p-4 rounded">
            <h5 class="mb-4">Filtrer les croisières :</h5>
            <form>
                <div class="row d-flex justify-content-around">
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Port :</label>
                        <select class="form-control" name="port_depart" id="port" required>
                            <option>--Select--</option>
                            <?php foreach ($data['croisieres'] as $port) : ?>
                                <option value="<?= $port->port_depart ?>"><?= $port->portdep ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Mois :</label>
                        <input id="date" type="month" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Navire :</label>
                        <select class="form-control" name="port_depart" id="navire" required>
                            <option value="">--select--</option>
                            <?php foreach ($data['croisieres'] as $navire) : ?>
                                <option value="<?= $navire->id_navire ?>"><?= $navire->nom ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>





<div id="heho" class="mt-5">
    <?php foreach ($data['croisieres'] as $key) { ?>
        <div class="row croisiere mb-3" style="background-color: gainsboro !important;">
            <div class="col-md-4 mt-5 mb-5">
                <img src="<?= URLROOT . "/uploads/" . $key->image ?>" style="width:100%; height:150px ;aspect-ratio: 1 ;object-fit:cover">
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

                <p class="prix"> <?= $key->prix  ?><span class="mad">MAD</span></p>
                <p class="mad">solo</p>
                <a href="<?= URLROOT . "/client/getBooking/" . $key->id_croisiere ?>" value="<?= $key->id_croisiere ?>" class="btn btn-outline-primary mb-3">Réserver</a>
                <p class="depart_dep"><?= $key->date_depart ?>
                <p>
            </div>
        </div>
    <?php } ?>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script src="http://localhost/ShipCruiseTour/js/filtre.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>