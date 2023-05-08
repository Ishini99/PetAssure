<?php
  include("db.php");
  session_start();
$spid ="";


if(isset($_SESSION["userid"]) ){
  $userid =$_SESSION["userid"];
}else{
  //header("location:login.php");
}


// check if the trash icon is clicked
if(isset($_GET['delete_id'])) {
    // get the feedback ID to be deleted
    $delete_id = $_GET['delete_id'];

    // prepare the SQL statement to delete the feedback record
    $delete_sql = "DELETE FROM inf  WHERE n_id = $delete_id";

    // execute the SQL statement
    if (mysqli_query($con, $delete_sql)) {
        // feedback record deleted successfully
       
        header("Location:AdminViewNotification.php");
    } else {
        // error deletingrecord
        echo "<script>alert('Error deleting notification: " . mysqli_error($con) . "');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifications</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/AdminViewNotification.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="./assets/js/jquery.min.js"></script>
    <!-- <script src="./assets/js/bootstrap.min.js"></script> -->
  
</head>

<body>
<div class="nav" style="width: 100%;">
            <div class="left">
                <img src="../Images/logo.png" width="100px" height="100px">
                <p style="margin-left: 20px;">PetAssure</p>
            </div>

            <div class="right">
                <a href="../index.php" class="font">HOME</a>
                <a href="vetDashboard.php" class="font">DASHBOARD</a>

                <a href="../logout.php" class="font">LOG OUT </a>
             
             
                <?php
$find_notifications = "Select * from inf where active = 1";
$result = mysqli_query($con,$find_notifications);
$count_active = '';
$notifications_data = array(); 
$deactive_notifications_dump = array();
while($rows = mysqli_fetch_assoc($result)){
    $count_active = mysqli_num_rows($result);
    $notifications_data[] = array(
        "n_id" => $rows['n_id'],
        "notifications_name"=>$rows['notifications_name'],
        "message"=>$rows['message']
    );
}

//only five specific posts
$deactive_notifications = "Select * from inf where active = 0 ORDER BY n_id DESC LIMIT 0,5";
$result = mysqli_query($con,$deactive_notifications);
while($rows = mysqli_fetch_assoc($result)){
    $deactive_notifications_dump[] = array(
        "n_id" => $rows['n_id'],
        "notifications_name"=>$rows['notifications_name'],
        "message"=>$rows['message']
    );
}
?>
             <div style="marging-right:10px">
                <i class=" fa fa-bell" id="over" data-value="<?php echo $count_active;?>"></i>
    <?php if(!empty($count_active)){?>
        <div class="round" id="bell-count" data-value="<?php echo $count_active;?>"><span><?php echo $count_active; ?></span></div>
    </div>
    <?php }?>
    <?php if(!empty($count_active)){?>
        <div id="list">
            <?php foreach($notifications_data as $list_rows){?>
                <div class="message alert alert-warning" data-id=<?php echo $list_rows['n_id'];?>>
                    <span><?php echo $list_rows['notifications_name'];?></span>
                    <div class="msg">
                        <p><?php echo $list_rows['message'];?></p>
                    </div>
                </div>
            <?php } ?>
        </div> 

       
    <?php } ?>
</nav>

            </div>
        </div>
     
   
        

    
     </div>
<br><br>


<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Names..">
<table id="myTable" class="styled-table">
  <thead>
    <tr>
      <th>Noti.No</th>
      <th>Notification Name</th>
      <th>Message</th>
      <th>Date</th>
      <th>Cancel</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql = "SELECT * FROM inf";
      $result = mysqli_query($con, $sql);
      $row_color = 1;
      if (mysqli_num_rows($result) > 0) {
        while ($notification = mysqli_fetch_assoc($result)) {
          echo '<tr class="active-row row-' . $row_color . '">';
          echo "<td>" . $notification['n_id'] . "</td>";
          echo "<td>" . $notification['notifications_name'] . "</td>";
          echo "<td>" . $notification['message'] . "</td>";
          echo "<td>" . $notification['date'] . "</td>";
          echo '<td>
                  <a href="?delete_id=' . $notification['n_id'] . '"
                    onclick="return confirm(\'Are you sure you want to delete this record?\')">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                  </a>
                </td>';
          echo "</tr>";
          $row_color = $row_color == 1 ? 2 : 1; // Alternate row colors
        }
      } else {
        echo "<tr><td colspan='5'>No notifications found</td></tr>";
      }
    ?>
  </tbody>
</table>






</body>
<script>
$(document).ready(function() {
    var ids = new Array();
    $('#over').on('click', function() {
        $('#list').toggle();
    });

    //Message with Ellipsis
    $('div.msg').each(function() {
        var len = $(this).text().trim(" ").split(" ");
        if (len.length > 12) {
            var add_elip = $(this).text().trim().substring(0, 65) + "…";
            $(this).text(add_elip);
        }

    });


    $("#bell-count").on('click', function(e) {
        e.preventDefault();

        let belvalue = $('#bell-count').attr('data-value');

        if (belvalue == '') {

            console.log("inactive");
        } else {
            $(".round").css('display', 'none');
            $("#list").css('display', 'block');

            // $('.message').each(function(){
            // var i = $(this).attr("data-id");
            // ids.push(i);

            // });
            //Ajax
            $('.message').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: './connection/deactive.php',
                    type: 'POST',
                    data: {
                        "id": $(this).attr('data-id')
                    },
                    success: function(data) {

                        console.log(data);
                        location.reload();
                    }
                });
            });
        }
    });

    $('#notify').on('click', function(e) {
        e.preventDefault();
        var name = $('#notifications_name').val();
        var ins_msg = $('#message').val();
        if ($.trim(name).length > 0 && $.trim(ins_msg).length > 0) {
            var form_data = $('#frm_data').serialize();
            $.ajax({
                url: './connection/insert.php',
                type: 'POST',
                data: form_data,
                success: function(data) {
                    location.reload();
                }
            });
        } else {
            alert("Please Fill All the fields");
        }


    });
});
//search bar
function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      if (tr[i].getElementsByTagName("td").length > 0) {
        var match = false;
        td = tr[i].getElementsByTagName("td");
        for (var j = 0; j < td.length; j++) {
          if (td[j]) {
            txtValue = td[j].textContent || td[j].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              match = true;
              break;
            }
          }
        }
        if (match) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>

</html>