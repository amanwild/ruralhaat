<?php

function unlink_img($column_name ,$table_name,$delete_name, $delete_id, $connect){

  $select_img_query = "SELECT `$column_name` from $table_name WHERE ".$delete_name." = $delete_id";
  // echo $select_img_query;
  $select_img_result = mysqli_query($connect, $select_img_query);
  while ($row_for_img_name =  mysqli_fetch_assoc($select_img_result)) {
    if(''!=$row_for_img_name[$column_name]){
      unlink("../wp-content/uploads/data/".$row_for_img_name[$column_name]);
    }
  }
  // echo $imgName;
}

?>