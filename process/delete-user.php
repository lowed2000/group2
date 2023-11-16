<?php
include 'connection.php';

if(isset($_GET['deleteid'])){
  $id = $_GET['deleteid'];
  $sql = "DELETE FROM users WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  if($result){
    echo '<script>
            window.alert("User Account Deleted Successfully.");
            setTimeout(function() {
                window.location.href = "../view/admin.php";
            }, 500);
          </script>';
  }
  else {
    die(mysqli_error($conn));
  }
}
?>