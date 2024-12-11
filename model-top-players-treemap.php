<?php
function getStatNames() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("
            SELECT DISTINCT StatName
            FROM nbarosters.nba_northwest_player_stats
            ORDER BY StatName ASC;
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();

        $stats = [];
        while ($row = $result->fetch_assoc()) {
            $stats[] = $row['StatName'];
        }
        return $stats;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function getTopPlayersByStat($statName, $limit = 10) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("
            SELECT p.PlayerName, s.StatValue
            FROM nbarosters.nba_northwest_players p
            JOIN nbarosters.nba_northwest_player_stats s ON p.PlayerID = s.PlayerID
            WHERE s.StatName = '?'
            ORDER BY s.StatValue DESC
            LIMIT ?;
        ");
        $stmt->bind_param("si", $statName, $limit);
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
