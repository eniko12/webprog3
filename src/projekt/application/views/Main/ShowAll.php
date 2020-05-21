<php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>MyQuize</title>
</head>
<body>
    <header class="section-header">
       <nav class="navbar navbar-main navbar-expand navbar-light border-bottom">
    <div class="container">
        <a class="logo" href="#">MyQuize</a>
        <a class="logo" href="../RegistrationController/register">Regisztráció</a>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Keressünk egy quizt!</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link">Profil</a>
                </li> 
            </ul>
        </div>
        <!-- collapse  END -->
    </div>
    <!-- container  END -->
</nav>
    </header>  
    
    <div class="container">
  <table class="table table-responsive">
  <thead>
    <tr>
      <!--<th scope="col">Id</th>-->
      <th scope="col">Kérdés_Id</th>
      <th scope="col">Kérdés</th>
      <th scope="col">Helyes Válasz</th>
      <th scope="col">A) válasz</th>
      <th scope="col">B) válasz</th>
      <th scope="col">C) válasz</th> 
    </tr>
  </thead>
  <tbody>
    
      <?php for($i=0; $i<count($q1); $i++): ?>  
      <tr>
        <!--<th scope="row"><br><?#  =$q1[$i]->id?></th>-->
        <td><?=$q1[$i]->question_id?></td> 
        <td><?=$YNQ[$i]?></td>
        <td><?=$q1[$i]->answer?><td>
        <td>-<td> 
        <td>-<td> 
        <td>-<td> 
      </tr>
      <?php endfor; ?>
      
      <?php for($i=0; $i<count($q2); $i++): ?>   
      <tr>
        <!--<th scope="row"><br><?#  =$q2[$i]->id?></th>-->
        <td><?=$q2[$i]->question_id?></td>
        <td><?=$ThreeAns[$i]?></td>
        <td><?=$Answer[$i]->correct?><td> 
        <td><?=$Answer[$i]->a?><td> 
        <td><?=$Answer[$i]->b?><td> 
        <td><?=$Answer[$i]->c?><td>    
      </tr>
    <?php endfor; ?>
   
    
  </tbody>
</table>
    </div>
    
<footer class="page-footer font-small blue fixed-bottom">
    <div class="container">
       <p>&copy; 2020 MyQuize All rights reserved.</p>
    </div>
</footer>
</body>
</html>
    
            

