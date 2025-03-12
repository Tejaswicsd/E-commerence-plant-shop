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
                <h1 class="display-4">Customer Orders</h1>
            </div>
        </div>

        <div class="container my-4">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Order Id</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Product Id</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Id</th>
                            <th scope="col">Order Amount</th>
                            <th scope="col">Order Status</th>
                            <th scope="col" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = 'SELECT orders.id, orders.order_date, orders.product_id, orders.status, orders.user_id, orders.order_amount, 
                                    products.title, products.image, users.first_name, users.last_name 
                                  FROM orders 
                                  JOIN products ON orders.product_id = products.id 
                                  JOIN users ON orders.user_id = users.id 
                                  ORDER BY orders.id';
                        
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['order_date'] . "</td>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td><img src='../img/product/" . $row['image'] . "' class='img-thumbnail' style='width: 80px; height: auto;' /></td>";
                            echo "<td>" . $row['product_id'] . "</td>";
                            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>Rs. " . $row['order_amount'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>
                                    <a href='scripts/order_shipped.php?id=" . $row['id'] . "' class='btn btn-success btn-sm'>Shipped</a>
                                  </td>";
                            echo "<td>
                                    <a href='scripts/order_delivered.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Delivered</a>
                                  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
