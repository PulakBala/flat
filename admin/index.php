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
                        <h5 class="card-title">Bill Paid</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">$1,234.56</p>
                        <p class="card-text">Total amount paid this month</p>
                    </div>
                </div>
            </div>

            <!-- Expense Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <i class="icon fas fa-credit-card"></i>
                        <h5 class="card-title">Total Expense</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">$987.65</p>
                        <p class="card-text">Total expenses this month</p>
                    </div>
                </div>
            </div>
            

            <!-- Collection Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <i class="icon fas fa-hand-holding-usd"></i>
                        <h5 class="card-title">Collection</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">$1,456.78</p>
                        <p class="card-text">Total collections this month</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

