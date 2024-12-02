<?php
include "bootstrap.php";
?>
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
<?php
include "js-finals-countdown.php";
?>
