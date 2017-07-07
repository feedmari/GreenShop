<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <title> PlantsE-Commerce </title>
    <link rel="stylesheet" href="style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="text/cart.js" type="text/javascript"></script>
    <script src="text/orderbyfunc.js" type="text/javascript"></script>
    <script src="text/openProd.js" type="text/javascript"></script>
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

      <!-- SHOPPING CART -->
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
      <div id="summary">
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
          $cardNumber = $_POST['creditCard_numb'];
          $cardCVV =  $_POST['creditCard_cvv'];
          $creditCard_deadline = $_POST['creditCard_deadline'];
          $creditCard_owner = $_POST['creditCard_owner'];


        ?>
        <h1 class="highlights3"> Riepilogo finale dell'ordine </h1>

        <form action="orderCompleted.php" method="post">
          <div class="horizontalSummary">
            <h2> Sig./Sig.ra </h2>
            <h3> <?php echo $name; echo " "; echo $surname; ?> </h3>
          </div>

          <div class="horizontalSummary">
            <h2> Indirizzo di consegna </h2>
            <h3> <?php echo $address; echo " ("; echo $country; echo ")" ?> </h3>
          </div>

          <div class="horizontalSummary">
            <h2> Numero carta </h2>
            <h3> <?php echo $cardNumber ?> </h3>
          </div>

          <div class="horizontalSummary">
            <h2>Totale spesa</h2>
            <h3>
              <?php
              $total = 0;
              foreach($_COOKIE as $key=>$val){
                $result = DBManager::getInstance()->getProductById($key);
                $row = $result->fetch_assoc();

                $total += ($row['product_price'] * $val);
              }
              echo $total;
            ?>
            €</h3>
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

          <input type="hidden" value= <?php echo $cardNumber ?> name="cardNumber">
          <input type="hidden" value= <?php echo $cardCVV ?> name="cardCVV">
          <input type="hidden" value= <?php echo $creditCard_deadline ?> name="creditCard_deadline">
          <input type="hidden" value= <?php echo $creditCard_owner ?> name="creditCard_owner">




          <input id="submitOrder" type="submit" value="Concludi l'ordine" class="buttons_contact" name="submitComment">
      </form>
    </div>
  </div>


    <div id="copyright" class="container">
    	<p>&copy; Untitled. All rights reserved. | Progetto Esame Tecnologie Web | Federico Marinelli - Marco Mancini - Ivan Gorbenko</a>.</p>
    </div>


  </body>
</html>
