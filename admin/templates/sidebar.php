<?php include('header.php') ?>
<!-- Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .sidebar {
        width: 18%; /* Wider sidebar */
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background: linear-gradient(135deg, #1c1f2b, #1f1f1f); /* Dark gradient background */
        box-shadow: 3px 0 10px rgba(0, 0, 0, 0.2); /* Sidebar shadow */
        overflow: hidden;
        padding-top: 20px;
        /* border: 1px solid palegreen; */
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
</style>


<div class="sidebar bg-dark vh-100 p-3">
    <h1 class="mb-4">
        <a href="#" class="sidebar-link  text-decoration-none d-flex align-items-center">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
    </h1>
    <h1 class="mb-4">
        <a href="../admin/create.php" class="sidebar-link  text-decoration-none d-flex align-items-center">
            <i class="bi bi-plus-square-fill me-2"></i> ADD NEW FLAT
        </a>
    </h1>
    <h1 class="mb-4">
        <a href="../admin/allflatdata.php" class="sidebar-link  text-decoration-none d-flex align-items-center">
            <i class="bi bi-list-ul me-2"></i> ALL FLAT
        </a>
    </h1>
    <h1 class="mb-4">
        <a href="../admin/flat-details.php" class="sidebar-link  text-decoration-none d-flex align-items-center">
            <i class="bi bi-building me-2"></i> FLAT DETAILS
        </a>
    </h1>
    <h1 class="mb-4">
        <a href="../admin/accounts.php" class="sidebar-link  text-decoration-none d-flex align-items-center">
            <i class="bi bi-people-fill me-2"></i> ACCOUNTS
        </a>
    </h1>
</div>