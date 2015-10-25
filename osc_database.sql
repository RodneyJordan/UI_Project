SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS USER (
   UID int(8) NOT NULL AUTO_INCREMENT,
   Fname varchar(15),
   Minit char(1),
   Lname varchar(15),
   UserName varchar(50) NOT NULL UNIQUE,
   Password varchar(15) NOT NULL UNIQUE,
   Avatar  varchar(50),
   PRIMARY KEY (UID)
) ENGINE = MyISAM;

CREATE TABLE IF NOT EXISTS ISSUES (
   IID int(8) NOT NULL AUTO_INCREMENT,
   UID int(8) NOT NULL,
   Title varchar(255) NOT NULL,
   State varchar(5) NOT NULL,
   URL varchar(255) NOT NULL,
   Labels_URL varchar(255) NOT NULL,
   Comments_URL varchar(255) NOT NULL,
   HTML_URL varchar(255) NOT NULL,
   Id int(16) NOT NULL,
   Body text NOT NULL,
   Avatar_URL varchar(255) NOT NULL,
   PRIMARY KEY (IID)
) ENGINE = MyISAM;
