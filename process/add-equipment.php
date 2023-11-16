<?php
    include 'connection.php';
    if (isset($_POST['new'])) {
    $ename = $_POST['eName'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $condition = $_POST['condition'];
    $maintenance = $_POST['maintenance'];

    // Insert the data into your equipment table
    $insertSql = "INSERT INTO equipment (ename, category, quantity, quality, last_maintenance_date) VALUES ('$ename', '$category', '$quantity', '$condition', '$maintenance')";
        // Execute the SQL query
        if (mysqli_query($conn, $insertSql)) {
            echo '<script>
                    window.alert("Equipment Added Successfully.");
                    setTimeout(function() {
                        window.location.href = "../view/admin.php";
                    }, 500);
                </script>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        mysqli_close($conn);
    }
?>