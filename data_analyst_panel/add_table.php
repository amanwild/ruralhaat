<?php
include "../db.php";
echo'<div class="table-responsive">
    <table data-role="table" class="table ui-responsive" id="myTable">
        <thead>
            <tr>
                <th scope="col">Sr. No.</th>
                <th scope="col">Username </th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>

                <th scope="col" style="width:110px;">Action</th>
            </tr>
        </thead>
        <tbody>'.
      
            
            $select_query = "SELECT * FROM`users_entries`";
            // echo$fname,$lname;
            try {
                $select_result = mysqli_query($connect, $select_query);
                $num  = mysqli_num_rows($select_result);
            } catch (Exception $e) {
                $mess = $e->getMessage();
            }
            if ($num > 0) {
                $sno = 0;
                while ($row = mysqli_fetch_assoc($select_result)) {
                    $sno += 1;
            '
                    <tr>
                        <td>'. $sno .'</td>
                        <td>'. $row["user_username"] .'</td>
                        <td>'. $row["user_email"] .'</td>
                        <td>'. $row["user_phone"] .'</td>
                        <td>';
                        if ($row["user_verified_admin"]) {
                            echo"Approved";
                        }else{
                            echo"Not Approved";

                        }
                        echo'</td>
                        <td class="text-center">
                            <span type="button" style="width:50px;margin-right:0px;" id="'. $row["loc_id"] .'" class="d-inline edit table_edit_btn" data-bs-toggle="modal"  data-bs-target="#editModal"> 📝</span>
                            <span style="width:50px;margin-right:0px;" id="d'. $row["loc_id"] .'" type="button" id="d" . $row["Id"] . "" class="d-inline delete table_delete_btn "> ❌</span>
                        </td>
                    </tr>
            ';
                }
            }
            echo'
        </tbody>
    </table>

</div>';