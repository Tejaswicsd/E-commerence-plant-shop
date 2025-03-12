<?php require 'conn.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>thegreenleaving</title>
    <link rel="icon" href="img/favicon.png" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/nice-select.css" />
    <link rel="stylesheet" href="css/lightslider.min.css" />
    <link rel="stylesheet" href="css/all.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/slick.css" />
    <link rel="stylesheet" href="css/price_rangs.css" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- FontAwesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
        .navbar-brand img {
            max-width: 50%;
            height: auto;
        }
        @media (max-width: 991px) {
            .header_icons {
                padding: 10px 0;
            }
        }
    </style>
</head>

<body>
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="/ecommerce" style="display: inline-block; max-width: 50%; height: auto;">
    <img src="img/logo.png" alt="logo" style="max-width: 50%; height: auto;" />
</a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>
                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="category.php">Products</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="header_icons d-flex align-items-center">
    <?php
        $mail = isset($_SESSION['email']) ? $_SESSION['email'] : '';
        $name = '';

        $query = 'SELECT * FROM users';
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            if ($row['email'] == $mail) {
                $name = $row['first_name'] . " " . $row['last_name'];
            }
        }

        if (isset($_SESSION['email'])) {
            echo '
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown_3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ' . $name . '
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown_3">
                        <li><a class="dropdown-item" href="allorders.php">My Orders</a></li>
                        <li><a class="dropdown-item" href="tracking.php">Tracking</a></li>
                        <li><a class="dropdown-item" href="slot.php">Slot Booking</a></li>
                        <li><a class="dropdown-item" href="scripts/logout_script.php">Logout</a></li>
                    </ul>
                </div>
                <a href="cart.php" class="ms-3">
                    <i class="fas fa-cart-plus"></i>
                </a>';
        } else {
            echo '
                <div class="nav-item">
                    <a href="login.php"><button class="btn nav-link custom">Login</button></a>
                </div>
                <div class="nav-item ms-2">
                    <a href="register.php"><button class="btn nav-link custom">Sign Up</button></a>
                </div>';
        }
    ?>
</div>

                    </nav>
                </div>
            </div>
        </div>
        
    </header>
</body>
</html>
