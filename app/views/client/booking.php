<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?= URLROOT ?>/client/" class="btn btn-light"><i class="fa fa-backward"></i>back</a>

<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="booking-form">
                    <form action="" method="post">
                        <div class="form-group">
                            <span class="form-label">Room Type</span>
                            <select class="form-control" name="room" required>
                                    <?php foreach ($data['detail'] as $key) { ?>
                                    <option value="" selected hidden>Select room type</option>
                                    <option value="<?=$key->id_ch?>"><?= $key->type ."\t".$key->prix ?> </option>
                                    <?php } ?>
                                </select>
                                <span class="select-arrow"></span>

                        </div>
                        <div class="form-group">
                            <span class="form-label">Email</span>
                            <input class="form-control" type="email" value="<?= $_SESSION['user_email'] ?>">
                        </div>
                        <div class="form-group">
                            <span class="form-label">Phone</span>
                            <input class="form-control" type="tel" required placeholder="Enter your phone number">
                        </div>
                        <div class="form-btn">
                            <button class="submit-btn">Book Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>