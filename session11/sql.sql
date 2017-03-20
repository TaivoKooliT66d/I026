DROP TABLE loomaaed;
CREATE TABLE loomaaed (id INTEGER PRIMARY KEY AUTO_INCREMENT, nimi VARCHAR(50), vanus INTEGER, liik VARCHAR(100),puur INTEGER);

INSERT INTO loomaaed (nimi, liik, puur,vanus) VALUES ('Miisu','Kass','2','11');
INSERT INTO loomaaed (nimi, liik, puur,vanus) VALUES ('Liisu','Kass','5','1');
INSERT INTO loomaaed (nimi, liik, puur,vanus) VALUES ('Vilma','Ilves','2','15');
INSERT INTO loomaaed (nimi, liik, puur,vanus) VALUES ('Paul','Elevant','3','4');
INSERT INTO loomaaed (nimi, liik, puur,vanus) VALUES ('Sasha','Elevant','3','5');
INSERT INTO loomaaed (nimi, liik, puur,vanus) VALUES ('Flipper','Delfiin','30','2');

SELECT nimi, puur FROM loomaaed WHERE puur = 3;
SELECT MAX(vanus), MIN(vanus) FROM loomaaed;
SELECT puur, COUNT(1) FROM loomaaed GROUP BY puur
UPDATE loomaaed SET vanus = vanus + 1;
