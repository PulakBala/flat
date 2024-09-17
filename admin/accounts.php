<style>
    .dashboard-section {
        display: flex;
        justify-content: space-between;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        text-align: center;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 1.25rem;
    }

    .icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #007bff;
    }

    .card-header {
        background-color: #f8f9fa;
    }
    .form-container {
            max-width: 500px;
           
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #45a049;
        }
</style>

<div class="dashboard-section">
    <div style="width: 20%;">
        <?php
        include('./templates/sidebar.php');
        ?>
</div>

    <div class="container mt-4" style="width: 80%;">
        <div class="row">
            <!-- Bill Paid Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <i class="icon fas fa-check-circle"></i>
                        <h5 class="card-title"> TOTAL COLLECTION</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">$1,234.56</p>
                        <p class="card-text">TEXT</p>
                    </div>
                </div>
            </div>

            <!-- Expense Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <i class="icon fas fa-credit-card"></i>
                        <h5 class="card-title">MONTHLY COLLECTION</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">$987.65</p>
                        <p class="card-text">TEXT</p>
                    </div>
                </div>
            </div>
            

            <!-- Collection Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <i class="icon fas fa-hand-holding-usd"></i>
                        <h5 class="card-title">MONTHLY EXPANSE</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">$1,456.78</p>
                        <p class="card-text">Total collections this YEAR</p>
                    </div>
                </div>
            </div>

            
        </div>
    </div>

</div>

