<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <title> PlantsE-Commerce </title>
    <link rel="stylesheet" href="style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="text/cart.jr" type="text/javascript"></script>
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
    <div id="insertCreditCard">
        <h1 class="highlights3"> Informazioni pagamento </h1>
        <?php
          $name = $_POST['name'];
          $surname = $_POST['surname'];
          $address = $_POST['address'];
          $provincia = $_POST['provincia'];
          $city = $_POST['city'];
          $CAP = $_POST['CAP'];
          $country = $_POST['country'];
          $phone = $_POST['phone'];
          $mail = $_POST['mail'];
        ?>
        <form action="summary.php" method="post" >
          <div class="horizontalInfoCC">
            <h2>Numero carta</h2>
            <input  class="insertCustomerInfo" type="text" name="creditCard_numb" autocomplete="on" placeholder="Numero della carta" required>
          </div>

          <div class="horizontalInfoCC">
            <h2>CVV</h2>
            <input   class="insertCustomerInfo" type="text" name="creditCard_cvv" autocomplete="on" placeholder="CVV carta" required>
          </div>

          <div class="horizontalInfoCC">
            <h2>Data di scadenza</h2>
            <input   class="insertCustomerInfo" id="dateCreditCard" type="date" name="creditCard_deadline" autocomplete="on" placeholder="Data di scadenza carta" required>
          </div>

          <div class="horizontalInfoCC">
            <h2>Intestatario carta</h2>
            <input  class="insertCustomerInfo" type="text" name="creditCard_owner" autocomplete="on" placeholder="Intestatario carta" required>
          </div>

          <input type="hidden" value= <?php echo $name ?> name="name">
          <input type="hidden" value= <?php echo $surname ?> name="surname">
          <input type="hidden" value= <?php echo $address ?> name="address">
          <input type="hidden" value= <?php echo $provincia ?> name="provincia">
          <input type="hidden" value= <?php echo $city ?> name="city">
          <input type="hidden" value= <?php echo $CAP ?> name="CAP">
          <input type="hidden" value= <?php echo $country ?> name="country">
          <input type="hidden" value= <?php echo $phone ?> name="phone">
          <input type="hidden" value= <?php echo $mail ?> name="mail">

          <input  type="submit" value="Procedi" id="buttonCard" name="submit">
        </form>
    </div>
  </div>

    <div id="copyright" class="container">
    	<p>&copy; Untitled. All rights reserved. | Progetto Esame Tecnologie Web | Federico Marinelli - Marco Mancini - Ivan Gorbenko</a>.</p>
    </div>


  </body>
</html>
