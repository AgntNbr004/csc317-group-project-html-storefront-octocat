USE Octocat;

INSERT INTO Octocat.State (name, abbreviation)
VALUES ('Alabama', 'AL'),
	('Alaska', 'AK'),
	('Arizona', 'AZ'),
	('Arkansas', 'AR'),
	('California', 'CA'),
	('Colorado', 'CO'),
	('Connecticut', 'CT'),
	('Delaware', 'DE'),
	('District of Columbia', 'DC'),
	('Florida', 'FL'),
	('Georgia', 'GA'),
	('Hawaii', 'HI'),
	('Idaho', 'ID'),
	('Illinois', 'IL'),
	('Indiana', 'IN'),
	('Iowa', 'IA'),
	('Kansas', 'KS'),
	('Kentucky', 'KY'),
	('Louisiana', 'LA'),
	('Maine', 'ME'),
	('Maryland', 'MD'),
	('Massachusetts', 'MA'),
	('Michigan', 'MI'),
	('Minnesota', 'MN'),
	('Mississippi', 'MS'),
	('Missouri', 'MO'),
	('Montana', 'MT'),
	('Nebraska', 'NE'),
	('Nevada', 'NV'),
	('New Hampshire', 'NH'),
	('New Jersey', 'NJ'),
	('New Mexico', 'NM'),
	('New York', 'NY'),
	('North Carolina', 'NC'),
	('North Dakota', 'ND'),
	('Ohio', 'OH'),
	('Oklahoma', 'OK'),
	('Oregon', 'OR'),
	('Pennsylvania', 'PA'),
	('Rhode Island', 'RI'),
	('South Carolina', 'SC'),
	('South Dakota', 'SD'),
	('Tennessee', 'TN'),
	('Texas', 'TX'),
	('Utah', 'UT'),
	('Vermont', 'VT'),
	('Virginia', 'VA'),
	('Washington', 'WA'),
	('West Virginia', 'WV'),
	('Wisconsin', 'WI'),
	('Wyoming', 'WY'),
	('Puerto Rico', 'PR');

SELECT *
FROM Octocat.State;

INSERT INTO Octocat.CardType (cardtype)
VALUES ('American Express'),
       ('Discover'),
       ('MasterCard'),
       ('VISA');

SELECT *
FROM Octocat.CardType;

INSERT INTO Octocat.ProductType (producttype)
VALUES ('3D Models'),
       ('Audio'),
       ('Scripts');

SELECT *
FROM Octocat.ProductType;

INSERT INTO Octocat.PhoneType (phonetype)
VALUES ('Home Phone'),
       ('Work Phone'),
       ('Mobile Phone');

SELECT *
FROM Octocat.PhoneType;

SELECT * FROM PhoneType;