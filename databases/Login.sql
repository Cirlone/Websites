CREATE DATABASE Login;
CREATE TABLE Users (
  UserID INT PRIMARY KEY IDENTITY,
  FirstName VARCHAR(50) NOT NULL,
  LastName VARCHAR(50) NOT NULL,
  Email VARCHAR(50) NOT NULL,
  Password VARCHAR(50) NOT NULL,
  RoleID INT NOT NULL
);

CREATE TABLE Roles (
  RoleID INT PRIMARY KEY IDENTITY,
  RoleName VARCHAR(50) NOT NULL
);
INSERT INTO Roles (RoleName) VALUES ('User');
INSERT INTO Roles (RoleName) VALUES ('Admin');

INSERT INTO Users (FirstName, LastName, Email, Password, RoleID) VALUES ('Cirla', 'Andrei', 'cirlaandrei@gmail.com', 'password123', 1);
INSERT INTO Users (FirstName, LastName, Email, Password, RoleID) VALUES ('Lau', 'Terpe', 'lautaxidriver@yahoo.com', 'password123', 2);

