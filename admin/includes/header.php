<?php require 'conn.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/ecommerce/admin/index.php"><h1>Admin Panel</h1></a>

        <!-- Toggler for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Add additional navigation links here if needed -->
            </ul>

            <div class="d-flex">
                <ul class="navbar-nav">
                    <?php
                    if (isset($_SESSION['admin_email'])) {
                        echo '<li class="nav-item">
                                <a class="nav-link" href="scripts/logout_script.php">
                                    <button type="button" class="btn btn-primary">Logout</button>
                                </a>
                              </li>';
                    } else {
                        echo '<li class="nav-item">
                                <a class="nav-link" href="login.php">
                                    <button type="button" class="btn btn-primary">Login</button>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="register.php">
                                    <button type="button" class="btn btn-primary">Sign Up</button>
                                </a>
                              </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Uncomment this sidebar section for responsive design if needed -->

<div class="sidebar d-none d-lg-block bg-light p-3">
    <a class="active" href="#">Home</a>
    <a href="product.php">Product Master</a>
    <a href="order.php">Order Master</a>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6sT/RktM+PqnG5T9VhKjRHx1YWqlZfl4H+8ABh9hZT9HjS+czwv" crossorigin="anonymous"></script>
</body>
</html>
