<?php include "../validation_of_admin.php";


?>
<!DOCTYPE html>
<html lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>



    <?php


    // foreach ($_POST as $key => $value) {
    //   echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
    // }
    require "email_verification_shooting.php";

    // echo json_encode($_POST);

    if (isset($_POST["register_email"]) && isset($_POST["adduser"])) {
        // echo "success";
        $register_email = $_POST["register_email"];
        $register_username = $_POST["register_username"];
        $register_phone = $_POST["register_phone"];
        $register_first_name = $_POST["register_first_name"];
        $register_last_name = $_POST["register_last_name"];
        $register_type = $_POST["register_type"];
        $creator_type = $_POST["creator_type"];
        $v_code = bin2hex(random_bytes(16));


        // $register_image = $_POST["register_image"];



        // echo"hello";
        if (mysqli_query($connect, "INSERT INTO `users_entries` (`user_id`,`user_first_name`,`user_last_name`, `user_username`, `user_password`, `user_email`, `user_phone`, `user_timestamp`, `is_verified_email`, `is_verified_admin`, `user_type`, `user_vcode`, `user_created_by`,`user_otp`, `user_otp_created`, `user_otp_is_expired`) VALUES (NULL, '$register_first_name','$register_last_name','$register_username', '', '$register_email', '$register_phone', current_timestamp(), '0', '0', '$register_type', '$v_code', '$creator_type', '', '', '')")) {
            $store = send_mail($register_email, $v_code);
            $my_id = mysqli_insert_id($connect);
            // echo "success";
            // echo $my_id;
        }
        
    }
    ?>

    <script type="text/javascript">
        //##### Add record when Add Record Button is click #########




        $(document).ready(function() {

            //##### Add record when Add Record Button is click #########
            // $("#registration_form").submit(function(e) {
            //     e.preventDefault();

            //     var register_first_name = $("#register_first_name").val(); //build a post data structure
            //     var register_last_name = $("#register_last_name").val(); //build a post data structure
            //     var register_username = $("#register_username").val(); //build a post data structure
            //     var register_email = $("#register_email").val(); //build a post data structure
            //     var register_phone = $("#register_phone").val(); //build a post data structure
            //     var adduser = $("#adduser").val(); //build a post data structure
            //     var register_type = $("#register_type").val(); //build a post data structure
            //     var register_image = $("#register_image").val(); //build a post data structure
            //     var creator_type = '<?php echo $_SESSION['user_type']; ?>'; //build a post data structure
            //     //     $creator_type = $_SESSION['user_type'];


            //     //     $user_username = filter($_POST["user_username"]);
            //     //     $user_first_name = filter($_POST["user_first_name"]);
            //     //     $user_last_name = filter($_POST["user_last_name"]);
            //     //     $user_phone = filter($_POST["user_phone"]);
            //     //     $user_email = filter($_POST["user_email"]);
            //     //     $user_type = filter($_POST["user_type"]);
            //     //     $creator_type = $_SESSION['user_type'];


            //     jQuery.ajax({
            //         type: "POST", // Post / Get method
            //         url: "response.php", //Where form data is sent on submission
            //         dataType: "text", // Data type, HTML, json etc.
            //         data: {
            //             register_first_name: register_first_name,
            //             register_last_name: register_last_name,
            //             register_email: register_email,
            //             register_username: register_username,
            //             register_phone: register_phone,
            //             creator_type: creator_type,
            //             register_type: register_type,
            //             register_image: register_image,
            //             adduser: adduser,
            //         }, //Form variables
            //         success: function(response) {
            //             // $("#regiter_success").display("block");
            //             // $('#regiter_success').show();
            //             // $('#register_tip').hide();
            //             // // $("#responds").append(response);
            //             console.log(response);
            //             alert(
            //                 'User Added Successfully\n\n' +
            //                 "Email has been sent successfully, check email for further process.\n"
            //             );
            //             // window.location.replace("../login/index.php");
            //         },
            //         error: function(xhr, ajaxOptions, thrownError) {
            //             alert(thrownError);
            //         }
            //     });
            // });

        });
    </script>
    <?php
    // function filter($string)
    // {
    //     $string = str_replace("<", "&lt;", $string);
    //     $string = str_replace(">", "&gt;", $string);
    //     return $string;
    // }

    // if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['adduser']))) {

    //     $user_username = filter($_POST["user_username"]);
    //     $user_first_name = filter($_POST["user_first_name"]);
    //     $user_last_name = filter($_POST["user_last_name"]);
    //     $user_phone = filter($_POST["user_phone"]);
    //     $user_email = filter($_POST["user_email"]);
    //     $user_type = filter($_POST["user_type"]);
    //     $creator_type = $_SESSION['user_type'];

    //     require "email_verification_shooting.php";
    //     // echo"hello";
    //     $v_code = bin2hex(random_bytes(16));
    //     $insert_query = "INSERT INTO `users_entries` (`user_id`,`user_first_name`,`user_last_name`, `user_username`, `user_password`, `user_email`, `user_phone`, `user_timestamp`, `is_verified_email`, `is_verified_admin`, `user_type`, `user_vcode`, `user_otp`, `user_otp_created`,`user_created_by`, `user_otp_is_expired`) VALUES (NULL, '$user_first_name','$user_last_name','$user_username', '', '$user_email', '$user_phone', current_timestamp(), '0', '0', '$user_type', '$v_code', '', '', '$creator_type', '')";

    //     // echo $insert_query;
    //     if (mysqli_query($connect, $insert_query)) {
    //         $store = send_mail($user_email, $v_code);
    //         $my_id = mysqli_insert_id($connect);
    //         echo "<script> success_registration();</script>";
    //         // echo $my_id;
    //     } else {
    //         echo "<script> failed_registration();</script>";
    //     }
    // }
    ?>


    <title>Add User </title>

    <?php include "../theme/head_data.php"; ?>

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

    <style>
        body>div {
            align-items: center;
            display: flex;
            justify-content: center;
        }


        multi-input .item {
            margin: 5px;
            padding-right: 20px;
        }

        p {
            text-align: center;
        }
    </style>

</head>

<body data-rsssl=1 class="page-template page-template-template-login page-template-template-login-php page page-id-49 theme-classiera woocommerce-no-js single-author elementor-default elementor-kit-1989">
    <?php include "../navbar/index.php" ?>
    <div class="container">

        <?php
        include "../db.php";


        ?>



        <div id="main" class="">
            <div class="col-lg-12">
                <div class=" mb-4">
                    <div class="card-body " style="margin-top:20px !important; border-radius:8px ;box-shadow: 1px 1px 20px #000000;">
                        <div class="jumbotron py-1" style="border-radius:8px;background-color: gold linear-gradient(to bottom, lightyellow, gold);">
                            <div class=" my-4 ">
                                <h1 class=" my-auto mr-auto d-inline"> Add User <p class="d-inline text-center align-middle" style="color:green;font-size:20px;"></p>
                                </h1>
                                <hr class="my-3">
                                <form enctype="multipart/form-data" id="registration_form" class="needs-validation " action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                                    <div class="container p-2 " style="border-radius:8px;">
                                        <input type="hidden" class="adduser" id="adduser" name="adduser">
                                        <input type="hidden" class="creator_type" id="creator_type" name="creator_type" value="<?php echo $_SESSION['user_type']; ?>">
                                        <script>
                                            adduser.value = true;
                                        </script>

                                        <div class="form-row mb-2">
                                            <div class="col-md-6 mx-auto mb-3" style="margin-bottom:20px;">
                                                <label for="register_first_name"> First Name </label><span style="color:red;"> *</span>
                                                <input type="text" name="register_first_name" id="register_first_name" class="form-control form-control-md sharp-edge" placeholder="Enter First name" data-error="First name required" required>
                                            </div>
                                            <div class="col-md-6 mx-auto mb-3" style="margin-bottom:20px;">
                                                <label for="register_last_name"> Last Name </label><span style="color:red;"> *</span>
                                                <input type="text" name="register_last_name" id="register_last_name" class="form-control form-control-md sharp-edge" placeholder="Enter Last name" data-error="Last name required" required>
                                            </div>
                                            <div class="col-md-6 mx-auto mb-3" style="margin-bottom:20px;">
                                                <label for="register_username"> Username </label><span style="color:red;"> *</span>
                                                <input type="text" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" name="register_username" id="register_username" class="form-control form-control-md sharp-edge" placeholder="Enter username" data-error="Username required" required>
                                                <?php echo "<label style='color:red;' id='label_for_username_validation'></label>"; ?>
                                            </div>
                                            <div class="col-md-6 mx-auto mb-3" style="margin-bottom:20px;">
                                                <label for="register_phone"> Phone No.</label><span style="color:red;"> *</span>
                                                <input type="tel" pattern="[0-9]{10}" name="register_phone" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" id="register_phone" class="form-control form-control-md sharp-edge" placeholder="Enter 10 digit Phone no." data-error="Phone required" required>
                                                <?php echo "<label style='color:red;' id='label_for_phone_validation'></label>"; ?>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="col-md-6 mx-auto mb-3" style="margin-bottom:20px;">
                                                <label for="register_email"> Email </label><span style="color:red;"> *</span>
                                                <input type="email" name="register_email" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" id="register_email" class="form-control form-control-md sharp-edge" placeholder="Enter email address" data-error="Email required" required>
                                                <?php echo "<label style='color:red;' id='label_for_email_validation'></label>"; ?>

                                            </div>
                                            <div class="col-md-6 mx-auto mb-3" style="margin-bottom:20px;">
                                                <label for="register_image"> User Image </label><span style="color:red;"> *</span>
                                                <input type="file" name="register_image" id="register_image" class="form-control fsharp-edge" required>
                                            </div>
                                            <div class="col-md-6 mx-auto mb-3" style="margin-bottom:20px;">
                                                <label for="register_type"> User Type </label><span style="color:red;"> *</span>
                                                <select type="text" class="form-control " title="iii" id="register_type" name="register_type" placeholder="User Type" required>

                                                    <option value="" name="register_type">Select user type</option>
                                                    <option value="user" name="register_type">Seller</option>
                                                    <option value="buyer" name="register_type">Buyer</option>
                                                    <option value="admin" name="register_type">Admin</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-row mb-2">
                                            <div class="col-md-12 mx-auto mb-3">
                                                <?php
                                                // echo '<pre>';
                                                // var_dump($_POST);
                                                // echo '</pre>';
                                                ?>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="table_btn btn btn-secondary " onclick="window.location.href='./user_management.php'">Go Back</button>
                                        <button type="submit" id="add_user_submit" class="btn btn-success mx-auto" style="padding:10px !important;">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../theme/body_data.php" ?>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <script src="multi-input.js"></script>

</body>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
    // function validation_for_category() {
    //     var category_name = document.getElementById("category_name");
    //     category_name = category_name.value;
    //     if (category_name.length > 0) {


    //         $.ajax({
    //             url: "./validation_for_category.php",
    //             datatype: "text",
    //             type: "POST",
    //             data: {
    //                 submit: "submit",
    //                 category_name: category_name,
    //             },
    //             success: function(result) {
    //                 console.log("hello");
    //                 result = JSON.parse(result);
    //                 json_data = result;
    //                 console.log(json_data);
    //                 // console.log(json_data[0][0]);

    //                 if (0 < (json_data[0][0]).length) {
    //                     $('#label_for_category_name_validation').html(json_data[0][1]);
    //                 }
    //                 if (0 < (json_data[0][1]).length) {
    //                     document.getElementById("add_category_submit").disabled = true;
    //                 } else {
    //                     document.getElementById("add_category_submit").disabled = false;
    //                 }
    //             }
    //         });
    //     }
    // }
</script>
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
                if (0 < (json_data[0][0]).length) {
                    $('#label_for_username_validation').html(json_data[0][1]);
                }
                if (0 < (json_data[1][0]).length) {
                    $('#label_for_email_validation').html(json_data[1][1]);
                }
                if (0 < (json_data[2][0]).length) {
                    $('#label_for_phone_validation').html(json_data[2][1]);
                }

                if (0 < (json_data[0][1] + json_data[1][1] + json_data[2][1]).length) {
                    document.getElementById("add_user_submit").disabled = true;
                } else {
                    document.getElementById("add_user_submit").disabled = false;
                }
            }
        });
    }
</script>


</html>