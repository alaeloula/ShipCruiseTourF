<?php require APPROOT . '/views/inc/header.php';
flash('delete_nav_message');
?>
<a href="<?= URLROOT ?>/admin/" class="btn btn-light"><i class="fa fa-backward"></i>back</a>

<table class="table">
    <tr>
        <th>id</th>
        <th>nom</th>
        <th>more details</th>
    </tr>
    <?php
    
    foreach ($data['navires'] as $key) {?> 
   
    <tr>
        <td><?php echo $key->id_n ?></td>
        <td><?php echo $key->nom ?></td>
        <td><a href="<?= URLROOT ?>/admin/getnvch/<?=$key->id_n?>"><i class="fas fa-eye"></i></a></td>
        <td><a href="<?= URLROOT ?>/admin/deleteNavire/<?=$key->id_n?>"><i class="fas fa-trash"></i></a></td>
    </tr>
    <?php };?>
</table>
<?php require APPROOT . '/views/inc/footer.php';
?>