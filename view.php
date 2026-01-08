<?php require 'config.php'; 
// Get distinct zones for navigation
$zones_stmt = $pdo->query("SELECT DISTINCT zone FROM residents ORDER BY zone");
$zones = $zones_stmt->fetchAll(PDO::FETCH_COLUMN);

// Get all residents ordered for grouping
$stmt = $pdo->query("SELECT * FROM residents ORDER BY zone ASC, light_post ASC, full_name ASC");
$residents = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Directory - Community Directory</title>
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
    <h1>Community Resident Directory</h1>
    <?php if (empty($residents)): ?>
      <p style="text-align:center;">No residents registered yet. Be the first!</p>
    <?php else: ?>
      <div class="zone-nav">
        <strong>Jump to Zone:</strong>
        <?php foreach ($zones as $zone): 
          $slug = strtolower(str_replace(' ', '-', $zone));
        ?>
          <a href="#zone-<?php echo $slug; ?>"><?php echo htmlspecialchars($zone); ?></a>
        <?php endforeach; ?>
      </div>

      <?php 
      $current_zone = '';
      foreach ($residents as $row): 
        if ($row['zone'] !== $current_zone):
          if ($current_zone !== '') echo '</div></div>'; // close previous
          $slug = strtolower(str_replace(' ', '-', $row['zone']));
          echo '<div class="zone-section" id="zone-' . $slug . '">';
          echo '<h2>Zone: ' . htmlspecialchars($row['zone']) . '</h2>';
          echo '<div class="grid">';
          $current_zone = $row['zone'];
        endif;
      ?>
        <div class="card">
          <h3><?php echo htmlspecialchars($row['full_name']); ?></h3>
          <?php if ($row['light_post']): ?>
            <p><strong>Light Post:</strong> <?php echo htmlspecialchars($row['light_post']); ?></p>
          <?php endif; ?>
          <?php if ($row['address']): ?>
            <p><strong>Address Details:</strong> <?php echo nl2br(htmlspecialchars($row['address'])); ?></p>
          <?php endif; ?>
          <?php if ($row['phone']): ?>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($row['phone']); ?></p>
          <?php endif; ?>
          <?php if ($row['email']): ?>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
          <?php endif; ?>
        </div>
      <?php 
        endforeach;
        if ($current_zone !== '') echo '</div></div>'; // close last
      ?>
    <?php endif; ?>
  </div>
</body>
</html>
