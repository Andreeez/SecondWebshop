
</div><!--stänger containerdiven-->
    <footer>
    <?php

    $subscribed =   "<div id ='alreadySubscribed'>
    Tack för att du anmält dig för nyhetsbrev! 
    </div>";

    $newsletterBox =    "<div id='newsletterBox'> 
    <h4>Anmäl dig för Nyhetsbrev här </h4>
    <form action='newsletter-signup.php' method='post'> 

    <span>Name</span> <input type='text' name='name' id='name'/>

    <span>Email</span>  <input type='text' name='email' id='email'/>
    <input type='submit' name=submit value='Submit'/> 
    </form> 

    </div>";

if(isset($_COOKIE["newsletter"])){
    echo 
   $_COOKIE['newsletter']."!".$subscribed;
  
} else{
    
   echo
     $newsletterBox;

}
?>

    </footer>


</body>
</html>