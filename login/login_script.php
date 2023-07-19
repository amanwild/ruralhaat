
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script>
    function validation_for_email() {
      var email = document.getElementById("forget_email");
      email = email.value;
      $.ajax({
        url: "./validation_for_email.php",
        datatype: "json",
        type: "POST",
        data: {
          submit: "submit",
          email: email,
        },
        success: function(result) {
          $('#label_for_email_validation').html(result);
          if (0 < result.length) {
            document.getElementById("validate_email_btn").disabled = true;
          } else {
            document.getElementById("validate_email_btn").disabled = false;
          }
        }
      });
    }

    function redirect_to_addproduct() {
      window.location.replace('../product_details/index.php');
      alert("Login is Successfully Done!!!")
    }

    function redirect_to_admin_panel() {
      window.location.replace('../admin_panel/index.php');
      alert("Login is Successfully Done!!!")
    }

    function redirect_to_login() {
      window.location.replace('../login/index.php');
      alert("Login is Failed!!!")
    }

    function Show_forget_pass() {
      var loginDiv = document.getElementById("login_form");
      var forgetDiv = document.getElementById("forget_form");

      loginDiv.style.display = "none";
      forgetDiv.style.display = "block";



    }

    function Show_login() {
      var loginDiv = document.getElementById("login_form");
      var forgetDiv = document.getElementById("forget_form");


      loginDiv.style.display = "block";
      forgetDiv.style.display = "none";


    }
  </script>






<script type="text/javascript">
  $(document).ready(function() {

    //##### Add record when Add Record Button is click #########
    $("#registration_form").submit(function(e) {

      e.preventDefault();

      var register_first_name = $("#register_first_name").val(); //build a post data structure
      var register_last_name = $("#register_last_name").val(); //build a post data structure
      var register_username = $("#register_username").val(); //build a post data structure
      var register_email = $("#register_email").val(); //build a post data structure
      var register_value = $("#register_value").val(); //build a post data structure
          console.log(register_first_name);
          console.log(register_last_name);
          console.log(register_username);
          console.log(register_email);
          console.log(register_value);


      jQuery.ajax({
        type: "POST", // Post / Get method
        url: "response_for_google_api.php", //Where form data is sent on submission
        dataType: "text", // Data type, HTML, json etc.
        data: {
          register_first_name: register_first_name,
          register_last_name: register_last_name,
          register_username: register_username,
          register_email: register_email,
          register_value: register_value
        }, //Form variables
        success: function(response) {

          console.log(response);
          alert(
            'Registration DONE Successfully\n\n' +
            "Email has been sent successfully, check your email for further process.\n"
          );
          location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError);
        }
      });
    });

  });
</script>