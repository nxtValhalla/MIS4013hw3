<?php
function selectPlayers() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT PlayerID, PlayerName, PlayerPosition, TeamID FROM nbarosters.nba_northwest_players;");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectTeamsForInput() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT TeamID, TeamName FROM nbarosters.nba_northwest_division ORDER BY TeamName;");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function insertPlayer($playerName, $pos, $teamID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO nbarosters.nba_northwest_players (PlayerName, PlayerPosition, TeamID) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $playerName, $pos, $teamID);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function updatePlayer($playerName, $pos, $teamID, $playerID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE nbarosters.nba_northwest_players set PlayerName = ?, PlayerPosition = ?, TeamID = ? WHERE PlayerID = ?");
        $stmt->bind_param("ssii", $playerName, $pos, $teamID, $playerID);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function deletePlayer($playerID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("DELETE FROM nbarosters.nba_northwest_players WHERE PlayerID = ?");
        $stmt->bind_param("i", $playerID);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
