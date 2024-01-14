CREATE DATABASE IF NOT EXISTS TOFTing;

USE TOFTing;

CREATE TABLE IF NOT EXISTS department
(
    pk_departmentID INTEGER AUTO_INCREMENT PRIMARY KEY,
    name            VARCHAR(40)
);

CREATE TABLE IF NOT EXISTS location
(
    pk_locationID INTEGER AUTO_INCREMENT PRIMARY KEY,
    roomNumber    VARCHAR(10),
    name          VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS user
(
    pk_guID VARCHAR(50) PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS achievement
(
    pk_achievementID INTEGER AUTO_INCREMENT PRIMARY KEY,
    name             VARCHAR(30),
    fk_departmentID  INTEGER,
    description      TEXT,
    FOREIGN KEY fk_achievement_department (fk_departmentID) REFERENCES department (pk_departmentID)
);

CREATE TABLE IF NOT EXISTS userPossessesAchievement(
    pk_fk_guID VARCHAR(50),
    pk_fk_achievementID INTEGER,
    CONSTRAINT PRIMARY KEY (pk_fk_guID,pk_fk_achievementID),
    FOREIGN KEY fk_userPossessesAchievement_user (pk_fk_guID) REFERENCES user(pk_guID),
    FOREIGN KEY fk_userPossessesAchievement_achievement (pk_fk_achievementID) REFERENCES achievement(pk_achievementID)
);

CREATE TABLE IF NOT EXISTS achievementAtLocation(
    pk_fk_achievementID INTEGER,
    pk_fk_locationID INTEGER,
    CONSTRAINT PRIMARY KEY (pk_fk_achievementID,pk_fk_locationID),
    FOREIGN KEY fk_achievementAtLocation_achievement (pk_fk_achievementID) REFERENCES achievement(pk_achievementID),
    FOREIGN KEY fk_achievementAtLocation_location (pk_fk_locationID) REFERENCES location(pk_locationID)
);