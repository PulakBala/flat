


    <style>

      .flat-details{
       display: flex;
       justify-content: space-between;
      }
      .form-section {
            margin-bottom: 0.5rem;
            padding: 0.5rem;
            /* border: 1px solid #ddd; */
            border-radius: 0.5rem;
        }
        .form-section h5 {
            margin-bottom: 1rem;
            font-weight: bold;
        }
       
        .form-row {
            display: flex;
            align-items: center;
            padding-bottom: 10px;
        }
        .form-row .month1{
          padding-bottom: 5px;
        }
        .form-row label {
            flex: 1;
            margin-bottom: 0;
        }
        .form-row .form-control {
            flex: 2;
        }
 
    </style>

<?php
$serviceCharge = 0;
$internetBill = 0;
$dishBill = 0;
$flatRent = 0;
$commonBill = 0;
$centerRent = 0;
$centerVarious = 0;
$atticRent = 0;
$donation = 0;
$developmentVarious = 0;
$totalAmount = 0;


$months = [
    'month1' => '',
    'month2' => '',
    'month3' => '',
    'month4' => '',
    'month5' => '',
    'month6' => '',
    'month7' => '',
    'month8' => '',
    'month9' => '',
    'month10' => ''
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
    

    // Calculate total amount
    $totalAmount = $serviceCharge + $internetBill + $dishBill + $flatRent + $commonBill + $centerRent + $centerVarious + $atticRent + $donation + $developmentVarious;

    //handle action basec on submit button clicked 
    if(isset($_POST['submitAction'])){
        switch($_POST['submitAction']){
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
                        .invoice-header { text-align: center; margin-bottom: 20px; }
                        .invoice-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                        .invoice-table th, .invoice-table td { padding: 10px; border: 1px solid #ddd; }
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
                                <p>Month: " . htmlspecialchars(ucfirst($selectedMonth)) . "</p>
                                <p>Year: " . htmlspecialchars($selectedYear) . "</p>
                                <h3>Office Copy</h3>
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
                        <p>Month: " . htmlspecialchars(ucfirst($selectedMonth)) . "</p>
                        <p>Year: " . htmlspecialchars($selectedYear) . "</p>
                        <h3>Customer Copy</h3>
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
?>


<div class="flat-details">
  <div style="width: 20%;">
      <?php include('templates/sidebar.php') ?>
  </div>
  <div class="container mt-4" style="width: 80%;">
  <form action="" method="post">
        <div class="form-section">
            <h5>1. Monthly Services Charge</h5>
           
            <div class="form-row">
                <label for="serviceCharge">Services Charge</label>
                <input type="number" id="serviceCharge" name="serviceCharge" class="form-control" placeholder="Enter amount" value="<?php echo htmlspecialchars($serviceCharge); ?>">
            </div>
        </div>
        <div class="form-section">
            <h5>2. Internet Bill</h5>
          
            <div class="form-row">
                <label for="internetBill">Internet Bill</label>
                <input type="number" id="internetBill" name="internetBill" class="form-control" placeholder="Enter amount" value="<?php echo htmlspecialchars($internetBill); ?>">
            </div>
        </div>

     
        <div class="form-section">
            <h5>3. Dish Bill</h5>
          
            <div class="form-row">
                <label for="dishBill">Dish Bill</label>
                <input type="number" id="dishBill" name="dishBill" class="form-control" placeholder="Enter amount" value="<?php echo htmlspecialchars($internetBill); ?>">
            </div>
        </div>

        <div class="form-section">
            <h5>4. Association Flat Rent</h5>
           
            <div class="form-row">
                <label for="flatRent">Flat Rent</label>
                <input type="number" id="flatRent" name="flatRent" class="form-control" placeholder="Enter amount" value="<?php echo htmlspecialchars($internetBill); ?>">
            </div>
        </div>
        <div class="form-section">
            <h5>5. Common Current Bill</h5>
            
            <div class="form-row">
                <label for="commonBill">Current Bill</label>
                <input type="number" id="commonBill" name="commonBill" class="form-control" placeholder="Enter amount" value="<?php echo htmlspecialchars($internetBill); ?>">
            </div>
        </div>
        <div class="form-section">
            <h5>6. Community Center Vara</h5>
            <div class="form-row">
                <label for="centerRent">Rent</label>
                <input type="number" id="centerRent" name="centerRent" class="form-control" placeholder="Enter amount" value="<?php echo htmlspecialchars($internetBill); ?>">
            </div>
            <div class="form-row">
                <label for="centerVarious">Various Charges</label>
                <input type="number" id="centerVarious" name="centerVarious" class="form-control" placeholder="Enter amount" value="<?php echo htmlspecialchars($centerVarious); ?>">
            </div>
        </div>
        <div class="form-section">
            <h5>7. Attic Rent</h5>
          
            <div class="form-row">
                <label for="atticRent">Rent</label>
                <input type="number" id="atticRent" name="atticRent" class="form-control" placeholder="Enter amount" value="<?php echo htmlspecialchars($atticRent); ?>">
            </div>
        </div>
        <div class="form-section">
            <h5>8. Development</h5>
            <div class="form-row">
                <label for="donation">Donation</label>
                <input type="number" id="donation" name="donation" class="form-control" placeholder="Enter amount" value="<?php echo htmlspecialchars($donation); ?>">
            </div>
            <div class="form-row">
                <label for="developmentVarious">Various Charges</label>
                <input type="number" id="developmentVarious" name="developmentVarious" class="form-control" placeholder="Enter amount" value="<?php echo htmlspecialchars($developmentVarious); ?>">
            </div>
        </div>


        <div class="form-section">
            <h5>5. Common Current Bill</h5>
            <div class="form-row">
                <label for="month1">Select Month</label>
                <select id="month1" name="month1" class="form-control">
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="Nobember">November</option>
                    <option value="December">December</option>
                </select>
            </div>
            <div class="form-row">
                <label for="year">Select Year</label>
                <select id="year" name="year" class="form-control">
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                </select>
            </div>
        </div>

        <!-- Total Amount -->
        <div class="form-section">
            <h5>Total Amount: $<?php echo number_format($totalAmount, 2); ?></h5>
        </div>
        <input type="hidden" name="action" value="calculate">
    <div style="display: flex; gap:10px">
        
    <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submitAction" value="calculate">Submit</button>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submitAction" value="invoice">Generate Invoice</button>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submitAction" value="sms">Send SMS</button>
        </div>
    </div>
    </form>
</div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
