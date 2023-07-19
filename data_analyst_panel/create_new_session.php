<?php include "../validation_of_data_analyst.php";?>
<?php

include "../db.php";

function filter($string)
{
    $string = str_replace("<", "&lt;", $string);
    $string = str_replace(">", "&gt;", $string);
    return $string;
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['submit'])) {

    $user = filter($_POST["username"]);
    $pass = filter($_POST["password"]);


    $exist_result = false;
    $exist_query = "SELECT * FROM users_entries WHERE  Username = '$user'";
    $exist_result = mysqli_query($connect, $exist_query);

    try {
        $exist_result = mysqli_query($connect, $exist_query);
        $num  = mysqli_num_rows($exist_result);

        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($exist_result)) {
              if (password_verify($pass, $row['user_password'])) {

                $user_username = $row['user_username'];
                if ($exist_result) {
                  try {
        
                    $_SESSION['user_username'] = $user_First_name;
                
                    // reloction path or change path to Welcome page
                    echo "Login success " . "<br>";
                    // header("location: /forum/welcome.php");
                  } catch (Exception $e) {
                    echo "Login failed " . "<br>";
                    echo 'Message: ' . $e->getMessage() . "<br>";
                    // header("location: /forum/index.php");
                  }
                } else {
                  $exist_result = false;
                  echo "fetch user date failed";
                  // header("location: /forum/index.php");
                }
              } else {
                $exist_result = false;
                echo "invalid password";
                header("location: /forum/index.php");
              }
            }
          } else {
            $exist_result = false;
            echo "invalid username";
            // header("location: /forum/index.php");
          }
    } catch (Exception $e) {
        echo "Data insertion failed " . "<br>";
        // echo 'Message: ' . $e->getMessage() . "<br>";
    }
}
