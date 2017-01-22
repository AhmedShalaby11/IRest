CREATE TABLE `Table_Desserts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Product_name` varchar(255) DEFAULT NULL,
  `Product_Size` varchar(255) DEFAULT NULL,
  `Product_Ingred` varchar(255) DEFAULT NULL,
  `Product_Price` varchar(255) DEFAULT NULL,
  `Product_Discount` varchar(255) DEFAULT NULL,
  `Product_Availablity` varchar(255) DEFAULT NULL,
  `Product_Category` varchar(255) DEFAULT NULL,
  `Product_URL` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;


CREATE TABLE `Table_Drinks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Product_name` varchar(255) DEFAULT NULL,
  `Product_Size` varchar(255) DEFAULT NULL,
  `Product_Ingred` varchar(255) DEFAULT NULL,
  `Product_Price` varchar(255) DEFAULT NULL,
  `Product_Discount` varchar(255) DEFAULT NULL,
  `Product_Availablity` varchar(255) DEFAULT NULL,
  `Product_Category` varchar(255) DEFAULT NULL,
  `Product_URL` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;




CREATE TABLE `Table_Orders` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Product_name` varchar(255) DEFAULT NULL,
  `Product_Size` varchar(255) DEFAULT NULL,
  `Product_Price` float DEFAULT NULL,
  `Product_Discount` float DEFAULT NULL,
  `Order_Time` datetime DEFAULT CURRENT_TIMESTAMP,
  `Order_SL` datetime DEFAULT NULL,
  `Product_Count` int(11) DEFAULT NULL,
  `Table_id` int(11) DEFAULT NULL,
  `Order_Status` varchar(45) DEFAULT 'P',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

CREATE TABLE `Table_Plattes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Product_name` varchar(255) DEFAULT NULL,
  `Product_Size` varchar(255) DEFAULT NULL,
  `Product_Ingred` varchar(255) DEFAULT NULL,
  `Product_Price` varchar(255) DEFAULT NULL,
  `Product_Discount` varchar(255) DEFAULT NULL,
  `Product_Availablity` varchar(255) DEFAULT NULL,
  `Product_Category` varchar(255) DEFAULT NULL,
  `Product_URL` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

