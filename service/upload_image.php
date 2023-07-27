<?php
function get_server_image_name($image_name)
{
  $image_file = '';
  $reason = "";
  // echo "<script>alert('Sorry, Image was not uploaded.\n".$reason."');</script>";
  $counter = '';
  $target_dir = "../wp-content/uploads/data/";
  $path_for_server = $target_dir .time(). basename($_FILES["$image_name"]["name"]);
  $tempname = $_FILES["$image_name"]["tmp_name"];
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($path_for_server, PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["$image_name"]["tmp_name"]);
  if ($check !== false) {
    $uploadOk = 1;
  } else {
    $reason .= "File is not an image. \n";
    $uploadOk = 0;
  }

  if (file_exists($path_for_server)) {
    $counter = 1;

    $exists = true;
    $increment = $target_dir . $counter . basename($_FILES["$image_name"]["name"]);
    while ($exists) {
      if (file_exists($target_dir .time(). $counter . basename($_FILES["$image_name"]["name"]))) {
        $counter++;
      } else {
        $exists = false;
      }
    }
    $path_for_server = $target_dir .time(). $counter . basename($_FILES["$image_name"]["name"]);
  }

  if ($_FILES["$image_name"]["size"] > 1000000) {
    $reason .= "Sorry, your file is too large. Maximum file Size is 1MB. \n";
    $uploadOk = 0;
  }

  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    $reason .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed. \n";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "<script>alert('Sorry, Image was not uploaded.\n".$reason."');</script>";
  } else {
    if (move_uploaded_file($tempname, $path_for_server)) {

      $image_file = time().$counter . $_FILES["$image_name"]["name"];

      //mysqli_query($connect, $add_member_query);
      echo "<script>alert('The file " . htmlspecialchars(basename($_FILES["$image_name"]["name"])) . " has been uploaded.');</script>";
    } else {
      echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
    }
  }
  return $image_file;
}

 ?>