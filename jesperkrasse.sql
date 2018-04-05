-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2018 at 01:49 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jesperkrasse`
--

-- --------------------------------------------------------

--
-- Table structure for table `V5_Customer`
--

CREATE TABLE `V5_Customer` (
  `id` varchar(68) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `fName` varchar(68) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `lName` varchar(68) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `address` varchar(68) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `postalCode` int(11) NOT NULL,
  `city` varchar(68) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `phoneNumber` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `V5_Delivery`
--

CREATE TABLE `V5_Delivery` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `price` int(11) NOT NULL,
  `deliveryTime` varchar(16) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `V5_Delivery`
--

INSERT INTO `V5_Delivery` (`name`, `price`, `deliveryTime`) VALUES
('Butik', 0, 'en'),
('DHL', 68, 'två'),
('Postnord', 49, 'fyra');

-- --------------------------------------------------------

--
-- Table structure for table `V5_MainCategory`
--

CREATE TABLE `V5_MainCategory` (
  `id` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `V5_MainCategory`
--

INSERT INTO `V5_MainCategory` (`id`, `name`) VALUES
(1, 'Filmer');

-- --------------------------------------------------------

--
-- Table structure for table `V5_NewsEmail`
--

CREATE TABLE `V5_NewsEmail` (
  `title` varchar(64) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `V5_NewsEmailList`
--

CREATE TABLE `V5_NewsEmailList` (
  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `V5_Order`
--

CREATE TABLE `V5_Order` (
  `id` int(11) NOT NULL,
  `customerID` varchar(11) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `orderDate` date NOT NULL,
  `shippedDate` date NOT NULL,
  `deliveryDate` date NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `deliveryName` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `V5_OrderDetails`
--

CREATE TABLE `V5_OrderDetails` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `V5_Products`
--

CREATE TABLE `V5_Products` (
  `title` varchar(64) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `image` varchar(64) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `productId` int(11) NOT NULL,
  `subCategoryId` int(11) NOT NULL,
  `subCategoryId2` int(11) DEFAULT NULL,
  `mainCategoryId` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `V5_Products`
--

INSERT INTO `V5_Products` (`title`, `price`, `description`, `image`, `productId`, `subCategoryId`, `subCategoryId2`, `mainCategoryId`, `year`) VALUES
('Die Hard', 99, 'John McClane (Bruce Willis) är polis i New York. När han under julhelgen åker till sin fru Holly (Bonnie Bedelia) i Los Angeles och besöker hennes arbetsplats, skyskrapan Nakatomi Corporation, hamnar han mitt i ett rån maskerat som en terroristattack. Med sin fru som en av gisslan bestämmer sig McClane att försöka sätta stopp för skurkarna. ', '', 1, 3, 5, 1, 1988),
('Back To The Future', 99, '17-årige Marty McFly är vän med uppfinnaren Dr. Emmett Brown som har byggt en tidsmaskin av en DeLorean. Dr. Brown blir skjuten av terrorister samma kväll som han visar sin tidsmaskin för Marty. Marty flyr undan terroristerna och kastar sig in i tidsmaskinen. Plötsligt befinner han sig i år 1955. Dessvärre har han sönder tidsmaskinen och tvingas leta rätt på den unge Dr. Brown för att be om hjälp. Av en slump träffar han på sina föräldrar och upptäcker till sin fasa att hans mamma blir kär i honom. Marty måste nu få sina föräldrar att bli kära i varandra, försöka varna sin vän Dr. Brown om vad som kommer att hända honom i framtiden och laga tidsmaskinen innan han åker tillbaka till framtiden!', NULL, 3, 4, 6, 1, 1985),
('Citizen Kane', 79, 'Enligt många en kandidat till världens genom tiderna bästa film. Orson Welles tidlösa berättelse är inte bara ett stycke nyskapande filmhistoria utan också storslagen underhållning och en hård uppgörelse med den amerikanska drömmen genom en episk skildring av en inflytelserik mediapamps uppgång och fall. Welles lägger pussel med mysteriet kring den döende Kanes sista ord, där varje bit bildar en intrikat väv av makt, korruption, fåfänga och mänsklig tragedi som håller spänningen uppe till det bittra slutet, då den sista och avgörande pusselbiten läggs på plats. ', NULL, 4, 1, NULL, 1, 1941),
('The Godfather', 129, 'Den sicilianska maffiafamiljen leds av familjens överhuvud Vito Corleone som styr den organiserade brottsligheten i New York. Corleones maktställning verkar vara orubblig tills plötsligt en annan respekterad maffiafamilj, Sollozzo, vill börja sälja narkotika på gatan. Vito Corleone är skeptisk och går emot det. Det är början till en maktkamp mellan de två maffiafamiljerna och Vito Corleone och hans familj är plötsligt i livsfara.\r\n', NULL, 5, 5, 1, 1, 1972),
('Back To The Future Part 2', 79, 'Marty har inte varit hemma många minuter förrän Doc släpar med honom 25 år fram i tiden. En dyster framtid där en hel del måste ställas till rätta och tidscirkusen är snart igång med hopp mellan åren 1955, nutid och 2015!', NULL, 6, 3, 6, 1, 1989),
('Psycho', 79, ' För att ha råd att kunna gifta sig, tar kontoristen Marion Crane ett ödesdigert beslut när chefen ber henne gå till banken med en stor summa pengar. Beslutet leder henne till att svänga förbi med bilen till ett ödsligt motell, som sköts av en viss Norman Bates och hans mor. Till det yttre ser han ut som en söt och väldigt blyg man. Men Norman Bates döljer på en mörk hemlighet.... ', NULL, 7, 8, NULL, 1, 1960),
('Back To The Future Part 3', 79, 'Doc Brown och hans skyddsling Marty McFly befinner sig i Vilda västern år 1885. Doc bestämmer sig för att stanna kvar. När Marty har återvänt till 1955 får han syn på Docs gravsten och inser att han måste färdas tillbaka till 1885 och rädda Doc.', NULL, 8, 3, 6, 1, 1990),
('The Silence of the Lambs', 99, 'Seriemördaren \"Buffalo Bill\" kidnappar, mördar och skär bort huden från unga kvinnor. En FBI-agent under utbildning, Clarice Starling, skickas till den inspärrade, extremt farlige psykopaten Hannibal \"The Cannibal\" Lecter för att få information om mördaren. När \"Buffalo Bill\" kidnappar en senators dotter ökar jakten ännu mer. Nu måste myndigheterna ta hjälp av Hannibal, något som skall visa sig vara ödesdigert.', NULL, 9, 5, NULL, 1, 1991),
('Godfellas', 149, 'Under 30 år följs den unge Henry Hills karriär mot den inre kretsen av maffian. Eftersom han är halvirländsk kan han inte nå den riktiga toppen och misstankar börjar riktas mot honom både från polisen och de egna', NULL, 10, 3, 1, 1, 1990),
('Aliens This Time It\'s War', 129, 'Ellen Ripley vaknar upp på ett rymdskepp efter sin 57-åriga kryosömn sedan hon dödade det farliga Alien-monstret. Ripleys berättelse om varelsen och besättningens grymma öde möts till en början med skepsis. Men då kolonister på planeten LV-426 försvinner under mystiska omständigheter, utses hon till rådgivare för en trupp högteknologiska marinsoldater som skickas ut för att undersöka saken. Men snart visar det sig att de har att göra med något mycket farligt..', NULL, 11, 6, 9, 1, 1986),
('The Wizard of Oz', 79, 'En elak granne vill att Dorothys lilla hund ska avlivas. Dorothy flyr med hunden men sveps iväg av en tornado och hamnar i det magiska landet Oz. Där slår hon följe med Plåtmannen, Fågelskrämmande och ett fegt lejon för att hitta vägen hem... ', NULL, 12, 9, 10, 1, 1939),
('The Shawshank Redemption', 99, 'Andy Dufresne (Tim Robbins), är en tystlåten ambitiös man långt kommen i en lysande karriär. Dessvärre är hans förhållande med frun långt i från lyckligt – hon vill skilja sig samt har inlett ett förhållande med en annan. När frun och hennes älskare brutalt skjuts ihjäl åtalas Andy och fälls för morden. Straffet blir två livstider på Shawshank, ett av de värsta fängelserna i USA.', NULL, 13, 1, NULL, 1, 1994),
('Amadeus', 79, 'Milos Formans tolkning av Peter Shaffers prisbelönta pjäs om Mozarts korta liv. Han dyrkades av gudarna. Jagades av demoner. Krossades av mannen som beundrade och hatade honom. Ett briljant människodrama, en ärofylld lovprisning av Wolfgang Amadeus Mozarts musik.', NULL, 14, 9, 1, 1, 1984),
('Fantasia', 99, 'I denna Disneyklassiker får du möta dansande svampar och förtrollande älvor, Musse Pigg som trollkarlens lärling, marscherande kvastar, mörka demoner och alla andra oförglömliga episoder. Allt till tonerna av The Philadelphia Orchestra, under ledning av Leopold Stokowski. ', NULL, 15, 12, 11, 1, 1940),
('Dumbo', 89, 'Den klassiska sagan om den lille cirkuselefanten Dumbo är Disneys fjärde tecknade långfilm. Dumbo föddes med ett par alldeles för stora öron. För dessa blir han mobbad och utskrattad. Då dyker musen Timothy upp och blir Dumbos vän. Timothy försöker nu lära Dumbo några cirkuskonster - kan hans öron faktiskt vara ett trumfkort? ', NULL, 16, 12, 11, 1, 1941),
('Charlie Chaplin \"The Kid\"', 149, 'För första gången som filmskapare tar Chaplin steget till långfilmsformatet med denna klassiker. Det handlar om Luffaren och den förtjusande trashanken (6-årige Jackie Coogan), räddad som hittebarn och uppfostrad vid livets skola av Luffaren själv, och som blivit hans oskiljaktiga hjälpreda. Minnesvärda scener inkluderar en lektion i bordsskick, mobbningsbråket och Luffarens änglalika dröm. Chaplins pojke förtjänar sina vingar!', NULL, 17, 1, 11, 1, 1921),
('Indiana Jones and the Last Crusade', 129, 'Det spännande filmeposet fortsätter, och Indiana Jones ger sig av på ett farofyllt sökande efter sin far, den vresige doktor Henry Jones. Nazisterna är ute efter den heliga Graalen och har kidnappat Indys far som är världens främste expert i ämnet. Följ Indy bland råttorna i Venedigs katakomber, i en hisnande luftstrid med nazistiska flygaräss och när han trotsar en framrusande skjutande stridsvagn. Graalen har makt att både ta och ge liv, och Indy och hans far kämpar nu mot klockan.', NULL, 18, 3, 9, 1, 1989),
('Between the Sheets', 49, 'En ung danska ärver plötsligt ett stort gods och en förmögenhet, men hennes ekonomiska ställning är egentligen i grunden ohållbar. Efter en serie förvecklingar, främst av erotisk natur, löser sig de ekonomiska problemen.', NULL, 19, 2, NULL, 1, 1973),
('Reservoir Dogs', 119, 'Det här är historien om en några kriminella som hyrs för att råna en juvelbutik. Men något går fel och bara fyra av männen överlever, en av dom såras svårt. Uppenbarligen är en av dem också en polis, men vem? ', NULL, 20, 1, 5, 1, 1992),
('Wayne\'s World', 99, 'Kultförklarad partyfilm med rockmusik, coola brudar och de galnaste värdar du kan tänka dig - Wayne Campbell och Garth Algar. När en slemmig tv-chef erbjuder Wayne och Garth ett fett kontrakt för att sända sin tv-show på hans kanal tror de knappt att det är sant. Men de upptäcker snart att vägen från gamla källarlokaler till framgång och stora pengar är rätt krokig och fylld av faror, frestelser och vilda partyn. Och kommer Wayne att vinna rockgudinnan Cassandras hjärta? Kommer Garth att få till det med sin drömtjej i doughnut-butiken?', NULL, 21, 4, NULL, 1, 1992),
('Blade Runner', 129, 'Året är 2019. Mänskligheten har skapat kloner som arbetar på rymdkolonier utanför jorden. Men efter ett blodigt myteri på en av kolonierna förbjuds användandet av kloner och de direktiv ges att de ska förstöras. När några av klonerna kapar ett rymdskepp och beger sig till jorden dyker Rick Deckard upp. Deckard tillhör en specialstyrka inom polisen, Blade runner, vars enda uppgift är att förstöra kloner.', NULL, 22, 5, 6, 1, 1982),
('Home Alone', 99, 'Busfröet Kevin McCallister ställer till med rejäl oreda kvällen innan hela släkten skall åka till Frankrike. Man hamnar i rejäl tidsnöd nästa dag då man försovit sig och av all jäkt och stress glöms en person - Kevin. ', NULL, 23, 4, 11, 1, 1990),
('Dead Poets Society', 99, '1959: I en privatskola med tryckt atmosfär inspirerar den passionerade professorn i engelska, John Keating, sina studenter till att leva livet fullt ut, med mottot \"Carpe Diem\" (fånga dagen). Keating gör ett starkt intryck på sina äventyrstörstande elever, och de starka känslor som skolan och familjerna tryckt börjar komma upp till ytan. Uppmaningen från läraren kommer att ändra deras liv för alltid, men motkrafter verkar i bakgrunden. ', NULL, 24, 1, NULL, 1, 1989),
('Monty Pythons Life of Brian - Ett herrans liv', 199, 'De tre vise männen kommer med gåvor till den lilla nyfödda Brian i tron att han är Jesus. Så småningom inser de sitt misstag och går vidare till stallet bredvid där rätt gossebarn ligger och väntar inbäddad i sin krubba. Denna förväxling är starten på livet för Brian som hädanefter kommer att leva i skuggan av Jesus...', NULL, 25, 4, NULL, 1, 1979),
('Gandhi', 99, 'Indien i Början av 1900-talet. Den värdefullaste juvelen i det brittiska imperiets krona. Sedan århundraden kuvade och hundsade av den engelska överheten. Bestulen på sina rikedomar, sin frihet och sin värdighet. Men hur länge skall de 100.000 inkräktarna kunna styra 350 miljoner indier med olika språk, religioner, kulturer och olika samhällsklasser? Bara tills någon kan ena det indiska folket i en gemensam kamp för frihet. Och det finns en man som vill försöka. Hans namn är Mohandas Karamchanda Gandhi.', NULL, 26, 1, NULL, 1, 1983),
('Romeo and Julia', 129, 'Familjerna Capulet och Montagne i Verona är bittra fiender sedan lång tid tillbaka. Därför tvingas Romeo och Julia smyga med sin förbjudna kärlek och familjernas hat får tragiska följder för det älskande unga paret.', NULL, 27, 1, 2, 1, 1968),
('Terminator', 149, 'År 2029 ligger jorden i ruiner efter ett kärnvapenkrig. Maskinerna har tagit över makten och människorna förvisas till underjorden. Sarah bär på ett barn som ska leda kampen mot maskinerna makt. Hon måste dö innan hon föder sitt barn. En terminator skickas tillbaka i tiden för att döda henne.', NULL, 28, 3, 6, 1, 1984);

-- --------------------------------------------------------

--
-- Table structure for table `V5_SubCategory`
--

CREATE TABLE `V5_SubCategory` (
  `id` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `mainCategoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `V5_SubCategory`
--

INSERT INTO `V5_SubCategory` (`id`, `name`, `mainCategoryId`) VALUES
(1, 'Drama', 1),
(2, 'Romantik', 1),
(3, 'Action', 1),
(4, 'Komedi', 1),
(5, 'Thriller', 1),
(6, 'Sci-Fi', 1),
(8, 'Skräck', 1),
(9, 'Äventyr', 1),
(10, 'Musikal', 1),
(11, 'Familj', 1),
(12, 'Tecknat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `V5_User`
--

CREATE TABLE `V5_User` (
  `customerId` varchar(68) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(68) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `admin` varchar(68) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `V5_Customer`
--
ALTER TABLE `V5_Customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `V5_Delivery`
--
ALTER TABLE `V5_Delivery`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `V5_MainCategory`
--
ALTER TABLE `V5_MainCategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `V5_NewsEmail`
--
ALTER TABLE `V5_NewsEmail`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `V5_NewsEmailList`
--
ALTER TABLE `V5_NewsEmailList`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `V5_Order`
--
ALTER TABLE `V5_Order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `V5_OrderDetails`
--
ALTER TABLE `V5_OrderDetails`
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `V5_Products`
--
ALTER TABLE `V5_Products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `mainCategoryId` (`mainCategoryId`),
  ADD KEY `subCategoryId` (`subCategoryId`),
  ADD KEY `subCategoryId2` (`subCategoryId2`);

--
-- Indexes for table `V5_SubCategory`
--
ALTER TABLE `V5_SubCategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mainCategoryId` (`mainCategoryId`);

--
-- Indexes for table `V5_User`
--
ALTER TABLE `V5_User`
  ADD PRIMARY KEY (`customerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `V5_MainCategory`
--
ALTER TABLE `V5_MainCategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `V5_Order`
--
ALTER TABLE `V5_Order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `V5_Products`
--
ALTER TABLE `V5_Products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `V5_SubCategory`
--
ALTER TABLE `V5_SubCategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `V5_Order`
--
ALTER TABLE `V5_Order`
  ADD CONSTRAINT `V5_Order_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `V5_Customer` (`id`);

--
-- Constraints for table `V5_OrderDetails`
--
ALTER TABLE `V5_OrderDetails`
  ADD CONSTRAINT `V5_OrderDetails_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `V5_Order` (`id`),
  ADD CONSTRAINT `V5_OrderDetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `V5_Products` (`productId`);

--
-- Constraints for table `V5_Products`
--
ALTER TABLE `V5_Products`
  ADD CONSTRAINT `V5_Products_ibfk_1` FOREIGN KEY (`mainCategoryId`) REFERENCES `V5_MainCategory` (`id`),
  ADD CONSTRAINT `V5_Products_ibfk_2` FOREIGN KEY (`subCategoryId`) REFERENCES `V5_SubCategory` (`id`),
  ADD CONSTRAINT `V5_Products_ibfk_3` FOREIGN KEY (`subCategoryId2`) REFERENCES `V5_SubCategory` (`id`);

--
-- Constraints for table `V5_SubCategory`
--
ALTER TABLE `V5_SubCategory`
  ADD CONSTRAINT `V5_SubCategory_ibfk_1` FOREIGN KEY (`mainCategoryId`) REFERENCES `V5_MainCategory` (`id`);

--
-- Constraints for table `V5_User`
--
ALTER TABLE `V5_User`
  ADD CONSTRAINT `V5_User_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `V5_Customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
