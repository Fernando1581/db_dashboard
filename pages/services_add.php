<?php
include "../db.php";
 
$message = "";
 
if (isset($_POST['save'])) {
  $service_name = $_POST['service_name'];
  $description = $_POST['description'];
  $hourly_rate = $_POST['hourly_rate'];
  $is_active = $_POST['is_active'];
 
  // simple validation
  if ($service_name == "" || $hourly_rate == "") {
    $message = "Service name and hourly rate are required!";
  } else if (!is_numeric($hourly_rate) || $hourly_rate <= 0) {
    $message = "Hourly rate must be a number greater than 0.";
  } else {
    $sql = "INSERT INTO services (service_name, description, hourly_rate, is_active)
            VALUES ('$service_name', '$description', '$hourly_rate', '$is_active')";
    mysqli_query($conn, $sql);
 
    header("Location: services_list.php");
    exit;
  }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/assessment_beginner/style.css">
    <title>Add Service</title>
</head>
<body>
<?php include "../nav.php"; ?>

<div class="edit_services">
  <h2>Add Service</h2>
  <p style="color:red;"><?php echo $message; ?></p>
  
  <form method="post">
    <label>Service Name*</label>
    <input type="text" name="service_name">
  
    <label>Description</label>
    <textarea name="description" rows="4" cols="40"></textarea>
  
    <label>Hourly Rate (₱)*</label>
    <input type="text" name="hourly_rate">
  
    <label>Active?</label>
    <select name="is_active">
      <option value="1">Yes</option>
      <option value="0">No</option>
    </select>
  
    <button type="submit" name="save">Save Service</button>
  </form>
</div>
</body>
</html>