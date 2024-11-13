<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTeamModal<?php echo $nbateam['TeamID'];?>">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
  </svg>
</button>

<!-- Modal -->
<div class="modal fade" id="editTeamModal<?php echo $nbateam['TeamID'];?>" tabindex="-1" aria-labelledby="editTeamModalLabel<?php echo $nbateam['TeamID'];?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editTeamModalLabel<?php echo $nbateam['TeamID'];?>">Edit Team</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="mb-3">
            <label for="teamName<?php echo $nbateam['TeamID'];?>" class="form-label">Team Name</label>
            <input type="text" class="form-control" id="teamName<?php echo $nbateam['TeamID'];?>" name="teamName" value="<?php echo $nbateam['TeamName'];?>">
          </div>
          <div class="mb-3">
            <label for="wins<?php echo $nbateam['TeamID'];?>" class="form-label">Wins</label>
            <input type="text" class="form-control" id="wins<?php echo $nbateam['TeamID'];?>" name="wins" value="<?php echo $nbateam['Wins'];?>">
          </div>
          <div class="mb-3">
            <label for="losses<?php echo $nbateam['TeamID'];?>" class="form-label">Losses</label>
            <input type="text" class="form-control" id="losses<?php echo $nbateam['TeamID'];?>" name="losses" value="<?php echo $nbateam['Losses'];?>">
          </div>
          <div class="mb-3">
            <label for="locID<?php echo $nbateam['TeamID'];?>" class="form-label">Location ID</label>
            <input type="text" class="form-control" id="locID<?php echo $nbateam['TeamID'];?>" name="locID" value="<?php echo $nbateam['LocationID'];?>">
          </div>
            <input type="hidden" name="teamid" value="<?php echo $nbateam['TeamID'];?>">
            <input type="hidden" name="actionType" value="Edit">
          <button type="submit" class="btn btn-primary">Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>
