<div style="background-color: #999898; display: flex; flex-direction: column; justify-content: center; align-items: center;">
      <small>June 5th, 2025 at 7:30 PM CST</small>
    </h1>
  <div class="countdown-container">
    <table class="table table-dark table-bordered table-striped text-center">
      <thead>
        <tr>
          <th>Days</th>
          <th>Hours</th>
          <th>Minutes</th>
          <th>Seconds</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td id="days">00</td>
          <td id="hours">00</td>
          <td id="minutes">00</td>
          <td id="seconds">00</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="container text-center mt-4">
      <h1>Image Manipulation with Buttons!</h1>
      <div class="btn-group mt-3" role="group">
        <button id="addSize" class="btn btn-primary"><i class="bi bi-plus-square"></i></button>
        <button id="minusSize" class="btn btn-danger"><i class="bi bi-dash-square"></i></button>
        <button id="resetSize" class="btn btn-warning"><i class="bi bi-arrow-counterclockwise"></i></button>
      </div>
      <div>
        <img id="NBATeamsimg" src="NBATeams.png" style="height:500px; width:auto;"/>
      </div>
  </div>
</div>
<?php
include "js-finals-countdown.php";
include "js-image-manipulation.php";
?>
