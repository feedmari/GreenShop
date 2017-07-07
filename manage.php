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
    <?php
      $username = $_POST["login"];
      $password = $_POST["password"];

      if($username == "admin" && $password == "admin"){
    ?>

    <div id="insertItem">
      <h1> Inserimento nuovo prodotto </h1>

      <form enctype="multipart/form-data" action="addItem.php" method="post" >
        <div id="insertBox">
          <label>
            <h2>Nome</h2>
            <input class="insertItemInput" type="name" name="name" autocomplete="on" placeholder="Nome della pianta" required>
          </label>
          <label>
            <h2> Descrizione </h2>
            <textarea id="descriptionInput" type="description" name="description"  placeholder="Descrizione della pianta" required></textarea>
          </label>

          <label>
            <h2> Prezzo </h2>
            <input class="priceAndStockClass" type="price" name="price" autocomplete="on" placeholder="€" required>
          </label>

          <label>
            <h2> Numero piante in stock </h2>
            <input class="priceAndStockClass" name="stock" type="number" min="0" max="20" step="1" value="1" onkeydown="return false" required>
          </label>

          <label>
            <h2> Categoria pianta </h2>
            <select name="categorie" id="categoria">
              <?php


              $result = DBManager::getInstance()->getCategories();
              if ($result->num_rows > 0) {
              // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<option value=';
                    echo $row['category_id'];
                    echo '>';
                    echo $row['category_name'];
                    echo '</option>';
                }
              }
              ?>
            </select>
          </label>

          <label>
            <h2> Immagine </h2>
            <!--<form enctype="multipart/form-data" action="addItem.php" method="POST"> -->
               <input name="uploadedfile" type="file" id="imageBtn" required/>

               <!--<input type="submit" value="Upload Immagine" name ="submitImg" class="uploadFileClass"/> -->

           <!--</form> -->
          </label>
        </div>
        <input id="insertProd" type="submit" value="Inserisci prodotto" name="insertProd">
      </form>
    </div>


    <?php
      }else{
    ?>
    <h1> Ops! </h1>
    <h1> Non hai i permessi per gestire questo sito! </h1>
    <?php
      }
    ?>
  </div>


    <div id="copyright" class="container">
    	<p>&copy; Untitled. All rights reserved. | Progetto Esame Tecnologie Web | Federico Marinelli - Marco Mancini - Ivan Gorbenko</a>.</p>
    </div>


  </body>
</html>
