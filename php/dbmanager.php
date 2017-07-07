<?php

class DBManager{

  private static $singleton = NULL;
  private $isConnected = false;
  private $DBconnection;
  private $servername;
  private $username;
  private $password;
  private $dbname;
  private $default_orderby;
  private $default_items_per_page;
  private $default_sort_order;

  private function DBManager(){
    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "root";
    $this->dbname = "my_greenshop";
    $this->default_orderby = "product_insert_date";
    $this->default_items_per_page = 12;
    $this->default_sort_order = "desc";
    $this->connect();
  }

  private function connect(){

    $this->DBconnection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    // Check connection
    if ($this->DBconnection->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else {
      $this->isConnected = true;
    }
  }

  private function close(){
    /*$this->DBconnection->close();
    $this->isConnected = false;*/
  }
  private function checkConnected(){
    if($this->isConnected == false)
      $this->connect();
  }

  public static function getInstance(){
    if(self::$singleton == NULL){
      $c = __CLASS__;
      self::$singleton = new $c;
      return self::$singleton;
    }
    else
      return self::$singleton;
  }
  public function getLastInsertedProduct(){
    $this->checkConnected();
    $sql = "SELECT * FROM PRODUCTS ORDER BY product_id desc LIMIT 1";
    $result = $this->DBconnection->query($sql);
    $this->close();
    return $result;
  }
  public function getBestSellers($n = 9){
    $this->checkConnected();
    $sql = "SELECT p.product_id, p.product_name,p.product_image,SUM(o.detail_quantity) AS qty
            FROM PRODUCTS p, ORDERDETAILS o
            WHERE p.product_id = o.product_id
            GROUP BY o.product_id
            ORDER BY qty DESC
            LIMIT $n";
    $result = $this->DBconnection->query($sql);
    $this->close();
    return $result;
  }

  public function insertComment($utente, $email, $messaggio){
    $this->checkConnected();
    $sqlInsert = "INSERT INTO COMMENTI (user,email,messaggio,seen)
                  VALUES ('$utente', '$email','$messaggio', 0)";
    if($this->DBconnection->query($sqlInsert)){
      $this->close();
      return true;
    }else{
      $this->close();
      return false;
    }
  }

  public function insertProduct($nome, $descrizione, $prezzo, $stock = 0, $categoria, $image_path){
    $this->checkConnected();
    $sql = "INSERT INTO PRODUCTS (product_name, product_description, product_price, product_stock, product_image, category_id)
            VALUES ('$nome', '$descrizione', '$prezzo', '$stock', '$image_path','$categoria')";
   $target_file = $_SERVER['DOCUMENT_ROOT'] . "/prog/images/" . basename($_FILES['uploadedfile']['name']);

   if((move_uploaded_file($_FILES["uploadedfile"]["tmp_name"], $target_file)) && ($this->DBconnection->query($sql))){
     $this->close();
     return true;
   }else{
     $this->close();
     return false;
   }
  }

  public function getCategories(){
    $this->checkConnected();
    $sqlSelect = "SELECT * FROM CATEGORIES";
    $result = $this->DBconnection->query($sqlSelect);
    $this->close();
    return $result;
  }
  public function getProducts(){
    $this->checkConnected();
    $page_number = 1;
    $orderby = $this->default_orderby;
    $sort_order = $this->default_sort_order;
    $items_per_page = $this->default_items_per_page;
    if(isset($_POST['orderby']) && ($_POST['orderby'] == 'product_insert_date' || $_POST['orderby'] == 'product_price')){
       $orderby = $_POST['orderby'];
    }
    if(isset($_POST['sort_order']) && ($_POST['sort_order'] == 'desc' || $_POST['sort_order'] == 'asc')){
      $sort_order = $_POST['sort_order'];
    }
    if(isset($_POST['items_per_page']) && is_numeric($_POST['items_per_page'])){
      $items_per_page = $_POST['items_per_page'];
    }
    if(isset($_POST['page_number']) && is_numeric($_POST['page_number'])){
      $page_number = $_POST['page_number'];
    }
    $end = $page_number * $items_per_page;
    $start = $end - $items_per_page;
    $sql = "SELECT *
            FROM PRODUCTS
            ORDER BY $orderby $sort_order
            LIMIT $start,$items_per_page";

    $result = $this->DBconnection->query($sql);
    $this->close();
    return $result;
  }
  public function getTotalPages(){
    $this->checkConnected();
    $items_per_page = $this->default_items_per_page;
    if(isset($_POST['items_per_page']) && is_numeric($_POST['items_per_page'])){
      $items_per_page = $_POST['items_per_page'];
    }
    $sql = "SELECT COUNT(product_id) as total_products
            FROM PRODUCTS";
    $result = $this->DBconnection->query($sql);
    $this->close();
    $row = $result->fetch_assoc();
    return ceil($row['total_products'] / $items_per_page); //ceil() arrotonda verso l'alto i float
  }

  public function getProductById($id){
    $this->checkConnected();
    $sqlSelect = "SELECT * FROM PRODUCTS
                  WHERE product_id = $id";
    $result = $this->DBconnection->query($sqlSelect);
    $this->close();
    return $result;
  }
  public function getTotalProducts(){
    $this->checkConnected();
    $sql = "SELECT COUNT(product_id) as total_products
            FROM PRODUCTS";
    $result = $this->DBconnection->query($sql);
    $this->close();
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      return $row['total_products'];
    } else{
      return 0;
    }
  }
  public function getDefaultPaginationOptions(){
    return array("items_per_page" => $this->default_items_per_page, "sort_order" => $this->default_sort_order,"orderby" => $this->default_orderby);
  }

  public function getLastPayment(){
    $this->checkConnected();
    $sql = "SELECT payment_id FROM PAYMENTS ORDER BY payment_id desc LIMIT 1";
    $result = $this->DBconnection->query($sql);
    $this->close();
    $lastPaymentID = $result->fetch_assoc();
    return $lastPaymentID['payment_id'];
  }

  public function getLastOrder(){
    $this->checkConnected();
    $sql = "SELECT order_id FROM ORDERS ORDER BY order_id desc LIMIT 1";
    $result = $this->DBconnection->query($sql);
    $this->close();
    $lastOrderID = $result->fetch_assoc();
    return $lastOrderID['order_id'];
  }

  public function getLastOrderDetail(){
    $this->checkConnected();
    $sql = "SELECT detail_id FROM ORDERDETAILS ORDER BY detail_id desc LIMIT 1";
    $result = $this->DBconnection->query($sql);
    $this->close();
    if($result->num_rows == 0){
      return 0;
    }else{
      $lastOrderID = $result->fetch_assoc();
      return $lastOrderID['detail_id'];

    }

  }

  public function addOrder($order_amount, $order_ship_name, $order_ship_address,$order_city,$order_province, $order_zip, $order_country, $order_phone, $order_email, $payment_id){
    $this->checkConnected();
    $sqlInsert = "INSERT INTO ORDERS (order_amount, order_ship_name, order_ship_address, order_city, order_province, order_zip, order_country, order_phone, order_email, payment_id)
               VALUES ('$order_amount', '$order_ship_name', '$order_ship_address', '$order_city', '$order_province', '$order_zip', '$order_country', '$order_phone', '$order_email', '$payment_id')";
    $this->DBconnection->query($sqlInsert);
    $this->close();
  }

  public function addPayment($ccNumb, $valid_thru, $owner_name){
    $this->checkConnected();
    $sqlInsert = "INSERT INTO PAYMENTS (cc_number, valid_thru, owner_name)
                  VALUES ('$ccNumb', '$valid_thru', '$owner_name')";
    $this->DBconnection->query($sqlInsert);
    $this->close();

  }

  public function addOrderDetails($order_id, $product_id, $detail_quantity, $detail_price){
    $this->checkConnected();
    $lastID = $this->getLastOrderDetail();
    $lastID = $lastID+1;


    $sqlInsert = "INSERT INTO ORDERDETAILS (product_id,order_id, detail_id, detail_quantity, detail_price)
                  VALUES ('$product_id', '$order_id', '$lastID', '$detail_quantity', '$detail_price')";


    $this->DBconnection->query($sqlInsert);
    $this->close();
  }

  public function getStockProduct($product_id){
    $this->checkConnected();
    $sqlGet = "SELECT product_stock
              FROM PRODUCTS
              WHERE product_id = $product_id";
    $result = $this->DBconnection->query($sqlGet);
    $stock = $result->fetch_assoc();
    return $stock['product_stock'];
  }

  public function removeFromStock($product_id, $newQty){
    $this->checkConnected();
    $sqlSet = "UPDATE PRODUCTS
              SET product_stock = $newQty
              WHERE product_id = $product_id";
    $this->DBconnection->query($sqlSet);
  }
  public function searchProducts($keyword){
    $this->checkConnected();
    $sqlSelect = "SELECT *
                  FROM PRODUCTS P JOIN CATEGORIES C ON P.category_id = C.category_id
                  WHERE P.product_name LIKE '%$keyword%'
                  OR P.product_description LIKE '%$keyword%'
                  OR C.category_name LIKE '%$keyword%'
                  OR C.category_description LIKE '%$keyword%'";
    $result = $this->DBconnection->query($sqlSelect);
    $this->close();
    return $result;
  }

  }
?>
