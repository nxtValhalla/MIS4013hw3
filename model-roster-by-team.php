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
<?php
// Get the team ID from the URL (or form)
$team_id = isset($_GET['TeamID']) ? $_GET['TeamID'] : 1; // Default to 1 if not set

// Query the team name
$team_sql = "SELECT TeamName FROM nbarosters.nba_northwest_division WHERE TeamID = ?";
$stmt = $conn->prepare($team_sql);
$stmt->bind_param("i", $team_id);
$stmt->execute();
$stmt->bind_result($team_name);
$stmt->fetch();
$stmt->close();
?>
