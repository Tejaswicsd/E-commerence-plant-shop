<?php
require 'includes/conn.php';
require 'includes/is_added_to_cart.php';
session_start();
require "./includes/head.php";

if (!isset($_SESSION['email'])) {
    echo "<script> location.href='/category.php'; </script>";
    exit();
}

$query = 'SELECT * FROM `products`';
$result = mysqli_query($con, $query);
$sum = mysqli_num_rows($result);
?>

<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>All Products</h2>
                        <p>Home <span>-</span> Buy Products</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cat_product_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Browse Categories</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <li><a href="indoorplants.php">Flowering Indoor Plants</a><span>(3)</span></li>
                                <li><a href="colourfulplants.php">Colourful Foliage Indoor Plants</a><span>(2)</span></li>
                                <li><a href="llightplants.php">Low-Light Indoor Plants</a><span>(2)</span></li>
                                <li><a href="airplants.php">Air Purifying Indoor Plants</a><span>(3)</span></li>
                                <li><a href="trailingplants.php">Trailing Indoor Plants</a><span>(2)</span></li>
                                <li><a href="smallindoor.php">Small Indoor Plants</a><span>(6)</span></li>
                                <li><a href="largeindoor.php">Large Indoor Plants</a><span>(6)</span></li>
                                <li><a href="cactiplants.php">Succulents & Cacti</a><span>(3)</span></li>
                                <li><a href="moistureplants.php">Moisture Loving Indoor Plants</a><span>(2)</span></li>
                                <li><a href="airinplants.php">Air Plants</a><span>(3)</span></li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product_top_bar d-flex justify-content-between align-items-center">
                            <div class="single_product_menu">
                                <p><span><?php echo $sum ?> </span> Product(s) Found</p>
                            </div>
                            <div class="single_product_menu d-flex">
                                <!-- Search Form -->
                                <form method="GET" action="" class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search"
                                           value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>" />
                                    <div class="input-group-prepend">
                                        <button class="btn btn-primary" type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center latest_product_inner">
                    <?php
                    // Search functionality
                    $search_query = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
                    $query = $search_query
                        ? "SELECT * FROM products WHERE title LIKE '%$search_query%'"
                        : "SELECT * FROM products";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $product_id = $row['id']; // Product ID from the database
                            $product_page = "product" . $product_id . ".php"; // Correct URL format: product1.php, product2.php, etc.

                            echo '<div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="single_product_item">
                                        <a href="' . $product_page . '">
                                            <img width="200px" src="img/product/single-product/' . $row['image'] . '" alt="' . $row['title'] . '" />
                                        </a>
                                        <div class="single_product_text">
                                            <h4>' . $row['title'] . '</h4>
                                            <h3>Rs. ' . $row['price'] . '</h3>';
                                            if (!check_if_added_to_cart($row['id'])) {
                                                echo '<a href="scripts/cart_add.php?id=' . $row['id'] . '&qty=1" class="add_cart">+ Add to Cart<i class="ti-heart"></i></a>';
                                            } else {
                                                echo '<a href="#" class="add_cart" disabled>+ Added to Cart<i class="ti-heart"></i></a>';
                                            }
                                        echo '</div>
                                    </div>
                                </div>';
                        }
                    } else {
                        echo '<p class="text-center w-100">No products found for: <strong>' . htmlspecialchars($search_query) . '</strong></p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require './includes/footer.php' ?>

<script src="js/jquery-1.12.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/masonry.pkgd.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/contact.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/stellar.js"></script>
<script src="js/price_rangs.js"></script>
<script src="js/custom.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
