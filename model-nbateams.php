<?php
function selectNBATeams() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT TeamID, TeamName, Wins, Losses, LocationID FROM nbarosters.nba_northwest_division;");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function insertNBATeam($teamName, $wins, $losses, $locID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO nbarosters.nba_northwest_division (TeamName, Wins, Losses, LocationID) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siis", $teamName, $wins, $losses, $locID);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function updateNBATeam($teamName, $wins, $losses, $locID, $teamid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE nbarosters.nba_northwest_division set TeamName = ?, Wins = ?, Losses = ?, LocationID = ? WHERE TeamID = ?)");
        $stmt->bind_param("siisi", $teamName, $wins, $losses, $locID, $teamid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function deleteNBATeam($teamid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("DELETE FROM nbarosters.nba_northwest_division WHERE TeamID = ?");
        $stmt->bind_param("i", $teamid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
