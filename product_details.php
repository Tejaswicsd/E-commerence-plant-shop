<?php
require 'includes/conn.php';
session_start();
require "./includes/head.php";

// Check if product ID is passed in the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $query = "SELECT * FROM `products` WHERE `id` = $product_id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_array($result);
    } else {
        echo "<script> location.href='plants/ecommerce/product_details.php'; </script>";
        exit();
    }
} else {
    echo "<script> location.href='plants/ecommerce/product_details.php'; </script>";
    exit();
}
?>

<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Product Details</h2>
                        <p>Home <span>-</span> Product Details</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product_details_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="product_details_img">
                    <img src="img/product/<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>" />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="product_details_text">
                    <h3><?php echo $product['title']; ?></h3>
                    <p><strong>Description:</strong> <?php echo $product['description']; ?></p>
                    <h4>Price: Rs. <?php echo $product['price']; ?></h4>
                    <?php
                        if (!check_if_added_to_cart($product['id'])) {
                            echo '<a href="scripts/cart_add.php?id='.$product['id'].'&qty=1" class="add_cart">+ Add to Cart</a>';
                        } else {
                            echo '<a href="#" class="add_cart" disabled>+ Added to Cart</a>';
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
</body>
</html>
