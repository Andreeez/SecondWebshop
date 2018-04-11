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
        // .done(function(data){
           
    
        //  })
    }
  

    movieOnClick = function(id){
        console.log(id);
        $.ajax({
            method: 'POST',
            url: "./product.php",
            data: {idIMG: id}
        })
        .done(function(data){
            
    
         })
    }
    
 


    
    

});

   
    













