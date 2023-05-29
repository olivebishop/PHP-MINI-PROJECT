<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
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

        .total-amounts {
            background-color: lightgreen;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php include_once "dashboard.php"; ?>
    <div class="container">
        <h2 style="text-align: center; color: green;">MPESA STATEMENTS REPORT</h2>
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
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through your users data to generate table rows -->
                    <?php
                    include_once "database-config.php";
                    $sql = "SELECT * FROM users";
                    $result = $database_connection->query($sql);
                    
                    $totalDeposits = 0;
                    $totalWithdrawals = 0;

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['nationalID'] . "</td>";
                            echo "<td>" . $row['firstName'] . "</td>";
                            echo "<td>" . $row['lastName'] . "</td>";
                            echo "<td>" . $row['phoneNumber'] . "</td>";
                            echo "<td>" . $row['mpesaCode'] . "</td>";
                            echo "<td>" . $row['depositedAmount'] . "</td>";
                            echo "<td>" . $row['withdrawalAmount'] . "</td>";
                            echo "</tr>";

                            $totalDeposits += $row['depositedAmount'];
                            $totalWithdrawals += $row['withdrawalAmount'];
                        }
                    } else {
                        echo "<tr><td colspan='7'>No users found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="total-amounts">
                <table class="table">
                    <tr>
                        <th>Total Deposits:</th>
                        <td><?php echo $totalDeposits; ?></td>
                    </tr>
                    <tr>
                        <th>Total Withdrawals:</th>
                        <td><?php echo $totalWithdrawals; ?></td>
                    </tr>
                </table>
            </div>
            <form action="generate.php" method="post">
                <button type="submit" name="generate_pdf" class="btn btn-primary">Download PDF</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
