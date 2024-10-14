<?php
function selectRosterByTeam($TeamID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT PlayerID, PlayerName, PlayerPosition FROM nbarosters.nba_northwest_division d join nbarosters.nba_northwest_players p on d.TeamID = p.TeamID WHERE d.TeamID = ?");
        $stmt->bind_param("i", $TeamID);
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
