<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <style>
        .dashboard-header ul {
            display: flex;
            list-style: none;
        }
        
        .dashboard-header ul li {
            margin-right: 15px;
        }
        
        .modal-body {
  max-height: 80vh; /* Adjust the maximum height as needed */
  overflow-y: auto;
}

    </style>
</head>
<body>
   

    <!-- Modal for adding user -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add user form fields here -->
<form action="users.php" method="post">
        <div class="mb-3">
        <label for="nationalId" class="form-label">National ID</label>
        <input type="text" class="form-control" id="nationalId" name="nationalId">
        </div>
        <div class="mb-3">
        <label for="firstName" class="form-label">First Name</label>
        <input type="text" class="form-control" id="firstName" name="firstName">
        </div>
        <div class="mb-3">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="lastName">
        </div>
        <div class="mb-3">
        <label for="phoneNumber" class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
        </div>
        <div class="mb-3">
        <label for="mpesaCode" class="form-label">Mpesa Code</label>
        <input type="text" class="form-control" id="mpesaCode" name="mpesaCode">
        </div>
        <div class="mb-3">
        <label for="mpesaCode" class="form-label">Deposited Amount</label>
        <input type="text" class="form-control" id="depositedAmount" name="depositedAmount">
        </div>
        <div class="mb-3">
        <label for="mpesaCode" class="form-label">Widhrawal Amount</label>
        <input type="text" class="form-control" id="withdrawalAmount" name="withdrawalAmount">
        </div>
    <!-- Additional form fields such as deposit, withdrawal, etc. -->
    <button type="submit" name="add" value="add" class="btn btn-primary">Add</button>
</form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script to show the modal on page load -->
    <script>
        window.onload = function() {
            var addUserModal = new bootstrap.Modal(document.getElementById('addUserModal'));
            addUserModal.show();
        };
    </script>
</body>
</html>
<?php
if (isset($_POST['add'])) {
    // echo "You just hit the server";
    // echo "These are the values you sent to me";
    echo "<br>";

    $nationalID  = $_POST['nationalId'];
    $firstName  = $_POST['firstName'];
    $lastName  = $_POST['lastName'];
    $phoneNumber  = $_POST['phoneNumber'];
    $mpesaCode  = $_POST['mpesaCode'];
    $depositedAmount  = isset($_POST['depositedAmount']) ? $_POST['depositedAmount'] : null;
    $withdrawalAmount  = isset($_POST['withdrawalAmount']) ? $_POST['withdrawalAmount'] : null;

    include_once "database-config.php";

    $sql = "INSERT INTO users(nationalID, firstName, lastName, phoneNumber, mpesaCode, depositedAmount, withdrawalAmount) VALUES('$nationalID', '$firstName', '$lastName', '$phoneNumber', '$mpesaCode', '$depositedAmount', ' $withdrawalAmount')";


    if ($database_connection->query($sql) === TRUE) {
        // Registration successful
        echo "<script>alert('Successfully registered');</script>";
        header("Location: view-statement.php");
        exit();
    } else {
        // Registration failed
        echo "<script>alert('Registration failed');</script>";
    }
}
?>

