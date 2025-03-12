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
        <div class="container jumbotron bg-light my-4 p-4 text-center">
            <h1 class="display-4">All Customers</h1>
        </div>

        <div class="container">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = 'SELECT * FROM `users`';
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['mobile']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>
                                <a href='scripts/delete_script_user.php?id=" . htmlspecialchars($row['id']) . "'>
                                    <button type='button' class='btn btn-danger btn-sm'>Delete</button>
                                </a>
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
