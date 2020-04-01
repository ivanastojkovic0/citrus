-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.7.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` text,
  `public` tinyint(4) DEFAULT '0',
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_products_id_fk` (`product_id`),
  CONSTRAINT `comments_products_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,4,'','ivanastojkovic1@icloud.com','',0,'2020-03-31 22:19:46'),(2,3,'','ivana.stojkovic@123.com','',0,'2020-03-31 22:27:05'),(3,3,'','ivanastojkovic2@icloud.com','',0,'2020-03-31 22:46:41'),(4,3,'My Name','ivanastojkovic3@icloud.com','My Comment',1,'2020-03-31 22:53:17'),(5,3,'','ivana.stojkovic@1234.com','',1,'2020-04-01 13:02:04');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_products_id_fk` (`product_id`),
  CONSTRAINT `product_images_products_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,'/images/lemon.jpg',3),(2,'/images/bergamot.jpg',4),(3,'/images/tangerine.jpg',5),(4,'/images/calamansi.jpg',6),(5,'/images/tangor.jpg',7),(6,'/images/citron.jpg',8),(7,'/images/limetta.jpg',9),(8,'/images/lumia.jpg',10),(9,'/images/bitter-orange.jpg',11),(10,'/images/citrus-reshni.jpg',12),(11,'/images/rangpur.jpg',13);
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (3,'Lemon','The lemon, Citrus limon (L.) Osbeck, is a species of small evergreen tree in the flowering plant family Rutaceae, native to South Asia, primarily North eastern India. Its fruits are round in shape.\n\nThe tree\'s ellipsoidal yellow fruit is used for culinary and non-culinary purposes throughout the world, primarily for its juice, which has both culinary and cleaning uses.[2] The pulp and rind are also used in cooking and baking. The juice of the lemon is about 5% to 6% citric acid, with a pH of around 2.2, giving it a sour taste. The distinctive sour taste of lemon juice makes it a key ingredient in drinks and foods such as lemonade and lemon meringue pie. '),(4,'Bergamot orange','Citrus bergamia, the bergamot orange, is a fragrant citrus fruit the size of an orange, with a yellow or green color similar to a lime, depending on ripeness.\n\nGenetic research into the ancestral origins of extant citrus cultivars found bergamot orange to be a probable hybrid of lemon and bitter orange.[3] Extracts have been used to scent food, perfumes, and cosmetics.[4] Use on the skin can increase photosensitivity, resulting in greater damage from sun exposure.'),(5,'Tangerine','The tangerine (Citrus reticula L. var.,[1] sometimes referred as Citrus tangerina[2]) is a group of orange-colored citrus fruit consisting of hybrids of mandarin orange (Citrus reticulata).\n\nThe name was first used for fruit coming from Tangier, Morocco, described as a mandarin variety.[3] Under the Tanaka classification system, Citrus tangerina is considered a separate species. Under the Swingle system, tangerines are considered a group of mandarin (C. reticulata) varieties.[4] Genetic study has shown tangerines to be mandarin orange hybrids containing some pomelo DNA.[5][6] Some differ only in disease resistance.[7] The term is currently applied to any reddish-orange mandarin[citation needed] (and, in some jurisdictions, mandarin-like hybrids, including some tangors).[8][9] '),(6,'Calamansi','Calamansi is a hybrid between kumquat (formerly considered as belonging to a separate genus Fortunella) and another species of Citrus (in this case probably the mandarin orange).[3]'),(7,'Tangor','(Citrus reticulata) and the sweet orange (Citrus sinensis). The name \"tangor\" is a formation from the \"tang\" of tangerine and the \"or\" of \"orange\". Also called the temple orange, its thick rind is easy to peel and its bright orange pulp is sour-sweet and full-flavoured. '),(8,'Citron','The citron (Citrus medica) is a large fragrant citrus fruit with a thick rind. It is one of the original citrus fruits from which all other citrus types developed through natural hybrid speciation or artificial hybridization.[2] Though citron cultivars take on a wide variety of physical forms, they are all closely related genetically. It is used widely in Asian cuisine, and also in traditional medicines, perfume, and for religious rituals and offerings. Hybrids of citrons with other citrus are commercially prominent, notably lemons and many limes. '),(9,'Citrus limetta','As the name sweet lime suggests, the flavour is sweet and mild, but retains the essence of lime. The lime\'s taste changes rapidly in contact with air, and will turn bitter in few minutes,[citation needed] but if juiced and drunk rapidly the taste is sweet. The flavour is a bit flatter than most citrus due to its lack of acidity. It can be compared to limeade and pomelo. '),(10,'Lumia (citrus)','Lumias represent several distinct citrus hybrids. Usually lumias are referred to as a citron hybrid, because of its size, thick peel and dryness of pulp. Pomo d\'Adamo was also described by Johann Christoph Volkamer as a Cedrato which is Italian for a citron hybrid, whilst Cedro refers to a true citron.[4]\nCitron varieties\n3 etrog.JPG\nAcidic-pulp varieties\n\n    Balady citron Diamante citron Greek citron\n\nNon-acidic varieties\n\n    Corsican citron Moroccan citron\n\nPulpless varieties\n\n    Fingered citron Yemenite citron\n\nCitron Hybrids\n\n    Florentine citron Kabbad Lumia Ponderosa lemon Rhobs el Arsa\n\nRelated articles\n\n    Citrus taxonomy Etrog Succade Sukkot\n\n    vte\n\nA recent genomic analysis of several species commonly called \'lemons\' or \'limes\' revealed that the various individual lumias have different genetic backgrounds. The \'Hybride Fourny\' was found to be an F1 hybrid of a citron- pomelo cross, while the \'Jaffa lemon\' was a more complex cross between the two species, perhaps an F2 hybrid. The Pomme d\'Adam arose from a citron-micrantha cross, while two other lumias, the ‘Borneo’ and ‘Barum’ lemons, were found to be citron-pomelo-micrantha mixes.[5] '),(11,'Bitter orange','Many varieties of bitter orange are used for their essential oil, and are found in perfume, used as a flavoring or as a solvent and also for consumption. The Seville orange variety is used in the production of marmalade and also used to make French bigarade sauce.[6]\n\nBitter orange is also employed in herbal medicine as a stimulant and appetite suppressant, due to its active ingredient, synephrine.[7][8] Bitter orange supplements have been linked to a number of serious side effects and deaths, and consumer groups advocate that people avoid using the fruit medically.[9][10] It is still not concluded if bitter orange affects medical conditions of heart and cardiovascular organs, by itself or in formulae with other substances.[11] Standard reference materials are released concerning the properties in bitter orange by the National Institute of Standards and Technology (NIST), for ground fruit, extract and solid oral dosage form, along with those packaged together into one item.[12][13] '),(12,'Citrus reshni','The Cleopatra mandarin fruit belong to the \"acidic\" group of mandarins, which are too sour to be edible. When they are grown it is for the rootstock or for juice production.[3] The rootstock can handle multiple soil conditions including tolerance to the presence of limestone, salinity and soil alkalinity along with being suitable for shallow soils.[2] It is resistant to citrus tristeza virus and exocortis but is sensitive to root asphyxia and Phytophthora.[2][4] One of the down sides to using the rootstock is it grows slow in the early years. In the right conditions it can induce high productivity and excellent fruit quality, although these are usually somewhat smaller than with others.[2][5]'),(13,'Rangpur (fruit)','Common names for this fruit include rangpur, the word possibly originated in the Bengali language. Rangpur is also known in the Indian subcontinent as Sylhet lime, surkh nimboo, and sharbati.[1] It is known as a canton-lemon in South China, a hime-lemon in Japan, as limão-capeta, limão-cravo, limão-rosa or limão-galego in Brazil and Portugal (namely in the Azores), and mandarin-lime in the United States.[2]');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','YWRtaW4xMjM=');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-01 18:42:56
