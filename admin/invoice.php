<?php

include_once('connection.php');
$months = [
    'month1' => '',
];
$years = [
    'year' => ''
];

// If form is submitted, process the input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    // Fetch month and year values
    $selectedMonth = isset($_POST['month1']) ? htmlspecialchars($_POST['month1']) : '';
    $selectedYear = isset($_POST['year']) ? htmlspecialchars($_POST['year']) : '';
    // Fetch flat details
    $ownerName = isset($_POST['ownerName']) ? htmlspecialchars($_POST['ownerName']) : '';
    $mobileNumber = isset($_POST['mobileNumber']) ? htmlspecialchars($_POST['mobileNumber']) : '';
    $flatNumber = isset($_POST['flatNumber']) ? htmlspecialchars($_POST['flatNumber']) : '';
    //flat id 
    $flatId = isset($_POST['flatId']) ? intval($_POST['flatId']): 0;
    

    // Calculate total amount
    $totalAmount = $serviceCharge + $internetBill + $dishBill + $flatRent + $commonBill + $centerRent + $centerVarious + $atticRent + $donation + $developmentVarious;


    // Prepare SQL statement
    $sql = "INSERT INTO flat_bill (f_date, f_month, f_year, f_service_charge, f_int_bill, f_dish_bill, f_flat_rent, f_c_current_bill, f_c_center_rent, f_c_center_various, f_atic_rent, f_d_donation, f_d_various_charge, f_status, f_flatId) 
    VALUES (NOW(), '$selectedMonth', '$selectedYear', $serviceCharge, $internetBill, $dishBill, $flatRent, $commonBill, $centerRent, $centerVarious, $atticRent, $donation, $developmentVarious, $flatId, 'Pending')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }



    //handle action basec on submit button clicked 
    if (isset($_POST['submitAction'])) {
        switch ($_POST['submitAction']) {
            case 'calculate':
                break;
            case 'invoice':
                // Generate invoice HTML
                echo "
                <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Invoice</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        .invoice-container { display: flex; justify-content: space-between; gap:20px; }
                        .invoice { border: 1px solid #ddd; padding: 20px; border-radius: 8px; width: 48%; }
                        .invoice-header {text-align: center; margin-bottom: 20px; }
                        .ivoice-detials{display: flex; justify-content:space-between; text-align:start;}
                        .invoice-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                        .invoice-table th, .invoice-table td {justify-content:center; padding: 10px; border: 1px solid #ddd; }
                        .invoice-table th { background-color: #f4f4f4; }
                        .invoice-total { font-weight: bold; }
                        .invoice-footer { text-align: center; margin-top: 20px; font-size: 0.875em; color: #666; }
                    </style>
                </head>
                <body>
                    <div class='invoice-container'>
                        <!-- Office Copy -->
                        <div class='invoice'>
                            <div class='invoice-header'>
                                <h2>Invoice</h2>
                                <h3>Office Copy</h3>
                              <div class='ivoice-detials'>
                                <div>
                                <p><strong>Owner Name:</strong> $ownerName</p>
                                <p><strong>Mobile Number:</strong> $mobileNumber</p>
                                <p><strong>Flat No:</strong> $flatNumber</p>
                                
                                </div>
                                <div>
                                <p>Month: " . htmlspecialchars(ucfirst($selectedMonth)) . "</p>
                                <p>Year: " . htmlspecialchars($selectedYear) . "</p>
                                </div>
                              </div>
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
                    ['description' => 'Service Charge', 'amount' => $serviceCharge],
                    ['description' => 'Internet Bill', 'amount' => $internetBill],
                    ['description' => 'Dish Bill', 'amount' => $dishBill],
                    ['description' => 'Flat Rent', 'amount' => $flatRent],
                    ['description' => 'Common Bill', 'amount' => $commonBill],
                    ['description' => 'Center Rent', 'amount' => $centerRent],
                    ['description' => 'Center Various', 'amount' => $centerVarious],
                    ['description' => 'Attic Rent', 'amount' => $atticRent],
                    ['description' => 'Donation', 'amount' => $donation],
                    ['description' => 'Development Various', 'amount' => $developmentVarious],
                ];

                foreach ($charges as $charge) {
                    if ($charge['amount'] > 0) {
                        echo "<tr>
                                                <td>{$charge['description']}</td>
                                                <td> ৳" . number_format($charge['amount'], 0) . "</td>
                                              </tr>";
                    }
                }

                echo "</tbody>
                    </table>
                    <div class='invoice-total'>
                        <p>Total Amount:  ৳" . number_format($totalAmount, 0) . "</p>
                    </div>
                    <div class='invoice-footer'>
                        <p>Thank you for your business!</p>
                    </div>
                </div>
                
                <!-- Customer Copy -->
                <div class='invoice'>
                     <div class='invoice-header'>
                        <h2>Invoice</h2>
                        <h3>Customer Copy</h3>
                        <div class='ivoice-detials'>
                        <div>
                        <p><strong>Owner Name:</strong> $ownerName</p>
                         <p><strong>Mobile Number:</strong> $mobileNumber</p>
                         <p><strong>Flat No:</strong> $flatNumber</p>
                                
                            </div>
                             <div>
                            <p>Month: " . htmlspecialchars(ucfirst($selectedMonth)) . "</p>
                            <p>Year: " . htmlspecialchars($selectedYear) . "</p>
                            </div>
                            </div>
                    </div>
                    <table class='invoice-table'>
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>";

                foreach ($charges as $charge) {
                    if ($charge['amount'] > 0) {
                        echo "<tr>
                                          <td>{$charge['description']}</td>
                                          <td> ৳" . number_format($charge['amount'], 0) . "</td>
                                      </tr>";
                    }
                }

                echo "</tbody>
                    </table>
                    <div class='invoice-total'>
                        <p>Total Amount:  ৳" . number_format($totalAmount, 0) . "</p>
                    </div>
                    <div class='invoice-footer'>
                        <p>Thank you for your business!</p>
                    </div>
                </div>
            </div>
                </body>
                </html>";
                exit;
            case 'sms':
                break;
        }
    }
}
