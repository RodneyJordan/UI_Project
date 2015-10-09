CREATE TABLE IF NOT EXISTS USER (
   UID int(8) NOT NULL, AUTO_INCREMENT,
   Fname varchar(15),
   Minit char(1),
   Lname varchar(15),
   UserName varchar(50) NOT NULL UNIQUE,
   Password varchar(15) NOT NULL UNIQUE,
   PRIMARY KEY (UID),
) ENGINE = MyISAM;

CREATE TABLE IF NOT EXISTS MESSAGE (
   
   UID int(8) NOT NULL,
   Msg varchar(500),
   From varchar(50) NOT NULL,
)

