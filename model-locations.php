<?php
function selectLocations() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT LocationID, City, State FROM nbarosters.nba_team_locations;");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
