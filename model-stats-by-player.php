<?php
function selectStatsByPlayer($PlayerID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT p.PlayerID, p.PlayerName, p.PlayerPosition, StatInputID, StatName, StatValue FROM nbarosters.nba_northwest_players p join nbarosters.nba_northwest_player_stats s on p.PlayerID = s.PlayerID WHERE p.PlayerID = ?");
        $stmt->bind_param("i", $PlayerID);
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
