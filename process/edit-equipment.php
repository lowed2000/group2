<?php
include 'connection.php';
// Check if the form is submitted
if (isset($_POST['edit'])) {

    // Get data from the form
    $ename = $_POST['eName'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $condition = $_POST['condition'];
    $maintenance = $_POST['maintenance'];

    // Get the equipment ID
    $eid = $_GET['editid'];

    // Create the SQL query to update the equipment
    $sql = "UPDATE equipment SET ename='$ename', category='$category', quantity='$quantity', quality='$condition', last_maintenance_date='$maintenance' WHERE eid='$eid'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>
                window.alert("Equipment Data Updated Successfully.");
                setTimeout(function() {
                    window.location.href = "../view/admin.php";
                    }, 500);
              </script>';
    } else {
        echo "Error updating equipment: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
