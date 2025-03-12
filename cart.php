<?php
session_start();
require './includes/conn.php';
require "./includes/head.php";

if (!isset($_SESSION['email'])) {
    echo "<script> location.href='/ecommerce'; </script>";
    exit();
}
?>

<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Cart Products</h2>
                        <p>Home <span>-</span>Cart Products</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$sum = 0;
$user_id = $_SESSION['user_id'];
$query = 'SELECT products.price, products.id, products.title, products.image, cart.qty from cart, products where products.id = cart.product_id and cart.user_id="' . $user_id . '"';

$result = mysqli_query($con, $query);
?>

<section id="cart" class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            echo '
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="img/product/' . $row['image'] . '" alt="' . $row['title'] . '" class="img-fluid"/>
                                            </div>
                                            <div class="media-body">
                                                <p>' . $row['title'] . '</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>Rs. ' . $row['price'] . '</h5>
                                    </td>
                                    <td>
                                        <div class="product_count d-flex align-items-center">
                                            <h5>' . $row['qty'] . '</h5>&nbsp;&nbsp;
                                            <a href="scripts/cart_remove.php?id=' . $row['id'] . '&qty=1" class="btn btn-outline-danger btn-sm">&#10005;</a>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>Rs. ' . $row['qty'] * $row['price'] . '</h5>
                                    </td>
                                </tr>';
                            $sum = $sum + $row['qty'] * $row['price'];
                        }
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>Rs. <?php echo $sum ?></h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="checkout_btn_inner text-center">
                    <a class="btn btn-primary btn-sm mb-2" href="category.php">Continue Shopping</a>
                    <a class="btn btn-primary btn-sm checkout_btn_1" href="checkout.php">Proceed to checkout</a>
                </div>
            </div>
        </div>
</section>

<?php require './includes/footer.php' ?>

<!-- Include Bootstrap and jQuery dependencies for responsiveness -->
<script src="js/jquery-1.12.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
