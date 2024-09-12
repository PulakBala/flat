<?php
include('templates/sidebar.php');
include('templates/header.php')
?>
<style>
  .create-form {

    display: flex;
    justify-content: center;
    margin-left: 600px;
  }

  .form {

    background: linear-gradient(135deg, #74ebd5, #9face6);
    /* Gradient background for full-screen effect */

  }

  .form {
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.2);
  }

  .form input {
    padding: 15px;
    font-size: 1rem;
    border: 2px solid #3498db;
    border-radius: 10px;
    transition: all 0.3s ease-in-out;
  }

  .form input:focus {
    border-color: #2ecc71;
    box-shadow: 0 0 10px rgba(46, 204, 113, 0.5);
    outline: none;
  }

  .form h2 {
    font-size: 2rem;
    font-weight: bold;
    color: #2c3e50;
  }

  .btn {
    padding: 15px;
    background: #3498db;
    border: none;
    border-radius: 20px;
    transition: all 0.3s ease-in-out;
  }

  .btn:hover {
    background: #2ecc71;
    transform: scale(1.05);
  }

  @media (max-width: 768px) {
    .form {
      width: 100%;
      padding: 30px;
    }
  }
</style>
<div class="create-form">
  <section class="addnewflat">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <div class="container">
      <div class="content">

        <?php
        // success মেসেজ চেক করা
        if (isset($_GET['status']) && $_GET['status'] == 'success') {
          echo "<div id='success-messsage' class='alert alert-success'>New flat added successfully!</div>";
        }
        ?>

        <div class="contact-form-wrapper d-flex justify-content-center mx-auto align-items-center vh-100">
          <form class="form p-5 shadow-lg rounded" action="proces.php" method="POST">
            <h2 class="text-center mb-4 text-uppercase" style="letter-spacing: 2px; color: #3498db;">ADD NEW FLAT</h2>
            <div class="mb-3">
              <input type="text" name="owner" class="form-control" placeholder="Owner Name" required>
            </div>
            <div class="mb-3">
              <input type="tel" name="tel" class="form-control" placeholder="Phone number" required>
            </div>
            <div class="mb-3">
              <input type="text" name="flatno" class="form-control" placeholder="Flat Number" required>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary w-100" style=" font-size: 1.2rem;">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <script>
      setTimeout(function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
          successMessage.style.display = 'none';
        }
      }, 10000); // 10 seconds
    </script>
  </section>
</div>
<?php
include('templates/footer.php')
?>