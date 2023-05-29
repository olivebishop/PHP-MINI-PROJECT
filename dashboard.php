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
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <style>
        .dashboard-header ul {
            display: flex;
            list-style: none;
        }
        
        .dashboard-header ul li {
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h6><?php echo "Welcome ".$_SESSION['username']; ?></h6>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php?id=profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php?id=users">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php?id=view-statement">View Statements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php?id=report">Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php?id=logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if (isset($_GET['id'])) {
    $selected = $_GET['id'];
    switch ($selected) {
        case 'profile':
            include_once "profile.php";
            break;
        case 'users':
            include_once "users.php";
            break;
        case 'view-statement':
            include_once "view-statement.php";
            break;
        case 'report':
            include_once 'report.php';
            break;
        case 'logout':
            include_once 'logout.php';
            break;
        default:
            echo "404 File Not found!";
            break;
    }
}
?>
