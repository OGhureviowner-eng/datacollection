<?php require 'config.php'; 
// Get distinct zones for navigation and dropdown
$zones_stmt = $pdo->query("SELECT DISTINCT zone FROM residents ORDER BY zone");
$zones = $zones_stmt->fetchAll(PDO::FETCH_COLUMN);

// Get all residents ordered for grouping
$stmt = $pdo->query("SELECT * FROM residents ORDER BY zone ASC, light_post ASC, full_name ASC");
$residents = $stmt->fetchAll();

// Count residents per zone for display
$zone_counts = [];
foreach ($residents as $row) {
    $zone_counts[$row['zone']] = ($zone_counts[$row['zone']] ?? 0) + 1;
}
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
      <!-- Interactive controls -->
      <div class="controls">
        <input type="text" id="search-input" placeholder="🔍 Search by name, light post, phone, address...">
        <select id="zone-filter">
          <option value="">All Zones</option>
          <?php foreach ($zones as $zone): ?>
            <option value="<?php echo htmlspecialchars($zone); ?>"><?php echo htmlspecialchars($zone); ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Zone navigation links (kept as before) -->
      <div class="zone-nav">
        <strong>Jump to Zone:</strong>
        <?php foreach ($zones as $zone): 
          $slug = strtolower(str_replace(' ', '-', $zone));
        ?>
          <a href="#zone-<?php echo $slug; ?>"><?php echo htmlspecialchars($zone); ?></a>
        <?php endforeach; ?>
      </div>

      <!-- Resident listing with collapsible zones -->
      <?php 
      $current_zone = '';
      foreach ($residents as $row): 
        if ($row['zone'] !== $current_zone):
          if ($current_zone !== '') echo '</div></div>'; // close previous grid and section
          $slug = strtolower(str_replace(' ', '-', $row['zone']));
          $count = $zone_counts[$row['zone']] ?? 0;
          echo '<div class="zone-section" id="zone-' . $slug . '">';
          echo '<div class="zone-header" onclick="toggleZone(this)">';
          echo '<h2>' . htmlspecialchars($row['zone']) . '</h2>';
          echo '<div><span class="zone-count">' . $count . ' resident' . ($count == 1 ? '' : 's') . '</span> <span class="arrow">▼</span></div>';
          echo '</div>';
          echo '<div class="grid">';
          $current_zone = $row['zone'];
        endif;
      ?>
        <div class="card" 
             data-zone="<?php echo htmlspecialchars($row['zone']); ?>"
             data-name="<?php echo strtolower(htmlspecialchars($row['full_name'])); ?>"
             data-light="<?php echo strtolower(htmlspecialchars($row['light_post'] ?? '')); ?>"
             data-address="<?php echo strtolower(htmlspecialchars($row['address'] ?? '')); ?>"
             data-phone="<?php echo strtolower(htmlspecialchars($row['phone'] ?? '')); ?>">
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
        if ($current_zone !== '') echo '</div></div>'; // close last grid and section
      ?>
    <?php endif; ?>
  </div>

  <!-- Interactive JavaScript (added only here) -->
  <script>
    // Live search and zone filter
    const searchInput = document.getElementById('search-input');
    const zoneFilter = document.getElementById('zone-filter');
    const cards = document.querySelectorAll('.card');

    function filterCards() {
      const searchTerm = searchInput.value.toLowerCase();
      const selectedZone = zoneFilter.value;

      cards.forEach(card => {
        const zone = card.dataset.zone;
        const name = card.dataset.name;
        const light = card.dataset.light;
        const address = card.dataset.address;
        const phone = card.dataset.phone;

        const matchesSearch = 
          name.includes(searchTerm) ||
          light.includes(searchTerm) ||
          address.includes(searchTerm) ||
          phone.includes(searchTerm);

        const matchesZone = selectedZone === '' || zone === selectedZone;

        if (matchesSearch && matchesZone) {
          card.classList.remove('hidden');
        } else {
          card.classList.add('hidden');
        }
      });
    }

    searchInput.addEventListener('input', filterCards);
    zoneFilter.addEventListener('change', filterCards);

    // Collapsible zones
    function toggleZone(header) {
      const grid = header.nextElementSibling;
      const arrow = header.querySelector('.arrow');
      grid.style.display = grid.style.display === 'none' ? 'grid' : 'none';
      arrow.classList.toggle('collapsed');
    }

    // Initial state: all zones expanded
    document.querySelectorAll('.grid').forEach(grid => {
      grid.style.display = 'grid';
    });
  </script>
</body>
</html>
