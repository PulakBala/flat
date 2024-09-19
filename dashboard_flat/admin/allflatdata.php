<?php include('connection.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>


<main class="page-content">

  <div class="container-fluid">
    <div class="row">
      <section class="container my-4">
        <div class="card-container">
          <?php
          
          $sqlSelect = "SELECT * FROM flats";
          $result = mysqli_query($conn, $sqlSelect);

          $flat = mysqli_fetch_assoc($result);
          if ($flat) {
            $ownerName = htmlspecialchars($flat['owner_name']);
            $mobileNumber = htmlspecialchars($flat['mobile_number']);
          } else {
            // Handle the case where the flat is not found
            $ownerName = 'Not Found';
            $mobileNumber = 'Not Found';
          }


          while ($data = mysqli_fetch_array($result)) {
          ?>
           
              <div class="card">
                <div class="card-body p-4 shadow-lg rounded" style="background-color: #f8f9fa;">
                  <h5 class="card-title">
                    <span class="fw-bold" style="color: #3498db;">Name:</span>
                    <span class="text-muted"><?php echo $data["owner_name"]; ?></span>
                  </h5>
                  <hr>
                  <p class="card-text">
                    <span class="fw-bold" style="color: #2ecc71;">Mobile Number:</span>
                    <span class="text-muted"><?php echo $data["mobile_number"]; ?></span>
                  </p>
                  <p class="card-text">
                    <span class="fw-bold" style="color: #e74c3c;">Flat No:</span>
                    <span class="text-muted"><?php echo $data["flat_number"]; ?></span>
                  </p>
                  <!-- edit and delete button  -->
                  <a href="edit-flat.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="flat-details.php?id=<?php echo $data["id"]; ?>" class="btn btn-info btn-sm" 
                  >Add Bill</a>
                 
                </div>
              </div>
            
          <?php
          }
          ?>
        </div>
      </section>
    </div>

  </div>
</main>
<?php include('footer.php') ?>