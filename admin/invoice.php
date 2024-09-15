<?php
require('fpdf.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and process form data
    $month1 = $_POST['month1'];
    $serviceCharge = isset($_POST['serviceCharge']) ? floatval($_POST['serviceCharge']) : 0;
    $internetBill = isset($_POST['internetBill']) ? floatval($_POST['internetBill']) : 0;
    $dishBill = isset($_POST['dishBill']) ? floatval($_POST['dishBill']) : 0;
    $flatRent = isset($_POST['flatRent']) ? floatval($_POST['flatRent']) : 0;
    $commonBill = isset($_POST['commonBill']) ? floatval($_POST['commonBill']) : 0;
    $centerRent = isset($_POST['centerRent']) ? floatval($_POST['centerRent']) : 0;
    $centerVarious = isset($_POST['centerVarious']) ? floatval($_POST['centerVarious']) : 0;
    $atticRent = isset($_POST['atticRent']) ? floatval($_POST['atticRent']) : 0;
    $donation = isset($_POST['donation']) ? floatval($_POST['donation']) : 0;
    $developmentVarious = isset($_POST['developmentVarious']) ? floatval($_POST['developmentVarious']) : 0;

    // Calculate total amount
    $totalAmount = $serviceCharge + $internetBill + $dishBill + $flatRent + $commonBill + $centerRent + $centerVarious + $atticRent + $donation + $developmentVarious;

    // Generate invoice content
    $invoice = "
        <html>
        <head>
            <title>Invoice</title>
            <style>
                body { font-family: Arial, sans-serif; }
                .invoice { border: 1px solid #ddd; padding: 20px; margin: 20px; border-radius: 8px; }
                .invoice-header { text-align: center; margin-bottom: 20px; }
                .invoice-footer { text-align: center; margin-top: 20px; font-size: 0.875em; color: #666; }
                .invoice-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                .invoice-table th, .invoice-table td { padding: 10px; border: 1px solid #ddd; }
                .invoice-table th { background-color: #f4f4f4; }
                .invoice-total { font-weight: bold; }
            </style>
        </head>
        <body>
            <div class='invoice'>
                <div class='invoice-header'>
                    <h2>Invoice</h2>
                    <p>Month: " . htmlspecialchars(ucfirst($month1)) . "</p>
                </div>
                <table class='invoice-table'>
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>";

    $charges = [
        "Service Charge" => $serviceCharge,
        "Internet Bill" => $internetBill,
        "Dish Bill" => $dishBill,
        "Flat Rent" => $flatRent,
        "Common Bill" => $commonBill,
        "Center Rent" => $centerRent,
        "Center Various" => $centerVarious,
        "Attic Rent" => $atticRent,
        "Donation" => $donation,
        "Development Various" => $developmentVarious
    ];

    foreach ($charges as $description => $amount) {
        if ($amount > 0) {
            $invoice .= "<tr>
                            <td>$description</td>
                            <td>$" . number_format($amount, 2) . "</td>
                          </tr>";
        }
    }

    $invoice .= "</tbody>
                </table>
                <div class='invoice-total'>
                    <p>Total Amount: $" . number_format($totalAmount, 2) . "</p>
                </div>
                <div class='invoice-footer'>
                    <p>Customer Copy</p>
                </div>
            </div>
            <div class='invoice'>
                <div class='invoice-header'>
                    <h2>Invoice</h2>
                    <p>Month: " . htmlspecialchars(ucfirst($month1)) . "</p>
                </div>
                <table class='invoice-table'>
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>";

    foreach ($charges as $description => $amount) {
        if ($amount > 0) {
            $invoice .= "<tr>
                            <td>$description</td>
                            <td>$" . number_format($amount, 2) . "</td>
                          </tr>";
        }
    }

    $invoice .= "</tbody>
                </table>
                <div class='invoice-total'>
                    <p>Total Amount: $" . number_format($totalAmount, 2) . "</p>
                </div>
                <div class='invoice-footer'>
                    <p>Official Copy</p>
                </div>
            </div>
        </body>
        </html>";

    // Output the invoice
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="invoice.pdf"');
    echo $invoice;
}
?>
