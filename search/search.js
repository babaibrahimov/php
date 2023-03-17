$(document).ready(function(){
    $('#search').keyup(function(){
        var search = $(this).val();
        $.ajax({
            url:'action.php',
            method: 'post',
            data:{query:search},
            success:function(response){
                $("table-data").html(response);
            }
        })
    })
});