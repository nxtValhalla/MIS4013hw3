<?php
function selectStatsByPlayer($pid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT p.PlayerID, PlayerName, GamesPlayed, PPG, APG, RPG FROM nbarosters.nba_northwest_players p join nbarosters.nba_players_stats s on p.PlayerID = s.PlayerID WHERE d.TeamID = ?");
        $stmt->bind_param("i", $pid);
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
