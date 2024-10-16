<?php
function selectPlayerStats() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT PlayerID, StatName, StatValue FROM nbarosters.nba_northwest_player_stats;");
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
