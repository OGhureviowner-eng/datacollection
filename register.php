<?php require 'config.php'; 
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $zone = trim($_POST['zone']);
    $light_post = trim($_POST['light_post']);
    $full_name = trim($_POST['full_name']);
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);

    if (!empty($zone) && !empty($full_name)) {
        $stmt = $pdo->prepare("INSERT INTO residents (zone, light_post, full_name, address, phone, email) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$zone, $light_post, $full_name, $address, $phone, $email]);
        $message = "Thank you! Your information has been added.";
    } else {
        $message = "Please fill at least Zone and Full Name.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Community Directory</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Oswald&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="logo">Village/Town Community Directory</div>
    <nav>
      <a href="index.php">Home</a>
      <a href="register.php">Register Info</a>
      <a href="view.php">View Directory</a>
    </nav>
  </header>

  <div class="container">
    <h1>Register Your Information</h1>
    <?php if ($message): ?>
      <div class="message"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <form method="POST">
      <label>Zone / Area * (e.g., North Side, San Pedro)</label>
      <input type="text" name="zone" required>

      <label>Light Post / Pole Number (if known)</label>
      <input type="text" name="light_post">

      <label>Full Name *</label>
      <input type="text" name="full_name" required>

      <label>Additional Address Details (house color, lot, etc.)</label>
      <textarea name="address" rows="3"></textarea>

      <label>Phone Number</label>
      <input type="text" name="phone">

      <label>Email</label>
      <input type="email" name="email">

      <button type="submit">Submit Information</button>
    </form>
  </div>
</body>
</html>
