<?php
include('config.php');
include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Expense Management System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">



    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Template Stylesheet -->
    <link href="css/style.css?v=<?php echo time(); ?> type=" text/css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <div class="sidebar pe-5 pb-3">
        <nav class="navbar navbar-light">
            <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                <h3 class="text-light pt-5"><i class="fa-solid fa-wallet me-2"></i>Spend Easy</h3>
            </a>

            <div class="navbar-nav w-100">
                
                    <?php
                        if($_SESSION['UROLE']=='User') {
                       ?>
                    <a href="dashboard.php"
                            class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="about.php"
                            class="nav-item nav-link"><i class="fa fa-solid fa-user me-2"></i>About</a>
                    <a href="expense.php"
                            class="nav-item nav-link"><i class="fa fa-indian-rupee-sign me-2"></i>Expense</a>
                        <a href="reports.php"
                            class="nav-item nav-link"><i class="fa fa-solid fa-chart-column me-2"></i>Reports</a>
                    <?php } else { ?>
                        <a href="category.php"
                            class="nav-item nav-link"><i class="fa fa-solid fa-bars me-2"></i>Category</a>
                        <a href="users.php" class="nav-item nav-link"><i class="fa fa-solid fa-users me-2"></i>Users</a>
                    <?php } ?>
                        <a href="logout.php"
                            class="nav-item nav-link"><i class="fa fa-solid fa-right-from-bracket me-2"></i>Logout</a>
            </div>
        </nav>
    </div>
    <nav class="navbar top-navbar navbar-expand bg-light navbar-light sticky-top px-3 py-3">
        <div class="container-fluid">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                    </a>   
                            
                    
            </nav>
    <div class="container">
            <!-- Navbar Start -->
   