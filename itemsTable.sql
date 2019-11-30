DROP TABLE IF EXISTS items;
CREATE TABLE items (
    id INT AUTO_INCREMENT primary key NOT NULL,
    fullName VARCHAR(30),
    email VARCHAR(100),
    freeOrSale ENUM('Free', 'Sale'),
    title VARCHAR(50),
    price INT(11),
    myFile MEDIUMBLOB,
    conditions ENUM('New', 'LikeNew', 'Good'),
    categories ENUM('Textbooks', 'Electronics', 'Clothing&Shoes', 'Games', 'Furniture', 'Kitchen', 'Sports&Outdoors', 'Beauty&Health', 'Others'),
    detail VARCHAR(300)
);

INSERT INTO items (id, fullName, email, freeOrSale, title, price, myFile, conditions, categories, detail)
VALUES (1,'Joyce Fang','fangj5@rpi.edu','Sale','Pink TI-84 Plus CE',90,'rpifreeforsale/resources/calculator.jpg','Good','Electronics','I have used this calculator for about 2 years now. I am willing to negotiate a price, contact me if you would like to buy it!'); 