<?php
session_start();
require "./includes/head.php";
require "./includes/conn.php";

$password = ""; // Initialize variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $query = "SELECT password FROM users WHERE email='$email'";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $password = $row['password']; // Get stored MD5 password
    } else {
        $password = "No account found with this email!";
    }
}
?>

<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Forgot Password</h2>
                        <p>Home <span>-</span> Retrieve Password</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="login_part padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Retrieve Your Password</h3>
                        <form method="post" action="">
                            <div class="col-md-12 form-group p_star">
                                <input type="email" class="form-control" name="email" placeholder="Enter your email" required />
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" class="btn_3">Retrieve Password</button>
                            </div>
                        </form>

                        <?php if (!empty($password)) { ?>
                            <div class="alert alert-info">
                                <strong>Your Password:</strong> <?php echo $password; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require "./includes/footer.php"; ?>
