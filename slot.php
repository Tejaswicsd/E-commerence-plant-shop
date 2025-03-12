<?php 
    session_start();
    require "./includes/head.php";
?>

<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Gardening Slot Booking</h2>
                        <p>Home <span>-</span> Slot Booking</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Database connection
$con = mysqli_connect("localhost", "root", "", "plantshop");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all slots
$query = "SELECT * FROM slots";
$result = mysqli_query($con, $query);

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Booking logic
    $slot_id = intval($_POST['slot_id']);
    $user_id = 1; // Replace this with the actual logged-in user's ID (e.g., from session)

    // Check if the slot is available
    $check_query = "SELECT * FROM slots WHERE id = $slot_id";
    $check_result = mysqli_query($con, $check_query);
    $slot = mysqli_fetch_assoc($check_result);

    if ($slot && $slot['status'] === 'Available') {
        // Update the slot to booked
        $update_query = "UPDATE slots SET status = 'Booked', booked_by = $user_id WHERE id = $slot_id";
        if (mysqli_query($con, $update_query)) {
            $message = "Slot successfully booked!";
        } else {
            $message = "Error booking the slot: " . mysqli_error($con);
        }
    } else {
        $message = "This slot is no longer available!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slot Booking - Gardening</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px;
        }
        h1 {
            font-size: 36px;
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }
        .breadcrumb_iner_item h2 {
            font-size: 28px;
            color: #333;
        }
        .slot-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
            margin: 30px 0;
        }
        .slot {
            padding: 20px;
            border: 1px solid #ddd;
            text-align: center;
            border-radius: 10px;
            width: 200px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        .slot:hover {
            transform: scale(1.05);
        }
        .slot.available {
            background-color: black;
            color: white;
            cursor: pointer;
        }
        .slot.booked {
            background-color: blue;
            color: white;
            cursor: not-allowed;
        }
        .slot h4 {
            margin: 10px 0;
            font-size: 20px;
        }
        .slot p {
            margin: 10px 0;
            font-size: 16px;
        }
        .slot button {
            padding: 10px 15px;
            border: none;
            background: #007BFF;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .slot button:hover {
            background: #0056b3;
        }
        .message {
            text-align: center;
            margin: 20px;
            font-size: 1.2em;
            color: #4CAF50;
        }
        .slot-time {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Book Your Gardening Slot</h1>

        <?php if (!empty($message)): ?>
            <div class="message">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div class="slot-container">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="slot <?php echo strtolower($row['status']); ?>">
                    <h4><?php echo htmlspecialchars($row['slot_time']); ?></h4>
                    <p class="slot-time"><?php echo date("l, F j, Y", strtotime($row['slot_date'])); ?></p>
                    <?php if ($row['status'] === 'Available'): ?>
                        <form method="POST">
                            <input type="hidden" name="slot_id" value="<?php echo $row['id']; ?>">
                            <button type="submit">Book Slot</button>
                        </form>
                    <?php else: ?>
                        <p><?php echo htmlspecialchars($row['status']); ?></p>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php require "./includes/footer.php"; ?>

    <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
