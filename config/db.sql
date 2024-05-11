create database Tienda;
use Tienda;

create table products(
    id int auto_increment primary key ,
    name varchar(200),
    price float,
    description varchar(500),
    stock int
);


create table orders(
    id int auto_increment primary key,
    user_id int,
    province varchar(100),
    locality varchar(100),
    price float default 0
);

create table orders_line(
    id int auto_increment primary key,
    order_id int,
    product_id int,
    unitys int,
    constraint FOREIGN KEY (order_id) references orders(id),
    constraint FOREIGN KEY (product_id) references products(id)
);


INSERT INTO products ( name, price, description, stock) VALUES 
('Smartphone', 599, 'S23 Blanco 128GB', 100),
('Laptop', 1300, 'Chuwi 13.3 pulgadas negro', 50),
('Headphones', 99.99, 'Hwawei bluethoth blancos', 200),
('SmarTV', 1999, '85 pulgadas slim', 75),
('Tablet', 349.99, '10 pulgadas Samsung Gris', 30);



