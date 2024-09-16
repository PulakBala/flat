


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


// defalult months value 
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
    

     // Fetch month values
     foreach ($months as $key => &$value) {
        $value = isset($_POST[$key]) ? htmlspecialchars($_POST[$key]) : '';
    }
    unset($value); // break reference
    

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
                                <p>Month: " . htmlspecialchars(ucfirst($_POST['month1'])) . "</p>
                                <h3>Office Copy</h3>
                            </div>
                            <table class='invoice-table'>
                                <thead>
                                    <tr><th>Month</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>";

                                $charges = [
                                    ['month' => $months['month1'], 'description' => 'Service Charge', 'amount' => $serviceCharge],
                                    ['month' => $months['month2'], 'description' => 'Internet Bill', 'amount' => $internetBill],
                                    ['month' => $months['month3'], 'description' => 'Dish Bill', 'amount' => $dishBill],
                                    ['month' => $months['month4'], 'description' => 'Flat Rent', 'amount' => $flatRent],
                                    ['month' => $months['month5'], 'description' => 'Common Bill', 'amount' => $commonBill],
                                    ['month' => $months['month6'], 'description' => 'Center Rent', 'amount' => $centerRent],
                                    ['month' => $months['month10'], 'description' => 'Center Various', 'amount' => $centerVarious], // Added Center Various
                                    ['month' => $months['month7'], 'description' => 'Attic Rent', 'amount' => $atticRent],
                                    ['month' => $months['month8'], 'description' => 'Donation', 'amount' => $donation],
                                    ['month' => $months['month9'], 'description' => 'Development Various', 'amount' => $developmentVarious],
                                ];
                                
                                foreach ($charges as $charge) {
                                    if ($charge['amount'] > 0) {
                                        echo "<tr>
                                                 <td>{$charge['month']}</td>
                                                <td>{$charge['description']}</td>
                                                <td>$" . number_format($charge['amount'], 2) . "</td>
                                              </tr>";
                                    }
                                }

                echo "</tbody>
                    </table>
                    <div class='invoice-total'>
                        <p>Total Amount: $" . number_format($totalAmount, 2) . "</p>
                    </div>
                    <div class='invoice-footer'>
                        <p>Thank you for your business!</p>
                    </div>
                </div>
                
              

                 <!-- Customer Copy -->
                <div class='invoice'>
                    <div class='invoice-header'>
                        <h2>Invoice</h2>
                        <p>Month: " . htmlspecialchars(ucfirst($_POST['month1'])) . "</p>
                        <h3>Customer Copy</h3>
                    </div>
                    <table class='invoice-table'>
                        <thead>
                            <tr>
                                <th>month</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>";

                        foreach ($charges as $charge) {
                            if ($charge['amount'] > 0) {
                                echo "<tr>
                                          <td>{$charge['month']}</td>
                                        <td>{$charge['description']}</td>
                                        <td>$" . number_format($charge['amount'], 2) . "</td>
                                      </tr>";
                            }
                        }

                echo "</tbody>
                    </table>
                    <div class='invoice-total'>
                        <p>Total Amount: $" . number_format($totalAmount, 2) . "</p>
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
                <label for="month1">Select Month</label>
                <select id="month1" name="month1" class="form-control">
                    <option value="january" <?php echo $months['month1'] === 'january' ? 'selected' : ''; ?>>January</option>
                    <option value="february" <?php echo $months['month1'] === 'february' ? 'selected' : ''; ?>>February</option>
                    <option value="march" <?php echo $months['month1'] === 'march' ? 'selected' : ''; ?>>March</option>
                </select>
            </div>
            <div class="form-row">
                <label for="serviceCharge">Services Charge</label>
                <input type="number" id="serviceCharge" name="serviceCharge" class="form-control" placeholder="Enter amount" value="<?php echo htmlspecialchars($serviceCharge); ?>">
            </div>
        </div>
        <div class="form-section">
            <h5>2. Internet Bill</h5>
            <div class="form-row">
                <label for="month2">Select Month</label>
                <select id="month2" name="month2" class="form-control">
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                   
                </select>
            </div>
            <div class="form-row">
                <label for="internetBill">Internet Bill</label>
                <input type="number" id="internetBill" name="internetBill" class="form-control" placeholder="Enter amount" value="<?php echo htmlspecialchars($internetBill); ?>">
            </div>
        </div>

     
        <div class="form-section">
            <h5>3. Dish Bill</h5>
            <div class="form-row">
                <label for="month3">Select Month</label>
                <select id="month3" name="month3" class="form-control">
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                 
                </select>
            </div>
            <div class="form-row">
                <label for="dishBill">Dish Bill</label>
                <input type="number" id="dishBill" name="dishBill" class="form-control" placeholder="Enter amount" value="<?php echo htmlspecialchars($internetBill); ?>">
            </div>
        </div>

        <div class="form-section">
            <h5>4. Association Flat Rent</h5>
            <div class="form-row">
                <label for="month4">Select Month</label>
                <select id="month4" name="month4" class="form-control">
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                </select>
            </div>
            <div class="form-row">
                <label for="flatRent">Flat Rent</label>
                <input type="number" id="flatRent" name="flatRent" class="form-control" placeholder="Enter amount" value="<?php echo htmlspecialchars($internetBill); ?>">
            </div>
        </div>
        <div class="form-section">
            <h5>5. Common Current Bill</h5>
            <div class="form-row">
                <label for="month5">Select Month</label>
                <select id="month5" name="month5" class="form-control">
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                </select>
            </div>
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
                <label for="month7">Select Month</label>
                <select id="month7"  name="month7" class="form-control">
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                </select>
            </div>
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
