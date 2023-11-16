<?php
    include 'connection.php';
    if (isset($_POST['add'])) {
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
            echo '<script>
                    window.alert("User Account Created Successfully.");
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