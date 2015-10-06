CREATE TABLE IF NOT EXISTS USER (
   Fname varchar(15),
   Minit char(1),
   Lname varchar(15),
   UserName varchar(50) NOT NULL UNIQUE,
   Password varchar(15) NOT NULL UNIQUE,
   PRIMARY KEY (UserName),
) ENGINE = MyISAM;