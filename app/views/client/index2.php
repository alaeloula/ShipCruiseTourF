<?php require APPROOT . '/views/inc/header.php'; ?>





<section class="page-section bg-light" id="portfolio">

    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Portfolio</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
            <?php
            foreach ($data['croisieres'] as $key) { ?>
            <div class="row">
                <!-- <div class="col-lg-4 col-sm-6 mb-4"> -->
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="<?= URLROOT ."/client/getBooking/". $key->id_croisiere?>">
                            <div class="portfolio-hover">
                                <a href="<?= URLROOT ."/client/getBooking/". $key->id_croisiere?>"><div class=""><i class="fas fa-plus fa-3x"></i></div></a>
                            </div>
                            <img class="img-fluid" src="<?= URLROOT . "/uploads/" . $key->image ?>" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading"><?= $key->title ?></div>
                            <div class="portfolio-caption-subheading text-muted"><?= $key->date_depart ."\t".$key->portdep ?></div>
                            <div class="portfolio-caption-subheading text-muted"><?= $ky->prixe ."$" ?></div>
                        </div>
                    </div>
                <!-- </div> -->

            </div>
            <?php } ?>
    </div>
</section>





<!-- Portfolio item 6 modal popup-->
<?php require APPROOT . '/views/inc/footer.php'; ?>