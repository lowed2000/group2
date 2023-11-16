<?php
include '../process/connection.php';
$eid = $_GET['editid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Equipment - SportStock Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../styles/edit-modal-style.css">
    
</head>
<body>
    <main>
        <!-- Edit Equipment Form Container -->
        <div class="popup-container">
            <div class="popup-content">
                <h2>Edit Equipment</h2>
                <form action="../process/edit-equipment.php?editid=<?php echo $eid; ?>" method="post">
                    <!-- Edit Equipment Form Content -->
                    <?php
                        $sqls = "SELECT * FROM Equipment WHERE eid='$eid'";
                        $results = mysqli_query($conn, $sqls);

                        while ($row = $results->fetch_assoc()) {
                            $ename=$row['ename'];
                            $category=$row['category'];
                            $quantity=$row['quantity'];
                            $quality=$row['quality'];
                            $maintenance=$row['last_maintenance_date'];
                        }
                    ?>
                   <div>
                        <label for="eName">Equipment Name:</label>
                        <input type="text" id="eName" name="eName" value="<?php echo $ename; ?>" required>
                    </div>
                    <div>
                        <label for="category">Sports Category:</label>
                        <input type="text" id="category" name="category" value="<?php echo $category; ?>" required>
                    </div>
                    <div>
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="<?php echo $quantity; ?>" required>
                    </div>
                    <div>
                        <label for="condition">Condition:</label>
                        <input type="text" id="condition" name="condition" value="<?php echo $quality; ?>">
                    </div>
                    <div>
                        <label for="maintenance">Last Maintenance:</label>
                        <input type="date" id="maintenance" name="maintenance" value="<?php echo $maintenance; ?>">
                    </div>
                    <div class="text-right">
                        <a href="admin.php" type="button" class="btn btn-success" name="cancel">Cancel</a>
                        <button type="submit" class="btn btn-success" name="edit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
