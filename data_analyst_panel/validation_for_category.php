<?php include "../validation_of_data_analyst.php";?>
<?php
include "../db.php";



if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['category_name']))) {

    $json_category_data[0] = "category";
    $json_category_data[1] = "";

    if (isset($_POST['category_name'])) {
        $category_name = filter($_POST["category_name"]);
        $category_id = filter($_POST["category_id"]);
        // echo "new category";

        $category_exist_result = false;
        $category_exist_query = "SELECT * FROM `category` WHERE  category_name = '$category_name' AND category_id = $category_id ";
        try {
            $category_exist_result = mysqli_query($connect, $category_exist_query);
            if ($category_exist_result) {

                $row  = mysqli_num_rows($category_exist_result);
                if ($row >  0) {
                    $category_exist_result = 1;
                    $json_category_data[1] = $category . " Category is already exist. Please enter another Category";
                }
            }
        } catch (Exception $e) {
            // // echo "Duplicate date Checking failed ";
            // echo 'Message: ' . $e->getMessage() . "<br>";
        }
    }

    $json_data[0] = $json_category_data;
    // echo $json_data[0];
    echo json_encode($json_data);
}
