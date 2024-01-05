USE tofting;

-- Insert Test Data
INSERT INTO user
VALUES ('test1'),
       ('test2'),
       ('test3'),
       ('test4'),
       ('test5');

INSERT INTO department (name)
VALUES ('Informationstechnologie'),
       ('FS Informationstechnik'),
       ('Mechatronik');

INSERT INTO location (roomNumber, name)
VALUES ('PH (157)', 'Physiksaal'),
       ('CH (161)', 'Chemiesaal'),
       ('L.NW.C (076)', 'Labor-Cisco'),
       ('E.6 (233)', 'EDV 6'),
       ('E.7 (235)', 'EDV 7'),
       ('L.MP (059)', 'Labor Mikroprozessoren'),
       ('L.NW.2 (072)', 'Labor Netzwerktechnik 2');

INSERT INTO achievement (name, fk_departmentID, description)
VALUES ('Zauberlehrling', 1,
        'Wie es scheint wurde ein weiterer Zauberlehrling in den Bann von Herrn Professor Zainzingers wunderbaren IT-Künsten gezogen. Diesen Trick und noch viel mehr Wissen über die Grundlagen der Informatik erwartet unsere Schüler im zweiten Jahrgang.'),
       ('Spielwiese', 1, 'Willkommen auf der Spielwiese der Netzwerktechnik.'),
       ('Wissenschaftler', null, 'Wissenschaftliche wörter'),
       ('Lasertech', 3, 'Sollt ich vielleicht Thorsten fragen'),
       ('Bills Geschenk', 3, 'Mikroprozessoren und so Zeug hald'),
       ('Kabel-Action', 2, 'Projekte von der FS mit NWT Focus'),
       ('The End?', 2, '	Enter a stronghold End Portal activated with all twelve eyes of ender.');

INSERT INTO achievementatlocation (fk_achievementID, fk_locationID) VALUES (1,7),(2,3),(3,1),(3,2),(4,null),(5,6),(6,4),(7,5);

INSERT INTO userpossessesachievement
VALUES ('test1', 1),
       ('test1', 2),
       ('test1', 3),
       ('test1', 5),
       ('test2', 2),
       ('test2', 4),
       ('test2', 6),
       ('test4', 4),
       ('test5', 1),
       ('test5', 2),
       ('test5', 3),
       ('test5', 4),
       ('test5', 5),
       ('test5', 6),
       ('test5', 7);