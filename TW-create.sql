create table CATEGORIES (
     category_name varchar(50) not null,
     category_description varchar(300) not null,
     category_id int not null auto_increment,
     constraint ID_CATEGORIES_ID primary key (category_id));
     
     
     
     

create table PRODUCTS (
     product_name varchar(30) not null,
     product_id int not null auto_increment,
     product_description varchar(300) not null,
     product_price float not null,
     product_stock smallint not null,
     product_insert_date datetime not null,
     product_image varchar(80) not null,
     category_id int not null,
     constraint ID_PRODUCTS_ID primary key (product_id),
     FOREIGN KEY (category_id) REFERENCES CATEGORIES(category_id));

create table ORDERS (
     order_id int not null auto_increment,
     order_amount float not null,
     order_ship_name varchar(50) not null,
     order_ship_address varchar(100) not null,
     order_city varchar(50) not null,
     order_province varchar(100) not null,
     order_zip mediumint not null,
     order_country varchar(50) not null,
     order_phone varchar(20),
     order_email varchar(30) not null,
     order_date datetime not null,
     order_state tinyint not null,
     order_tracking_number varchar(50),
     constraint ID_ORDERS_ID primary key (order_id));

create table ORDERDETAILS (
     order_id int not null,
     product_id int not null,
     detail_id int not null,
     detail_quantity int not null,
     detail_price float not null,
     constraint ID_ORDERDETAILS_ID primary key (order_id, product_id, detail_id),
     FOREIGN KEY (product_id) REFERENCES PRODUCTS(product_id),
     FOREIGN KEY (order_id) REFERENCES ORDERS(order_id));


create table PAYMENTS (
     order_id int not null,
     cc_number char(16) not null,
     valid_thru date not null,
     owner_name varchar(50) not null,
     payment_id int not null auto_increment,
     payment_date datetime not null,
     constraint ID_PAYME_ORDER_ID primary key (payment_id),
     FOREIGN KEY (order_id) REFERENCES ORDERS(order_id));



-- Constraints Section
-- ___________________



-- Index Section
-- _____________

create unique index ID_CATEGORIES_IND
     on CATEGORIES (category_id);

create unique index ID_ORDERDETAILS_IND
     on ORDERDETAILS (order_id, product_id, detail_id);

create index REF_ORDER_PRODU_IND
     on ORDERDETAILS (product_id);

create unique index ID_ORDERS_IND
     on ORDERS (order_id);

create unique index ID_PAYME_ORDER_IND
     on PAYMENTS (order_id);

create unique index ID_PRODUCTS_IND
     on PRODUCTS (product_id);

create index REF_PRODU_CATEG_IND
     on PRODUCTS (category_id);
