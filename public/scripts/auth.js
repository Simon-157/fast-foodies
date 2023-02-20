$("#sub").click(() => {
   var data = $("#register :input").serializeArray();

   $.post($("#register").attr("action"), data, (info) => {
     $("#msg").html(info);
   });
   clearInput();
 });

 $("#register").submit(() => {
   return false;
 });

 function clearInput (){
   $("#register :input").each(element => {

   });(() => {
     $(this).val(' ');
   });
 };