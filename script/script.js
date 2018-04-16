$(document).ready(function(){

    
  

    /*movieOnClick = function($id){ används ej just nu
        console.log($id);
        $.ajax({
            method: 'POST',
            url: "../product.php",
            data: {idIMG: $id}
        })
        .done(function(data){
            
         })
<<<<<<< HEAD
    }

    upDateShippedDate = function(adminKey){
        $.ajax({
            method: 'POST',
            url: "../admin.php",
            data: {adminKey: adminKey}
        })
        .done(function(data){
            
    
         })
    }


=======
    }*/

    //Uppdaterar totalpriset baserat på fraktalternativ (Hårdkodad i brist på tid)
    deliveryOptionOC1 = function(){
        var totalPrice = cartTotalPrice + deliveryOptionPrice1
        $("#totalPrice").html("Totalpris: " + totalPrice + " kr");
        $.ajax({
            method: 'POST',
            url: "../checkOut.php",
            data: {totalPrice: totalPrice}
        })
    }
    deliveryOptionOC2 = function(){
        var totalPrice = cartTotalPrice + deliveryOptionPrice2
        $("#totalPrice").html("Totalpris: " + totalPrice + " kr");
    }
    deliveryOptionOC3 = function(){
        var totalPrice = cartTotalPrice + deliveryOptionPrice3
        $("#totalPrice").html("Totalpris: " + totalPrice + " kr");
    }
    sendTotalPrice = function(){
        $.ajax({
            method: 'POST',
            url: "../checkOut.php",
            data: {totalPrice: totalPrice}
        })
        .done(function(data){
            
    
         })
    
    }
  
    
    

});

   
    













