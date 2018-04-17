# SecondWebshop
Projektarbete

Grupp: De 5 vise
Anders, Amanda B, Anton, Jesper K, Jenny 

Testinloggningsuppgifter:
Användarnamn:
Lösenord: 

Kravspec:

# Arbetet ska implementeras med objektorienterade principer. (G) 
    Vi har använt oss av klasser för att kunna återanvända vår kod så mycket som möjligt. 

#Skapa ett konceptuellt ER diagram, detta ska lämnas in vid idégodkännandet G)

#Beskriv er företagsidé i en kort textuell presentation, detta ska lämnas in vid idégodkännandet G)

# All data som programmet utnyttjar ska vara sparat i en MYSQL databas (produkter, beställningar, konton mm) (G)
    All data finns i databasen
#Det ska finnas ett normaliserat diagram över databasen i gitrepot G)

#Man ska kunna logga in som administratör i systemet (G)

#Man ska kunna registrera sig som administratör på sidan, nya användare ska sparas i databasen (VG)
    Löste detta genom att göra ett form där jag tar värdet från inputs och kollar om värdena finns ifyllda med isset och om lösenord och bekräfta lösenord stämmer överens och isåfall sparas kunden i $_session och blir automatiskt inloggad. Hämtade 2 tables från databasten eftersom att du ska kunna köpa produkt utan att bli kund, men i detta fall registreras man som user.

    En användare och administratör registrerar sig på samma sätt men för att bli administratör så ändras detta av en annan administratör på adminsidan.

#En administratör behöver godkännas av en tidigare administratör innan man kan logga in (VG)
        Använder sig av samma funktion och princip som Issue "Administratörer ska kunna markera beställningar som skickade". 
        Listar ut alla användare, och skriver ut 0 för icke Admin och 1 för admin. Tillvarje rad finns en knapp, som känner av vilket id man trycker på
        . Då skickas en uppdatering in i databsen och sätter Admin = 1. 

# Inga Lösenord får sparas i klartext i databasen (G)
        Löste detta genom att använda mig utav md5 både på registreringen så att lösenordet blir oläsligt och även i inloggningen för att hämta samma från databasten.


# En besökare ska kunna beställa produkter från sidan, detta ska uppdatera lagersaldot i databasen (G)
        När beställning görs så minskar lagersaldot med så många som beställts, detta löst med en UPDATE

#Administratörer ska kunna uppdatera antalet produkter i lager från admin delen av sidan (G)

#Administratörer ska kunna se alla en lista på alla gjorda beställningar (G)
        Enkel funktion som skriver ut samtliga beställningar ifrån databasen. Genom ett form i "admin" meny så listas alla beställningar ut nedanför. 
        Ligger sedan i en klass som skapar objekten.

#Administratörer ska kunna markera beställningar som skickade (VG)
        I samma funktion som alla gjorda beställningar, kommer alla order ut rad för rad. Kopplat till varje rad ligger en knapp för "order skickad". 
        När man trycker på knappen får den med sig vilket Id det är, och sätter dagens datum i deliveryDate (i databasen). 
        Struligt att få till men hittade bra funktion på nätet current_date().

# Sidans produkter ska delas upp i kategorier, en produkt ska tillhöra minst en kategori, men kan tillhöra flera (G)
        Löstes med att ha subCategoryId1 och subCategoryId2 för varje produkt i databasen. Sedan skrev vi en query för att få fram de produkterna som hör till en viss kategori. Med submitknappar och form kunde vi lösa detta och på så sätt använda oss av en klass för kategorifördelning på sidan. 

# Från hemsidan ska man kunna se en lista över alla produkter, och man ska kunna lista bara dom produkter som tillhör en kategori (G)
        Detta har vi löst med en klass och SQL-query som hämtar produkter med ett visst id som tillhör kategorin du tryckt på. Du kan sortera på alla filme, eller en viss genre.


# Besökare ska kunna lägga produkterna i en kundkorg, som är sparad i session på servern (G)
        Produktens ID sparas i $_SESSION['cart'] och hämtas sen ut igen på kundvagnssidan. använt klassar.

#Man ska från hemsidan kunna skriva upp sig för att få butikens nyhetsbrev genom att ange sitt namn och epostadress (G)

# När man gör en beställning ska man också få chansen att skriva upp sig för nyhetsbrevet (VG)
        Samma funktion som i footern visas i checkout om man inte redan har signat upp.
    
# När besökare gör en beställning ska hen få ett lösenord till sidan där man kan logga in som kund (VG)
        Inte gjort. Vi har valt att dela upp customer och user med kopplingar i DB. 
        Vill man inte vara user så slipper man få lösenord av oss :)
#När man är inloggad som kund ska man kunna se sina gjorda beställning och om det är skickade eller inte (VG)

#Som inloggad kund ska man kunna markera sin beställning som mottagen (VG)

#Administratörer ska kunna se en lista över personer som vill ha nyhetsbrevet och deras epost adresser (G)
        Vi har gjort en enkel function som hämtar informationen från databasen. Listar de som har signat upp sig för Nyhetsbrev.

# Besökare ska kunna välja ett av flera fraktalternativ (G)
        De hämtas från databasen och visas på kundvagnssidan
# Tillgängliga fraktalternativ ska vara hämtade från databasen (G)
        Löstes med en query. 

#Administratörer ska kunna rediga vilka kategorier en produkt tillhör (VG)

#Administratörer ska kunna skicka nyhetsbrev från sitt gränssnitt, nyhetsbrevet ska sparas i databasen samt innehålla en titel och en brödtext (VG)

#Administratörer ska kunna lägga till och ta bort produkter (VG
