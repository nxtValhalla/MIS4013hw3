<?php
function getTopPlayersByStat($statName, $limit = 10) {
    $validStats = ['PPG', 'RPG', 'APG']; // List of valid stat names
    if (!in_array($statName, $validStats)) {
        throw new Exception("Invalid stat name provided");
    }

    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("
            SELECT PlayerName, StatValue
            FROM nbarosters.nba_northwest_player_stats s
            JOIN nbarosters.nba_northwest_players p ON s.PlayerID = p.PlayerID
            WHERE s.StatName = ?
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
