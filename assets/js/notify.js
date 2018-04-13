var notify = function (message, type = null) {
  this.type = 'default';
  this.message = 'Notification';
  this.position = 'top';
  //this.init = function (message, type = null){
   $(".notify").remove();
   switch (type) {
     case 'success':
       $('body').prepend("<div class='notify success'>"+message+"</div>");
       break;
     case 'error':
       $('body').prepend("<div class='notify danger'>"+message+"</div>");
       break;
     case 'warning':
       $('body').prepend("<div class='notify warning'>"+message+"</div>");
       break;
     default:
       $('body').prepend("<div class='notify default'>"+message+"</div>");
   }
   $(".notify").fadeIn(1000);
   $(".notify").click(function () {
     $(this).fadeOut('slow');
   });
   setTimeout(function(){
     $(".notify").fadeOut('slow');
   },5000);
  //}
};
