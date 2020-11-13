$(function (){

$('input:checkbox').bind('click',function (){

    $.ajax({
        type:"POST",
        url:"../index.php",
        data:{'task_id':$(this).prop('id'),'checked':Number($(this).prop('checked'))},
        success:function(answer){
            //console.log(answer);
        }
    });

})


})
