<?php echo form_open_multipart(); ?>
    <?php echo form_label("A kérdéseket tartalmazó file: ");?> <br>
        <?php echo form_upload('ThreeAnsFile');?><br>
<?php echo form_submit('submit', 'Küldés');?>
<?php echo form_close();?>

