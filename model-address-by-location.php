<?php
function selectAddressByLocation($lid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT l.ArenaID, ArenaName, Address, a.City, a.State, ZipCode FROM nbarosters.nba_team_locations l join nbarosters.nba_arena_addresses a on l.ArenaID = a.ArenaID WHERE l.LocationID = ?");
        $stmt->bind_param("i", $lid);
        $stmt->execute();
        $result = $stmt->get_result();
        // Debugging: Check if there are any errors
        if (!$result) {
            echo "Query error: " . $stmt->error;
        }
        
        // Debugging: Print number of rows returned
        if ($result->num_rows === 0) {
            echo "No results found for Location ID: " . $lid;
        } else {
            echo "Results found: " . $result->num_rows;
        }
        
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
