<?php
function selectPlayerStats() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT PlayerID, GamesPlayed, PPG, APG, RPG FROM nbarosters.nba_player_stats;");
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
