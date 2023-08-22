<?php include "../validation_of_admin.php";

$success_story_id = $_GET['success_story_id'];

include "../db.php";


?>


<!DOCTYPE html>
<html lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <title>Edit Success Story </title>
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

<body onload="renderTags_onload();" data-rsssl=1 class="page-template page-template-template-login page-template-template-login-php page page-id-49 theme-classiera woocommerce-no-js single-author elementor-default elementor-kit-1989">

    <?php include "../navbar/admin_navbar.php" ?>
    <?php

    if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['update_success_story']) && isset($_POST['success_story_title']))) {

        $success_story_title = filter($_POST["success_story_title"]);
        // $success_story_image = $_FILES["success_story_image"];
        // $member_designation = filter($_POST["member_designation"]);

        // $exist_success_story_result = false;
        // $exist_query = "SELECT * FROM success_story WHERE  success_story_title = '$success_story_title'";
        // try {
        //     $exist_success_story_result = mysqli_query($connect, $exist_query);
        //     $row  = mysqli_num_rows($existsuccess_story_result);
        //     if ($row >  0) {
        //         // // echo "exist";
        //         $exist_success_story_result = 1;
        //         // echo "exist" . "<br>";
        //     }
        // } catch (Exception $e) {
        //     // echo "Duplicate date Checking failed " . "<br>";
        //     // echo 'Message: ' . $e->getMessage() . "<br>";
        // }
        $exist_success_story_result = true;
        $update_member_query = "UPDATE `success_story` SET `success_story_title` = '$success_story_title' WHERE `success_story`.`success_story_id` = $success_story_id";

        // echo "<pre>";
        // var_dump($success_story_image);
        // var_dump($success_story_image['error']);
        // echo "<pre>";
        // echo $success_story_image;

        $success_story_image = "";
        if (isset($_FILES['success_story_image'])) {
            if ("" != $_FILES["success_story_image"]["tmp_name"]) {
            $success_story_image = get_server_image_name('success_story_image');
        }
        }
        $update_member_query = "UPDATE `success_story` SET `success_story_title` = '$success_story_title', `success_story_image` = '$success_story_image' WHERE `success_story`.`success_story_id` = $success_story_id";
                        
        // echo $update_member_query;
        try {
            $update_member_result = mysqli_query($connect, $update_member_query);

            if ($update_member_result) {
                echo "<script>alert('Success Story Updated Successfully !! ') </script>" . "<br>";
            } else {
                echo "<script>alert('Success Story Updation failed !! ') </script>" . "<br>";
            }

            // if ($insert_result) {
            //   header("location: Login.php");
            // }
        } catch (Exception $e) {
            // echo "Data insertion failed " . "<br>";
            // echo 'Message: ' . $e->getMessage() . "<br>";
        }
    }



    $select_query = "SELECT * FROM `success_story` WHERE success_story_id = $success_story_id"; //NOTE: here (`) is not equal to (')
    try {
        $select_result = 0;
        if ($connect) {
            $select_result = mysqli_query($connect, $select_query);
            if ($select_result) {
                $num = mysqli_num_rows($select_result);
            }
        }
    } catch (Exception $e) {
        $mess = $e->getMessage();
    }
    if ($select_result) {
        while ($row = mysqli_fetch_assoc($select_result)) {
            $success_story_title = $row['success_story_title'];
            $success_story_image = $row['success_story_image'];
            // $member_designation = $row['member_designation'];
        }
    }
    ?>
    <div class="container">





        <div id="main" class="">
            <div class="col-lg-12">
                <div class=" mb-4">
                    <div class="card-body " style="margin-top:20px !important; border-radius:8px ;box-shadow: 1px 1px 20px #000000;">
                        <div class="jumbotron py-1" style="border-radius:8px;background-color: gold linear-gradient(to bottom, lightyellow, gold);">
                            <div class=" my-4 ">
                                <h1 class=" my-auto mr-auto d-inline"> Edit Success Story <p class="d-inline text-center align-middle" style="color:green;font-size:20px;"></p>
                                </h1>
                                <hr class="my-3">
                                <form enctype="multipart/form-data" class="needs-validation " action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                                    <div class="container p-2 " style="border-radius:8px;">
                                        <input type="hidden" class="update_success_story" id="update_success_story" name="update_success_story">
                                        <script>
                                            update_success_story.value = true;
                                        </script>

                                        <div class="form-row mb-2">

                                            <div class="col-md-6 mx-auto mb-3">
                                                <label>Present Image </label>
                                                <div class="edit-profile-photo" style=" display: block; margin-bottom: 35px; text-align: center;"> <img id="profile_dp" style="border-radius: 50%; max-width: 200px; width: 100%; border: 10px solid rgba(0, 0, 0, 0.08);" src="../wp-content/uploads/data/<?= $success_story_image ?>" alt="">
                                                </div>
                                            </div>

                                            <div class="col-md-6 mx-auto mb-3">
                                                <label for="success_story_image">Update Image </label>
                                                <input type="file" class="form-control " id="success_story_image" name="success_story_image">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mx-auto mb-3">
                                            <label for="success_story_title">Success Story Title </label><span style="color:red;"> *</span> <?php echo "<span style='color:red;' id='label_for_success_story_title_validation'></span>"; ?>

                                            <input type="text" class="form-control " id="success_story_title" name="success_story_title" value="<?= $success_story_title ?>" required>
                                        </div>
                                        <!-- <div class="col-md-6 mx-auto mb-3">
                                            <label for="member_designation">Member Designation </label><span style="color:red;"> *</span>
                                            <input type="text" class="form-control " id="member_designation" name="member_designation" value="<?= $success_story_title ?>" required>
                                        </div> -->
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

                                    <div class="modal-footer text-center">
                                        <button type="button" class="table_btn btn btn-secondary " onclick="window.location.href='./success_story.php'">Go Back</button>
                                        <button type="submit" id="add_category_submit" class="btn btn-success mx-auto" style="padding:10px !important;">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include "../footer/index.php"; ?>
    <?php include "../theme/body_data.php"; ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script>
        function show_table() {

            console.log("success");

        }
    </script>
    <script src="multi-input.js"></script>



    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>



</body>

</html>