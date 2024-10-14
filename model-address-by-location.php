<?php
function selectAddressByLocation($Locid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT l.LocationID, ArenaName, Address, a.City, a.State, ZipCode FROM nbarosters.nba_team_locations l join nbarosters.nba_arena_addresses a on l.ArenaID = a.ArenaID WHERE l.ArenaID = ?;");
        $stmt->bind_param("i", $LocID);
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