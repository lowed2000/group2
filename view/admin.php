<?php
include '../process/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportStock Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../styles/admin-styles.css">
    <style>
        /* Add your custom styles for the toaster notification here */
        #toaster {
            display: none;
            position: fixed;
            top: 16px;
            right: 16px;
            padding: 16px;
            max-width: 300px;
            background: linear-gradient(to bottom, #F2F2F2, #D3D3D3);
            color: black;
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #toaster p {
            margin: 0;
        }
    </style>
</head>
<body>

    <header>
        <center>
            <table>
                <tr>
                    <td>
                        <img src="../pictures/IT.png" style="width: auto; height: auto; max-width: 95px; max-height: 95px;">
                    </td>
                    <td>
                        <h1>SportStock Admin Dashboard</h1>
                    </td>
                    <td>
                        <img src="../pictures/logos.png" style="width: auto; height: auto; max-width: 125px; max-height: 125px;">
                    </td>
                </tr>
            </table>
        </center>
    </header>

    <!-- Toaster Notification -->
    <div id="toaster">
        <span class="close-btn" onclick="closeToaster()">&times;</span>
        <p id="toaster-message">Your message here.</p>
    </div>

    <!-- Your existing PHP and HTML code here -->

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        // Function to show the toaster notification
        function showToast(message) {
            $('#toaster-message').text(message);
            $('#toaster').fadeIn().delay(3000).fadeOut();
        }

        // Function to close the toaster notification
        function closeToaster() {
            $('#toaster').fadeOut();
        }

        // Example: Show a notification when the page loads
        $(document).ready(function () {
            showToast("Welcome to SportStock Admin Dashboard!");
        });
    </script>

</body>
</html>
    <nav class="nav-container">
        <ul>
            <li class="nav-button"><a href="#" class="active" id="home-button"><i class="fas fa-home"></i> Home</a></li>
            <li class="nav-button"><a href="#" id="equipment-button"><i class="fas fa-dumbbell"></i> Equipment Management</a></li>
            <li class="nav-button"><a href="#" id="user-button"><i class="fas fa-users"></i> User Management</a></li>
            <li class="nav-button"><a href="#" id="borrowing-button"><i class="fas fa-chart-bar"></i> Borrowing Records</a></li>
            <li class="nav-button"><a href="#" id="settings-button"><i class="fas fa-running"></i> Activity Log</a></li>
            <li class="nav-button"><a href="#" id="logout-button"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
        </ul>
    </nav>

    <main>
        <!-- Content for each dashboard section goes here -->
        <div class="modal-container" id="home-modal">
            <div class="modal-content">
                <h2>Welcome to SportStock Admin Dashboard</h2>
                <p>
                    SportStock is your ultimate solution for managing sports equipment borrowing and return. <br />This user-friendly system allows you to efficiently track, organize, and manage all sports equipment, users, and borrowing records.
                </p>
                <p>
                    With SportStock, you can keep your sports equipment inventory in check, manage user profiles, and maintain detailed records of equipment borrowing and returns. <br />It's the perfect tool to streamline your sports equipment management process and enhance your overall sports facility experience.
                </p>
                <hr>
                <h3>Key Features</h3>
                <ul>
                    <li><i class="fas fa">Equipment Management:</i> Keep track of all sports equipment with ease.</li>
                    <li><i class="fas fa">User Management:</i> Manage user profiles and access permissions effortlessly.</li>
                    <li><i class="fas fa">Borrowing Records:</i> Maintain comprehensive records of equipment borrowing and returns.</li>
                    <li><i class="fas fa">Activity Log:</i> Check your activities.</li>
                </ul>
                <p>
                    SportStock is designed to make your sports facility management simpler and more organized. <br />Whether you are running a sports club, gym, or any other sports-related organization, SportStock is the right choice for you.
                </p>
            </div>
        </div>

        <div class="modal-container" id="equipment-modal">
            <div class="modal-content">
                <div class="float-right">
                    <button id="add-equipment-button" class="modal-button action-button" data-toggle="modal" data-target="#innerModalA">Add Equipment</button>
                </div>
                <!-- Equipment Table -->
                <table class="equipment-table">
                    <thead>
                        <tr>
                            <th id="equipment-id-header">Equipment ID</th>
                            <th id="equipment-name-header">Equipment Name</th>
                            <th id="category-header">Sports Category</th>
                            <th id="quantity-header">Quantity</th>
                            <th id="condition-header">Condition</th>
                            <th id="last-maintenance-header">Last Maintenance</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sqls = "SELECT * FROM Equipment";
                            $results = mysqli_query($conn, $sqls);
                            while ($row = $results->fetch_assoc()): 
                        ?>
                        <tr>
                            <td><?php echo $row['eid']; ?></td>
                            <td><?php echo $row['ename']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['quality']; ?></td>
                            <td><?php echo $row['last_maintenance_date']; ?></td>
                            <td>
                                <?php echo '<a href="edit-modal.php?editid='.$row['eid'].'" type="button" class="edit-button btn-success" name="edit"><i class="fas fa-edit"></i> Edit</a>'; ?>
                                <?php echo '<a href="../process/delete-equipment.php?deleteid='.$row['eid'].'" type="button" class="delete-button btn-danger" name="delete"><i class="fas fa-trash-alt"></i> Delete</a>'; ?>
                            </td>
                            <!-- other cols -->
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts</title>
    <style>
        /* Add your existing CSS styles here */

        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .modal-container {
            /* Add your styles for the modal container */
        }

        /* Add more styles based on your existing styles */

        /* Dark mode styles */
        body.dark-mode {
            background-color: #333;
            color: #fff;
        }

        .modal-container.dark-mode {
            /* Add your dark mode styles for the modal container */
        }

        /* Add more dark mode styles based on your existing styles */
    </style>
</head>
<body>

<div class="modal-container" id="user-modal">
    <div class="modal-content">
        <h2>User Accounts</h2>
        <div class="float-right">
            <button class="action-button" data-toggle="modal" data-target="#innerModalU">Add New User</button>
            <button class="action-button" data-toggle="modal" data-target="#innerModal">Registration Requests</button>
        </div>
        <div class="search-container">
            <input type="text" id="user-search" placeholder="Search for users...">
            <button id="search-button"><i class="fas fa-search"></i></button>
        </div>
        <div class="user-table" id="user-table">
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Course & Year Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="user-table-body">
                    <?php 
                        $role = "user";
                        $sql = "SELECT * FROM Users WHERE role='$role'";
                        $result = mysqli_query($conn, $sql);
                        while ($row = $result->fetch_assoc()): 
                    ?>
                    <tr class="user-row"> <!-- Added class for each row -->
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['course']; ?></td>
                        <td>
                            <?php echo '<a href="../process/delete-user.php?deleteid='.$row['id'].'" type="button" class="delete-button btn-danger" name="delete"><i class="fas fa-trash-alt"></i> Delete</a>'; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="paging-container">
            <button id="prev-page"><i class="fas fa-chevron-left"></i></button>
            <span id="page-info"></span>
            <button id="next-page"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>
</div>

<script>
    // Add event listener to the search button
    document.getElementById('search-button').addEventListener('click', function() {
        // Get the user input
        var userInput = document.getElementById('user-search').value.toLowerCase();

        // Get all user rows
        var userRows = document.getElementsByClassName('user-row');

        // Loop through each row and hide/show based on the search input
        for (var i = 0; i < userRows.length; i++) {
            var userName = userRows[i].getElementsByTagName('td')[1].innerText.toLowerCase(); // Change index based on your column order
            if (userName.includes(userInput)) {
                userRows[i].style.display = '';
            } else {
                userRows[i].style.display = 'none';
            }
        }
    });

    // Dark mode toggle
    document.getElementById('dark-mode-toggle').addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
        document.getElementById('user-modal').classList.toggle('dark-mode');
        // Add more elements to toggle for dark mode
    });
</script>

</body>
</html>
        <div class="modal-container" id="borrowing-modal">
            <div class="modal-content">
                <h2>Borrowing History</h2>
                <div class="float-right">
                    <button class="action-button" data-toggle="modal" data-target="#innerModalB">Borrow Equipment</button>
                </div>        
                <table class="borrowing-table">
                <thead>
                    <tr>
                        <th>Record ID</th>
                        <th>Equipment Name</th>
                        <th>Quantity</th>
                        <th>Equipment ID</th>
                        <th>Borrower's Name</th>
                        <th>Status</th>
                        <th>Date Borrowed</th>
                        <th>Return Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT borrowing.*, equipment.ename AS equipment_name, users.name AS user_name FROM borrowing LEFT JOIN equipment ON borrowing.equipment_id = equipment.eid LEFT JOIN users ON borrowing.user_id = users.user_id";
                    $result = mysqli_query($conn, $sql);
                    while ($row = $result->fetch_assoc()): 
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['equipment_name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['equipment_id']; ?></td>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['borrow_date']; ?></td>
                        <td><?php echo $row['return_date']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
                </table>
            </div>
        </div>

        <div class="modal-container" id="settings-modal">
    <div class="modal-content">
        <h2>Activity Log</h2>
        <ul id="activity-log-list">
            <!-- Activity log entries will go here -->
        </ul>
    </div>
</div>

<script>
    // Array to store activity log entries
    var activityLogEntries = [];

    // Function to add a new activity to the log
    function addActivity(activity) {
        var timestamp = new Date().toLocaleString(); // Get the current timestamp
        var logEntry = timestamp + ": " + activity;
        activityLogEntries.push(logEntry);
        updateActivityLog();
    }

    // Function to update the activity log in the modal
    function updateActivityLog() {
        var activityLogList = document.getElementById("activity-log-list");

        // Clear existing entries
        activityLogList.innerHTML = "";

        // Populate the activity log
        activityLogEntries.forEach(function (entry) {
            var listItem = document.createElement("li");
            listItem.textContent = entry;
            activityLogList.appendChild(listItem);
        });
    }

    // Example: Add a sample activity (replace this with your actual logic)
    addActivity("Admin logged in");

    // Example: Simulate additional activities over time
    setTimeout(function () {
        addActivity("Settings updated");
    }, 2000);

    // You can call addActivity whenever an admin performs an activity
    // For example, addActivity("Admin created a new user");

    // Call the function to initially populate the activity log
    updateActivityLog();
</script>


        <div class="modal-container" id="logout-modal">
            <div class="modal-content">
                <!-- Logout Modal Content -->
                <h2>Log Out</h2>
                <p>Are you sure you want to log out?</p>
                <div class="float-right">
                    <button id="logout-confirm-button" class="modal-button action-button" onclick="confirmLogout()">Yes</button>
                    <button id="logout-cancel-button" class="modal-button action-button" onclick="confirmLogout()">No</button>
                </div>
                </div>
        </div>
        <!-- Inner Modal for Adding Equipment -->
        <div class="modal fade" id="innerModalA" tabindex="-1" role="dialog" aria-labelledby="innerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewModalLabel">Add New Equipment Stock</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../process/add-equipment.php" method="post">
                            <!-- Add New Equipment Form Content -->
                            <div>
                                <label for='eName'>Equipment Name:</label>
                                <input type='text' id='eName' name='eName' required>
                            </div>
                            <div>
                                <label for='category'>Sports Category:</label>
                                <input type='text' id='category' name='category' required>
                            </div>
                            <div>
                                <label for='quantity'>Quantity:</label>
                                <input type='number' id='quantity' name='quantity' min=1 required>
                            </div>
                            <div>
                                <label for='condition'>Condition:</label>
                                <input type='text' id='condition'name='condition'>
                            </div>
                            <div>
                                <label for='maintenance'>Last Maintenance:</label>
                                <input type='date' id='maintenance'name='maintenance'>
                            </div>
                            <div class="float-right">
                                <button class="btn btn-success" type="submit" name="new">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inner Modal for Adding New User -->
        <div class="modal fade" id="innerModalU" tabindex="-1" role="dialog" aria-labelledby="innerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Add New User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../process/add-user.php" method="post">
                            <div>
                                <label for='name'>Name:</label>
                                <input type='text' id='name' name='name'>
                            </div>
                            <div>
                                <label for='course'>Course:</label>
                                <input type='text' id='course' name='course'>
                            </div>
                            <div>
                                <label for='id_number'>UserID:</label>
                                <input type='text' id='id_number' name='id_number'>
                            </div>
                            <div>
                                <label for='username'>Username:</label>
                                <input type='text' id='username' name='username' value=>
                            </div>
                            <div>
                                <label for='password'>Password:</label>
                                <input type='password' id='password'name='password'>
                            </div>
                            <div class="float-right">
                                <button class="btn btn-success" type="submit" name="add">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inner Modal for User Registration Requests -->
        <div class="modal fade" id="innerModal" tabindex="-1" role="dialog" aria-labelledby="innerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Registration Requests</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../process/registration_requests.php" method="post">
                            <?php
                            include '../process/connection.php';
                            // Retrieve and display pending registration requests
                            $sql = "SELECT * FROM pending_registrations WHERE status='pending'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                echo '<form method="post">';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Display registration data for approval
                                    $name = $row['name'];
                                    $course = $row['course'];
                                    $username = $row['username'];

                                    echo "Name: $name<br>";
                                    echo "Course: $course<br>";
                                    echo "Username: $username<br>";

                                    // Add hidden input fields to pass data to the form
                                    echo "<input type='hidden' name='name' value='$name'>";
                                    echo "<input type='hidden' name='course' value='$course'>";
                                    echo "<input type='hidden' name='id_number' value='{$row['id_number']}'>";
                                    echo "<input type='hidden' name='username' value='$username'>";
                                    echo "<input type='hidden' name='password' value='{$row['password']}'>";

                                    // Add Accept and Deny buttons
                                    echo '<div class="float-right"><button class="btn btn-success" type="submit" name="accept">Accept</button>';
                                    echo '<button class="btn btn-danger" type="submit" name="deny">Deny</button></div>';
                                    echo '<br/><br/>';
                                    echo '<hr>';
                                }
                                echo '</form>';
                            } else {
                                echo "No pending registration requests.";
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inner Modal for Borrow Equipment -->
        <div class="modal fade" id="innerModalB" tabindex="-1" role="dialog" aria-labelledby="innerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Borrow Equipment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../process/borrow-equipment.php" method="post">
                        <!-- Borrow Equipment Form Content -->
                        <div>
                                <label for='eID'>Equipment ID:</label>
                                <input type='text' id='eID' name='eID' required>
                            </div>
                            <div>
                                <label for='quantity'>Quantity:</label>
                                <input type='number' id='quantity' name='quantity' min=1 required>
                            </div>
                            <div>
                                <label for='bname'>Borrower's User ID:</label>
                                <input type='text' id='bname'name='bname'>
                            </div>
                            <div>
                            <label for='bstatus'>Borrowing Status:</label>
                            <select name="bstatus" class="form-control" id="bstatus" style="margin-left: 175px; margin-bottom: 5px; width: auto;">
                                <option for="bstatus" value="" required>--</option>
                                <option for="bstatus" value="Borrowing" required>Borrowing</option>
                                <option for="bstatus" value="Returned" required>Returned</option>
                            </select>
                            </div>
                            <div>
                                <label for='bdate'>Date Borrowed:</label>
                                <input type='date' id='bdate'name='bdate'>
                            </div>
                            <div>
                                <label for='rdate'>Return Date:</label>
                                <input type='date' id='rdate'name='rdate'>
                            </div>
                            <div class="float-right">
                                <button class="btn btn-success" type="submit" name="borrow">Borrow</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Inner Modal -->
    </main> 

    <footer>
        <p>&copy; 2023 SportStock</p>
    </footer>
    <script src="../scripts/jquery.min.js"></script>
    <script src="../scripts/popper.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
    <script src="../scripts/admin-modal-scripts.js"></script>
    <script src="../scripts/admin-scripts.js"></script>
    <!-- Include your JavaScript files here -->
</body>
</html>
