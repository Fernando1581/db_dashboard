<?php
include "db.php";
 
$clients = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM clients"))['c'];
$services = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM services"))['c'];
$bookings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM bookings"))['c'];
 
$revRow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT IFNULL(SUM(amount_paid),0) AS s FROM payments"));
$revenue = $revRow['s'];
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <title>Dashboard</title>
</head>
<body>
<?php include "nav.php"; ?>
  <h2>Dashboard</h2>

  <div class="container">
    
    <div class="card">
      <h3>Total Clients</h3>
      <p><?php echo $clients; ?></p>
    </div>

    <div class="card">
      <h3>Total Services</h3>
      <p><?php echo $services; ?></p>
    </div>

    <div class="card">
      <h3>Total Bookings</h3>
      <p><?php echo $bookings; ?></p>
    </div>

    <div class="card">
      <h3>Total Revenue</h3>
      <p>₱<?php echo number_format($revenue,2); ?></p>
    </div>

  </div>

<div class="quick_links">

  <div class="quick_buttons">
    <a href="/assessment_beginner/pages/clients_add.php" class="quick_btn">
      Add Client
    </a>

    <a href="/assessment_beginner/pages/bookings_create.php" class="quick_btn">
      Create Booking
    </a>
  </div>

  <p class="quick_title">Quick Links</p>

</div>
 
</body>
</html>