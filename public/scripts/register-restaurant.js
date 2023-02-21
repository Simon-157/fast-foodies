     // Initialize the Uploadcare widget
     var widget = uploadcare.Widget('[role=uploadcare-uploader]');

     // Listen for when a file is uploaded
     widget.onUploadComplete(function(info) {
       console.log('File uploaded:', info.cdnUrl);

       $('#img_up').val(info.cdnUrl);

       console.log($("#register :input").serializeArray())
       // Add the image URL to the post data
       // $("#register").append('<input type="hidden" name="image_url" value="' + info.cdnUrl + '">');
     });

     // form submission script for registering a restaurant
     $("#sub").click(() => {
       const data = $("#register :input").serializeArray();

       console.log(data);

       $.post($("#register").attr("action"), data, (info) => {
         $("#msg").html(info);
       });
       clearInput();
     });

     $("#register").submit(() => {
       return false;
     });

     function clearInput (){
       $("#register :input").each(() => {
         $(this).val(' ');
       });
     };