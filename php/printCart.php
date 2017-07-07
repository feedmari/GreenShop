<?php

  require 'dbmanager.php';


   function printCart(){

    echo "<div class=\"shopping-cart\">";
    echo "<div class=\"shopping-cart-header\">";
    echo "<i class=\"fa fa-shopping-cart cart-icon\"></i>";
    echo "<span class=\"badge\">".count($_COOKIE)."</span>";
    echo "<div class=\"shopping-cart-total\">";
    echo "<span class=\"lighter-text\">Totale: </span>";
    echo "<span class=\"main-color-text\">";
    $total = 0;
    foreach ($_COOKIE as $key => $value) {
      $result = DBManager::getInstance()->getProductById($key);
      $row = $result->fetch_assoc();
      $total += ($row['product_price'] * $value);
    }
    echo "$total €</span>";
    echo "</div>";
    echo "</div>";
    echo "<ul class=\"shopping-cart-items\">";


    $ARRAY = $_COOKIE;
    foreach($ARRAY as $key=>$val){

        $result = DBManager::getInstance()->getProductById($key);
        $row = $result->fetch_assoc();
        echo '<li class="clearfix">';
        echo '<img src='.$row["product_image"].'  width="70px" height="70px" >';
        echo '<span class="item-name">';
        echo $row['product_name'];
        echo "</span>";
        echo '<span class="item-price"><span class="qta_price_carrello"> Prezzo: </span>';
        echo $row['product_price'];
        echo "</span>";
        echo '<span class="item-quantity"><span class="qta_price_carrello"> Quantità: </span>';
        echo $_COOKIE[$key];
        echo "</span>";
        echo "</li>";
    }
    if(count($_COOKIE) > 0){
      echo "<a href=\"customerInfo.php\" class=\"buttonCheckout\">Checkout</a>";
      echo "<a href=\"#\" class=\"buttonCheckout\" id=\"svuotaCarrello\">Svuota carrello </a>";

    }
    echo "</div>";

  }
?>
