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
   Title varchar(255),
   State varchar(5),
   User varchar(255),
   User_HTML varchar(255),
   URL varchar(255),
   Labels_URL varchar(255),
   Label1_Name varchar(20),
   Label1_Color varchar(10),
   Label2_Name varchar(20),
   Label2_Color varchar(10),
   Label3_Name varchar(20),
   Label3_Color varchar(10),
   Comments_URL varchar(255),
   HTML_URL varchar(255),
   Id int(16),
   Body TEXT,
   Avatar_URL varchar(255),
   PRIMARY KEY (IID),
   FOREIGN KEY (UID) REFERENCES USER(UID)
) ENGINE = MyISAM;
