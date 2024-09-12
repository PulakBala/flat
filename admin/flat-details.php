<?php 
  // include('templates/sidebar.php')
?>


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

    // Calculate total amount
    $totalAmount = $serviceCharge + $internetBill + $dishBill + $flatRent + $commonBill + $centerRent + $centerVarious + $atticRent + $donation + $developmentVarious;
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
                <select id="month1" class="form-control">
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
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
                <select id="month2" class="form-control">
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
                <select id="month3" class="form-control">
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
                <select id="month4" class="form-control">
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
                <select id="month5" class="form-control">
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
                <select id="month7" class="form-control">
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

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
