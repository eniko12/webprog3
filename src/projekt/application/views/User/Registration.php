<?php echo validation_errors(); ?>
<?php echo form_open(); ?>

<?php echo form_label('Felhasználónév:','name'); ?>
<?php echo form_input('name',set_value('name',''),[ 'id' => 'emp_name']); ?>
<?php echo form_error('name');?>
<br/>
<?php echo form_input('Email',set_value('email',''), [ 'placeholder' => 'minta@gmail.com']); ?>
<?php echo form_error('email'); ?>
<br/>
<?php echo form_input('Jelszó',set_value('passw',''),[ 'placeholder' => 'Ide írd a jelszavad']); ?>
<?php echo form_error('ssn'); ?>
<br/>
<?php #echo form_input('photo_path',set_value('photo_path',''), ['placeholder' => 'Kép eléréis útja']); ?>
<?php #echo form_error('photo_path'); ?>

<?php echo form_submit('submit','Beküld'); ?>
<?php echo form_close(); ?>