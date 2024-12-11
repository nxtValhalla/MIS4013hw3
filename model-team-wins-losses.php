<?php
function getTeamListWithStats() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT TeamID, TeamName, Wins, Losses FROM nbarosters.nba_northwest_division ORDER BY TeamName;");
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
