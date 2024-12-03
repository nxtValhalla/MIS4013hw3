<?php
function getPlayerStatsComparison() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("
            SELECT p.PlayerName, 
              SUM(CASE WHEN s.StatName = 'GamesPlayed' THEN s.StatValue ELSE 0 END) AS GamesPlayed,
              SUM(CASE WHEN s.StatName = 'PPG' THEN s.StatValue ELSE 0 END) AS Points, 
              SUM(CASE WHEN s.StatName = 'RPG' THEN s.StatValue ELSE 0 END) AS Rebounds, 
              SUM(CASE WHEN s.StatName = 'APG' THEN s.StatValue ELSE 0 END) AS Assists
            FROM nbarosters.nba_northwest_players p
            JOIN nbarosters.nba_northwest_player_stats s ON p.PlayerID = s.PlayerID
            GROUP BY p.PlayerName
            ORDER BY p.PlayerName;
        ");
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
