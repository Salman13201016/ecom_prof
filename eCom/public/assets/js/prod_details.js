




$(document).ready(function(){
    quantity = parseInt($("#prod_quan").val())
    console.log(typeof quantity);
    $("#inc").click(function(){
        if(quantity<0){
            quantity = 0;
        }
        console.log("increment");
        quantity+=1
        $("#prod_quan").val(quantity)
    })
    $("#dec").click(function(){
        console.log("increment");
        quantity-=1
        
        if(quantity<0){
            quantity-=1
            $("#prod_quan").val(0)
        }
        else{
            $("#prod_quan").val(quantity)
        }
    })
});



