<?php include "../validation_of_user.php" ?>
<?php
// echo"here";

$category_id = $_POST["category_id"];
$result = mysqli_query($connect,"SELECT * FROM sub_category where sub_category_category_id = $category_id");
?>
<option value="">Select Sub-Category</option>
<?php
// echo"SELECT * FROM sub_category where category_id = $category_id";
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["sub_category_id"];?>"><?php echo $row["sub_category_name"];?></option>
<?php
}
?>