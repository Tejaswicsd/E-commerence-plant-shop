<?php
require 'includes/conn.php';
session_start();

if (!isset($_SESSION['admin_email'])) {
    echo "<script> location.href='plants/ecommerce/admin/login.php'; </script>";
    exit();
}
require "includes/header.php";
?>

<div class="mainContainer d-flex">
    <?php require "includes/sidebar.php"; ?>

    <div class="allContainer flex-grow-1 p-3">
        <div class="container my-4">
            <div class="jumbotron bg-light p-4 text-center">
                <h1 class="display-4">Add Product</h1>
            </div>
        </div>

        <div class="container my-4">
            <form class="row g-3" action="manage/addproduct.php" method="POST" enctype="multipart/form-data">
                <div class="col-md-6 col-lg-4">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                </div>

                <div class="col-md-6 col-lg-4">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" name="category" class="form-select" required>
                        <option selected>Select a category</option>
                        <option value="Flowering Indoor Plants">Flowering Indoor Plants</option>
                        <option value="Colourful Foliage Indoor Plants">Colourful Foliage Indoor Plants</option>
                        <option value="Low-Light Indoor Plants">Low-Light Indoor Plants</option>
                        <option value="Air Purifying Indoor Plants">Air Purifying Indoor Plants</option>
                        <option value="Trailing Indoor Plants">Trailing Indoor Plants</option>
                        <option value="Small Indoor Plants">Small Indoor Plants</option>
                        <option value="Large Indoor Plants">Large Indoor Plants</option>
                        <option value="Moisture Loving Indoor Plants">Moisture Loving Indoor Plants</option>
                        <option value="Succulents & Cacti">Succulents & Cacti</option>
                        <option value="Air Plants">Air Plants</option>
                    </select>
                </div>

                <div class="col-md-6 col-lg-4">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="price" required>
                </div>

                <div class="col-md-6 col-lg-4">
                    <label for="qty" class="form-label">Quantity</label>
                    <input type="number" name="qty" class="form-control" id="qty" required>
                </div>

                <div class="col-md-6 col-lg-4">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="image" required>
                </div>

                <div class="col-md-12">
                    <label for="desc" class="form-label">Description</label>
                    <textarea name="desc" class="form-control" id="desc" rows="3" required></textarea>
                </div>

                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
