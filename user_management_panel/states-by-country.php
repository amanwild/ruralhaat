<?php include "../validation_of_user.php" ?>
<?php
// echo"here";

$country_id = $_POST["country_id"];
$result = mysqli_query($connect,"SELECT * FROM states where country_id = $country_id");
?>
<option value="">Select State</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option name="state" value="<?php echo $row["state_id"];?>"><?php echo $row["state_name"];?></option>
<?php
}
?>