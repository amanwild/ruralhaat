<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
  $(function() {
    //If check_all checked then check all table rows
    $("#check_all").on("click", function() {
      if ($("input:checkbox").prop("checked")) {
        $("input:checkbox[name='row-check']").prop("checked", true);
      } else {
        $("input:checkbox[name='row-check']").prop("checked", false);
      }
    });

    // Check each table row checkbox
    $("input:checkbox[name='row-check']").on("change", function() {
      var total_check_boxes = $("input:checkbox[name='row-check']").length;
      var total_checked_boxes = $("input:checkbox[name='row-check']:checked").length;

      // If all checked manually then check check_all checkbox
      if (total_check_boxes === total_checked_boxes) {
        $("#check_all").prop("checked", true);
      } else {
        $("#check_all").prop("checked", false);
      }
    });
  });

  function approve_product(id) {
    // alert("approved " + id)
    $.ajax({
      url: "./approve_product.php",
      type: "POST",
      data: {
        type: "approve",
        id: id,
      },
      success: function(result) {

        console.log("approve " + id);
        document.getElementById("status_" + id).innerHTML = `<span style="background-color:green;color:white;padding:5px;font-weight:700;border-radius:5px;">Approved</span>`;

      }
    });




  }

  function reject_product(id) {
    // alert("reject " + id)

    $.ajax({
      url: "./reject_product.php",
      type: "POST",
      data: {
        type: "reject",
        id: id,
      },
      success: function(result) {
        console.log("reject " + id);
        document.getElementById("status_" + id).innerHTML = `<span style="background-color:red;color:white;padding:5px;font-weight:700;border-radius:5px;">Rejected</span>`;
      }
    });



  }
  $(document).ready(function() {
    $('#myTable').DataTable();
    responsive: true

  });
</script>