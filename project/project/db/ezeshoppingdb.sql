CREATE DATABASE ezeshopping;

USE ezeshopping;

CREATE TABLE CategoryTab
(
catid int AUTO_INCREMENT,
catname varchar(50) NOT NULL,
CONSTRAINT PK_CategoryTab_catid PRIMARY KEY(catid)
)ENGINE=INNODB;

ALTER TABLE CategoryTab AUTO_INCREMENT=1;

CREATE TABLE ProductTab
(
prodid int AUTO_INCREMENT,
prodname varchar(100),
brand varchar(100),
unittype varchar(50),
quantity float,
catid int,
priceperunit float,
picturepath varchar(500),
CONSTRAINT PK_ProductTab_prodid PRIMARY KEY(prodid),
CONSTRAINT FK_ProductTab_catid FOREIGN KEY(catid) REFERENCES CategoryTab(catid)
)ENGINE=INNODB;

ALTER TABLE ProductTab AUTO_INCREMENT=1;

CREATE TABLE CustomerTab
(
emailid varchar(50),
password varchar(50),
fullname varchar(50),
address varchar(200),
doj date,
loyaltycategory varchar(20),
CONSTRAINT PK_CustomerTab_emailid PRIMARY KEY(emailid)
)ENGINE=INNODB;

CREATE TABLE OrderHistoryTab
(
id int AUTO_INCREMENT,
dt date,
emailid varchar(50),
orderdesc varchar(2000),
totalamt float,
loyaltydiscount float,
netpayableamt float,
CONSTRAINT PK_OrderHistoryTab_id PRIMARY KEY(id),
CONSTRAINT FK_OrderHistoryTab_emailid FOREIGN KEY(emailid) REFERENCES CustomerTab(emailid)
)ENGINE=INNODB;

ALTER TABLE OrderHistoryTab AUTO_INCREMENT=1000;