<?php include "../validation_of_admin.php";

$category_id = $_GET['cat_id'];

include "../db.php";




// echo "success";
if (!$connect) {
    // echo "failed";
    die("Connection Failed:" . mysqli_connect_error());
}


?>


<!DOCTYPE html>
<html lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Edit Category </title>
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

    if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['updateCategory']) && isset($_POST['category_name']))) {

        $category_name = filter($_POST["category_name"]);
        $subcategory_name = filter($_POST["subcategory_name"]);
        $category_color = filter($_POST["category_color"]);

        $exist_category_result = false;
        $exist_query = "SELECT * FROM category WHERE category_name = '$category_name'";
        try {
            $exist_category_result = mysqli_query($connect, $exist_query);
            $row  = mysqli_num_rows($exist_category_result);
            if ($row >  0) {
                // // echo "exist";
                $exist_category_result = 1;
                // echo "exist" . "<br>";
            }
        } catch (Exception $e) {
            // echo "Duplicate date Checking failed " . "<br>";
            // echo 'Message: ' . $e->getMessage() . "<br>";
        }
        $update_category_query = "UPDATE `category` SET `category_name` = '$category_name', `category_color` = '$category_color' WHERE `category`.`category_id` = $category_id";

        $pieces = explode(",,,", $subcategory_name);


        try {
            $delete_sub_category_result = mysqli_query($connect, "DELETE FROM `sub_category` WHERE `sub_category`.`sub_category_category_id` = $category_id");
        } catch (Exception $e) {
            // echo "Data insertion failed " . "<br>";
        }
        foreach ($pieces as $piece) {
            $insert_sub_category_query = "INSERT INTO `sub_category` (`sub_category_id`, `sub_category_category_id`, `sub_category_name`, `sub_category_status`) VALUES (NULL, '$category_id', '$piece', '1');";
            try {
                $insert_sub_category_result = mysqli_query($connect, $insert_sub_category_query);
            } catch (Exception $e) {
                // echo "Data insertion failed " . "<br>";
            }
            // echo $insert_sub_category_query;
        }
        if ($insert_sub_category_result) {
            // echo "sub_category updated";
        }
        $category_image = "";
        if (isset($_FILES['category_image'])) {
            if ("" != $_FILES["category_image"]["tmp_name"]) {
                // echo "<script>alert('Enter.');</script>";
            $category_image = get_server_image_name('category_image');
        }
        }

        if ($category_image != "") {
            //    echo $category_image;
            $update_category_query = "UPDATE `category` SET `category_name` = '$category_name', `category_image` = '$category_image', `category_color` = '$category_color' WHERE `category`.`category_id` = $category_id";
        }
        try {
            if ($exist_category_result) {
                $update_category_result = mysqli_query($connect, $update_category_query);
            }
            if ($update_category_result) {

                echo "<script>alert('Category Successfully Updated !! ') </script>" . "<br>";
            } else {
                echo "<script>alert('Category is not  Updated !! ') </script>" . "<br>";
            }
        } catch (Exception $e) {
            // echo "Data insertion failed " . "<br>";
            // echo 'Message: ' . $e->getMessage() . "<br>";
        }
    }


    $select_query = "SELECT * FROM `category` WHERE category_id = $category_id"; //NOTE: here (`) is not equal to (')
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
            $category_name = $row['category_name'];
            $category_image = $row['category_image'];
            $category_color = $row['category_color'];
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
                                <h1 class=" my-auto mr-auto d-inline"> Edit Category <p class="d-inline text-center align-middle" style="color:green;font-size:20px;"></p>
                                </h1>
                                <hr class="my-3">
                                <form enctype="multipart/form-data" class="needs-validation " action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                                    <div class="container p-2 " style="border-radius:8px;">
                                        <input type="hidden" class="updateCategory" id="updateCategory" name="updateCategory">
                                        <script>
                                            updateCategory.value = true;
                                        </script>

                                        <div class="form-row mb-2">


                                            <div class="col-md-6 mx-auto mb-3">
                                                <label>Present Image </label>
                                                <div class="edit-profile-photo" style=" display: block; margin-bottom: 35px; text-align: center;"> <img id="profile_dp" style="border-radius: 50%; max-width: 200px; width: 100%; border: 10px solid rgba(0, 0, 0, 0.08);" src="../wp-content/uploads/data/<?= $category_image ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mx-auto mb-3">
                                                <label for="category_image">Update Image </label>
                                                <input type="file" class="form-control " id="category_image" name="category_image">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mx-auto mb-3">
                                            <label for="category_name">Category Name </label><span style="color:red;"> *</span> <?php echo "<span style='color:red;' id='label_for_category_name_validation'></span>"; ?>

                                            <input type="text" class="form-control " id="category_name" name="category_name" onchange="validation_for_category()" onload="validation_for_category()" value="<?= $category_name ?>" required>
                                        </div>
                                        <div class="col-md-6 mx-auto mb-3">
                                            <label for="category_color">Category Color </label><span style="color:red;"> *</span>
                                            <input type="text" class="form-control " id="category_color" name="category_color" value="<?= $category_color ?>" required>
                                        </div>
                                    </div>



                                    <div class="form-row">
                                        <div class="col-md-12 mx-auto mb-3">
                                            <input type="hidden" class="form-control" id="subcategory_name" name="subcategory_name">
                                            <style>
                                                #multi_tag {
                                                    margin: 0;
                                                    font-family: "Poppins", Arial, Helvetica, sans-serif;
                                                    background: #1f2023;
                                                    display: flex;
                                                    flex-direction: column;
                                                    justify-content: center;
                                                    align-items: center;
                                                    color: #fff;
                                                }

                                                #multi_tag_ul {
                                                    margin-block-start: 0;
                                                    margin-block-end: 0;
                                                    padding-inline-start: 0px;
                                                }

                                                li {
                                                    list-style: none;
                                                }

                                                .tag-area {
                                                    /* padding: 1rem; */
                                                    outline: none;
                                                    /* width: 600px; */
                                                    border: 2px solid #605f6f;
                                                    border-radius: 5px;
                                                    transition: all 0.2s;
                                                    cursor: text;
                                                    display: flex;
                                                    align-items: center;
                                                    position: relative;
                                                    background-color: #fff;

                                                }

                                                #multi_tag_label {
                                                    position: absolute;
                                                    background: #1f2023;
                                                    padding: 0 0.3rem;
                                                    color: #adadad;
                                                    top: 22px;
                                                    transition: all 0.1s;
                                                }

                                                .label-active {
                                                    top: -11px;
                                                    color: #8d29ff;
                                                    font-size: 13px;
                                                }

                                                .tag-area ul {
                                                    display: flex;
                                                    flex-wrap: wrap;
                                                    align-items: center;
                                                }

                                                .active {
                                                    /* border: 2px solid #8d29ff !important; */
                                                }

                                                .tag {
                                                    padding-left: 0.8rem;
                                                    background: #353535;
                                                    border-radius: 100px;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: space-between;
                                                    margin: 0.5rem;
                                                    color: #fff;
                                                }

                                                .tag-input {
                                                    padding: 0.5rem;
                                                    outline: none;
                                                    border: none;
                                                    width: 150px;
                                                    margin-left: 0.5rem;
                                                    background: transparent;
                                                    /* font-size: 20px; */
                                                    /* color: #fff; */
                                                }

                                                .cross {
                                                    cursor: pointer;
                                                    display: flex;
                                                    margin-left: 0.5rem;
                                                    justify-content: center;
                                                    align-items: center;
                                                    padding: 1.3rem;
                                                    transform: rotate(45deg);
                                                    border-radius: 50%;
                                                    background: #414141;
                                                }

                                                .cross:hover {
                                                    background: #818181b1;
                                                }

                                                .cross::before {
                                                    content: "";
                                                    width: 2px;
                                                    height: 16px;
                                                    position: absolute;
                                                    background: rgb(255, 255, 255);
                                                }

                                                .cross::after {
                                                    content: "";
                                                    height: 2px;
                                                    width: 16px;
                                                    position: absolute;
                                                    background: rgb(255, 255, 255);
                                                }

                                                @media (max-width: 650px) {
                                                    .tag-area {
                                                        width: 300px;
                                                    }
                                                }
                                            </style>

                                            <!-- <div id="multi_tag"> -->
                                            <label for="subcategory_name">Sub-Category Name </label><span style="color:red;"> *</span>
                                            <div class="tag-area">
                                                <ul id="multi_tag_ul">
                                                    <input type="text" class="tag-input" id="tag-input" />
                                                </ul>
                                                <!-- </div> -->
                                            </div>
                                            <label for="subcategory_name">NOTE: Press <strong>Space Bar</strong> to Add New Sub Category. </label>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer text-center">
                                <button type="button" class="table_btn btn btn-secondary " onclick="window.location.href='./category.php'">Go Back</button>
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
                    (e.keyCode === 13 ||
                        value[value.length - 1] === "") &&
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

        j = 1;

        function renderTags() {
            ul.innerHTML = "";

            document.getElementById("subcategory_name").value = "";
            // if(j){
            //   text="helo ok sdf sd f"
            //   var tags = text.split(" ");
            //   --j;
            // }
            // tags=["heloo" ,"ok"];
            // console.log(typeof(tags));
            tags.forEach((tag, index) => {
                var data = tag;
                console.log(typeof(data));
                console.log(data);
                console.log(index);
                // data = JSON.stringify(data);
                // console.log(typeof(data));
                // console.log(data);
                if (document.getElementById("subcategory_name").value == "") {
                    document.getElementById("subcategory_name").value += data;
                } else {
                    document.getElementById("subcategory_name").value += ",,," + data;
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

        function renderTags_onload() {


            ul.innerHTML = "";

            document.getElementById("subcategory_name").value = "";
            // text = "jj kjk n";
            // var text = text.split(' ');
            // text.forEach((tag) => {
            //     tags.push(tag);
            // });

            <?php

            $select_query = "SELECT * FROM category left join sub_category on sub_category.sub_category_category_id = category.category_id WHERE category_id = $category_id";
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
                $array_of_sub_category =  [];
                while ($row = mysqli_fetch_assoc($select_result)) {
                    $array_of_sub_category =  $row;

                    echo  "tags.push('" . $row['sub_category_name'] . "');";
                }
            ?>

            <?php

            }
            ?>
            // tags.push(text);
            // tags.push("1","dd");
            // tags.push("1");
            // tags.push("1");
            // tags=["heloo" ,"ok"];
            // console.log(typeof(tags));
            tags.forEach((tag, index) => {
                var data = tag;
                console.log(typeof(data));
                console.log(data);
                console.log(index);
                // data = JSON.stringify(data);
                // console.log(typeof(data));
                // console.log(data);
                if (document.getElementById("subcategory_name").value == "") {
                    document.getElementById("subcategory_name").value += data;
                } else {
                    document.getElementById("subcategory_name").value += ",,," + data;
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
            var x = (document.getElementById("category_image").value).slice(12, 100);
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


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <script>
            $(document).ready(function() {
            $(window).keydown(function(event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });

        function validation_for_category() {
            var category_name = document.getElementById("category_name");
            category_name = category_name.value;
            if (category_name.length > 0) {


                $.ajax({
                    url: "./validation_for_category.php",
                    datatype: "text",
                    type: "POST",
                    data: {
                        submit: "submit",
                        category_name: category_name,
                        category_id: <?= $category_id ?>,
                    },
                    success: function(result) {
                        console.log("hello");
                        result = JSON.parse(result);
                        json_data = result;
                        console.log(json_data);
                        // console.log(json_data[0][0]);

                        if (0 < (json_data[0][0]).length) {
                            $('#label_for_category_name_validation').html(json_data[0][1]);
                        }
                        if (0 < (json_data[0][1]).length) {
                            document.getElementById("add_category_submit").disabled = true;
                        } else {
                            document.getElementById("add_category_submit").disabled = false;
                        }
                    }
                });
            }
        }
    </script>

</body>

</html>