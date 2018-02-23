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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `campaign_listing` */

insert  into `campaign_listing`(`cl_id`,`fk_campaign_id`,`fk_listing_id`,`fk_campaignnumber_id`,`campaign_delete`,`listing_delete`,`createdby`,`createdatetime`) values (22,22,42,5,'0','0',1,'2018-02-20 20:58:21');

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

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

insert  into `countries`(`c_id`,`country_name`,`country_code`,`number_length`,`createdby`,`createdatetime`,`updatedby`,`updatedatetime`) values (1,'USA','+1',11,NULL,'2018-02-02 14:27:43',NULL,NULL),(2,'Australia','+61',12,NULL,'2018-02-02 14:28:20',NULL,NULL),(3,'UK','+44',12,NULL,'2018-02-02 14:28:31',1,'2018-02-14 12:38:53'),(9,'UAE','+971',12,NULL,'2018-02-14 16:58:21',1,'2018-02-14 12:42:26');

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
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*Data for the table `listings` */

insert  into `listings`(`ls_id`,`ls_name`,`ls_countryid`,`createdatetime`,`updatedatetime`,`createdby`,`updatedby`) values (42,'asd',1,'2018-02-20 12:50:20',NULL,1,NULL),(43,'ttt',1,'2018-02-20 12:50:37',NULL,1,NULL);

/*Table structure for table `lists` */

DROP TABLE IF EXISTS `lists`;

CREATE TABLE `lists` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_lsId` int(11) DEFAULT NULL,
  `l_name` varchar(500) DEFAULT NULL,
  `l_phone` varchar(25) DEFAULT NULL,
  `createdatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`l_id`)
) ENGINE=MyISAM AUTO_INCREMENT=610 DEFAULT CHARSET=latin1;

/*Data for the table `lists` */

insert  into `lists`(`l_id`,`fk_lsId`,`l_name`,`l_phone`,`createdatetime`) values (589,42,'Arsenio Miranda','13106772104','2018-02-20 12:50:20'),(588,42,'Hilda Rivera','12604380503','2018-02-20 12:50:20'),(587,42,'Aaron Wasserstrom','13052050512','2018-02-20 12:50:20'),(585,42,'James Heath','14047347761','2018-02-20 12:50:20'),(586,42,'Miguel Mendoza','19562426194','2018-02-20 12:50:20'),(584,42,'david fauver','18049863152','2018-02-20 12:50:20'),(583,42,'Jared Burnup','17158631120','2018-02-20 12:50:20'),(582,42,'Katrina Mendolera','15857295511','2018-02-20 12:50:20'),(581,42,'eric vautrin','17579333562','2018-02-20 12:50:20'),(579,42,'Aaron Witko','18606399283','2018-02-20 12:50:20'),(580,42,'Rick Turton','18054737400','2018-02-20 12:50:20'),(577,42,'Chad  Kinney','13365960518','2018-02-20 12:50:20'),(578,42,'Demetria Wallace','17022409026','2018-02-20 12:50:20'),(576,42,'AMIR BAYYAN','17023346538','2018-02-20 12:50:20'),(575,42,'PAUL BRUNNER','14143055441','2018-02-20 12:50:20'),(574,42,'Jeff Foster','12145427619','2018-02-20 12:50:20'),(573,42,'Bill Williams','18665081071','2018-02-20 12:50:20'),(572,42,'Paul Vanderhoff','18704788946','2018-02-20 12:50:20'),(571,42,'kevin polonofsky','19198053955','2018-02-20 12:50:20'),(570,42,'SECTEAM ACCOUNT','15173220434','2018-02-20 12:50:20'),(569,42,'HAMMER CORPORATION','18776974667','2018-02-20 12:50:20'),(568,42,'ROLF GEHRUNG','18054341192','2018-02-20 12:50:20'),(567,42,'Naming Next','10987654321','2018-02-20 12:50:20'),(565,42,'Alexis Tucker','13187736961','2018-02-20 12:50:20'),(566,42,'Alex Gates','19035207026','2018-02-20 12:50:20'),(564,42,'Julianne Eubank','18564951423','2018-02-20 12:50:20'),(562,42,'KEVIN O\'BRIEN','19255950422','2018-02-20 12:50:20'),(563,42,'Don Harrison','12816837839','2018-02-20 12:50:20'),(561,42,'Brandie Ledbetter','15122724530','2018-02-20 12:50:20'),(560,42,'Marcus Combs','18438302783','2018-02-20 12:50:20'),(559,42,'Lee Atsaphanthong','16166105698','2018-02-20 12:50:20'),(558,42,'JUDY TAN','13472410894','2018-02-20 12:50:20'),(557,42,'AMANDA BRINKERHOFF-TOLLEFSRUD','17752251527','2018-02-20 12:50:20'),(556,42,'Steve Spiteri','14045119203','2018-02-20 12:50:20'),(555,42,'JR DeLeon','12819835121','2018-02-20 12:50:20'),(554,42,'Robert Solem','15204950352','2018-02-20 12:50:20'),(553,42,'JOHN ROCK','17634773760','2018-02-20 12:50:20'),(552,42,'Edgar Aguas','17034742669','2018-02-20 12:50:20'),(551,42,'ELEANOR JUSTICE','12404312736','2018-02-20 12:50:20'),(550,42,'Mary Sweat','19414659566','2018-02-20 12:50:20'),(548,42,'Helen Trinh','14086953334','2018-02-20 12:50:20'),(549,42,'Abolish Abolish','18058571652','2018-02-20 12:50:20'),(547,42,'STEVEN GREENWALT','18159735029','2018-02-20 12:50:20'),(545,42,'Mary  Ramage','12282825273','2018-02-20 12:50:20'),(546,42,'Michael Mascha','13104641528','2018-02-20 12:50:20'),(544,42,'TANNER PRUESS','16052951972','2018-02-20 12:50:20'),(543,42,'ADAM OBERHAUSEN','18004238100','2018-02-20 12:50:20'),(542,42,'Ewout  Leeuwenburg','19197823811','2018-02-20 12:50:20'),(541,42,'M M','13129999999','2018-02-20 12:50:20'),(540,42,'LARRY DOBRENZ','13076605755','2018-02-20 12:50:20'),(539,42,'Managing Trustee','18888085726','2018-02-20 12:50:20'),(537,42,'Danijel Nisavic','16192081494','2018-02-20 12:50:20'),(538,42,'FULTON FULTON COUNTY STONE WORKS','18708952004','2018-02-20 12:50:20'),(536,42,'Household Marketing','17029604013','2018-02-20 12:50:20'),(535,42,'WILLIS YODER','18669008839','2018-02-20 12:50:20'),(534,42,'Royce Goodwine','17135824182','2018-02-20 12:50:20'),(533,42,'Jason Fitzpatrick','15737073332','2018-02-20 12:50:20'),(532,42,'Annette Wilson','17818431795','2018-02-20 12:50:20'),(531,42,'Todd Baxendale','13035038265','2018-02-20 12:50:20'),(529,42,'George Hanson','16617270581','2018-02-20 12:50:20'),(530,42,'Fred Coccagna','18002961801','2018-02-20 12:50:20'),(528,42,'Mark Carroll','15089544804','2018-02-20 12:50:20'),(527,42,'Steve Lacy','18668526648','2018-02-20 12:50:20'),(526,42,'Michael Milas','16309031997','2018-02-20 12:50:20'),(524,42,'Billy Fisher','19108743130','2018-02-20 12:50:20'),(525,42,'michael polizzi','17166686189','2018-02-20 12:50:20'),(523,42,'Lucas Barletta','13059925549','2018-02-20 12:50:20'),(522,42,'Tracey Butler','19077331457','2018-02-20 12:50:20'),(521,42,'CARMEN ROJAS','19047724709','2018-02-20 12:50:20'),(520,42,'COSveyor, Inc.','16308789490','2018-02-20 12:50:20'),(519,42,'Taylor Adair','18566309859','2018-02-20 12:50:20'),(518,42,'Rev. Kevin Raidy','18123847881','2018-02-20 12:50:20'),(517,42,'Shavon Osborne','12023652732','2018-02-20 12:50:20'),(516,42,'Maria Nubile','17184246080','2018-02-20 12:50:20'),(515,42,'Janice Arvin','17409737247','2018-02-20 12:50:20'),(514,42,'John CF','18454529374','2018-02-20 12:50:20'),(513,42,'Alan Jay Automotive Network','18634024232','2018-02-20 12:50:20'),(511,42,'David Abdo','15613099099','2018-02-20 12:50:20'),(512,42,'FJ ANDERSON','18048007886','2018-02-20 12:50:20'),(510,42,'Jeremy Folse','18189177062','2018-02-20 12:50:20'),(509,42,'Frankie Wanamaker','18014221211','2018-02-20 12:50:20'),(508,42,'LINDA CAMPBELL','15407434628','2018-02-20 12:50:20'),(507,42,'Chelsea Francis','17404036660','2018-02-20 12:50:20'),(506,42,'Michael Parkhurst','13608562531','2018-02-20 12:50:20'),(505,42,'Jonson Albert','15168948349','2018-02-20 12:50:20'),(504,42,'Will Brozovich','16623350485','2018-02-20 12:50:20'),(503,42,'Brown, Jeffery','19037965864','2018-02-20 12:50:20'),(501,42,'Kentigern Kyle','12394780341','2018-02-20 12:50:20'),(502,42,'Omar Sharif','19178339172','2018-02-20 12:50:20'),(500,42,'RICHARD KAISER','19379313011','2018-02-20 12:50:20'),(499,42,'Inboxd Agency','12133942422','2018-02-20 12:50:20'),(498,42,'Warda Odhowa','19529920134','2018-02-20 12:50:20'),(497,42,'Zac Ibanez-Lopez','19196196846','2018-02-20 12:50:20'),(496,42,'WESLEY HUBBARD','15624335473','2018-02-20 12:50:20'),(495,42,'Daniel Cornell','16509495313','2018-02-20 12:50:20'),(493,42,'shaun broderick','16613889636','2018-02-20 12:50:20'),(494,42,'VEDA WASHINGTON','15862131531','2018-02-20 12:50:20'),(492,42,'Paul Couture','18007507515','2018-02-20 12:50:20'),(491,42,'Gary Carlson','17578173845','2018-02-20 12:50:20'),(490,42,'ARA MOVSESIAN','15594325670','2018-02-20 12:50:20'),(488,42,'LORI GUERTIN','19784653148','2018-02-20 12:50:20'),(489,42,'JOHN GLISSON','12705599500','2018-02-20 12:50:20'),(486,42,'LUZ LEE','18088005812','2018-02-20 12:50:20'),(487,42,'Doris D. Watkins','17573424020','2018-02-20 12:50:20'),(485,42,'Stan Leary','16163786506','2018-02-20 12:50:20'),(484,42,'Rich Delgado','14407997440','2018-02-20 12:50:20'),(482,42,'Victor Koch','16363731771','2018-02-20 12:50:20'),(483,42,'Christina Louise Gale','17164358716','2018-02-20 12:50:20'),(481,42,'Paul John','18140067044','2018-02-20 12:50:20'),(480,42,'David Berger','17346787941','2018-02-20 12:50:20'),(479,42,'FTW Excavation - Finish The World','12256150999','2018-02-20 12:50:20'),(478,42,'Dale Crawford','17704809145','2018-02-20 12:50:20'),(477,42,'Gerald Zuraski','19786496809','2018-02-20 12:50:20'),(476,42,'CARSON YOUNG','12083081733','2018-02-20 12:50:20'),(475,42,'Laura Valle','13158041845','2018-02-20 12:50:20'),(474,42,'MAX SISKIND','16469024830','2018-02-20 12:50:20'),(473,42,'JEFF WHITEMAN','17609309966','2018-02-20 12:50:20'),(472,42,'Jason Lyle','16039862769','2018-02-20 12:50:20'),(471,42,'STEFAN SCHINZINGER','15103527600','2018-02-20 12:50:20'),(470,42,'WILLIAM MAXWELL','17169900100','2018-02-20 12:50:20'),(469,42,'Rachel Prentice','19495060669','2018-02-20 12:50:20'),(468,42,'Eric freedman','12672316540','2018-02-20 12:50:20'),(467,42,'H & H Products Company','14072994410','2018-02-20 12:50:20'),(466,42,'sung min kim','18587766101','2018-02-20 12:50:20'),(465,42,'Trevor Harris','15089711879','2018-02-20 12:50:20'),(464,42,'KATE SICKELS','17152123997','2018-02-20 12:50:20'),(463,42,'Greg Biersack','12535692550','2018-02-20 12:50:20'),(462,42,'Toni Weel','18134410166','2018-02-20 12:50:20'),(461,42,'Karin Thompson','19162153086','2018-02-20 12:50:20'),(460,42,'Joyce Fleming','13053211418','2018-02-20 12:50:20'),(459,42,'Francisco Lascano','17187630433','2018-02-20 12:50:20'),(458,42,'DAVID BOND','14072868657','2018-02-20 12:50:20'),(457,42,'Bennie Hodges','15208823873','2018-02-20 12:50:20'),(456,42,'customer Service','18004764154','2018-02-20 12:50:20'),(455,42,'GRANT MCCABE','18457651690','2018-02-20 12:50:20'),(454,42,'Emil Kadlec','15052619663','2018-02-20 12:50:20'),(453,42,'ROJI VARGHESE','19724008065','2018-02-20 12:50:20'),(452,42,'Cuantum Direct','16174311458','2018-02-20 12:50:20'),(451,42,'Hoang Nguyen','12538869592','2018-02-20 12:50:20'),(450,42,'Jeremy Brandenburg','19373166116','2018-02-20 12:50:20'),(449,42,'James McCain','12077673707','2018-02-20 12:50:20'),(448,42,'Hidden Wealth, Inc.','19547247747','2018-02-20 12:50:20'),(447,42,'Tech Support','12062013095','2018-02-20 12:50:20'),(446,42,'Kenneth D. Tebo','17708829845','2018-02-20 12:50:20'),(445,42,'Matthew Klein','16466599179','2018-02-20 12:50:20'),(444,42,'Noonlunch Menu','14109896537','2018-02-20 12:50:20'),(443,42,'Curtis Copley','16209319089','2018-02-20 12:50:20'),(442,42,'Marcel Figueiredo','17815580318','2018-02-20 12:50:20'),(441,42,'Richard','18501111111','2018-02-20 12:50:20'),(440,42,'maxjones','19876543210','2018-02-20 12:50:20'),(439,42,'Anthony Fullerton','17028580487','2018-02-20 12:50:20'),(438,42,'Rhonda Hawkins','12053841951','2018-02-20 12:50:20'),(437,42,'NANCY BRADLEY','17048580349','2018-02-20 12:50:20'),(436,42,'PUGDOG Enterprises, Inc.','14124218460','2018-02-20 12:50:20'),(435,42,'BRENDAN FLAHERTY','17024570103','2018-02-20 12:50:20'),(434,42,'Frank Su','19095950381','2018-02-20 12:50:20'),(433,42,'Mario Perez','19546812616','2018-02-20 12:50:20'),(432,42,'Friedrich Air Conditioning','12105460512','2018-02-20 12:50:20'),(431,42,'Jay Law','16785085158','2018-02-20 12:50:20'),(430,42,'Victor Goree','15102535731','2018-02-20 12:50:20'),(429,42,'Rick Eichhorn','19372708607','2018-02-20 12:50:20'),(428,42,'Jan Everno','18056662322','2018-02-20 12:50:20'),(427,42,'JOSE VILLAGOMEZ','13107097855','2018-02-20 12:50:20'),(426,42,'JUSTINA PABON','15085210214','2018-02-20 12:50:20'),(425,42,'Bill Landsowne','16362396678','2018-02-20 12:50:20'),(424,42,'Chris Milano','16502550572','2018-02-20 12:50:20'),(423,42,'Dawn Haun','18049944140','2018-02-20 12:50:20'),(422,42,'Joshua Eisenhower','17177238559','2018-02-20 12:50:20'),(421,42,'C F','19787581295','2018-02-20 12:50:20'),(420,42,'Maxwell Technologies','14156623082','2018-02-20 12:50:20'),(419,42,'Jack Zhang','15023548491','2018-02-20 12:50:20'),(418,42,'Steven August','17026444100','2018-02-20 12:50:20'),(417,42,'Michael Sanders','13025141033','2018-02-20 12:50:20'),(416,42,'LaToya Osborne','14437663075','2018-02-20 12:50:20'),(415,42,'Jessica Zimmermann','14062345678','2018-02-20 12:50:20'),(414,42,'Dannie Holland','18062920925','2018-02-20 12:50:20'),(413,42,'Christine Brown','18883174018','2018-02-20 12:50:20'),(412,42,'GERARD LIGUORI','15617150404','2018-02-20 12:50:20'),(411,42,'Caesar Guerini USA','14109011131','2018-02-20 12:50:20'),(410,42,'CJ Kalra','12158063253','2018-02-20 12:50:20'),(590,42,'GONZALEZ BELLEMONT PLAZA','19565691919','2018-02-20 12:50:20'),(591,42,'Sumrell-Fulton, Billie','19195482900','2018-02-20 12:50:20'),(592,42,'Dylan Davis','15044218034','2018-02-20 12:50:20'),(593,42,'Brian Arch','16267866765','2018-02-20 12:50:20'),(594,42,'Hitesh Bhalala','15125356105','2018-02-20 12:50:20'),(595,42,'joshua ryks','13208945233','2018-02-20 12:50:20'),(596,42,'JOSEPH MIZRAHI','14082538090','2018-02-20 12:50:20'),(597,42,'ROXANE HYDOCK','14083552077','2018-02-20 12:50:20'),(598,42,'CHIP GREENWOOD','12399471000','2018-02-20 12:50:20'),(599,42,'Amy Webb','18082836087','2018-02-20 12:50:20'),(600,42,'Jason Roseberry','15023964009','2018-02-20 12:50:20'),(601,42,'Michel Clouet','14185610709','2018-02-20 12:50:20'),(602,42,'ANDREW POWERS','13107704322','2018-02-20 12:50:20'),(603,42,'JODY ANN SHELBY','15166780313','2018-02-20 12:50:20'),(604,42,'Andrew Garcia','18054952531','2018-02-20 12:50:20'),(605,42,'Benjamin Chandler','15083234589','2018-02-20 12:50:20'),(606,42,'Kim West','12315579860','2018-02-20 12:50:20'),(607,42,'Samantha Biles','17192057485','2018-02-20 12:50:20'),(608,42,'Damon Perry','19405001700','2018-02-20 12:50:20'),(609,43,'CJ Kalra','12158063253','2018-02-20 12:50:37');

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`u_id`,`u_name`,`u_email`,`u_pass`,`createdatetime`,`updatedatetime`,`is_admin`,`is_login`,`last_login`,`last_login_ip`) values (1,'Fahad Noor','fahad.noor@salsoft.net','21232f297a57a5a743894a0e4a801fc3','2018-01-31 13:38:08',NULL,'1','1','2018-02-20 03:55:57','::1'),(11,'Mobin Nizami','mobin.nizami@salsoft.net','9f311f8b875c76391744309e2060f2e2','2018-02-20 18:38:29',NULL,'1','0','2018-02-20 01:39:25','::1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
