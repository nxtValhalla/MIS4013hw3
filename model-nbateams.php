<?php
function selectNBATeams() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT TeamID, TeamName, Wins, Losses, LocationID FROM nbarosters.nba_northwest_division;");
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
