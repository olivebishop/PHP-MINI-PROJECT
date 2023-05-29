<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Statements</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <style>
        .dashboard-header ul {
            display: flex;
            list-style: none;
        }
        
        .dashboard-header ul li {
            margin-right: 15px;
        }

        /* Custom CSS for responsive table */
        .table-responsive {
            overflow-x: auto;
        }

        @media (max-width: 576px) {
            .table-responsive {
                width: 100%;
                margin-bottom: 1rem;
                overflow-y: hidden;
                -ms-overflow-style: -ms-autohiding-scrollbar;
                border: 1px solid #dee2e6;
            }
        }
    </style>
</head>
<body>
    <?php include_once "dashboard.php"; ?>
    <div class="container">
        <h2 style="text-align: center; color: green;">Mpesa Statements</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>National ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Mpesa Code</th>
                        <th>Deposited Amount</th>
                        <th>Withdrawal Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through your users data to generate table rows -->
                    <?php
                    include_once "database-config.php";

                    $sql = "SELECT * FROM users";
                    $result = $database_connection->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $nationalID = $row['nationalID'];
                            $firstName = $row['firstName'];
                            $lastName = $row['lastName'];
                            $phoneNumber = $row['phoneNumber'];
                            $mpesaCode = $row['mpesaCode'];
                            $depositedAmount = $row['depositedAmount'];
                            $withdrawalAmount = $row['withdrawalAmount'];
                            ?>
                            <tr>
                                <td><?php echo $nationalID; ?></td>
                                <td><?php echo $firstName; ?></td>
                                <td><?php echo $lastName; ?></td>
                                <td><?php echo $phoneNumber; ?></td>
                                <td><?php echo $mpesaCode; ?></td>
                                <td><?php echo $depositedAmount; ?></td>
                                <td><?php echo $withdrawalAmount; ?></td>
                                <td>
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUserModal-<?php echo $nationalID; ?>"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal-<?php echo $nationalID; ?>"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            <!-- Edit User Modal -->
                            <!-- Delete User Modal -->
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='8'>No users found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
