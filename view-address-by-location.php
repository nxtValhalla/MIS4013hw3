<h1>Arena Name and Address</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>Arena ID</th>
      <th>Arena Name</th>
      <th>Address</th>
      <th>City</th>
      <th>State</th>
      <th>Zip Code</th>
      </tr>
    </thead>
    <tbody>
<?php
while ($address = $addressbylocation->fetch_assoc()){
?>
  <tr>
    <td><?php echo $address['ArenaID']; ?></td>
    <td><?php echo $address['ArenaName']; ?></td>
    <td><?php echo $address['Address']; ?></td>
    <td><?php echo $address['City']; ?></td>
    <td><?php echo $address['State']; ?></td>
    <td><?php echo $address['ZipCode']; ?></td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>


<?php
// PHP: Render Buttons with Address Information
?>
<?php
// Example list of locations with Address, City, State, and ZipCode
$locations = [
    ['address' => <?php echo $address['Address']; ?>, 'city' => <?php echo $address['City']; ?>, 'state' => <?php echo $address['State']; ?>, 'zipcode' => <?php echo $address['ZipCode']; ?>],
];
?>

<div id="location-buttons">
    <?php foreach ($locations as $location): ?>
        <button onclick="getCoordinates('<?php echo htmlspecialchars($location['address']); ?>', '<?php echo htmlspecialchars($location['city']); ?>', '<?php echo htmlspecialchars($location['state']); ?>', '<?php echo htmlspecialchars($location['zipcode']); ?>')">
            Show Pin for <?php echo "{$location['address']}, {$location['city']}, {$location['state']} {$location['zipcode']}"; ?>
        </button>
    <?php endforeach; ?>
</div>

<?php
// JavaScript: Fetch Coordinates
?>
<script>
    function getCoordinates(address, city, state, zipcode) {
        const fullAddress = `${address}, ${city}, ${state}, ${zipcode}`;

        // Send the address to the PHP script
        fetch('get-coordinates.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ fullAddress: fullAddress })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const location = { lat: data.lat, lng: data.lng };
                
                // Add marker to the map
                const marker = L.marker([location.lat, location.lng]).addTo(map);
                marker.bindPopup(`<b>${fullAddress}</b>`).openPopup();

                // Center the map on the location
                map.setView([location.lat, location.lng], 13);
            } else {
                alert('Unable to fetch coordinates for: ' + fullAddress);
            }
        })
        .catch(err => console.error(err));
    }
</script>

<?php
// PHP Backend: Fetch Coordinates from Nominatim
?>
<?php
header('Content-Type: application/json');

// Get the posted data
$data = json_decode(file_get_contents('php://input'), true);
$fullAddress = $data['fullAddress'] ?? '';

if (!empty($fullAddress)) {
    // Use Nominatim to get coordinates
    $url = "https://nominatim.openstreetmap.org/search?" . http_build_query([
        'q' => $fullAddress,
        'format' => 'json',
        'addressdetails' => 1,
        'limit' => 1,
    ]);

    // Fetch the response from Nominatim
    $response = file_get_contents($url);
    $json = json_decode($response, true);

    if (!empty($json)) {
        // Extract latitude and longitude from the first result
        $location = $json[0];
        echo json_encode(['status' => 'success', 'lat' => $location['lat'], 'lng' => $location['lon']]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No results found']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid address']);
}
?>

<?php
// Initialize Leaflet.js and Map
?>
<div id="map" style="height: 500px; width: 100%;"></div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    // Initialize the map
    const map = L.map('map').setView([0, 0], 2); // Default view

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
</script>
