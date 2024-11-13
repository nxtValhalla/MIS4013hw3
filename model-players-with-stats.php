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

function selectStatsByPlayer($PlayerID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT p.PlayerID, p.PlayerName, p.PlayerPosition, StatName, StatValue FROM nbarosters.nba_northwest_players p join nbarosters.nba_northwest_player_stats s on p.PlayerID = s.PlayerID WHERE p.PlayerID = ?");
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

function insertPlayerStats($playerID, $statName, $statValue) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO nbarosters.nba_northwest_player_stats (PlayerID, StatName, StatValue) VALUES (?, ?, ?)");
        $stmt->bind_param("isd", $playerID, $statName, $statValue);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function updatePlayerStats($playerID, $statName, $statValue, $statInputID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE nbarosters.nba_northwest_player_stats set PlayerID = ?, StatName = ?, StatValue = ? WHERE StatInputID = ?");
        $stmt->bind_param("isdi", $playerID, $statName, $statValue, $statInputID);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function deletePlayerStats($statInputID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("DELETE FROM nbarosters.nba_northwest_player_stats WHERE StatInputID = ?");
        $stmt->bind_param("i", $statInputID);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
