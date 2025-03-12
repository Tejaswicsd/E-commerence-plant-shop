<?php
session_start();

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
    // Admin actions: Confirm or Reset slots
    $slot_id = intval($_POST['slot_id']);
    $action = $_POST['action'];

    if ($action === 'confirm') {
        // Confirm a booked slot
        $update_query = "UPDATE slots SET status = 'Confirmed' WHERE id = $slot_id AND status = 'Booked'";
        if (mysqli_query($con, $update_query)) {
            $message = "Slot successfully confirmed!";
        } else {
            $message = "Error confirming the slot: " . mysqli_error($con);
        }
    } elseif ($action === 'reset') {
        // Reset the slot back to available
        $update_query = "UPDATE slots SET status = 'Available', booked_by = NULL WHERE id = $slot_id";
        if (mysqli_query($con, $update_query)) {
            $message = "Slot successfully reset!";
        } else {
            $message = "Error resetting the slot: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Slot Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .message {
            text-align: center;
            margin: 20px 0;
            font-size: 1.2em;
            color: #28a745;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #007BFF;
            color: white;
        }
        .btn {
            padding: 8px 15px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-confirm {
            background-color: #28a745;
            color: white;
        }
        .btn-reset {
            background-color: #dc3545;
            color: white;
        }
        .btn-confirm:hover {
            background-color: #218838;
        }
        .btn-reset:hover {
            background-color: #c82333;
        }
        .status-available {
            color: green;
            font-weight: bold;
        }
        .status-booked {
            color: orange;
            font-weight: bold;
        }
        .status-confirmed {
            color: blue;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Admin Panel - Manage Slots</h1>

    <?php if (!empty($message)): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Slot ID</th>
                <th>Slot Time</th>
                <th>Status</th>
                <th>Booked By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['slot_time']); ?></td>
                    <td class="status-<?php echo strtolower($row['status']); ?>">
                        <?php echo htmlspecialchars($row['status']); ?>
                    </td>
                    <td>
                        <?php echo $row['booked_by'] ? $row['booked_by'] : 'N/A'; ?>
                    </td>
                    <td>
                        <?php if ($row['status'] === 'Booked'): ?>
                            <form method="POST" style="display: inline-block;">
                                <input type="hidden" name="slot_id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="action" value="confirm">
                                <button type="submit" class="btn btn-confirm">Confirm</button>
                            </form>
                        <?php endif; ?>
                        <?php if ($row['status'] !== 'Available'): ?>
                            <form method="POST" style="display: inline-block;">
                                <input type="hidden" name="slot_id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="action" value="reset">
                                <button type="submit" class="btn btn-reset">Reset</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
