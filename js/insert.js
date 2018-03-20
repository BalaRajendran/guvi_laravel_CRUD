$("#sub").click( function() {
 // alert("asdf");
	 $.post( $("#myForm").attr("action"), 
     $("#myForm :input").serializeArray(), 
         function(info){
          $("#error").html(info); 
            $('#error').delay(3000).show().fadeOut('slow');
   });
 clearInput();
});
 
$("#myForm").submit( function() {
  return false; 
});
 
function clearInput() {
    $("#myForm :input").each( function() {
       $(this).val('');
    });
}