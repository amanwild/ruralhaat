<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>

  function validation_for_email_username_phone() {
    var email = document.getElementById("register_email");
    email = email.value;
    var username = document.getElementById("register_username");
    username = username.value;
    var phone = document.getElementById("register_phone");
    phone = phone.value;
    $.ajax({
      url: "./validation_for_email_username_phone.php",
      datatype: "JSON",
      type: "POST",
      data: {
        submit: "submit",
        email: email,
        username: username,
        phone: phone,
      },
      success: function(result) {
        result = JSON.parse(result);
        json_data = result;
        console.log(json_data);
        console.log(json_data[0][0]);
        console.log(json_data[1][0]);
        console.log(json_data[2][0]);
        if(0<(json_data[0][0]).length){
          $('#label_for_username_validation').html(json_data[0][1]);
        }
        if(0<(json_data[1][0]).length){
          $('#label_for_email_validation').html(json_data[1][1]);
        }
        if(0<(json_data[2][0]).length){
          $('#label_for_phone_validation').html(json_data[2][1]);
        }

        if (0 < (json_data[0][1]+json_data[1][1]+json_data[2][1]).length) {
          document.getElementById("register_submit_btn").disabled = true;
        } else {
          document.getElementById("register_submit_btn").disabled = false;
        }
      }
    });
  }
</script>