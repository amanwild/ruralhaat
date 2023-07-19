<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
  function show_checkbox() {
    $("#check_all").prop("checked", false);
    $("input:checkbox[name='row-check']").prop("checked", false);
    $('.checkBoxOption').show();
    $('#showEditorBtn').hide();
    // $('#showEditorOption').show();
  }

  function hide_checkbox() {
    $("#check_all").prop("checked", false);
    $('.checkBoxOption').hide();
    $('#showEditorBtn').show();
    $('#showEditorOption').hide();
  }


  $(function() {
    //If check_all checked then check all table rows
    $("#check_all").on("click", function() {
      if ($("input:checkbox").prop("checked")) {
        $("input:checkbox[name='row-check']").prop("checked", true);
      } else {
        $("input:checkbox[name='row-check']").prop("checked", false);
      }
      // console.log($("input:checkbox").prop("checked"));
      var markedCheckbox = document.getElementsByName('row-check');
      let array_of_checked_id = [];
      for (var checkbox of markedCheckbox) {
        if (checkbox.checked) {
          array_of_checked_id.push(checkbox.value);
          // $("#row_"+checkbox.value).css("background-color", "#c7d0e7");
        }

      }
      for (var checkbox of markedCheckbox) {
        if (!checkbox.checked) {
          array_of_checked_id.push(checkbox.value);
          // $("#row_"+checkbox.value).css("background-color", "#c7d0e7");
        }

      }
      if (array_of_checked_id.length <= 0) {
        $("input:checkbox[name='row-check']").prop("checked", false);
        $('#showEditorOption').hide();
        $('#showEditorBtn').show();
        $('.checkBoxOption').hide();

      } else {
        $('#showEditorOption').show();
        $('#showEditorBtn').hide();
      }
      console.log(array_of_checked_id);
      console.log("\n");
    });


    // Check each table row checkbox

  });
  // $(function() {
  //   $("#myTable_filter").prop("onclick", alert("aa"));
  //   $("#myTable_filter").on("click", function() {
  //   alert("hello");
  //   });

  // });
  $(function() {
    $("input:checkbox[name='row-check']").on("change", function() {
      var total_check_boxes = $("input:checkbox[name='row-check']").length;
      var total_checked_boxes = $("input:checkbox[name='row-check']:checked").length;

      // If all checked manually then check check_all checkbox
      if (total_check_boxes === total_checked_boxes) {
        $("#check_all").prop("checked", true);
      } else {
        $("#check_all").prop("checked", false);
      }

      var markedCheckbox = document.getElementsByName('row-check');
      let array_of_checked_id = [];
      for (var checkbox of markedCheckbox) {
        if (checkbox.checked) {
          array_of_checked_id.push(checkbox.value);
        }

      }
      if (array_of_checked_id.length <= 0) {
        $('#showEditorOption').hide();
        $('#showEditorBtn').show();
        $('.checkBoxOption').hide();

      } else {
        $('#showEditorOption').show();
        $('#showEditorBtn').hide();
      }
      console.log(array_of_checked_id);
      console.log("\n");

    });

  });

  function approve_ac(id) {

    show_preloader();
    
    $.ajax({
      url: "./approve_ac.php",
      type: "POST",
      data: {
        type: "approve",
        id: id,
      },
      success: function(result) {
        console.log(result);
        console.log("approve " + id);
        document.getElementById("status_" + id).innerHTML = `<span style="background-color:green;color:white;padding:5px;font-weight:700;border-radius:5px;">Approved</span>`;
        hide_preloader();
      }
    });
  }

  function approve_ac_with_checkbox() {
    hide_checkbox();
    var total_check_boxes = $("input:checkbox[name='row-check']").length;
    var total_checked_boxes = $("input:checkbox[name='row-check']:checked").length;
    show_preloader();
    // If all checked manually then check check_all checkbox
    if (total_check_boxes === total_checked_boxes) {
      $("#check_all").prop("checked", true);
    } else {
      $("#check_all").prop("checked", false);
    }
    // console.log($("input:checkbox[name='row-check']").prop("checked"));
    // console.log(total_check_boxes);
    // console.log(total_checked_boxes);

    var markedCheckbox = document.getElementsByName('row-check');
    var array_of_checked_id = [];
    for (var checkbox of markedCheckbox) {
      if (checkbox.checked) {
        //  data= checkbox.value+";"

        array_of_checked_id.push(checkbox.value);
      }

    }
    if (array_of_checked_id.length <= 0) {
      $('#showEditorOption').hide();
      $('#showEditorBtn').show();
      $('.checkBoxOption').hide();

    } else {
      $('#showEditorOption').hide();
      $('.checkBoxOption').hide();
      $('#showEditorBtn').show();
    }
    console.log(array_of_checked_id);
    console.log("\n");
    array_of_checked_id.forEach(to_Update_Color_green);

    $.ajax({
      url: "./approve_ac.php",
      type: "POST",
      data: {
        type: "approve",
        array_of_checked_id: array_of_checked_id,
      },
      success: function(result) {

        console.log(result);
        hide_preloader();
      }
    });
  }

  function show_preloader() {
    $('#loader').show();
    $("body").append('<div id="overlay" style="background-color:white;position:absolute;top:0;left:0;height:100%;width:100%;z-index:999"></div>');
    $("#overlay").css({
      "position": "absolute",
      "width": $(document).width(),
      "height": $(document).height(),
      "z-index": 99999,
    }).fadeTo(0, 0.3);
  }

  function hide_preloader() {
    $('#loader').hide();
    $("#overlay").remove();
  }

  function reject_ac_with_checkbox() {
    hide_checkbox();
    show_preloader();
    var total_check_boxes = $("input:checkbox[name='row-check']").length;
    var total_checked_boxes = $("input:checkbox[name='row-check']:checked").length;

    // If all checked manually then check check_all checkbox
    if (total_check_boxes === total_checked_boxes) {
      $("#check_all").prop("checked", true);
    } else {
      $("#check_all").prop("checked", false);
    }
    // console.log($("input:checkbox[name='row-check']").prop("checked"));
    // console.log(total_check_boxes);
    // console.log(total_checked_boxes);

    var markedCheckbox = document.getElementsByName('row-check');
    var array_of_checked_id = [];
    for (var checkbox of markedCheckbox) {
      if (checkbox.checked) {
        //  data= checkbox.value+";"

        array_of_checked_id.push(checkbox.value);
      }

    }
    if (array_of_checked_id.length <= 0) {
      $('#showEditorOption').hide();
      $('#showEditorBtn').show();
      $('.checkBoxOption').hide();

    } else {
      $('#showEditorOption').hide();
      $('.checkBoxOption').hide();
      $('#showEditorBtn').show();
    }
    console.log(array_of_checked_id);
    console.log("\n");

    array_of_checked_id.forEach(to_Update_Color_red);
    $.ajax({
      url: "./reject_ac.php",
      type: "POST",
      data: {
        type: "reject",
        array_of_checked_id: array_of_checked_id,
      },
      success: function(result) {
        hide_preloader();
        console.log(result);
        // console.log("approve " + id);




      }
    });
  }

  function to_Update_Color_red(id) {
    // alert("red");
    document.getElementById("status_" + id).innerHTML = `<span style="background-color:red;color:white;padding:5px;font-weight:700;border-radius:5px;">Rejected</span>`;
  }

  function to_Update_Color_green(id) {
    // alert("green");
    document.getElementById("status_" + id).innerHTML = `<span style="background-color:green;color:white;padding:5px;font-weight:700;border-radius:5px;">Approved</span>`;
  }


  function reject_ac(id) {
    show_preloader(); 
    $.ajax({
      url: "./reject_ac.php",
      type: "POST",
      data: {
        type: "reject",
        id: id,
      },
      success: function(result) {
        console.log(result);
        console.log("reject " + id);
        hide_preloader();
        to_Update_Color_red(id)
      }
    });
  }

  $(document).ready(function() {
    $('#myTable').DataTable();
    responsive: true
  });

  $('#loader')
    .hide() // Hide it initially
    .ajaxStart(function() {
      $(this).show();
    })
    .ajaxStop(function() {
      $(this).hide();
    });

  // $(document).ajaxStart(function() {
  //   $.LoadingOverlay("show");
  // });
  // $(document).ajaxStop(function() {
  //   $.LoadingOverlay("hide");
  // });

  // document.onreadystatechange = function() {
  //   if (document.readyState !== "complete") {
  //     document.getElementById("#myTable").style.visibility = "hidden";
  //     document.querySelector("#loader").style.visibility = "visible";
  //   } else {
  //     document.querySelector("#loader").style.display = "none";
  //     document.getElementById("#myTable").style.visibility = "visible";
  //   }
  // };

  // $(window).load(function() {
  //    $('#loader').fadeOut('slow');
  //   $.LoadingOverlay("show");
  // });
  // setTimeout(function() {
  //   $.LoadingOverlay("hide");
  // }, 3000);

  // $(window).on("load", function(){
  //   setTimeout(function(){
  //     $('#loader').remove();
  //   },2000)

  // })
</script>