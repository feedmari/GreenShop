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
    <form action="insertCreditCardInfo.php" method="post" >
      <div id="customerInfo2">
        <h1 class="highlights2"> Riepilogo informazioni inserite </h1>
        <div class="horizontalInfo">
          <h2>Nome</h2>
          <input type="hidden" value= <?php echo $_POST['name'] ?> name = "name"> <h3 id="nameInfo">
          <?php
            echo $_POST['name'];
          ?></h3>
        </div>

        <div class="horizontalInfo">
          <h2>Cognome</h2>
          <input type="hidden" value= <?php echo $_POST['surname'] ?> name = "surname"> <h3>
          <h3>
          <?php
            echo $_POST['surname'];
          ?></h3>
        </div>

        <div class="horizontalInfo">
          <h2>Indirizzo</h2>
          <input type="hidden" value= <?php echo $_POST['address'] ?> name = "address"> <h3>
          <h3>
          <?php
            echo $_POST['address'];
          ?></h3>
        </div>

        <div class="horizontalInfo">
          <h2>Provincia</h2>
          <input type="hidden" value= <?php echo $_POST['provincia'] ?> name = "provincia"> <h3>
          <h3>
          <?php
            echo $_POST['provincia'];
          ?></h3>
        </div>

        <div class="horizontalInfo">
          <h2>Città</h2>
          <input type="hidden" value= <?php echo $_POST['city'] ?> name = "city"> <h3>
          <h3>
          <?php
            echo $_POST['city'];
          ?></h3>
        </div>

        <div class="horizontalInfo">
          <h2>CAP</h2>
          <input type="hidden" value= <?php echo $_POST['CAP'] ?> name = "CAP"> <h3>
          <h3>
          <?php
            echo $_POST['CAP'];
          ?></h3>
        </div>

        <div class="horizontalInfo">
        <h2>Paese</h2>
        <input type="hidden" value= <?php echo $_POST['country'] ?> name = "country"> <h3>
          <h3>
          <?php
            echo $_POST['country'];
          ?></h3>
        </div>

        <div class="horizontalInfo">
          <h2>Cellulare</h2>
          <input type="hidden" value= <?php echo $_POST['phone'] ?> name = "phone"> <h3>
          <h3>
          <?php
            echo $_POST['phone'];
          ?></h3>
        </div>

        <div class="horizontalInfo">
          <h2>Email</h2>
          <input type="hidden" value= <?php echo $_POST['mail'] ?> name = "mail"> <h3>
          <h3>
          <?php
            echo $_POST['mail'];
          ?></h3>
        </div>

      </div>

      <div id="productInfo">
        <h1 class="highlights3"> Riepilogo Prodotti </h1>

        <div id="scrollableProducts">
          <?php
		
		header('Content-Type: text/html; charset=Windows-1252');

            foreach($_COOKIE as $key=>$val){

              $result = DBManager::getInstance()->getProductById($key);
              $row = $result->fetch_assoc();


              echo '<div class="prodContainer">';
              echo "<h1>".$row['product_name']."</h1>";
              echo '<div class="leftProdContainer">';
              echo "<img src=".$row['product_image']."  width=170  height=170   >";
              echo "</div>";
              echo '<div class="rightProdContainer">';
              echo $row['product_description'];
              echo '</div>';
              echo '<div class="rightBottProdContainer">';
              echo "<h3 ><span class='rightH3'> Prezzo: </span> " .$row['product_price']."€</h3>";
              echo "<h3><span class='rightH3'> Quantità: </span>" .$val ."</h3>";
              echo '</div>';
              echo "</div>";


            }

          ?>
        </div>
      </div>
      <div id="total">
        <h2> Totale </h2>
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
          €
        </h3>
        <input  type="submit" value="Procedi" id="buttonRiepilogo" name="submit">
      </div>
    </form>


  </div>


    <div id="copyright" class="container">
    	<p>&copy; Untitled. All rights reserved. | Progetto Esame Tecnologie Web | Federico Marinelli - Marco Mancini - Ivan Gorbenko</a>.</p>
    </div>


  </body>
</html>
