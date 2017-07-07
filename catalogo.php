<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <title> PlantsE-Commerce </title>
    <link rel="stylesheet" href="style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="text/js.cookie.js" type="text/javascript"></script>
    <script src="text/cart.js" type="text/javascript"></script>
    <script src="text/orderbyfunc.js" type="text/javascript"></script>
    <script src="text/openProd.js" type="text/javascript"></script>
    <script src="text/addToCart.js" type="text/javascript"></script>
    <script src="text/search.js" type="text/javascript"></script>
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

      <section id="ricerca">
        <form name="ricerca" method="get">

          <input type="search" autocomplete="on" placeholder="titolo o descrizione pianta" id="my-search"
          name="keyword" maxlength="50">

          <input type="submit" value="ricerca" id="ric">
        </form>
      </section>
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

      <?php
        $pagingOptions = DBManager::getInstance()->getDefaultPaginationOptions();
        $orderby = (isset($_POST['orderby']))? $_POST['orderby'] : $pagingOptions['orderby'];
        $items_per_page = (isset($_POST['items_per_page']))? $_POST['items_per_page'] : $pagingOptions['items_per_page'];
        $sort_order = (isset($_POST['sort_order']))? $_POST['sort_order'] : $pagingOptions['sort_order'];
        ?>



    <div id="pagingOptions">
      <div id="order">
        <form action="catalogo.php" method="post">
        <label>Ordina per:
        <select id="orderby" name="orderby">
          <option <?php if($orderby == 'product_insert_date') echo 'selected';?> value="product_insert_date">Data</option>
          <option <?php if($orderby == 'product_price') echo 'selected';?> value="product_price">Prezzo</option>
        </select>
        </label>
        <select id="sort-order" name="sort_order">
          <option <?php if($sort_order == 'asc') echo 'selected';?> value="asc">Crescente</option>
          <option <?php if($sort_order == 'desc') echo 'selected';?> value="desc">Decrescente</option>
        </select>
        <label>Prodotti per pagina:
        <select id="items-per-page" name="items_per_page">
          <option <?php if($items_per_page == '4') echo 'selected';?> value="4">4</option>
          <option <?php if($items_per_page == '8') echo 'selected';?> value="8">8</option>
          <option <?php if($items_per_page == '12') echo 'selected';?> value="12">12</option>
          <option <?php if($items_per_page == '16') echo 'selected';?> value="16">16</option>
          <option <?php if($items_per_page == '24') echo 'selected';?> value="24">24</option>
        </select>
        </label>
        <input type="submit" value="Aggiorna">
      </form>
      </div>
    </div>






    <?php


    	if(isset($_GET["idprodotto"]))
    	{
	    	  $prodotto = DBManager::getInstance()->getProductById($_GET["idprodotto"]);
	        $row = $prodotto->fetch_assoc();
          header('Content-Type: text/html; charset=Windows-1252');

          echo "<div id=\"prodDescription\">";
          echo "<div id= \"textSel\">PRODOTTO SELEZIONATO</div>";
          echo "<div class=\"wrap selectedProd\">";
  		    echo "<div class=\"idprodotto \" style=\"display: none; \">";
  		    echo $pkey;
  		    echo "</div>";
          echo "<h1>".$row['product_name']."</h1>";
          echo "<div class=left>";
          echo "<img src=".$row['product_image']."  width=150  height=150  >";
          echo "</div>";
          echo "<div class=right>";
          echo $row['product_description'];

          echo "<div class=\"prodSelection \">";
          echo "<div class=\"idp \" style=\"display: none; \" >"; //anche qua c'era $k che non serve a un cazzo e manco esiste..
          echo $row['product_id'];
          echo '</div>';

          echo "<div class=price>";
          echo $row['product_price'];
          echo " Euro </div>";
          if( $row ['product_stock'] > 0){
            echo '<a href="#" class=button2>Acquista</a>';
              echo '<select class="selectBoxCat">';
              for($k=1; $k <= ($row[product_stock]); $k++){
                if($k == 1){
                  echo "<option selected>$k</option>";
                }else{
                  echo "<option>$k</option>";
                }

              }
            echo '</select>';
          }else{
            echo '<h4 class="productOutOfStock"> Prodotto non disponibile <h4>';
          }
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
    	}


    ?>

    <div id="prodDescription" style="display: none;">
    </div>









      <?php

        if(isset($_GET['keyword'])){
          $result = DBManager::getInstance()->searchProducts($_GET['keyword']);
        } else{
          $result = DBManager::getInstance()->getProducts();
        }
        if($result->num_rows > 0){

        echo '<div class="text-list text-list-right">LISTA PRODOTTI</div>';

        $k =0;
        while($row = $result->fetch_assoc()){


          echo "<div class= \"twoColumn\">";
          echo "<div class=\"wrap2 effect2\">";


          echo "<div class=\"idp$k \" style=\"display: none; \" >";
          echo $row['product_id'];
          echo '</div>';


          echo "<h1>".$row['product_name']."</h1>";
          echo "<div class=\"left\">";
          echo "<img src=".$row['product_image']."  width=150  height=150  >";
          echo "</div>";
          echo "<div class=\"prodSelection \">";
          echo "<div class=price>";
          echo $row['product_price'];
          echo " Euro </div>";
          if( $row ['product_stock'] > 0){
              echo '<a href="#" class=button>Acquista</a>';
                echo '<select class="selectBoxCat">';
                for($k=1; $k <= ($row[product_stock]); $k++){
                  if($k == 1){
                    echo "<option selected>$k</option>";
                  }else{
                    echo "<option>$k</option>";
                  }

                }
              echo '</select>';
            }else{
              echo '<h4 class="productOutOfStock"> Prodotto non disponibile <h4>';
            }
          echo '</div>';
          echo "<div class=\" dbutton  open$k \">";
          echo 'MAGGIORI INFORMAZIONI</div>';
          echo '</div>';
          echo '</div>';

          $k++;
      }

    }else{
      echo "<h1> Nessun prodotto corrisponde ai criteri di ricerca </h1>";
    }


    ?>

  </div>
  <div id="paginazione">
    <?php
      echo '<div class = "pageCounterDisp">';
      $pn=1;
        if(isset($_POST['page_number']) && is_numeric($_POST['page_number'])){
          $pn = $_POST['page_number'];
        }
        if($pn > 1){
          $prev = $pn-1;
          echo '<form action="catalogo.php" method="post" id="prevPage">';
          echo '<input type="hidden" name="page_number" value="'.$prev.'">';
          echo "<span class=\"pageCounter\">";
          echo '<input type="submit" value="Indietro" class="avantiIndietro">';
          echo '</span>';
          echo '</form>';
        }

          if($pn < DBManager::getInstance()->getTotalPages()){
            $pn++;
            if(DBManager::getInstance()->getTotalPages() > 1){echo '<span class="pageCounter">'.($pn-1).'</span>';}
            echo '<form action="catalogo.php" method="post" id="nextPage">';
            echo '<input type="hidden" name="page_number" value="'.$pn.'">';
            echo "<span class=\"pageCounter\">";
            echo '<input type="submit" value="Avanti" class="avantiIndietro">';
            echo '</span>';
            echo '</form>';
          }
      echo '</div>';
      ?>
    </div>

    <div id="copyright" class="container">
    	<p>&copy; Greenshop. All rights reserved. | Progetto Esame Tecnologie Web | Federico Marinelli - Marco Mancini - Ivan Gorbenko</a>.</p>
    </div>


  </body>
</html>
