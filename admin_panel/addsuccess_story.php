<?php include "../validation_of_admin.php";


?>
<!DOCTYPE html>
<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Add Success Story </title>

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
    <?php include "../navbar/admin_navbar.php" ?>
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
                                <h1 class=" my-auto mr-auto d-inline"> Add Success Story <p class="d-inline text-center align-middle" style="color:green;font-size:20px;"></p>
                                </h1>
                                <hr class="my-3">
                                <form enctype="multipart/form-data" class="needs-validation " action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                                    <div class="container p-2 " style="border-radius:8px;">
                                        <input type="hidden" class="add_success_story" id="add_success_story" name="add_success_story">
                                        <script>
                                            add_success_story.value = true;
                                        </script>

                                        <div class="form-row mb-2">

                                            <div class="col-md-6 mx-auto mb-3">
                                                <label for="success_story_image">Success Story Image </label><span style="color:red;"> *</span>
                                                <input type="file" class="form-control " id="success_story_image" name="success_story_image" required>
                                            </div>


                                            <div class="col-md-6 mx-auto mb-3">
                                                <label for="success_story_title">Success Story Title </label><span style="color:red;"> *</span>
                                                <input type="text" class="form-control " id="success_story_title" name="success_story_title" placeholder="Success Story Title" required>
                                            </div>
                                            <!-- <div class="col-md-6 mx-auto mb-3">
                                                <label for="member_designation">Member Designation </label><span style="color:red;"> *</span>
                                                <input type="text" class="form-control " id="member_designation" name="member_designation" placeholder="Member Designation" required>
                                            </div> -->
                                            <!--                                             
                                            <div class="col-md-6 mx-auto mb-3">
                                                <label for="success_story_image">Member Image </label><span style="color:red;"> *</span>
                                                <input type="file" class="form-control " id="success_story_image" name="success_story_image" placeholder="" required>
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



                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="table_btn btn btn-secondary " onclick="window.location.href='./success_story.php'">Go Back</button>
                                        <button type="submit" id="add_category_submit" class="btn btn-success mx-auto" style="padding:10px !important;">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

    <?php include "../footer/section_footer.php"; ?>
    <?php include "../footer/index.php"; ?>
    <?php include "../theme/body_data.php"; ?>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script>
        function show_table() {

            console.log("success");

        }
    </script>
    <script src="multi-input.js"></script>
    
    <?php



    if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['add_success_story']))) {

        $success_story_title = filter($_POST["success_story_title"]);
        // $success_story_image = filter($_POST["success_story_image"]);
        // $member_designation = filter($_POST["member_designation"]);

        $exist_result = false;
        $exist_query = "SELECT * FROM success_story WHERE  success_story_title = '$success_story_title'";
        // echo "Add Success Story";
        try {
            $exist_result = mysqli_query($connect, $exist_query);
            $row  = mysqli_num_rows($exist_result);
            if ($row >  0) {
                // // echo "exist";
                $exist_result = 1;
            }
        } catch (Exception $e) {
            // echo "Duplicate date Checking failed " . "<br>";
            // echo 'Message: ' . $e->getMessage() . "<br>";
        }
        $success_story_image = "";
        if (isset($_FILES['success_story_image'])) {
            if ("" != $_FILES["success_story_image"]["tmp_name"]) {
            $success_story_image = get_server_image_name('success_story_image');
        }
        }
        $add_success_story_query = "INSERT INTO `success_story` ( `success_story_title`, `success_story_image`) VALUES ( '$success_story_title', '$success_story_image')";



        echo $add_success_story_query;
        try {
            if ($exist_result) {
                $add_success_story_result = mysqli_query($connect, $add_success_story_query);
            } else {

                echo "<script>alert('Success Story already exist !! ') </script>" . "<br>";
            }
            if ($add_success_story_result) {

                echo "<script>alert('Success Story Successfully Added !! ') </script>" . "<br>";
            } else {
                echo "<script>alert('Success Story is not  Added !! ') </script>" . "<br>";
            }

            // if ($insert_result) {
            //   header("location: Login.php");
            // }
        } catch (Exception $e) {
            // echo "Data insertion failed " . "<br>";
            // echo 'Message: ' . $e->getMessage() . "<br>";
        }
    }
    ?>


</body>

</html>