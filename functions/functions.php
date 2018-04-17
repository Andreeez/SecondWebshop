<?php
function newsletterSubscription(){
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
}




?>