<?php
include 'connection.php';
if (isset($_POST['accept'])) {
    // Handle the "Accept" action
    // Save the user data to the main users table here
    $name = $_POST['name'];
    $course = $_POST['course'];
    $idnumber = $_POST['id_number'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = "user";

    // Insert the data into your main users table
    $insertSql = "INSERT INTO users (name, course, user_id, username, password, role) VALUES ('$name', '$course', '$idnumber', '$username', '$password', '$role')";
    // Execute the SQL query
    if (mysqli_query($conn, $insertSql)) {
        // User is added to the main users table, now remove from pending_registrations
        $deleteSql = "DELETE FROM pending_registrations WHERE username='$username'";
        mysqli_query($conn, $deleteSql);
        echo '<script>
                window.alert("Registration request accepted.");
                setTimeout(function() {
                    window.location.href = "../view/admin.php";
                }, 500);
            </script>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    } elseif (isset($_POST['deny'])) {
    // Handle the "Deny" action
    $username = $_POST['username'];
    // Remove the registration request from pending_registrations table
    $deleteSql = "DELETE FROM pending_registrations WHERE username='$username'";
    if (mysqli_query($conn, $deleteSql)) {
        echo '<script>
                window.alert("Registration request denied.");
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