--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.2.63.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 19.06.2017 13:19:03
-- Версия сервера: 5.6.31
-- Версия клиента: 4.1
--


--
-- Описание для базы данных chameleon_yii
--
DROP DATABASE IF EXISTS chameleon_yii;
CREATE DATABASE chameleon_yii
	CHARACTER SET utf8
	COLLATE utf8_general_ci;

-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE chameleon_yii;

--
-- Описание для таблицы AuthItem
--
CREATE TABLE AuthItem (
  name VARCHAR(64) NOT NULL,
  type INT(11) NOT NULL,
  description TEXT DEFAULT NULL,
  bizrule TEXT DEFAULT NULL,
  data TEXT DEFAULT NULL,
  PRIMARY KEY (name)
)
ENGINE = INNODB
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы authors
--
CREATE TABLE authors (
  id INT(11) NOT NULL AUTO_INCREMENT,
  firstname VARCHAR(150) NOT NULL,
  lastname VARCHAR(150) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 7
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы books
--
CREATE TABLE books (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(250) NOT NULL,
  date_create INT(11) DEFAULT NULL,
  date_update INT(11) DEFAULT NULL,
  preview VARCHAR(150) DEFAULT NULL,
  date INT(11) DEFAULT NULL,
  author_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 24
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы user
--
CREATE TABLE user (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(128) NOT NULL,
  password VARCHAR(64) NOT NULL,
  user_role_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX i_login (username)
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы user_role
--
CREATE TABLE user_role (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(128) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 2
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы AuthAssignment
--
CREATE TABLE AuthAssignment (
  itemname VARCHAR(64) NOT NULL,
  userid VARCHAR(64) NOT NULL,
  bizrule TEXT DEFAULT NULL,
  data TEXT DEFAULT NULL,
  PRIMARY KEY (itemname, userid),
  CONSTRAINT authassignment_ibfk_1 FOREIGN KEY (itemname)
    REFERENCES AuthItem(name) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы AuthItemChild
--
CREATE TABLE AuthItemChild (
  parent VARCHAR(64) NOT NULL,
  child VARCHAR(64) NOT NULL,
  PRIMARY KEY (parent, child),
  INDEX child (child),
  CONSTRAINT authitemchild_ibfk_1 FOREIGN KEY (parent)
    REFERENCES AuthItem(name) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT authitemchild_ibfk_2 FOREIGN KEY (child)
    REFERENCES AuthItem(name) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
AVG_ROW_LENGTH = 3276
CHARACTER SET utf8
COLLATE utf8_general_ci;

-- 
-- Вывод данных для таблицы AuthItem
--
INSERT INTO AuthItem VALUES
('createBook', 0, 'Создать книга', NULL, 'N;'),
('deleteBook', 0, 'Удалить книгу', NULL, 'N;'),
('indexBook', 0, 'Список Книг', NULL, 'N;'),
('login', 0, 'Авторизация', NULL, 'N;'),
('updateBook', 0, 'Изменить книгу', NULL, 'N;'),
('user', 2, '', NULL, 'N;');

-- 
-- Вывод данных для таблицы authors
--
INSERT INTO authors VALUES
(1, 'Виктор ', 'Пелевин'),
(2, 'Александр', 'Пушкин'),
(3, 'Илья', 'Дворкин'),
(4, 'Венедикт', 'Ерофеев'),
(5, 'Елисей', 'Колбасин'),
(6, 'Катерина', 'Файн');

-- 
-- Вывод данных для таблицы books
--
INSERT INTO books VALUES
(18, 'dghdghdghj', 1497681595, 1497681595, 'upload/1497681595_12.jpg', 1497646800, 1),
(19, 'Позорная звезда 2', 1497789193, 1497792993, 'upload/1497792381_0e46055ff543109b517bedb001a82cc9.jpg', 1459285200, 3),
(20, 'тестовая 2', 1497792912, 1497867440, 'upload/1497792912_1e98df9269a2790b05ab6bad8f7fdb37.jpg', 1498856400, 6),
(21, 'тестовая', 1497792927, 1497792927, 'upload/1497792927_2ca9406189c5db75e4fcfd7da151490c.jpg', 1496610000, 3);

-- 
-- Вывод данных для таблицы user
--
INSERT INTO user VALUES
(1, 'stas', '$2y$13$zr1D6QpXOqCIhcH6hZlByutjNHCaQAKtemfZaE1sc.QbSdCTa//ES', 1),
(2, 'test', '$2y$13$qYrjVrEccpdI4L.Kfgv9PuVY33T/.12TU3zd6n0PLhgcyNkSYCj6K', 1);

-- 
-- Вывод данных для таблицы user_role
--
INSERT INTO user_role VALUES
(1, 'user');

-- 
-- Вывод данных для таблицы AuthAssignment
--

-- Таблица chameleon_yii.AuthAssignment не содержит данных

-- 
-- Вывод данных для таблицы AuthItemChild
--
INSERT INTO AuthItemChild VALUES
('user', 'createBook'),
('user', 'deleteBook'),
('user', 'indexBook'),
('user', 'login'),
('user', 'updateBook');

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;