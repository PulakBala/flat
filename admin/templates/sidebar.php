
<?php include('header.php') ?>
<style>
    .sidebar {
        width: 18%;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        background: linear-gradient(135deg, #1c1f2b, #1f1f1f); 
        box-shadow: 3px 0 10px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        padding-top: 20px;
       
    }

    .sidebar h1 {
        border-bottom: 1px solid #444; /* Subtle divider */
        font-size: 1.2rem; 
        background-color: transparent;
    }

    .sidebar-link {
        padding: 15px 10px;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        gap: 10px;
        color: #dcdcdc;
        transition: background-color 0.3s ease, color 0.3s ease;
        border-radius: 8px; /* Rounded links */
    }

    .sidebar-link:hover {
        background-color: #dcdcdc;
        color: black;
    }

    .bi {
        font-size: 1.3rem; /* Adjust icon size */
    }
    .dropdown {
            position: relative;
            display: block;
            margin-bottom: 10px;
        }

        .dropdown-button {
            padding: 15px 10px;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #dcdcdc;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-radius: 8px;
            text-decoration: none;
            background: transparent;
            border: none;
            cursor: pointer;
            width: 100%;
            text-align: left;
        }

        .dropdown-button:hover {
            background-color: #dcdcdc;
            color: black;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #1f1f1f;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.2);
            min-width: 100%;
            z-index: 1;
            top: 100%;
            left: 0;
        }

        .dropdown-content a {
            padding: 10px 15px;
            display: block;
            color: #dcdcdc;
            text-decoration: none;
        }

        .dropdown-content a:hover {
            background-color: #dcdcdc;
            color: black;
        }

        .dropdown.open .dropdown-content {
            display: block;
        }

        .dropdown-icon {
            margin-left: auto;
            transition: transform 0.3s ease;
        }

        .dropdown.open .dropdown-icon {
            transform: rotate(180deg);
        }
</style>


<div class="sidebar bg-dark vh-100 p-3">
    <h1 class="mb-4">
        <a href="../admin/index.php" class="sidebar-link text-decoration-none d-flex align-items-center">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
    </h1>
    <h1 class="mb-4">
        <a href="../admin/create.php" class="sidebar-link text-decoration-none d-flex align-items-center">
            <i class="bi bi-plus-square-fill me-2"></i> ADD NEW FLAT
        </a>
    </h1>
    <h1 class="mb-4">
        <a href="../admin/allflatdata.php" class="sidebar-link text-decoration-none d-flex align-items-center">
            <i class="bi bi-list-ul me-2"></i> ALL FLAT
        </a>
    </h1>
    <h1 class="mb-4">
        <a href="../admin/flat-details.php" class="sidebar-link text-decoration-none d-flex align-items-center">
            <i class="bi bi-building me-2"></i> FLAT DETAILS
        </a>
    </h1>
    <!-- Accounts Section with Dropdown --> 
        <div class="dropdown" id="accountsDropdown">
            <button class="dropdown-button" onclick="toggleDropdown('accountsDropdown')">
                <i class="bi bi-people-fill me-2"></i> ACCOUNTS
                <span class="dropdown-icon">&#9662;</span>
            </button>
            <div class="dropdown-content">
                <a href="../admin/accounts.php"><i class="bi bi-people-fill me-2"></i> ACCOUNTS</a>
                <a href="../admin/reserved-cash.php"><i class="bi bi-people-fill me-2"></i> COLLECTION</a>
                <a href="../admin/add-expense.php"><i class="bi bi-people-fill me-2"></i> ADD EXPANSE</a>
            </div>
        </div>
        
        <!-- Reserved Section with Dropdown -->
        <!-- <div class="dropdown" id="reservedDropdown">
            <button class="dropdown-button" onclick="toggleDropdown('reservedDropdown')">
                <i class="bi bi-people-fill me-2"></i> RESERVED
                <span class="dropdown-icon">&#9662;</span>
            </button>
            <div class="dropdown-content">
                <a href="../admin/cash-in.php"><i class="bi bi-people-fill me-2"></i> CASH IN</a>
                <a href="../admin/reserved-cash.php"><i class="bi bi-people-fill me-2"></i> CASH OUT</a>
                <a href="../admin/account-settings.php"><i class="bi bi-people-fill me-2"></i> CASH REPORT</a>
            </div>
        </div> -->

        
</div>

<script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('open');
            
            // Close other dropdowns
            document.querySelectorAll('.dropdown').forEach(function(d) {
                if (d !== dropdown) {
                    d.classList.remove('open');
                }
            });
        }

        // Optional: Close the dropdown if clicking outside of it
        document.addEventListener('click', function(event) {
            document.querySelectorAll('.dropdown').forEach(function(dropdown) {
                if (!dropdown.contains(event.target)) {
                    dropdown.classList.remove('open');
                }
            });
        });
    </script>
