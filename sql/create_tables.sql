USE Octocat;

/* RECREATE TABLES SCRIPT */
DROP TABLE IF EXISTS Address;
DROP TABLE IF EXISTS State;
DROP TABLE IF EXISTS OrderDetails;
DROP TABLE IF EXISTS OrderHistory;
DROP TABLE IF EXISTS Payment;
DROP TABLE IF EXISTS CardType;
DROP TABLE IF EXISTS Product;
DROP TABLE IF EXISTS ProductType;
DROP TABLE IF EXISTS Email;
DROP TABLE IF EXISTS Phone;
DROP TABLE IF EXISTS PhoneType;
DROP TABLE IF EXISTS User;

/* DATA TABLE: This will store login information for customers along with basic info */
CREATE TABLE IF NOT EXISTS User
(
    USER_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username NVARCHAR(50) NOT NULL UNIQUE,
    password NVARCHAR(100) NOT NULL,
    firstname NVARCHAR(50) NOT NULL,
    middlename NVARCHAR(50) NULL,
    lastname NVARCHAR(50) NOT NULL,
    privacypolicy BOOL NULL,
    termsofservice BOOL NULL,
    active BOOL NOT NULL
)
ENGINE = InnoDB DEFAULT CHARSET = utf8;

/* DATA TABLE: This will store customer email addresses */
CREATE TABLE IF NOT EXISTS Email
(
    EMAIL_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    USER_ID INT NULL,
    emailaddress VARCHAR(200) NOT NULL,
    footeragree BOOL NULL,
    FOREIGN KEY (USER_ID) REFERENCES User (USER_ID)
);

/* REFERENCE TABLE: This will store the types of phone numbers */
CREATE TABLE PhoneType
(
    PHONETYPE_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    phonetype VARCHAR(20) NOT NULL
);

/* DATA TABLE: This will store customers phone numbers */
create table Phone
(
    PHONE_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    USER_ID INT NOT NULL,
    phonenumber VARCHAR(50) NOT NULL,
    PHONETYPE_ID INT NOT NULL,
    FOREIGN KEY (USER_ID) REFERENCES User (USER_ID),
    FOREIGN KEY (PHONETYPE_ID) REFERENCES PhoneType (PHONETYPE_ID)
);

create index PHONETYPE_ID
    on Phone (PHONETYPE_ID);

create index USER_ID
    on Phone (USER_ID);



/* REFERENCE TABLE: This will store all the states */
CREATE TABLE IF NOT EXISTS State
(
    STATE_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    abbreviation VARCHAR(2) NOT NULL
);

/* DATA TABLE: This will store customer addresses */
CREATE TABLE IF NOT EXISTS Address
(
    ADDRESS_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    USER_ID INT NOT NULL, -- FK
    principal BOOL NOT NULL,
    addressline1 NVARCHAR(100) NOT NULL,
    addressline2 NVARCHAR(100) NULL,
    city NVARCHAR(75) NOT NULL,
    STATE_ID INT NOT NULL,
    zipcode VARCHAR(9) NOT NULL,
    removed BOOL NOT NULL,
    FOREIGN KEY(USER_ID) REFERENCES User(USER_ID),
    FOREIGN KEY(STATE_ID) REFERENCES State(STATE_ID)
);

/* REFERENCE TABLE: This will store the types of credit cards */
CREATE TABLE IF NOT EXISTS CardType
(
    CARDTYPE_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cardtype VARCHAR(20) NOT NULL
);

/* DATA TABLE: This will store the customers basic payment information */
CREATE TABLE IF NOT EXISTS Payment
(
    PAYMENT_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    USER_ID INT NOT NULL, -- FK
    principal BOOL NOT NULL,
    CARDTYPE_ID INT NOT NULL, -- FK
    cardname NVARCHAR(255) NOT NULL,
    cardnumber VARCHAR(20) NOT NULL,
    expdate DATE NOT NULL,
    removed BOOL NOT NULL,
    FOREIGN KEY (USER_ID) REFERENCES User(USER_ID),
    FOREIGN KEY (CARDTYPE_ID) REFERENCES CardType(CARDTYPE_ID)
);

/* REFERENCE TABLE: This will store the types of products we offer */
CREATE TABLE IF NOT EXISTS ProductType
(
    PRODUCTTYPE_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    producttype NVARCHAR(50) NOT NULL
);

/* DATA TABLE: This will store a list of the products we offer */
CREATE TABLE IF NOT EXISTS Product
(
    PRODUCT_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    PRODUCTTYPE_ID INT NOT NULL, -- FK
    productname NVARCHAR(100) NOT NULL,
    description NVARCHAR(255) NOT NULL,
    price DECIMAL(13, 2) NOT NULL,
    imagelocation VARCHAR(255) NULL,
    filesizemb INT NOT NULL,
    triangles INT NULL,
    vertices INT NULL,
    rigged BOOL NULL,
    animated BOOL NULL,
    lengthsec DECIMAL(13, 4) NULL,
    codelines INT NULL,
    FOREIGN KEY (PRODUCTTYPE_ID) REFERENCES ProductType(PRODUCTTYPE_ID)
);

/* DATA TABLE: This will store a list of orders made by customers */
CREATE TABLE IF NOT EXISTS OrderHistory
(
    ORDERHISTORY_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    USER_ID INT NOT NULL, -- FK
    PAYMENT_ID INT NOT NULL, -- FK
    orderdate DATE NOT NULL,
    ordertotal DECIMAL(13, 4) NOT NULL,
    FOREIGN KEY (USER_ID) REFERENCES User(USER_ID),
    FOREIGN KEY (PAYMENT_ID) REFERENCES Payment(PAYMENT_ID)
);

/* DATA TABLE: This will store the orders made by customers */
CREATE TABLE IF NOT EXISTS OrderDetails
(
    ORDERDETAIL_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ORDERHISTORY_ID INT NOT NULL,
    PRODUCT_ID INT NOT NULL,
    quantity INT NOT NULL,
    producttotal DECIMAL(13, 4) NOT NULL,
    FOREIGN KEY (ORDERHISTORY_ID) REFERENCES OrderHistory(ORDERHISTORY_ID),
    FOREIGN KEY (PRODUCT_ID) REFERENCES Product(PRODUCT_ID)
);
