<?php
session_start();
include "../db.php";




$select_owner_of_comment_query = "SELECT * FROM `users_entries`";
$select_owner_of_comment_result = mysqli_query($connect, $select_owner_of_comment_query);

while ($row = mysqli_fetch_assoc($select_owner_of_comment_result)) {
    $comment_owner_result_Username = $row['user_username'];
    echo $row['user_type'];
    // $comment_owner_result_Id = $row['Id'];
    // $comment_owner_result_dt = $row['dt'];
    // $comment_owner_result_First_name = $row['First_name'];
    // $comment_owner_result_Last_name = $row['Last_name'];
    // $comment_owner_result_Email = $row['Email'];
    // $comment_owner_img_url = $row['img_url']; ?>

   
    <?php

    // foreach ($show_replies as $reply) {
    ?>

        <!-- hello -->
<?php 
// }
}




if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['submit'])) {

    $user = filter($_POST["username"]);
    $pass = filter($_POST["password"]);


    $exist_result = false;
    $exist_query = "SELECT * FROM users_entries WHERE  Username = '$user'";
    $exist_result = mysqli_query($connect, $exist_query);
    var_dump($exist_result);
    echo"here";
    $_SESSION['user_type'] = 'none';
    try {
        $exist_result = mysqli_query($connect, $exist_query);
        $num  = mysqli_num_rows($exist_result);

        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($exist_result)) {
              if (password_verify($pass, $row['user_password'])) {

                $user_username = $row['user_username'];
                if ($exist_result) {
                  try {
        
                    
                  

                    $_SESSION['user_username'] = $user_username;

                    echo $row['user_type'];

                    // if($row['user_type']=='admin'){
                    //   $_SESSION['user_type'] = 'admin';
                    // }
                    
                    // if($row['user_type']=='user'){
                    //   $_SESSION['user_type'] = 'user';
                    // }
                
                    // reloction path or change path to Welcome page
                    // echo "Login success " . "<br>";
                    // header("location: /forum/welcome.php");
                  } catch (Exception $e) {
                    // echo "Login failed " . "<br>";
                    // echo 'Message: ' . $e->getMessage() . "<br>";
                    // header("location: /forum/index.php");
                  }
                } else {
                  $exist_result = false;
                  // echo "fetch user date failed";
                  // header("location: /forum/index.php");
                }
              } else {
                $exist_result = false;
                // echo "invalid password";
                // header("location: /forum/index.php");
              }
            }
          } else {
            $exist_result = false;
            // echo "invalid username";
            // header("location: /forum/index.php");
          }
    } catch (Exception $e) {
        // echo "Data insertion failed " . "<br>";
        // echo 'Message: ' . $e->getMessage() . "<br>";
    }
}
