<?php
require('fpdf.php'); // Include the FPDF library
include_once "database-config.php";

// Function to generate PDF
function generatePDF($data) {
    $pdf = new FPDF(); // Create new PDF object
    $pdf->AddPage(); // Add a page to the PDF

    // Set font and font size for the table headers
    $pdf->SetFont('Arial', 'B', 12);

    // Add table headers
    //$pdf->Cell(40, 10, 'National ID', 1);
    $pdf->Cell(40, 10, 'First Name', 1);
    $pdf->Cell(40, 10, 'Last Name', 1);
    //$pdf->Cell(40, 10, 'Phone Number', 1);
    $pdf->Cell(40, 10, 'Mpesa Code', 1);
    $pdf->Cell(40, 10, 'Deposited Amount', 1);
    $pdf->Cell(40, 10, 'Withdrawal Amount', 1);
    $pdf->Ln(); // Move to the next line

    // Set font and font size for the table data
    $pdf->SetFont('Arial', '', 12);

    // Loop through the data and add table rows
    foreach ($data as $row) {
       // $pdf->Cell(40, 10, $row['nationalID'], 1);
        $pdf->Cell(40, 10, $row['firstName'], 1);
        $pdf->Cell(40, 10, $row['lastName'], 1);
        //$pdf->Cell(40, 10, $row['phoneNumber'], 1);
        $pdf->Cell(40, 10, $row['mpesaCode'], 1);
        $pdf->Cell(40, 10, $row['depositedAmount'], 1);
        $pdf->Cell(40, 10, $row['withdrawalAmount'], 1);
        $pdf->Ln(); // Move to the next line
    }

    // Output the PDF
    $pdf->Output();
}

$sql = "SELECT * FROM users";
$result = $database_connection->query($sql);

$data = array(); // Array to store the data

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row; // Add each row to the data array
    }

    // Check if the "generate_pdf" button is clicked
    if (isset($_POST['generate_pdf'])) {
        // Generate PDF with the data
        generatePDF($data);
    }
} else {
    echo 'No users found';
}
