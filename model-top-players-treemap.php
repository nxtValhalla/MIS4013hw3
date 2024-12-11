<?php
function getPlayerStatsForTreemap($statName) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("
            SELECT p.PlayerName, s.StatValue
            FROM nbarosters.nba_northwest_players p
            JOIN nbarosters.nba_northwest_player_stats s ON p.PlayerID = s.PlayerID
            WHERE s.StatName = ?
            ORDER BY s.StatValue DESC;
        ");
        $stmt->bind_param("s", $statName);
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
