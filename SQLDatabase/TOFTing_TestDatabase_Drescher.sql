USE tofting;

INSERT INTO user VALUES ('test1'),('test2'),('test3'),('test4'),('test5');

INSERT INTO department (name) VALUES ('Informationstechnologie'),('FS Informationstechnik'),('Mechatronik');

INSERT INTO achievement (name, fk_departmentID, description) VALUES ('Zauberlehrling',1,'Wie es scheint wurde ein weiterer Zauberlehrling in den Bann von Herrn Professor Zainzingers wunderbaren IT-Künsten gezogen. Diesen Trick und noch viel mehr Wissen über die Grundlagen der Informatik erwartet unsere Schüler im zweiten Jahrgang.'),('Spielwiese',1,'Willkommen auf der Spielwiese der Netzwerktechnik.'),('Wissenschaftler',null,'Wissenschaftliche wörter');