$(document).ready(function(){
    $("#sel_cat").change(function(){
        
        
        
        var cat_id = $(this).find("option:selected").val();
        console.log(cat_id)
        $.ajax({
            url:'product/cat_ajax/'+cat_id,
            success:function(response){
                console.log(response);
                $('#sel_sub_cat').find('option').remove().end()
                $('#sel_sub_cat').append('<option >Select Sub Category</option>')
                for(var i=0;i<response.length;i++){
                    $('#sel_sub_cat').append('<option value="'+response[i]['id']+'">'+response[i]['sub_cat_name']+'</option>')
                }
            }
        });
    })
});