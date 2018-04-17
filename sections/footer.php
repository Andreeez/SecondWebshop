
</div><!--stänger containerdiven-->
</div><!--stänger wrappern-->
    <footer>
<div class='footer'>

    <div class='infoBox'>
    <p>Kundtjänst</p>
    <p>Almänna villkor</p>
    <p>Policy</p>
    <p>Frakt och retur</p>
</div>

<div class='infoBox'>
    <p>Om oss</p>
    <p>Vattengatan 10</p>
    <p>126 30 Göteborg</p>
    <p>08-645 37 17</p>
</div>



    
    <?php

    $subscribed =   "<div id ='alreadySubscribed'>
    Tack för att du anmält dig för nyhetsbrev! 
    </div>";

    $newsletterBox =    "<div id='newsletterBox'> 
    <h4>Anmäl dig för Nyhetsbrev</h4>
    <form class='newsletterBox' action='newsletter-signup.php' method='post'> 

    <input class='newsLetterInput' placeholder='Name' type='text' name='name' id='name'/>

    <input class='newsLetterInput' placeholder='Email' type='text' name='email' id='email'/>
    <input class='newsLetterButton' type='submit' name=submit value='Submit'/> 
    </form> 

    </div>";
echo "<div class='alreadySubscribed'>";
if(isset($_COOKIE["newsletter"])){
    echo 
   $_COOKIE['newsletter']."!".$subscribed;
    echo "</div>";
} else{
    
   echo
     $newsletterBox;

}
?>
</div>

    </footer>


</body>
</html>