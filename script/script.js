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
            url: "../removeFromCart.php",
            data: {key: key}
        })
        .done(function(data){
            console.log(data);
    
         })
    }
    
 


    
    

});

   
    













