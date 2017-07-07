<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <title> PlantsE-Commerce </title>
    <link rel="stylesheet" href="style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="text/jquery.js" type="text/javascript"></script>
    <script src="text/cart.js" type="text/javascript"></script>
    <script src="text/openProd.js" type="text/javascript"></script>
    <script src="text/addToCart.js" type="text/javascript"></script>
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
      <div id="lastPlant">
        <h1 class="highlights">Novità</h1>
        <h3> <?php
          $result = DBManager::getInstance()->getLastInsertedProduct();
          $row = ($result->num_rows > 0)? $result->fetch_assoc() : 'Error';
          echo $row["product_name"];
        ?></h3>

        <figure id="lastPlantImg">
            <img  alt="Ultima pianta inserita"
            <?php

                echo 'src="';
                echo $row["product_image"];
                echo '" height=400 width=400>';
            ?>
        </figure>

        <div id="desc">
          <h2> Descrizione </h2>
          <h3><?php echo $row["product_description"]; ?> </h3>
        </div>

        <div id="price">
          <h2> Prezzo </h2>
          <h3> <?php echo $row['product_price']." €"; ?> </h3>
        </div>
        <div id="buy_and_info_box">
          <div class="prodSelection">
            <div class="idp" style="display: none;" >
              <?php echo $row['product_id']; ?>
            </div>
          </div>


        <?php
          //redirect per mostrare il prodotto selezionato by fede
         echo "<a href=".'"catalogo.php?idprodotto='.$row['product_id'].'#prodDescription"><button type="button" id="infoLastProduct" class="buttons_lastProd"> Maggiori Informazioni </button></a>';
         ?>

          <a href="#" id="buyLastProduct" class="buttons_lastProd">Acquista</a>
        </div>
    </div>


    <div id="mostSelledProducts">
      <h1 class="highlights"> I Più Venduti! </h1>
      <?php
      $result = DBManager::getInstance()->getBestSellers(); //sta funzione prende in ingresso un intero che di default è 9 ed è usata nella query
      if($result->num_rows > 0) {
        $i = 0;
        while($row = $result->fetch_assoc()) {
            echo "<a href=".'"catalogo.php?idprodotto='.$row['product_id'].'#prodDescription">';
            echo "<div class=\"grid-element\" id=mostSelledProd$i>";
            echo "<img src=".$row['product_image']." width=150 height=150>";
            echo "<h4>".$row['product_name']."</h4>";
            echo "</div>";
            echo "</a>";

            $i++;
        }
      }
      ?>
    </div>
  </div>



    <div id="copyright" class="container">
    	<p>&copy; GreenShop. All rights reserved. | Progetto Esame Tecnologie Web | Federico Marinelli - Marco Mancini - Ivan Gorbenko</a>.</p>
    </div>


  </body>
</html>
