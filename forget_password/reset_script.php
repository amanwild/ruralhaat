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