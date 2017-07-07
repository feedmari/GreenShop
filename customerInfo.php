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
    <div id="customerInfo">

      <form action="productAndCustomerInfo.php" method="post" >
        <h1>Compila i seguenti campi per completare l'ordine</h1>
            <div class="labelInputBox" >
              <label> <h2> Nome </h2> </label>
              <input class="insertCustomerInfo" type="text" name="name" autocomplete="on" placeholder="Inserisci il tuo nome" required>
            </div>

            <div class="labelInputBox">
              <label> <h2 class="labelCustomerInfo"> Cognome </h2> </label>
              <input class="insertCustomerInfo" type="text" name="surname" autocomplete="on" placeholder="Inserisci il tuo cognome" required>
            </div>

            <div class="labelInputBox">
              <label> <h2 class="labelCustomerInfo"> Indirizzo completo </h2> </label>
              <input  class="insertCustomerInfo" type="text" name="address" autocomplete="on" placeholder="Inserisci il tuo indirizzo" required>
            </div>
            <div class="labelInputBox">
              <label> <h2 class="labelCustomerInfo"> Provincia </h2> </label>
              <select class="insertCustomerInfo" id="provincia" name="provincia">
              	<option value="ag">Agrigento</option>
              	<option value="al">Alessandria</option>
              	<option value="an">Ancona</option>
              	<option value="ao">Aosta</option>
              	<option value="ar">Arezzo</option>
              	<option value="ap">Ascoli Piceno</option>
              	<option value="at">Asti</option>
              	<option value="av">Avellino</option>
              	<option value="ba">Bari</option>
              	<option value="bt">Barletta-Andria-Trani</option>
              	<option value="bl">Belluno</option>
              	<option value="bn">Benevento</option>
              	<option value="bg">Bergamo</option>
              	<option value="bi">Biella</option>
              	<option value="bo">Bologna</option>
              	<option value="bz">Bolzano</option>
              	<option value="bs">Brescia</option>
              	<option value="br">Brindisi</option>
              	<option value="ca">Cagliari</option>
              	<option value="cl">Caltanissetta</option>
              	<option value="cb">Campobasso</option>
              	<option value="ci">Carbonia-iglesias</option>
              	<option value="ce">Caserta</option>
              	<option value="ct">Catania</option>
              	<option value="cz">Catanzaro</option>
              	<option value="ch">Chieti</option>
              	<option value="co">Como</option>
              	<option value="cs">Cosenza</option>
              	<option value="cr">Cremona</option>
              	<option value="kr">Crotone</option>
              	<option value="cn">Cuneo</option>
              	<option value="en">Enna</option>
              	<option value="fm">Fermo</option>
              	<option value="fe">Ferrara</option>
              	<option value="fi">Firenze</option>
              	<option value="fg">Foggia</option>
              	<option value="fc">Forl&igrave;-Cesena</option>
              	<option value="fr">Frosinone</option>
              	<option value="ge">Genova</option>
              	<option value="go">Gorizia</option>
              	<option value="gr">Grosseto</option>
              	<option value="im">Imperia</option>
              	<option value="is">Isernia</option>
              	<option value="sp">La spezia</option>
              	<option value="aq">L'aquila</option>
              	<option value="lt">Latina</option>
              	<option value="le">Lecce</option>
              	<option value="lc">Lecco</option>
              	<option value="li">Livorno</option>
              	<option value="lo">Lodi</option>
              	<option value="lu">Lucca</option>
              	<option value="mc">Macerata</option>
              	<option value="mn">Mantova</option>
              	<option value="ms">Massa-Carrara</option>
              	<option value="mt">Matera</option>
              	<option value="vs">Medio Campidano</option>
              	<option value="me">Messina</option>
              	<option value="mi">Milano</option>
              	<option value="mo">Modena</option>
              	<option value="mb">Monza e della Brianza</option>
              	<option value="na">Napoli</option>
              	<option value="no">Novara</option>
              	<option value="nu">Nuoro</option>
              	<option value="og">Ogliastra</option>
              	<option value="ot">Olbia-Tempio</option>
              	<option value="or">Oristano</option>
              	<option value="pd">Padova</option>
              	<option value="pa">Palermo</option>
              	<option value="pr">Parma</option>
              	<option value="pv">Pavia</option>
              	<option value="pg">Perugia</option>
              	<option value="pu">Pesaro e Urbino</option>
              	<option value="pe">Pescara</option>
              	<option value="pc">Piacenza</option>
              	<option value="pi">Pisa</option>
              	<option value="pt">Pistoia</option>
              	<option value="pn">Pordenone</option>
              	<option value="pz">Potenza</option>
              	<option value="po">Prato</option>
              	<option value="rg">Ragusa</option>
              	<option value="ra">Ravenna</option>
              	<option value="rc">Reggio di Calabria</option>
              	<option value="re">Reggio nell'Emilia</option>
              	<option value="ri">Rieti</option>
              	<option value="rn">Rimini</option>
              	<option value="rm">Roma</option>
              	<option value="ro">Rovigo</option>
              	<option value="sa">Salerno</option>
              	<option value="ss">Sassari</option>
              	<option value="sv">Savona</option>
              	<option value="si">Siena</option>
              	<option value="sr">Siracusa</option>
              	<option value="so">Sondrio</option>
              	<option value="ta">Taranto</option>
              	<option value="te">Teramo</option>
              	<option value="tr">Terni</option>
              	<option value="to">Torino</option>
              	<option value="tp">Trapani</option>
              	<option value="tn">Trento</option>
              	<option value="tv">Treviso</option>
              	<option value="ts">Trieste</option>
              	<option value="ud">Udine</option>
              	<option value="va">Varese</option>
              	<option value="ve">Venezia</option>
              	<option value="vb">Verbano-Cusio-Ossola</option>
              	<option value="vc">Vercelli</option>
              	<option value="vr">Verona</option>
              	<option value="vv">Vibo valentia</option>
              	<option value="vi">Vicenza</option>
              	<option value="vt">Viterbo</option>
              </select>
            </div>

            <div class="labelInputBox">
              <label> <h2 class="labelCustomerInfo"> Città </h2> </label>
              <input class="insertCustomerInfo" type="text" name="city" autocomplete="on" placeholder="Inserisci la tua città" required>
            </div>

            <div class="labelInputBox">
              <label> <h2 class="labelCustomerInfo"> CAP </h2> </label>
              <input class="insertCustomerInfo" type="text" name="CAP" autocomplete="on" placeholder="Inserisci il tuo CAP" required>
            </div>

            <div class="labelInputBox">
              <label> <h2 class="labelCustomerInfo"> Paese </h2> </label>
              <select class="insertCustomerInfo" id="country" name="country">
              	<option value="AFG">Afghanistan</option>
              	<option value="ALA">Åland Islands</option>
              	<option value="ALB">Albania</option>
              	<option value="DZA">Algeria</option>
              	<option value="ASM">American Samoa</option>
              	<option value="AND">Andorra</option>
              	<option value="AGO">Angola</option>
              	<option value="AIA">Anguilla</option>
              	<option value="ATA">Antarctica</option>
              	<option value="ATG">Antigua and Barbuda</option>
              	<option value="ARG">Argentina</option>
              	<option value="ARM">Armenia</option>
              	<option value="ABW">Aruba</option>
              	<option value="AUS">Australia</option>
              	<option value="AUT">Austria</option>
              	<option value="AZE">Azerbaijan</option>
              	<option value="BHS">Bahamas</option>
              	<option value="BHR">Bahrain</option>
              	<option value="BGD">Bangladesh</option>
              	<option value="BRB">Barbados</option>
              	<option value="BLR">Belarus</option>
              	<option value="BEL">Belgium</option>
              	<option value="BLZ">Belize</option>
              	<option value="BEN">Benin</option>
              	<option value="BMU">Bermuda</option>
              	<option value="BTN">Bhutan</option>
              	<option value="BOL">Bolivia, Plurinational State of</option>
              	<option value="BES">Bonaire, Sint Eustatius and Saba</option>
              	<option value="BIH">Bosnia and Herzegovina</option>
              	<option value="BWA">Botswana</option>
              	<option value="BVT">Bouvet Island</option>
              	<option value="BRA">Brazil</option>
              	<option value="IOT">British Indian Ocean Territory</option>
              	<option value="BRN">Brunei Darussalam</option>
              	<option value="BGR">Bulgaria</option>
              	<option value="BFA">Burkina Faso</option>
              	<option value="BDI">Burundi</option>
              	<option value="KHM">Cambodia</option>
              	<option value="CMR">Cameroon</option>
              	<option value="CAN">Canada</option>
              	<option value="CPV">Cape Verde</option>
              	<option value="CYM">Cayman Islands</option>
              	<option value="CAF">Central African Republic</option>
              	<option value="TCD">Chad</option>
              	<option value="CHL">Chile</option>
              	<option value="CHN">China</option>
              	<option value="CXR">Christmas Island</option>
              	<option value="CCK">Cocos (Keeling) Islands</option>
              	<option value="COL">Colombia</option>
              	<option value="COM">Comoros</option>
              	<option value="COG">Congo</option>
              	<option value="COD">Congo, the Democratic Republic of the</option>
              	<option value="COK">Cook Islands</option>
              	<option value="CRI">Costa Rica</option>
              	<option value="CIV">Côte d'Ivoire</option>
              	<option value="HRV">Croatia</option>
              	<option value="CUB">Cuba</option>
              	<option value="CUW">Curaçao</option>
              	<option value="CYP">Cyprus</option>
              	<option value="CZE">Czech Republic</option>
              	<option value="DNK">Denmark</option>
              	<option value="DJI">Djibouti</option>
              	<option value="DMA">Dominica</option>
              	<option value="DOM">Dominican Republic</option>
              	<option value="ECU">Ecuador</option>
              	<option value="EGY">Egypt</option>
              	<option value="SLV">El Salvador</option>
              	<option value="GNQ">Equatorial Guinea</option>
              	<option value="ERI">Eritrea</option>
              	<option value="EST">Estonia</option>
              	<option value="ETH">Ethiopia</option>
              	<option value="FLK">Falkland Islands (Malvinas)</option>
              	<option value="FRO">Faroe Islands</option>
              	<option value="FJI">Fiji</option>
              	<option value="FIN">Finland</option>
              	<option value="FRA">France</option>
              	<option value="GUF">French Guiana</option>
              	<option value="PYF">French Polynesia</option>
              	<option value="ATF">French Southern Territories</option>
              	<option value="GAB">Gabon</option>
              	<option value="GMB">Gambia</option>
              	<option value="GEO">Georgia</option>
              	<option value="DEU">Germany</option>
              	<option value="GHA">Ghana</option>
              	<option value="GIB">Gibraltar</option>
              	<option value="GRC">Greece</option>
              	<option value="GRL">Greenland</option>
              	<option value="GRD">Grenada</option>
              	<option value="GLP">Guadeloupe</option>
              	<option value="GUM">Guam</option>
              	<option value="GTM">Guatemala</option>
              	<option value="GGY">Guernsey</option>
              	<option value="GIN">Guinea</option>
              	<option value="GNB">Guinea-Bissau</option>
              	<option value="GUY">Guyana</option>
              	<option value="HTI">Haiti</option>
              	<option value="HMD">Heard Island and McDonald Islands</option>
              	<option value="VAT">Holy See (Vatican City State)</option>
              	<option value="HND">Honduras</option>
              	<option value="HKG">Hong Kong</option>
              	<option value="HUN">Hungary</option>
              	<option value="ISL">Iceland</option>
              	<option value="IND">India</option>
              	<option value="IDN">Indonesia</option>
              	<option value="IRN">Iran, Islamic Republic of</option>
              	<option value="IRQ">Iraq</option>
              	<option value="IRL">Ireland</option>
              	<option value="IMN">Isle of Man</option>
              	<option value="ISR">Israel</option>
              	<option value="ITA">Italy</option>
              	<option value="JAM">Jamaica</option>
              	<option value="JPN">Japan</option>
              	<option value="JEY">Jersey</option>
              	<option value="JOR">Jordan</option>
              	<option value="KAZ">Kazakhstan</option>
              	<option value="KEN">Kenya</option>
              	<option value="KIR">Kiribati</option>
              	<option value="PRK">Korea, Democratic People's Republic of</option>
              	<option value="KOR">Korea, Republic of</option>
              	<option value="KWT">Kuwait</option>
              	<option value="KGZ">Kyrgyzstan</option>
              	<option value="LAO">Lao People's Democratic Republic</option>
              	<option value="LVA">Latvia</option>
              	<option value="LBN">Lebanon</option>
              	<option value="LSO">Lesotho</option>
              	<option value="LBR">Liberia</option>
              	<option value="LBY">Libya</option>
              	<option value="LIE">Liechtenstein</option>
              	<option value="LTU">Lithuania</option>
              	<option value="LUX">Luxembourg</option>
              	<option value="MAC">Macao</option>
              	<option value="MKD">Macedonia, the former Yugoslav Republic of</option>
              	<option value="MDG">Madagascar</option>
              	<option value="MWI">Malawi</option>
              	<option value="MYS">Malaysia</option>
              	<option value="MDV">Maldives</option>
              	<option value="MLI">Mali</option>
              	<option value="MLT">Malta</option>
              	<option value="MHL">Marshall Islands</option>
              	<option value="MTQ">Martinique</option>
              	<option value="MRT">Mauritania</option>
              	<option value="MUS">Mauritius</option>
              	<option value="MYT">Mayotte</option>
              	<option value="MEX">Mexico</option>
              	<option value="FSM">Micronesia, Federated States of</option>
              	<option value="MDA">Moldova, Republic of</option>
              	<option value="MCO">Monaco</option>
              	<option value="MNG">Mongolia</option>
              	<option value="MNE">Montenegro</option>
              	<option value="MSR">Montserrat</option>
              	<option value="MAR">Morocco</option>
              	<option value="MOZ">Mozambique</option>
              	<option value="MMR">Myanmar</option>
              	<option value="NAM">Namibia</option>
              	<option value="NRU">Nauru</option>
              	<option value="NPL">Nepal</option>
              	<option value="NLD">Netherlands</option>
              	<option value="NCL">New Caledonia</option>
              	<option value="NZL">New Zealand</option>
              	<option value="NIC">Nicaragua</option>
              	<option value="NER">Niger</option>
              	<option value="NGA">Nigeria</option>
              	<option value="NIU">Niue</option>
              	<option value="NFK">Norfolk Island</option>
              	<option value="MNP">Northern Mariana Islands</option>
              	<option value="NOR">Norway</option>
              	<option value="OMN">Oman</option>
              	<option value="PAK">Pakistan</option>
              	<option value="PLW">Palau</option>
              	<option value="PSE">Palestinian Territory, Occupied</option>
              	<option value="PAN">Panama</option>
              	<option value="PNG">Papua New Guinea</option>
              	<option value="PRY">Paraguay</option>
              	<option value="PER">Peru</option>
              	<option value="PHL">Philippines</option>
              	<option value="PCN">Pitcairn</option>
              	<option value="POL">Poland</option>
              	<option value="PRT">Portugal</option>
              	<option value="PRI">Puerto Rico</option>
              	<option value="QAT">Qatar</option>
              	<option value="REU">Réunion</option>
              	<option value="ROU">Romania</option>
              	<option value="RUS">Russian Federation</option>
              	<option value="RWA">Rwanda</option>
              	<option value="BLM">Saint Barthélemy</option>
              	<option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
              	<option value="KNA">Saint Kitts and Nevis</option>
              	<option value="LCA">Saint Lucia</option>
              	<option value="MAF">Saint Martin (French part)</option>
              	<option value="SPM">Saint Pierre and Miquelon</option>
              	<option value="VCT">Saint Vincent and the Grenadines</option>
              	<option value="WSM">Samoa</option>
              	<option value="SMR">San Marino</option>
              	<option value="STP">Sao Tome and Principe</option>
              	<option value="SAU">Saudi Arabia</option>
              	<option value="SEN">Senegal</option>
              	<option value="SRB">Serbia</option>
              	<option value="SYC">Seychelles</option>
              	<option value="SLE">Sierra Leone</option>
              	<option value="SGP">Singapore</option>
              	<option value="SXM">Sint Maarten (Dutch part)</option>
              	<option value="SVK">Slovakia</option>
              	<option value="SVN">Slovenia</option>
              	<option value="SLB">Solomon Islands</option>
              	<option value="SOM">Somalia</option>
              	<option value="ZAF">South Africa</option>
              	<option value="SGS">South Georgia and the South Sandwich Islands</option>
              	<option value="SSD">South Sudan</option>
              	<option value="ESP">Spain</option>
              	<option value="LKA">Sri Lanka</option>
              	<option value="SDN">Sudan</option>
              	<option value="SUR">Suriname</option>
              	<option value="SJM">Svalbard and Jan Mayen</option>
              	<option value="SWZ">Swaziland</option>
              	<option value="SWE">Sweden</option>
              	<option value="CHE">Switzerland</option>
              	<option value="SYR">Syrian Arab Republic</option>
              	<option value="TWN">Taiwan, Province of China</option>
              	<option value="TJK">Tajikistan</option>
              	<option value="TZA">Tanzania, United Republic of</option>
              	<option value="THA">Thailand</option>
              	<option value="TLS">Timor-Leste</option>
              	<option value="TGO">Togo</option>
              	<option value="TKL">Tokelau</option>
              	<option value="TON">Tonga</option>
              	<option value="TTO">Trinidad and Tobago</option>
              	<option value="TUN">Tunisia</option>
              	<option value="TUR">Turkey</option>
              	<option value="TKM">Turkmenistan</option>
              	<option value="TCA">Turks and Caicos Islands</option>
              	<option value="TUV">Tuvalu</option>
              	<option value="UGA">Uganda</option>
              	<option value="UKR">Ukraine</option>
              	<option value="ARE">United Arab Emirates</option>
              	<option value="GBR">United Kingdom</option>
              	<option value="USA">United States</option>
              	<option value="UMI">United States Minor Outlying Islands</option>
              	<option value="URY">Uruguay</option>
              	<option value="UZB">Uzbekistan</option>
              	<option value="VUT">Vanuatu</option>
              	<option value="VEN">Venezuela, Bolivarian Republic of</option>
              	<option value="VNM">Viet Nam</option>
              	<option value="VGB">Virgin Islands, British</option>
              	<option value="VIR">Virgin Islands, U.S.</option>
              	<option value="WLF">Wallis and Futuna</option>
              	<option value="ESH">Western Sahara</option>
              	<option value="YEM">Yemen</option>
              	<option value="ZMB">Zambia</option>
              	<option value="ZWE">Zimbabwe</option>
              </select>
            </div>

            <div class="labelInputBox">
              <label> <h2 class="labelCustomerInfo"> Cellulare </h2> </label>
              <input class="insertCustomerInfo"  type="text" name="phone" autocomplete="on" placeholder="Inserisci il tuo numero di telefono" required>
            </div>

            <div class="labelInputBox">
              <label> <h2 class="labelCustomerInfo"> Mail </h2> </label>
              <input class="insertCustomerInfo" type="email" name="mail" autocomplete="on" placeholder="Inserisci la tua mail" required>
            </div>
        <input id="insertInfo" type="submit" value="Procedi" name="insertInfo">
      </form>

    </div>

  </div>


    <div id="copyright" class="container">
    	<p>&copy; Untitled. All rights reserved. | Progetto Esame Tecnologie Web | Federico Marinelli - Marco Mancini - Ivan Gorbenko</a>.</p>
    </div>


  </body>
</html>
