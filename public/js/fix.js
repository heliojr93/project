$(document).ready(function(){
    var num=0;
    $('#check').on('click',function(){
    $(this).data("click", ++num);
    var click = $(this).data("click");
    if(click % 2!=0){
        $('.conteudo').css('padding-left','60px');
    }else if(click % 2==0){
        $('.conteudo').css('padding-left','250px');
    }
    
});

});

        
