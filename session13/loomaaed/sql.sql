DROP TABLE `<taivol/DK11>_loomaaed`;
CREATE TABLE IF NOT EXISTS `<taivol/DK11>_loomaaed` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nimi` VARCHAR(100) NOT NULL,
  `puur` INT(11) NOT NULL,
  `liik` VARCHAR(100) NOT NULL
);


INSERT INTO `<taivol/DK11>_loomaaed` (`id`, `nimi`, `puur`, `liik`) VALUES
(1, 'Olaf', 8, 'pildid/bear.png'),
(2, 'Kassper', 2, 'pildid/cat.png'),
(3, 'Kaarel', 2, 'pildid/cat.png'),
(4, 'Toomas', 2, 'pildid/cat.png'),
(5, 'Rosso', 4, 'pildid/pig.png'),
(6, 'Porco', 4, 'pildid/pig.png'),
(7, 'Lucy', 5, 'pildid/monkey.png'),
(8, 'Hopper', 8, 'pildid/rabbit.png'),
(9, 'Maali', 7, 'pildid/cow.png'),
(10, 'Kasper', 7, 'pildid/cow.png'),
(11, 'Mingi', 7, 'pildid/cow.png');

DROP TABLE `<taivol/DK11>_kylastajad`;
CREATE TABLE IF NOT EXISTS `<taivol/DK11>_kylastajad` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `passw` varchar(40) NOT NULL,
  `visits` int(11) NOT NULL
);
INSERT INTO `<taivol/DK11>_kylastajad` (username, passw, visits)
 VALUES ('taivo',SHA1('123test'), 1);