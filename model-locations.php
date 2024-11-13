<?php
function selectLocations() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT LocationID, City, State FROM nbarosters.nba_team_locations;");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function insertLocation($city, $state, $arenaID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO nbarosters.nba_team_locations (City, State, ArenaID) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $city, $state, $arenaID);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function updateLocation($city, $state, $arenaID, $locID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE nbarosters.nba_team_locations set City = ?, State = ?, ArenaID = ? WHERE LocationID = ?");
        $stmt->bind_param("ssii", $city, $state, $arenaID, $locID);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function deleteLocation($locID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("DELETE FROM nbarosters.nba_team_locations WHERE LocationID = ?");
        $stmt->bind_param("i", $locID);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
