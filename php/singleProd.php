<?php
 include 'dbmanager.php';



 		    $pkey = $_POST["idp"];
 		    $prod = DBManager::getInstance()->getProductById($pkey);
        $row = $prod->fetch_assoc();
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


?>
