$(document).ready(function(){

    var id = "";

    addToCartButton = function(id){
        $.ajax({
            method: 'POST',
            url: "../addToCart.php",
            data: {id: id}
        })
        // .done(function(data){
   
    
        // })
    }
    removeFromCartButton = function(key){
        $.ajax({
            method: 'POST',
            url: "../shoppingCart.php",
            data: {key: key}
        })
        .done(function(data){
            
    
         })
    }
    
 


    
    

});

   
    













