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

function insertStatsByPlayer($playerID, $statName, $statValue) {
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
function updateStatsByPlayer($statName, $statValue, $playerID, $statInputID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE nbarosters.nba_northwest_player_stats set StatName = ?, StatValue = ? WHERE PlayerID = ? AND StatInputID = ?");
        $stmt->bind_param("sdii", $statName, $statValue, $playerID, $statInputID);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function deleteStatsByPlayer($statInputID) {
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
