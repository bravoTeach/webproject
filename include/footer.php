 
    
<?php 
 include('include/config.php');
 ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
  
  <script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
  
  <script>
        $(function() {
          // Pull in the public encryption key for our environment
          TCO.loadPubKey('production');
          $("#myCCForm").submit(function(e) {
              // Call our token request function
              tokenRequest();
              // Prevent form from submitting
              return false;
          });
      });
	  
      var tokenRequest = function() {
          // Setup token request arguments                
          var args = {
              sellerId: "253800487474",
              publishableKey: "AC745887-0893-43A2-B8C6-183300EA8571",
              ccNo: $("#ccNo").val(),
              cvv: $("#cvv").val(),
              expMonth: $("#expMonth").val(),
              expYear: $("#expYear").val()
          };
		  console.log(args);
          // Make the token request
          TCO.requestToken(successCallback, errorCallback, args);
      };
	  
      // Called when token created successfully.
      var successCallback = function(data) {
          var myForm = document.getElementById('myCCForm');
          // Set the token as the value for the token input
          myForm.token.value = data.response.token.token;
          // IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.
          myForm.submit();
      };
	  
      // Called when token creation fails.
      var errorCallback = function(data) {
          if (data.errorCode === 200) {
              tokenRequest();
          } else {
              alert(data.errorMsg);
          }
      };
	  
  </script>














