//Passing Value throuh get method
/*$(document).ready(function () {
   $("#button").click(function (){
       var userName=$("#name").val(); 
       $.get("page/DIT.php",{nameValue:userName},function(feedBack){
           $(".DITmsg").html(feedBack);
       }); 
    });            
});*/
//Passing Value throuh AJAX method
$(document).ready(function () {
   $("#button").click(function (){
       var userName=$("#name").val(); 
       $.ajax({
            type: 'POST',
            url:  "page/DIT.php",
            data : {nameValue:userName},
            success: function (data) {
                $(".DITmsg").html(data);
            }
        }); 
    });            
});

