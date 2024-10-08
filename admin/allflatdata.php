<style>
  /* .allflat{
    display: flex;
  } */
  .container {
    /* border: 1px solid red; */
    display: flex;
    justify-content: end;
  }

  .card-container {
   
    display: grid;
    gap: 15px;
    /* margin-right: -100px; */
    padding: 0;
  }

  .card {
    padding: 20px;
    transition: all 0.3s ease-in-out;
  }

  .card-link {
    text-decoration: none;
  }

  /* Custom grid for larger desktops */
  @media (min-width: 1280px) {
    .card-container {
      width: 80%;
      grid-template-columns: repeat(3, 1fr);
      /* margin-left: 200px; */
      /* 4 cards per row */
    }
  }

  /* Custom grid for laptops and small desktops (769px - 1279px) */
  @media (min-width: 769px) and (max-width: 1279px) {
    .card-container {
      width: 70%;
      grid-template-columns: repeat(3, 1fr);
      /* 3 cards per row */

    }
  }

  /* Custom grid for tablets and larger smartphones (481px - 768px) */
  @media (min-width: 481px) and (max-width: 768px) {
    .card-container {
      grid-template-columns: repeat(2, 1fr);
      /* 2 cards per row */
    }
  }

  /* Custom grid for smaller devices (0px - 480px) */
  @media (max-width: 480px) {
    .card-container {
      grid-template-columns: 1fr;
      /* 1 card per row */
    }

    .card {
      font-size: 0.9rem;
      /* Reduce font size slightly */
      padding: 10px;
    }

  }
</style>

<div class="allflat">
  <div>
    <?php
    include('./templates/sidebar.php');
    ?>
  </div>
  <section class="container my-4">
    <div class="card-container">
      <?php
      include('connection.php');
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
        <a href="flat-details.php?id=<?php echo $data["id"]; ?>"  class="card-link">
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
            </div>
          </div>
        </a>
      <?php
      }
      ?>
    </div>
  </section>
</div>

<?php
include('templates/footer.php');
?>