<?php include('connection.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<main class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="form-group col-md-12">
        <div class="container mt-4">

          <?php
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id']; // Changed to match the name used in the form

            // Update the status in the database
            $updateQuery = "UPDATE flat_bill SET f_status = 'Success' WHERE f_id = ?";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
              // Redirect back to the main page
              header('Location: ' . $_SERVER['PHP_SELF']);
              exit();
            } else {
              echo "Error updating status: " . $conn->error;
            }

            $stmt->close();
          }
          ?>

          <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
            <div class="alert alert-success">Status updated successfully!</div>
          <?php endif; ?>

          <?php
          // Fetch all billing records
          $fetchQuery = "SELECT * FROM flat_bill";
          $result = mysqli_query($conn, $fetchQuery);

          echo "<h2>Bill Records</h2>";
          echo "<table class='table table-bordered'>";
          echo "<thead>
            <tr>
                <th>Date</th>
                <th>Month</th>
                <th>Year</th>
                <th>Service Charge</th>
                <th>Internet Bill</th>
                <th>Dish Bill</th>
                <th>Flat Rent</th>
                <th>Common Bill</th>
                <th>Center Rent</th>
                <th>Center Various</th>
                <th>Attic Rent</th>
                <th>Donation</th>
                <th>Development Various</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th> <!-- Added Action column -->
            </tr>
          </thead>";
          echo "<tbody>";

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
              <td>" . htmlspecialchars($row['f_date']) . "</td>
              <td>" . htmlspecialchars($row['f_month']) . "</td>
              <td>" . htmlspecialchars($row['f_year']) . "</td>
              <td>৳" . number_format($row['f_service_charge'], 2) . "</td>
              <td>৳" . number_format($row['f_int_bill'], 2) . "</td>
              <td>৳" . number_format($row['f_dish_bill'], 2) . "</td>
              <td>৳" . number_format($row['f_flat_rent'], 2) . "</td>
              <td>৳" . number_format($row['f_c_current_bill'], 2) . "</td>
              <td>৳" . number_format($row['f_c_center_rent'], 2) . "</td>
              <td>৳" . number_format($row['f_c_center_various'], 2) . "</td>
              <td>৳" . number_format($row['f_atic_rent'], 2) . "</td>
              <td>৳" . number_format($row['f_d_donation'], 2) . "</td>
              <td>৳" . number_format($row['f_d_various_charge'], 2) . "</td>
              <td>৳" . number_format($row['f_total'], 2) . "</td>
              <td>" . htmlspecialchars($row['f_status']) . "</td>
              <td>";
              
            if ($row['f_status'] == 'Pending') {
              echo "<form method='POST' action=''>
                      <input type='hidden' name='id' value='" . $row['f_id'] . "'>
                      <button type='submit' class='btn btn-success'>Success</button>
                    </form>";
            }
            echo "</td>
              </tr>";
          }

          echo "</tbody></table>";

          $conn->close();
          ?>
        </div>

        <!-- Include Font Awesome for icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      </div>
    </div>
  </div>
</main>
<?php include('footer.php'); ?>
