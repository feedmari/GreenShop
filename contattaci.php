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
          <li><a href="catalogo.php">Catalogo</a></li>
          <li   class="current_page_item"><a href="contattaci.php">Contattaci</a></li>
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
    <div id="contactUs">
      <form action="commentSent.php" method="post" >
          <fieldset id="contact" name="contattami">
            <legend>Contattaci</legend>
            <div id="emailAndUser">
              <label id="user">
                Utente:
                <input type="text" name="utente" autocomplete="on"
                required pattern="[a-z]{1}[a-z_]{2,19}"
                title="A nickname is composed by lowercase letters and '_'; 3 to 20 chars are allowed."
                placeholder="Inserisci nome utente">
              </label>
              <label id="email">
                Email:
                <input type="email" name="email" autocomplete="on" placeholder="email@domain.ext">
              </label>
            </div>
            <div id="message">
              <h3> Messaggio </h3>
              <label id="mex">

                <textarea id="textMessage" name="messaggio" placeholder="scrivi qui il tuo messaggio(massimo 300 caratteri) " maxlength="300" required></textarea>
              </label>
            </div>
          </fieldset>
          <div id="buttons">
            <input id="reset" type="reset"  value="Resetta la form" class="buttons_contact">
            <input id="submit" type="submit" value="Invia il commento" class="buttons_contact" name="submitComment">

          </div>
        </form>
    </div>
  </div>


    <div id="copyright" class="container">
    	<p>&copy; Untitled. All rights reserved. | Progetto Esame Tecnologie Web | Federico Marinelli - Marco Mancini - Ivan Gorbenko</a>.</p>
    </div>


  </body>
</html>
