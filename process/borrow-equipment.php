<?php
include 'connection.php';

if (isset($_POST['borrow'])) {
    // Retrieve form data
    $equipment_id = $_POST['eID'];
    $quantity = $_POST['quantity'];
    $user_id = $_POST['bname'];
    $status = $_POST['bstatus'];
    $borrow_date = $_POST['bdate'];
    $return_date = $_POST['rdate'];

    // You should perform validation and sanitation of user inputs here.

    // Insert the data into the "borrowing" table
    $sql = "INSERT INTO borrowing (equipment_id, quantity, user_id, status, borrow_date, return_date)
            VALUES ('$equipment_id', '$quantity', '$user_id', '$status', '$borrow_date', '$return_date')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>
            window.alert("Borrowing record has been successfully added.");
            setTimeout(function() {
                window.location.href = "../view/admin.php";
            }, 500);
          </script>';
    } else {
        // Insertion failed
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection when done.
mysqli_close($conn);
?>
