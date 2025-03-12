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
                        <h2>Shop Single</h2>
                        <p>Home <span>-</span> Shop Single</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="product_image_area section_padding" style="color: black;">
    <div class="container">
        <div class="row s_product_inner justify-content-between">
            <div class="col-lg-7 col-xl-7">
                <div class="product_slider_img">
                    <div id="vertical">
                        <div data-thumb="img/product/single-product/product_2.png">
                            <img src="img/product/single-product/product_2.png" />
                        </div>
                        <div data-thumb="img/product/single-product/product_2.png">
                            <img src="img/product/single-product/product_2.png" />
                        </div>
                        <div data-thumb="img/product/single-product/product_2.png">
                            <img src="img/product/single-product/product_2.png" />
                        </div>
                        <div data-thumb="img/product/single-product/product_2.png">
                            <img src="img/product/single-product/product_2.png" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="s_product_text" style="color: black;">
                    <h5 style="color: black;">previous <span>|</span> next</h5>
                    <h3 style="color: black;">Bromeliad Summer</h3>
                    <h2 style="color: black;">$149.99</h2>
                    <ul class="list" style="color: black;">
                        <li>
                            <a class="active" href="#" style="color: black;">
                                <span>Category</span> : Household</a>
                        </li>
                        <li>
                            <a href="#" style="color: black;"> <span>Availibility</span> : In Stock</a>
                        </li>
                    </ul>
                    <p style="color: black;">
                    The Bromeliad Summer is a vibrant bromeliad that is technically an air plant. 
                    This stunning tropical plant produces colorful blooms ad will add a splash of color to any space. 
                    Native to Mexico, the south-eastern United States, and the Caribbean, Tillandsias typically grow on trees as epiphytes. 
                    As a result, they have minimal or no roots and absorb most of their nutrients through their foliage.
                    </p>
                    <div class="card_area d-flex justify-content-between align-items-center">
                        <div class="product_count" style="color: black;">
                            <span class="inumber-decrement" style="color: black;">
                                <i class="ti-minus"></i></span>
                            <input class="input-number" type="text" value="1" min="0" max="10" style="color: black;" />
                            <span class="number-increment" style="color: black;"> <i class="ti-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Include necessary JS files (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<section class="product_list best_seller">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Best Sellers <span>shop</span></h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <div class="single_product_item">
                        <img src="img/product/product_1.png" alt="" />
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="img/product/product_2.png" alt="" />
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="img/product/product_3.png" alt="" />
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="img/product/product_4.png" alt="" />
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="img/product/product_5.png" alt="" />
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
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

<script src="js/lightslider.min.js"></script>

<script src="js/masonry.pkgd.js"></script>

<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>

<script src="js/slick.min.js"></script>
<script src="js/swiper.jquery.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/contact.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/stellar.js"></script>

<script src="js/theme.js"></script>
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
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7721ac083e913390","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}' crossorigin="anonymous"></script>
</body>

</html>