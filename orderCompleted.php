<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <title> PlantsE-Commerce </title>
    <link rel="stylesheet" href="style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="text/cart.js" type="text/javascript"></script>
    <script src="text/deleteCookie.js"type="text/javascript"></script>
<script src="text/js.cookie.js" type="text/javascript"></script>
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
          <li><a href="contattaci.php">Contattaci</a></li>
          <li class="current_page_item"><a href="login.php">Login</a></li>
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
      <div id="orderCompleted">
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
          $cardNumber = $_POST['cardNumber'];
          $cardCVV =  $_POST['cardCVV'];
          $creditCard_deadline = $_POST['creditCard_deadline'];
          $creditCard_owner = $_POST['creditCard_owner'];

          $total = 0;
          foreach ($_COOKIE as $key => $value) {
            $result = DBManager::getInstance()->getProductById($key);
            $row = $result->fetch_assoc();
            $total += ($row['product_price'] * $value);
          }

          DBManager::getInstance()->addPayment($cardNumber, $creditCard_deadline, $creditCard_owner);
          $lastPayment = DBManager::getInstance()->getLastPayment();
          DBManager::getInstance()->addOrder($total,$name,$address,$city, $provincia, $CAP, $country,$phone,$mail,$lastPayment);
          $lastOrderID = DBManager::getInstance()->getLastOrder();
          foreach($_COOKIE as $key => $value){
            $prod = DBManager::getInstance()->getProductById($key);
            $row = $prod->fetch_assoc();
            $totOrderPrice = ($value * $row['product_price']);
            $inStock = DBManager::getInstance()->getStockProduct($key);
            $newQty = $inStock - $value;
            DBManager::getInstance()->removeFromStock($key, $newQty);
            DBManager::getInstance()->addOrderDetails($lastOrderID,$key,$value, $totOrderPrice);
          }

        ?>
        <h1> Il suo ordine è stato preso in carico, la consegna è prevista entro 5 giorni lavorativi </h1>


    </div>
  </div>


    <div id="copyright" class="container">
    	<p>&copy; Untitled. All rights reserved. | Progetto Esame Tecnologie Web | Federico Marinelli - Marco Mancini - Ivan Gorbenko</a>.</p>
    </div>


  </body>
</html>
