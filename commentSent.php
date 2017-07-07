<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <title> PlantsE-Commerce </title>
    <link rel="stylesheet" href="style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="text/cart.js" type="text/javascript"></script>
    <script src="text/slideShow.js" type="text/javascript"></script>
    <script type="text/javascript" src="text/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="text/jssor.slider.mini.js"></script>
  </head>
  <body>
    <div id="wrapper">
    <div id="menu-wrapper">
      <nav>
      <div id="menu" class="container">
        <ul class= "navbar-left">
          <li><a href="index.php">Homepage</a></li>
          <li  class="current_page_item"><a href="catalogo.php">Catalogo</a></li>
          <li><a href="contattaci.php">Contattaci</a></li>
          <li><a href="login.php">Login</a></li>
          </ul>
          <ul class="navbar-right">
            <li><a href="#" id="cart"><i class="fa fa-shopping-cart"></i> Carrello <span class="badge">
            <?php

              echo count($_COOKIE);
            ?>
          </span></a></li>
          </ul>
        </div>
        </nav>
        <!-- end #menu -->


        <?php
        require 'php/printCart.php';
        printCart();
        ?>
        <!--end shopping-cart -->




   
        <?php
        require 'php/slideShow.php';
        ?>
    </div>
  </div>

  <div id="content">
    <div id="correct_comment_sent">
      <?php
      if(isset($_REQUEST['submitComment']))
      {
        include 'php/dbmanager.php';
        $utente = $_POST['utente'];
        $email = $_POST['email'];
        $messaggio = $_POST['messaggio'];
        $result=DBManager::getInstance()->insertComment($utente, $email, $messaggio);
        if($result == true){
          echo "<h1> Commento inviato correttamente! </h1>";
        }else{
            echo "<h1> Ops! C'è stato un problema! </h1>";
        }
      }
      ?>


    </div>
  </div>

    <div id="copyright" class="container">
    	<p>&copy; Untitled. All rights reserved. | Progetto Esame Tecnologie Web | Federico Marinelli - Marco Mancini - Ivan Gorbenko</a>.</p>
    </div>


  </body>
</html>
