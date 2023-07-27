<?php include "../validation_of_admin.php";


?>
<!DOCTYPE html>
<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Add Member </title>

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
                                <h1 class=" my-auto mr-auto d-inline"> Add Member <p class="d-inline text-center align-middle" style="color:green;font-size:20px;"></p>
                                </h1>
                                <hr class="my-3">
                                <form enctype="multipart/form-data" class="needs-validation " action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                                    <div class="container p-2 " style="border-radius:8px;">
                                        <input type="hidden" class="addmember" id="addmember" name="addmember">
                                        <script>
                                            addmember.value = true;
                                        </script>

                                        <div class="form-row mb-2">

                                            <div class="col-md-6 mx-auto mb-3">
                                                <label for="member_image">Member Image </label><span style="color:red;"> *</span>
                                                <input type="file" class="form-control " id="member_image" name="member_image" required>
                                            </div>


                                            <div class="col-md-6 mx-auto mb-3">
                                                <label for="member_name">Member Name </label><span style="color:red;"> *</span>
                                                <input type="text" class="form-control " id="member_name" name="member_name" placeholder="Member Name" required>
                                            </div>
                                            <div class="col-md-6 mx-auto mb-3">
                                                <label for="member_designation">Member Designation </label><span style="color:red;"> *</span>
                                                <input type="text" class="form-control " id="member_designation" name="member_designation" placeholder="Member Designation" required>
                                            </div>
                                            <!--                                             
                                            <div class="col-md-6 mx-auto mb-3">
                                                <label for="member_image">Member Image </label><span style="color:red;"> *</span>
                                                <input type="file" class="form-control " id="member_image" name="member_image" placeholder="" required>
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
                                        <button type="button" class="table_btn btn btn-secondary " onclick="window.location.href='./cummunity_member.php'">Go Back</button>
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
    <script>
        /**
         * @link https://github.com/hicodersofficial/custom-html-css-js-widgets/tree/main/tag-input-field
         * INSTAGRAM: @hi.coders
         */

        const tagInput = document.querySelector(".tag-input");
        const tagArea = document.querySelector(".tag-area");
        const ul = document.querySelector(".tag-area ul");
        const label = document.querySelector(".label");

        let tags = [];

        function addEvent(element) {
            tagArea.addEventListener("click", () => {
                element.focus();
            });

            element.addEventListener("focus", () => {
                tagArea.classList.add("active");
                label.classList.add("label-active");
            });

            element.addEventListener("blur", (e) => {
                tagArea.classList.remove("active");
                if (element.value === "" && tags.length === 0) {
                    label.classList.remove("label-active");
                }
                if (!element.value.match(/^\s+$/gi) && element.value !== "") {
                    tags.push(e.target.value.trim());
                    element.value = "";
                    renderTags();
                }
            });
            /**
             * NOTE: Keyboard events works unexpected on mobile devices.
             * For mobile devices you need to add this code
             * to get the last character user entered.
             * value[value.length - 1] === " "
             *
             * keycode 32 is for SpaceBar
             * keycode 13 is for EnterKey
             */

            element.addEventListener("keydown", (e) => {
                console.log(e);
                const value = e.target.value;
                if (
                    (e.keyCode === 32 ||
                        value[value.length - 1] === " ") &&
                    !value.match(/^\s+$/gi) &&
                    value !== ""
                ) {
                    tags.push(e.target.value.trim());
                    element.value = "";
                    renderTags();
                }
                if (e.keyCode === 8 && value === "") {
                    tags.pop();
                    renderTags();
                }
            });
        }
        addEvent(tagInput);

        function renderTags() {
            ul.innerHTML = "";
            document.getElementById("subcategory_name").value = "";
            tags.forEach((tag, index) => {
                var data = tag;
                console.log(typeof(data));
                console.log(data);
                // data = JSON.stringify(data);
                // console.log(typeof(data));
                // console.log(data);
                if (document.getElementById("subcategory_name").value == "") {
                    document.getElementById("subcategory_name").value += data;
                } else {
                    document.getElementById("subcategory_name").value += " " + data;
                }

                createTag(tag, index);
            });
            const input = document.createElement("input");
            input.type = "text";
            input.className = "tag-input";
            addEvent(input);
            ul.appendChild(input);
            input.focus();
            setTimeout(() => (input.value = ""), 0);
        }

        function createTag(tag, index) {
            const li = document.createElement("li");
            li.className = "tag";
            const text = document.createTextNode(tag);
            const span = document.createElement("span");
            span.className = "cross";
            span.dataset.index = index;
            span.addEventListener("click", (e) => {
                tags = tags.filter((_, index) => index != e.target.dataset.index);
                renderTags();
            });
            li.appendChild(text);
            li.appendChild(span);
            ul.appendChild(li);
            // var data =text;
            // console.log(data);
            // data = JSON.stringify(data);
            // console.log(typeof(data));
            // console.log(data);

            // document.getElementById("subcategory_name").value = data;
        }
        // document.getElementById("subcategory_name").setAttribute('value','My default value');
    </script>


    <?php include "../footer/section_footer.php"; ?>
    <?php include "../footer/index.php"; ?>
    <?php include "../theme/body_data.php"; ?>


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script>
        function show_table() {

            console.log("success");

        }
    </script>
    <script src="multi-input.js"></script>
    <script>
        function showimg() {
            var x = (document.getElementById("member_image").value).slice(12, 100);
            console.log(x);
            document.getElementById("profile_dp").src = "../wp-content/uploads/data/" + x;
        }
        const getButton = document.getElementById('get_multi_tags');
        const multiInput = document.querySelector('multi-input');
        const values = document.querySelector('#show_tags_values');

        getButton.onclick = () => {
            if (multiInput.getValues().length > 0) {
                values.textContent = `Got ${multiInput.getValues().join(' and ')}!`;
            } else {
                values.textContent = 'Got none  :(';
            }
        }

        document.querySelector('input').focus();
    </script>
    <?php



    if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['addmember']))) {

        $member_name = filter($_POST["member_name"]);
        // $member_image = filter($_POST["member_image"]);
        $member_designation = filter($_POST["member_designation"]);

        $exist_result = false;
        $exist_query = "SELECT * FROM cummunity_member WHERE  member_name = '$member_name'";
        // echo "add member";
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
        $member_image = "";
        if (isset($_FILES['member_image'])) {
            if ("" != $_FILES["member_image"]["tmp_name"]) {
            $member_image = get_server_image_name('member_image');
        }
        }
        $add_member_query = "INSERT INTO `cummunity_member` (`member_id`, `member_name`, `member_designation`, `member_image`) VALUES (NULL, '$member_name', '$member_designation', '$member_image')";



        echo $add_member_query;
        try {
            if ($exist_result) {
                $add_product_result = mysqli_query($connect, $add_member_query);
            } else {

                echo "<script>alert('Member name already exist !! ') </script>" . "<br>";
            }
            if ($add_product_result) {

                echo "<script>alert('member Successfully Added !! ') </script>" . "<br>";
            } else {
                echo "<script>alert('member is not  Added !! ') </script>" . "<br>";
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

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
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


</body>

</html>