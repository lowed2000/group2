<?php
include 'connection.php';

if (isset($_POST['register'])) {
    // Get user data from the registration form
    $name = $_POST['name'];
    $course = $_POST['course'];
    $idnumber = $_POST['id_number'];
    $username = $_POST['newUsername'];
    $password = $_POST['newPassword'];

    // Save registration data in the pending_registrations table
    $sql = "INSERT INTO pending_registrations (name, course, id_number, username, password, status) VALUES ('$name', '$course', '$idnumber', '$username', '$password', 'pending')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>
                window.alert("Registration request submitted for admin approval.");
                setTimeout(function() {
                    window.location.href = "../view/index.html";
                }, 500);
            </script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
