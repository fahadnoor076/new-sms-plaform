/*
SQLyog Ultimate v9.20 
MySQL - 5.7.19 : Database - sms-platform
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `campaign_listing` */

DROP TABLE IF EXISTS `campaign_listing`;

CREATE TABLE `campaign_listing` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_campaign_id` int(11) DEFAULT NULL,
  `fk_listing_id` int(11) DEFAULT NULL,
  `fk_campaignnumber_id` int(11) DEFAULT NULL,
  `campaign_delete` enum('0','1') DEFAULT '0',
  `listing_delete` enum('0','1') DEFAULT '0',
  `createdby` int(6) DEFAULT NULL,
  `createdatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `campaign_listing` */

insert  into `campaign_listing`(`cl_id`,`fk_campaign_id`,`fk_listing_id`,`fk_campaignnumber_id`,`campaign_delete`,`listing_delete`,`createdby`,`createdatetime`) values (8,22,7,5,'0','0',1,'2018-02-16 15:32:31'),(9,22,7,6,'0','0',1,'2018-02-16 15:33:38'),(10,22,7,5,'0','0',1,'2018-02-16 15:34:42'),(11,22,7,6,'0','0',1,'2018-02-16 16:50:32'),(12,22,7,6,'0','0',1,'2018-02-16 16:51:19'),(13,22,7,5,'0','0',1,'2018-02-16 16:51:49'),(14,22,7,6,'0','0',1,'2018-02-16 16:52:15'),(15,22,7,6,'0','0',1,'2018-02-16 16:52:42'),(16,22,7,5,'0','0',1,'2018-02-16 16:53:47'),(17,22,7,6,'0','0',1,'2018-02-16 17:15:59');

/*Table structure for table `campaign_numbers` */

DROP TABLE IF EXISTS `campaign_numbers`;

CREATE TABLE `campaign_numbers` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_countryId` int(11) DEFAULT NULL,
  `n_number` varchar(20) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createdatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedby` int(11) DEFAULT NULL,
  `updatedatetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `campaign_numbers` */

insert  into `campaign_numbers`(`n_id`,`fk_countryId`,`n_number`,`createdby`,`createdatetime`,`updatedby`,`updatedatetime`) values (5,1,'+16177649174',1,'2018-02-14 22:00:53',1,'2018-02-15 09:07:55'),(6,1,'+161776491741',1,'2018-02-14 22:00:53',1,'2018-02-15 09:07:55');

/*Table structure for table `campaigns` */

DROP TABLE IF EXISTS `campaigns`;

CREATE TABLE `campaigns` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(500) DEFAULT NULL,
  `c_body` text,
  `createdatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedatetime` timestamp NULL DEFAULT NULL,
  `createdby` int(6) DEFAULT NULL,
  `updatedby` int(6) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `campaigns` */

insert  into `campaigns`(`c_id`,`c_name`,`c_body`,`createdatetime`,`updatedatetime`,`createdby`,`updatedby`) values (22,'Testing','Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\nLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.','2018-02-15 14:25:42',NULL,1,NULL);

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) DEFAULT NULL,
  `country_code` varchar(20) DEFAULT NULL,
  `number_length` int(11) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createdatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedby` int(11) DEFAULT NULL,
  `updatedatetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `countries` */

insert  into `countries`(`c_id`,`country_name`,`country_code`,`number_length`,`createdby`,`createdatetime`,`updatedby`,`updatedatetime`) values (1,'USA','+1',12,NULL,'2018-02-02 14:27:43',NULL,NULL),(2,'Australia','+61',13,NULL,'2018-02-02 14:28:20',NULL,NULL),(3,'UK','+44',13,NULL,'2018-02-02 14:28:31',1,'2018-02-14 12:38:53'),(9,'UAE','+971',13,NULL,'2018-02-14 16:58:21',1,'2018-02-14 12:42:26');

/*Table structure for table `inbox` */

DROP TABLE IF EXISTS `inbox`;

CREATE TABLE `inbox` (
  `i_id` int(11) NOT NULL,
  `i_phone` varchar(25) DEFAULT NULL,
  `i_body` text,
  `createdatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`i_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `inbox` */

/*Table structure for table `listings` */

DROP TABLE IF EXISTS `listings`;

CREATE TABLE `listings` (
  `ls_id` int(11) NOT NULL AUTO_INCREMENT,
  `ls_name` varchar(255) DEFAULT NULL,
  `ls_countryid` int(11) DEFAULT NULL,
  `createdatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedatetime` timestamp NULL DEFAULT NULL,
  `createdby` int(6) DEFAULT NULL,
  `updatedby` int(6) DEFAULT NULL,
  PRIMARY KEY (`ls_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `listings` */

insert  into `listings`(`ls_id`,`ls_name`,`ls_countryid`,`createdatetime`,`updatedatetime`,`createdby`,`updatedby`) values (7,'my listing',1,'2018-02-09 19:08:02',NULL,1,NULL);

/*Table structure for table `lists` */

DROP TABLE IF EXISTS `lists`;

CREATE TABLE `lists` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_lsId` int(11) DEFAULT NULL,
  `l_name` varchar(500) DEFAULT NULL,
  `l_phone` varchar(25) DEFAULT NULL,
  `createdatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`l_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1394 DEFAULT CHARSET=latin1;

/*Data for the table `lists` */

insert  into `lists`(`l_id`,`fk_lsId`,`l_name`,`l_phone`,`createdatetime`) values (996,7,'CJ Kalra','12158063253','2018-02-09 19:08:02'),(997,7,'Caesar Guerini USA','14109011131','2018-02-09 19:08:02'),(998,7,'GERARD LIGUORI','15617150404','2018-02-09 19:08:02'),(999,7,'Christine Brown','18883174018','2018-02-09 19:08:02'),(1000,7,'Dannie Holland','18062920925','2018-02-09 19:08:02'),(1001,7,'Jessica Zimmermann','14062345678','2018-02-09 19:08:02'),(1002,7,'LaToya Osborne','14437663075','2018-02-09 19:08:02'),(1003,7,'Michael Sanders','13025141033','2018-02-09 19:08:02'),(1004,7,'Steven August','17026444100','2018-02-09 19:08:02'),(1005,7,'Jack Zhang','15023548491','2018-02-09 19:08:02'),(1006,7,'Maxwell Technologies','14156623082','2018-02-09 19:08:02'),(1007,7,'C F','19787581295','2018-02-09 19:08:02'),(1008,7,'Joshua Eisenhower','17177238559','2018-02-09 19:08:02'),(1009,7,'Dawn Haun','18049944140','2018-02-09 19:08:02'),(1010,7,'Chris Milano','16502550572','2018-02-09 19:08:02'),(1011,7,'Bill Landsowne','16362396678','2018-02-09 19:08:02'),(1012,7,'JUSTINA PABON','15085210214','2018-02-09 19:08:02'),(1013,7,'JOSE VILLAGOMEZ','13107097855','2018-02-09 19:08:02'),(1014,7,'Jan Everno','18056662322','2018-02-09 19:08:02'),(1015,7,'Rick Eichhorn','19372708607','2018-02-09 19:08:02'),(1016,7,'Victor Goree','15102535731','2018-02-09 19:08:02'),(1017,7,'Jay Law','16785085158','2018-02-09 19:08:02'),(1018,7,'Friedrich Air Conditioning','12105460512','2018-02-09 19:08:02'),(1019,7,'Mario Perez','19546812616','2018-02-09 19:08:02'),(1020,7,'Frank Su','19095950381','2018-02-09 19:08:02'),(1021,7,'BRENDAN FLAHERTY','17024570103','2018-02-09 19:08:02'),(1022,7,'PUGDOG Enterprises, Inc.','14124218460','2018-02-09 19:08:02'),(1023,7,'NANCY BRADLEY','17048580349','2018-02-09 19:08:02'),(1024,7,'Rhonda Hawkins','12053841951','2018-02-09 19:08:02'),(1025,7,'Anthony Fullerton','17028580487','2018-02-09 19:08:02'),(1026,7,'maxjones','19876543210','2018-02-09 19:08:02'),(1027,7,'Richard','18501111111','2018-02-09 19:08:02'),(1028,7,'Marcel Figueiredo','17815580318','2018-02-09 19:08:02'),(1029,7,'Curtis Copley','16209319089','2018-02-09 19:08:02'),(1030,7,'Noonlunch Menu','14109896537','2018-02-09 19:08:02'),(1031,7,'Matthew Klein','16466599179','2018-02-09 19:08:02'),(1032,7,'Kenneth D. Tebo','17708829845','2018-02-09 19:08:02'),(1033,7,'Tech Support','12062013095','2018-02-09 19:08:02'),(1034,7,'Hidden Wealth, Inc.','19547247747','2018-02-09 19:08:02'),(1035,7,'James McCain','12077673707','2018-02-09 19:08:02'),(1036,7,'Jeremy Brandenburg','19373166116','2018-02-09 19:08:02'),(1037,7,'Hoang Nguyen','12538869592','2018-02-09 19:08:02'),(1038,7,'Cuantum Direct','16174311458','2018-02-09 19:08:02'),(1039,7,'ROJI VARGHESE','19724008065','2018-02-09 19:08:02'),(1040,7,'Emil Kadlec','15052619663','2018-02-09 19:08:02'),(1041,7,'GRANT MCCABE','18457651690','2018-02-09 19:08:02'),(1042,7,'customer Service','18004764154','2018-02-09 19:08:02'),(1043,7,'Bennie Hodges','15208823873','2018-02-09 19:08:02'),(1044,7,'DAVID BOND','14072868657','2018-02-09 19:08:02'),(1045,7,'Francisco Lascano','17187630433','2018-02-09 19:08:02'),(1046,7,'Joyce Fleming','13053211418','2018-02-09 19:08:02'),(1047,7,'Karin Thompson','19162153086','2018-02-09 19:08:02'),(1048,7,'Toni Weel','18134410166','2018-02-09 19:08:02'),(1049,7,'Greg Biersack','12535692550','2018-02-09 19:08:02'),(1050,7,'KATE SICKELS','17152123997','2018-02-09 19:08:02'),(1051,7,'Trevor Harris','15089711879','2018-02-09 19:08:02'),(1052,7,'sung min kim','18587766101','2018-02-09 19:08:02'),(1053,7,'H & H Products Company','14072994410','2018-02-09 19:08:02'),(1054,7,'Eric freedman','12672316540','2018-02-09 19:08:02'),(1055,7,'Rachel Prentice','19495060669','2018-02-09 19:08:02'),(1056,7,'WILLIAM MAXWELL','17169900100','2018-02-09 19:08:02'),(1057,7,'STEFAN SCHINZINGER','15103527600','2018-02-09 19:08:02'),(1058,7,'Jason Lyle','16039862769','2018-02-09 19:08:02'),(1059,7,'JEFF WHITEMAN','17609309966','2018-02-09 19:08:02'),(1060,7,'MAX SISKIND','16469024830','2018-02-09 19:08:02'),(1061,7,'Laura Valle','13158041845','2018-02-09 19:08:02'),(1062,7,'CARSON YOUNG','12083081733','2018-02-09 19:08:02'),(1063,7,'Gerald Zuraski','19786496809','2018-02-09 19:08:02'),(1064,7,'Dale Crawford','17704809145','2018-02-09 19:08:02'),(1065,7,'FTW Excavation - Finish The World','12256150999','2018-02-09 19:08:02'),(1066,7,'David Berger','17346787941','2018-02-09 19:08:02'),(1067,7,'Paul John','18140067044','2018-02-09 19:08:02'),(1068,7,'Victor Koch','16363731771','2018-02-09 19:08:02'),(1069,7,'Christina Louise Gale','17164358716','2018-02-09 19:08:02'),(1070,7,'Rich Delgado','14407997440','2018-02-09 19:08:02'),(1071,7,'Stan Leary','16163786506','2018-02-09 19:08:02'),(1072,7,'LUZ LEE','18088005812','2018-02-09 19:08:02'),(1073,7,'Doris D. Watkins','17573424020','2018-02-09 19:08:02'),(1074,7,'LORI GUERTIN','19784653148','2018-02-09 19:08:02'),(1075,7,'JOHN GLISSON','12705599500','2018-02-09 19:08:02'),(1076,7,'ARA MOVSESIAN','15594325670','2018-02-09 19:08:02'),(1077,7,'Gary Carlson','17578173845','2018-02-09 19:08:02'),(1078,7,'Paul Couture','18007507515','2018-02-09 19:08:02'),(1079,7,'shaun broderick','16613889636','2018-02-09 19:08:02'),(1080,7,'VEDA WASHINGTON','15862131531','2018-02-09 19:08:02'),(1081,7,'Daniel Cornell','16509495313','2018-02-09 19:08:02'),(1082,7,'WESLEY HUBBARD','15624335473','2018-02-09 19:08:02'),(1083,7,'Zac Ibanez-Lopez','19196196846','2018-02-09 19:08:02'),(1084,7,'Warda Odhowa','19529920134','2018-02-09 19:08:02'),(1085,7,'Inboxd Agency','12133942422','2018-02-09 19:08:02'),(1086,7,'RICHARD KAISER','19379313011','2018-02-09 19:08:02'),(1087,7,'Kentigern Kyle','12394780341','2018-02-09 19:08:02'),(1088,7,'Omar Sharif','19178339172','2018-02-09 19:08:02'),(1089,7,'Brown, Jeffery','19037965864','2018-02-09 19:08:02'),(1090,7,'Will Brozovich','16623350485','2018-02-09 19:08:02'),(1091,7,'Jonson Albert','15168948349','2018-02-09 19:08:02'),(1092,7,'Michael Parkhurst','13608562531','2018-02-09 19:08:02'),(1093,7,'Chelsea Francis','17404036660','2018-02-09 19:08:02'),(1094,7,'LINDA CAMPBELL','15407434628','2018-02-09 19:08:02'),(1095,7,'Frankie Wanamaker','18014221211','2018-02-09 19:08:02'),(1096,7,'Jeremy Folse','18189177062','2018-02-09 19:08:02'),(1097,7,'David Abdo','15613099099','2018-02-09 19:08:02'),(1098,7,'FJ ANDERSON','18048007886','2018-02-09 19:08:02'),(1099,7,'Alan Jay Automotive Network','18634024232','2018-02-09 19:08:02'),(1100,7,'John CF','18454529374','2018-02-09 19:08:02'),(1101,7,'Janice Arvin','17409737247','2018-02-09 19:08:02'),(1102,7,'Maria Nubile','17184246080','2018-02-09 19:08:02'),(1103,7,'Shavon Osborne','12023652732','2018-02-09 19:08:02'),(1104,7,'Rev. Kevin Raidy','18123847881','2018-02-09 19:08:02'),(1105,7,'Taylor Adair','18566309859','2018-02-09 19:08:02'),(1106,7,'COSveyor, Inc.','16308789490','2018-02-09 19:08:02'),(1107,7,'CARMEN ROJAS','19047724709','2018-02-09 19:08:02'),(1108,7,'Tracey Butler','19077331457','2018-02-09 19:08:02'),(1109,7,'Lucas Barletta','13059925549','2018-02-09 19:08:02'),(1110,7,'Billy Fisher','19108743130','2018-02-09 19:08:02'),(1111,7,'michael polizzi','17166686189','2018-02-09 19:08:02'),(1112,7,'Michael Milas','16309031997','2018-02-09 19:08:02'),(1113,7,'Steve Lacy','18668526648','2018-02-09 19:08:02'),(1114,7,'Mark Carroll','15089544804','2018-02-09 19:08:02'),(1115,7,'George Hanson','16617270581','2018-02-09 19:08:02'),(1116,7,'Fred Coccagna','18002961801','2018-02-09 19:08:02'),(1117,7,'Todd Baxendale','13035038265','2018-02-09 19:08:02'),(1118,7,'Annette Wilson','17818431795','2018-02-09 19:08:02'),(1119,7,'Jason Fitzpatrick','15737073332','2018-02-09 19:08:02'),(1120,7,'Royce Goodwine','17135824182','2018-02-09 19:08:02'),(1121,7,'WILLIS YODER','18669008839','2018-02-09 19:08:02'),(1122,7,'Household Marketing','17029604013','2018-02-09 19:08:02'),(1123,7,'Danijel Nisavic','16192081494','2018-02-09 19:08:02'),(1124,7,'FULTON FULTON COUNTY STONE WORKS','18708952004','2018-02-09 19:08:02'),(1125,7,'Managing Trustee','18888085726','2018-02-09 19:08:02'),(1126,7,'LARRY DOBRENZ','13076605755','2018-02-09 19:08:02'),(1127,7,'M M','13129999999','2018-02-09 19:08:02'),(1128,7,'Ewout  Leeuwenburg','19197823811','2018-02-09 19:08:02'),(1129,7,'ADAM OBERHAUSEN','18004238100','2018-02-09 19:08:02'),(1130,7,'TANNER PRUESS','16052951972','2018-02-09 19:08:02'),(1131,7,'Mary  Ramage','12282825273','2018-02-09 19:08:02'),(1132,7,'Michael Mascha','13104641528','2018-02-09 19:08:02'),(1133,7,'STEVEN GREENWALT','18159735029','2018-02-09 19:08:02'),(1134,7,'Helen Trinh','14086953334','2018-02-09 19:08:02'),(1135,7,'Abolish Abolish','18058571652','2018-02-09 19:08:02'),(1136,7,'Mary Sweat','19414659566','2018-02-09 19:08:02'),(1137,7,'ELEANOR JUSTICE','12404312736','2018-02-09 19:08:02'),(1138,7,'Edgar Aguas','17034742669','2018-02-09 19:08:02'),(1139,7,'JOHN ROCK','17634773760','2018-02-09 19:08:02'),(1140,7,'Robert Solem','15204950352','2018-02-09 19:08:02'),(1141,7,'JR DeLeon','12819835121','2018-02-09 19:08:02'),(1142,7,'Steve Spiteri','14045119203','2018-02-09 19:08:02'),(1143,7,'AMANDA BRINKERHOFF-TOLLEFSRUD','17752251527','2018-02-09 19:08:02'),(1144,7,'JUDY TAN','13472410894','2018-02-09 19:08:02'),(1145,7,'Lee Atsaphanthong','16166105698','2018-02-09 19:08:02'),(1146,7,'Marcus Combs','18438302783','2018-02-09 19:08:02'),(1147,7,'Brandie Ledbetter','15122724530','2018-02-09 19:08:02'),(1148,7,'KEVIN O\'BRIEN','19255950422','2018-02-09 19:08:02'),(1149,7,'Don Harrison','12816837839','2018-02-09 19:08:02'),(1150,7,'Julianne Eubank','18564951423','2018-02-09 19:08:02'),(1151,7,'Alexis Tucker','13187736961','2018-02-09 19:08:02'),(1152,7,'Alex Gates','19035207026','2018-02-09 19:08:02'),(1153,7,'Naming Next','10987654321','2018-02-09 19:08:02'),(1154,7,'ROLF GEHRUNG','18054341192','2018-02-09 19:08:02'),(1155,7,'HAMMER CORPORATION','18776974667','2018-02-09 19:08:02'),(1156,7,'SECTEAM ACCOUNT','15173220434','2018-02-09 19:08:02'),(1157,7,'kevin polonofsky','19198053955','2018-02-09 19:08:02'),(1158,7,'Paul Vanderhoff','18704788946','2018-02-09 19:08:02'),(1159,7,'Bill Williams','18665081071','2018-02-09 19:08:02'),(1160,7,'Jeff Foster','12145427619','2018-02-09 19:08:02'),(1161,7,'PAUL BRUNNER','14143055441','2018-02-09 19:08:02'),(1162,7,'AMIR BAYYAN','17023346538','2018-02-09 19:08:02'),(1163,7,'Chad  Kinney','13365960518','2018-02-09 19:08:02'),(1164,7,'Demetria Wallace','17022409026','2018-02-09 19:08:02'),(1165,7,'Aaron Witko','18606399283','2018-02-09 19:08:02'),(1166,7,'Rick Turton','18054737400','2018-02-09 19:08:02'),(1167,7,'eric vautrin','17579333562','2018-02-09 19:08:02'),(1168,7,'Katrina Mendolera','15857295511','2018-02-09 19:08:02'),(1169,7,'Jared Burnup','17158631120','2018-02-09 19:08:02'),(1170,7,'david fauver','18049863152','2018-02-09 19:08:02'),(1171,7,'James Heath','14047347761','2018-02-09 19:08:02'),(1172,7,'Miguel Mendoza','19562426194','2018-02-09 19:08:02'),(1173,7,'Aaron Wasserstrom','13052050512','2018-02-09 19:08:02'),(1174,7,'Hilda Rivera','12604380503','2018-02-09 19:08:02'),(1175,7,'Arsenio Miranda','13106772104','2018-02-09 19:08:02'),(1176,7,'GONZALEZ BELLEMONT PLAZA','19565691919','2018-02-09 19:08:02'),(1177,7,'Sumrell-Fulton, Billie','19195482900','2018-02-09 19:08:02'),(1178,7,'Dylan Davis','15044218034','2018-02-09 19:08:02'),(1179,7,'Brian Arch','16267866765','2018-02-09 19:08:02'),(1180,7,'Hitesh Bhalala','15125356105','2018-02-09 19:08:02'),(1181,7,'joshua ryks','13208945233','2018-02-09 19:08:02'),(1182,7,'JOSEPH MIZRAHI','14082538090','2018-02-09 19:08:02'),(1183,7,'ROXANE HYDOCK','14083552077','2018-02-09 19:08:02'),(1184,7,'CHIP GREENWOOD','12399471000','2018-02-09 19:08:02'),(1185,7,'Amy Webb','18082836087','2018-02-09 19:08:02'),(1186,7,'Jason Roseberry','15023964009','2018-02-09 19:08:02'),(1187,7,'Michel Clouet','14185610709','2018-02-09 19:08:02'),(1188,7,'ANDREW POWERS','13107704322','2018-02-09 19:08:02'),(1189,7,'JODY ANN SHELBY','15166780313','2018-02-09 19:08:02'),(1190,7,'Andrew Garcia','18054952531','2018-02-09 19:08:02'),(1191,7,'Benjamin Chandler','15083234589','2018-02-09 19:08:02'),(1192,7,'Kim West','12315579860','2018-02-09 19:08:02'),(1193,7,'Samantha Biles','17192057485','2018-02-09 19:08:02'),(1194,7,'Damon Perry','19405001700','2018-02-09 19:08:02');

/*Table structure for table `outbox` */

DROP TABLE IF EXISTS `outbox`;

CREATE TABLE `outbox` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_phone` varchar(25) DEFAULT NULL,
  `createdatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(6) DEFAULT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `outbox` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) DEFAULT NULL,
  `u_email` varchar(255) DEFAULT NULL,
  `u_pass` varchar(50) DEFAULT NULL,
  `createdatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedatetime` timestamp NULL DEFAULT NULL,
  `is_admin` enum('0','1') DEFAULT '0',
  `is_login` enum('0','1') DEFAULT '0',
  `last_login` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT '0',
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`u_id`,`u_name`,`u_email`,`u_pass`,`createdatetime`,`updatedatetime`,`is_admin`,`is_login`,`last_login`,`last_login_ip`) values (1,'Fahad Noor','fahad.noor@salsoft.net','21232f297a57a5a743894a0e4a801fc3','2018-01-31 13:38:08',NULL,'1','1','2018-02-16 09:46:25','::1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
