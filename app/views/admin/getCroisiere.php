<?php require APPROOT . '/views/inc/header.php';
flash('delete_cruise_message');
?>
<a href="<?= URLROOT ?>/admin/" class="btn btn-light"><i class="fa fa-backward"></i>back</a>

<table class="table" id="table">
    <tr>
        <th>nom</th>
        <th>image</th>
        <th>nbr de nuit</th>
        <th>date de depart</th>
        <th>port de depart</th>
        <th>ship</th>
        <th>traget</th>
    </tr>
    <?php

    foreach ($data['croisieres'] as $key) { ?>

        <tr>
            <td><?= $key->title ?></td>
            <td><img style="width: 40px; height: 50px;" src="<?= URLROOT . "/uploads/" . $key->image ?>" alt="khbzabnina" srcset=""></td>
            <td><?php echo $key->nbr_nuit ?></td>
            <td><?php echo $key->port_dep ?></td>
            <td><?php echo $key->date_depart ?></td>
            <td><?php echo $key->ship ?></td>
            
            <td>
            <?php foreach ($data['traget'] as $key2) { 
                if ($key->id_croisiere == $key2->id_cr) {
                    
                    echo $key2->nom ."\t(". $key2->pays .")"."<br>";
                 }; 
                }
                ?> 
                
            </td>
            <td><a href="<?= URLROOT ?>/admin/deleteNavire/<?= $key->id_croisiere ?>"><i class="fas fa-trash"></i>edit</a></td>
        </tr>
   
    <?php }; ?>
</table>
<?php require APPROOT . '/views/inc/footer.php';
?>