var url =window.location.hostname;
var aux_url = window.location.href;


window.addEventListener("load",function(){
    
    $('.img_like').css('cursor','pointer');
    $('.img_dislike').css('cursor','pointer');

   //botao likely
   function like(){
    $('.img_like').unbind('click').click(function(){
        $(this).addClass('img_dislike').remove('img_like');
        $(this).attr('src','/img/heart-red.png');


        $.ajax({
            url: url+'/like/'+$(this).data('id'),
            type:'GET',
            sucess: function(response){
               if(response.like){
                   console.log("Fiz like");
               }else{
                   console.log("Erro ao fazer like");
               }
            }
        })
        dislike();
       
    })
   }
   like();
    //botao dislikely
    function dislike(){
        $('.img_dislike').unbind('click').click(function(){
            $(this).addClass('img_like').remove('img_dislike');
            $(this).attr('src','/img/heart-black.png');
            $.ajax({
                url: url+'/dislike/'+$(this).data('id'),
                type:'GET',
                sucess: function(response){
                   if(response.like){
                       console.log("Fiz dislike");
                   }else{
                       console.log("Erro ao fazer like");
                   }
                }
            })
            like();
           
        })
    }
   
    dislike();
});