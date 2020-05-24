<php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet"  href = "<?php echo base_url(); ?>css/style.css"> 
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>MyQuiz</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="row justify-content-center">
            <ul class="nav nav-pills">                
                <li class="nav-item">
                   <a class="nav-link<?php if((current_url())==(base_url().'Random/play')){?> active <?php }?>" href="<?php echo base_url(); ?>Random/play">Dobj egy quizt!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?php if((current_url())==(base_url().'User')){?> active <?php }?>" href="<?php echo base_url(); ?>User">Profil</a>
                </li>
                <li>
                    <a class="nav-link" dropdown-toggle data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admin</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item <?php if((current_url())==(base_url().'Admin/show')){?> active <?php }?>" href="<?php echo base_url(); ?>Admin/show">Összes kérdés</a>
                        <a class="dropdown-item <?php if((current_url())==(base_url().'Admin/pickQuestionTypeForCreate')){?> active <?php }?>" href="<?php echo base_url(); ?>Admin/pickQuestionTypeForCreate">Kérdés hozzáadás</a>
                        <a class="dropdown-item <?php if((current_url())==(base_url().'Admin/delete')){?> active <?php }?>" href="<?php echo base_url(); ?>Admin/delete">Kérdés törlése</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php if((current_url())==(base_url().'User/ShowAll')){?> active <?php }?>" href="<?php echo base_url(); ?>User/ShowAll">Felhasználók</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php if((current_url())==(base_url().'Admin/addNewAdmin')){?> active <?php }?>" href="<?php echo base_url(); ?>Admin/addNewAdmin">Új admin hozzáadása</a>
                    </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link<?php if((current_url())==(base_url().'Registration/register')){?> active <?php }?>" href="<?php echo base_url(); ?>Login/login" tabindex="-1" aria-disabled="true">Bejelentkezés/Regisztáció</a>
                </li>
                <li>
                      <a class="nav-link<?php if((current_url())==(base_url().'Logout/logout')){?> active <?php }?>" href="<?php echo base_url(); ?>Logout/logout" tabindex="-1" aria-disabled="true">Kijelentkezés</a>
                </li>
            </ul> 
            </div>
            </div>
            </div>            
        </div>
</header> 
   
   <div class='container col-lg-4'>
<?php echo form_open('Random/check');?>
        <?php for($i=0; $i<=3; $i++) : ?>
        <div class="card card-random">
            <div class="question">
                <div class="content">
                <p><?=$ThreeAns[$i]?></p>
                 <?php echo form_hidden($i.'hiddenThreeAnsId',$q2[$i]->id);?>
                </div>
            </div>
            <div class="answer">
                <tr><div class="content">
                    <?php echo form_error($i.'ThreeAns'); ?>
                    <td><?php echo form_radio($i.'ThreeAns', $Answer[$i]->a, TRUE); ?></td>
                    <td><?php echo form_label($Answer[$i]->a);?></td></div>
                </tr><br>
                <tr><div class="content">
                    <td><?php echo form_radio($i.'ThreeAns', $Answer[$i]->b, FALSE); ?></td>
                    <td><?php echo form_label($Answer[$i]->b);?></td></div>
                </tr><br>
                <tr><div class="content">
                    <td><?php echo form_radio($i.'ThreeAns', $Answer[$i]->c, FALSE); ?></td>
                    <td><?php echo form_label($Answer[$i]->c);?></td></div>
                    </tr>
            </div></div>
            <?php endfor; ?>    


        <?php for($i=0; $i<=3; $i++) : ?>
        <div class="card card-random">
            <div class="question">
                <div class="content">
                <p><?= $YNQ[$i]?></p>
                <?php echo form_hidden($i.'hiddenYNId',$q1[$i]->id);?>
                </div>
            </div>
            <div class="answer">
                <tr><div class="content">
                    <td><?php echo form_radio($i.'YN', 1, TRUE); ?></td>
                    <td><?php echo form_label('Igaz');?></td></div>
                </tr><br>
                <tr><div class="content">
                    <td><?php echo form_radio($i.'YN', 0, FALSE); ?></td>
                    <td><?php echo form_label('Hamis');?></td></div>
                </tr>
            </div></div>
            <?php endfor; ?>   
            <div class="send">
                  <?php echo form_submit('send', 'Ellenőrizzük');?>  
            </div>
   
</div>

    
    
<footer class="page-footer font-small fixed-bottom">
    <div class="container">
       <p>&copy; 2020 MyQuize All rights reserved.</p>
    </div>
</footer>
</body>
</html>

