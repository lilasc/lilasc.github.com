-- Note: run this file will delete existed database named iShopping

-- delete and create the database
DROP DATABASE IF EXISTS iShopping;
CREATE DATABASE iShopping;

USE iShopping;
GRANT ALL ON iShopping.* TO admin@localhost IDENTIFIED BY 'admin';

-- the table member
CREATE TABLE member (
name varchar(50) PRIMARY KEY NOT NULL,
password varchar(50) NOT NULL,
regtime timestamp NOT NULL,
credit int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- the values inserted into member
INSERT INTO member VALUES
('member1', 'member1', now(), 100),
('member2', 'member2', now(), 200),
('member3', 'member3', now(), 300);

-- the goods class table
CREATE TABLE class (
cid int(32) PRIMARY KEY AUTO_INCREMENT,
name varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- the value insert into class
INSERT INTO class VALUES
(1, "Food"),
(2, "Cloth"),
(3, "Toy");

-- the table goods 
CREATE TABLE goods (
gid int(32) PRIMARY KEY AUTO_INCREMENT,
name varchar(50) NOT NULL,
price int(32) NOT NULL,
regtime timestamp NOT NULL,
img varchar(100),
description text,
number int(32),
cid int(32),
FOREIGN KEY (cid) REFERENCES class(cid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- insert into goods
INSERT INTO goods VALUES
(1, "Lemon", 10, now(), "assets/img/food1.jpg", 
"The lemon is both a small evergreen tree native to Asia, and the tree's ellipsoidal yellow fruit. ",
100, 1),
(2, "Bread", 20, now(), "assets/img/food2.jpg",
"Bread is a staple food prepared by cooking a dough of flour and water and often additional ingredients. ",
200, 1),
(3, "Wheat", 30, now(), "assets/img/food3.jpg",
"Wheat is a cereal grain, originally from the Levant region of the Near East and Ethiopian Highlands, but now cultivated worldwide. ",
300, 1),
(4, "Opera T-Shrit", 15, now(), "assets/img/t-shirt1.jpg", "This is a opera t-shirt.", 100, 2),
(5, "Cat T-Shirt", 25, now(), "assets/img/t-shirt2.jpg", "A cat t-shirt", 200, 2),
(6, "Ghost T-Shirt", 35, now(), "assets/img/t-shirt3.jpg", "A ghost t-shirt for brave man", 300, 2),
(7, "Evil T-Shirt", 45, now(), "assets/img/t-shirt4.jpg", "A evil face t-shirt.", 400, 2),
(8, "Green T-Shirt", 50, now(), "assets/img/t-shirt5.jpg", "A green lantern t-shirt for green lantern fans.", 500, 2),
(9, "Rubik", 8, now(), "assets/img/toy1.jpg", "A rubik puzzle toys for man of every age.", 100, 3),
(10, "Wooden Horse", 12, now(), "assets/img/toy2.jpg", "A wooden horse for little child.", 200, 3),
(11, "Embeded Car", 125, now(), "assets/img/toy3.jpg", "A electronic programming car for professional player.", 300, 3),
(12, "Wooden Puzzle", 25, now(), "assets/img/toy4.jpg", "A wooden puzzle toy for leisure time.", 400, 3),
(13, "Zelda Console", 128, now(), "assets/img/toy5.jpg", "The legend of zelda mini cap game console.", 500, 3);


-- the tag table
CREATE TABLE tag (
tid int(32) PRIMARY KEY AUTO_INCREMENT,
gid int(32) NOT NULL,
description varchar(100) NOT NULL,
FOREIGN KEY (gid) REFERENCES goods(gid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- the comment table
CREATE TABLE comment (
id int(32) PRIMARY KEY AUTO_INCREMENT,
gid int(32) NOT NULL,
mname varchar(50) NOT NULL,
description text NOT NULL,
cmttime timestamp NOT NULL,
star int(32),
FOREIGN KEY (gid) REFERENCES goods(gid),
FOREIGN KEY (mname) REFERENCES member(name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- the sale table
CREATE TABLE sale (
sid int(32) PRIMARY KEY AUTO_INCREMENT,
gid int(32) NOT NULL,
mname varchar(50) NOT NULL,
number int(32) NOT NULL,
sale_time datetime NOT NULL,
state int(32) NOT NULL,
FOREIGN KEY (gid) REFERENCES goods(gid),
FOREIGN KEY (mname) REFERENCES member(name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- the values inserted into sale