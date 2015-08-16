$(document).ready(function () {
    $('#attachment').submit(function(event) {
      event.preventDefault();

      $.ajax({
           type: "POST",
           url: 'php/save-image.php',
           data: new FormData(this),
           contentType: false,
           processData: false,

           success: function(result) {
              if($.trim(result) != 'error') {
                 alert(result);
                 $("#image1").attr('src', result);
                 $("#edit").click();
              } 
           }
        });
    });
});