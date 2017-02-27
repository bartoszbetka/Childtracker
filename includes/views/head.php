<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">



    <title><?php echo $data['seo_title']; ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,800,300italic,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <script src='https://www.google.com/recaptcha/api.js'></script>


    <!-- Custom styles for this template -->

    <link href="<?php echo URL; ?>/public/assets/main.css" rel="stylesheet">



  </head>



  <body>

	<div id="header">

  <div id="logo">
  <img src="image/66161.png" style="float:left;"/>
  <span style="color:#5588EE;">Child</span>tracker
  <div style="clear:both;"></div>
  </div>




		<nav>	


			<ul>

				<li><a href="index.php">Strona Główna</a></li>

        <li><a href="index.php?p=about">O Nas</a></li>

        <li><a href="index.php?p=contact">Kontakt</a></li>



			 

       <?php if( db_check( $data['con'] ) ) { ?>

       <li><a href="index.php?p=map">Informacje o dziecku</a></li>

       <div id="info">

      <li><a>Zalogowany jako: <?php echo $_SESSION['user_email']; ?></a></li>

      <li><a href="index.php?p=logout">Wyloguj</a></li>
      </div>
    <?php }else{ ?>

      <form action="" method="post">
        
        <div class="fields">

          <div class="field">

            <label for="l_email">Email</label> 

            <input type="text" name="l_email" value="" placeholder="Email" required />

          </div>

          <div class="field">

            <label for="l_pass">Hasło</label> 

            <input type="password" name="l_pass" placeholder="Password" required />
             <div id="blad">
         
         <?php if(isset($_SESSION['blad'])) { ?>
         


         <?php echo $_SESSION['blad']; ?>
         <?php unset($_SESSION['blad']) ?>

         <?php } ?>
      </div>
          </div>
       
          <div class="field">

            <label for="l_submit"><br></label> 
              <input type="hidden" name="l_submit" value="what you want">
              <input type="image" src="image/zaloguj.png">
             <a href="index.php?p=registration" id="submit"><u>Rejestracja</u></a>
          </div>
          
      </div>
      
      </form>
      
    <?php } ?>
         

      </div>



      </ul>

    
    </nav>
 
	</div>