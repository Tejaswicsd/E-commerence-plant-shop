<?php
session_start();
require "./includes/head.php";
require './includes/conn.php';

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
            <h2>My Orders</h2>
            <p>Home <span>-</span> All Orders</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="confirmation_part padding_top">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="order_details_iner">
          <h3>My Order</h3>
          <br><br>
          <div class="table-responsive">
            <table class="table table-bordered text-center">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Order Id</th>
                  <th scope="col">Order Date</th>
                  <th scope="col">Product</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Order Total</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $user_id = $_SESSION['user_id'];
                $allOrders = "SELECT orders.id, orders.order_date, products.title, orders.product_qty, orders.order_amount, orders.status 
                              FROM orders, products 
                              WHERE user_id='$user_id' AND orders.product_id=products.id";
                $orderresult = mysqli_query($con, $allOrders);

                while($row = mysqli_fetch_array($orderresult)){
                  echo '<tr>
                          <td>'.$row['id'].'</td>
                          <td>'.$row['order_date'].'</td>
                          <td>'.$row['title'].'</td>
                          <td>'.$row['product_qty'].'</td>
                          <td>Rs. '.$row['order_amount'].'</td>
                          <td>'.$row['status'].'</td>
                        </tr>';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require './includes/footer.php'; ?>

<style>
  /* Responsive styles */
  @media (max-width: 768px) {
    .breadcrumb_iner_item h2 {
      font-size: 1.5rem;
    }

    .breadcrumb_iner_item p {
      font-size: 1rem;
    }

    .table-responsive {
      font-size: 0.9rem;
    }

    .table th, .table td {
      padding: 0.5rem;
    }
  }

  @media (max-width: 576px) {
    .breadcrumb_iner_item h2 {
      font-size: 1.2rem;
    }

    .breadcrumb_iner_item p {
      font-size: 0.9rem;
    }
  }
</style>

<!-- JavaScript Libraries -->
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
