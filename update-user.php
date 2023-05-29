<?php
if (isset($_POST['update'])) {
    // Get the updated user data from the form
    $nationalID = $_POST['nationalID'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $mpesaCode = $_POST['mpesaCode'];
    $depositedAmount = isset($_POST['depositedAmount']) ? $_POST['depositedAmount'] : null;
    $withdrawalAmount = isset($_POST['withdrawalAmount']) ? $_POST['withdrawalAmount'] : null;

    // Add your database connection and query to update the user
    // For example:
    include_once "database-config.php";
    $sql = "UPDATE users SET firstName='$firstName', lastName='$lastName', phoneNumber='$phoneNumber', mpesaCode='$mpesaCode', depositedAmount='$depositedAmount', withdrawalAmount='$withdrawalAmount' WHERE nationalID='$nationalID'";

    if ($database_connection->query($sql) === TRUE) {
        echo "<script>alert('User updated successfully');</script>";
        header("Location: view-statement.php");
        exit();
    } else {
        echo "<script>alert('Failed to update user');</script>";
        header("Location: view-statement.php");
        exit();
    }
} else {
    // Invalid request, redirect to an appropriate page
    header("Location: view-statement.php");
    exit();
}
?>
