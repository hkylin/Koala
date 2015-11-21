DROP DATABASE IF EXISTS secret;
CREATE DATABASE IF NOT EXISTS secret;

use secret;

create table register (
  user_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  email CHAR(100) NOT NULL,
  password CHAR(40) NOT NULL,
  join_date DATETIME NOT NULL,
  PRIMARY KEY (user_id, email)
) DEFAULT CHARSET=utf8;

create table user_info (
  user_id INT UNSIGNED NOT NULL PRIMARY KEY,
  user_name CHAR(60),
  user_nickname CHAR(60) NOT NULL,
  avatar CHAR(150),
  gender CHAR(1),
  birth DATETIME,
  mydesc CHAR(70)
) DEFAULT CHARSET=utf8;

create table post_header (
  user_id INT UNSIGNED NOT NULL,
  post_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  post_date DATETIME
) DEFAULT CHARSET=utf8;

create table post_body (
  post_id INT UNSIGNED NOT NULL PRIMARY KEY,
  post CHAR(140)
) DEFAULT CHARSET=utf8;

create table post_img (
  id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  post_id INT UNSIGNED NOT NULL,
  img_src CHAR(150)
) DEFAULT CHARSET=utf8;

create table st_comment (
  id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  post_id INT UNSIGNED NOT NULL,
  comment CHAR(140),
  parent INT UNSIGNED DEFAULT NULL
) DEFAULT CHARSET=utf8;

GRANT SELECT, UPDATE, INSERT, DELETE
ON secret.*
TO secret@localhost IDENTIFIED BY 'secret';