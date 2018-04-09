$(document).ready(function(){
    var id = "";
    addToCartButton = function(id){
        $.ajax({
            method: 'POST',
            url: "../addToCart.php",
            data: {id: id}
        })
        .done(function(data){
        var test = JSON.parse(data); 
        console.log(test);
    
    
        })
      
 


    }














});