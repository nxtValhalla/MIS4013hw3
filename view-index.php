<?php
include view-header.php
include bootstrap.php
include js.php
?>
<div class="countdown-container">
  <div class="countdown-title">Countdown to NBA Finals</div>
  <div id="countdown">
    <div class="time-box">
      <h1 id="days">00</h1>
      <span>Days</span>
    </div>
    <div class="time-box">
      <h1 id="hours">00</h1>
      <span>Hours</span>
    </div>
    <div class="time-box">
      <h1 id="minutes">00</h1>
      <span>Minutes</span>
    </div>
    <div class="time-box">
      <h1 id="seconds">00</h1>
      <span>Seconds</span>
    </div>
  </div>
</div>
  <script>
    function startCountdown(targetDate) {
      const countdownElement = document.getElementById("countdown");

      function updateCountdown() {
        const now = new Date();
        const target = new Date(targetDate);
        const difference = target - now;

        if (difference <= 0) {
          countdownElement.innerHTML = "<h2>The NBA Finals Have Started!</h2>";
          clearInterval(interval);
          return;
        }

        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);

        document.getElementById("days").textContent = String(days).padStart(2, '0');
        document.getElementById("hours").textContent = String(hours).padStart(2, '0');
        document.getElementById("minutes").textContent = String(minutes).padStart(2, '0');
        document.getElementById("seconds").textContent = String(seconds).padStart(2, '0');
      }

      const interval = setInterval(updateCountdown, 1000);
      updateCountdown(); // Call immediately to avoid initial delay
    }

    // Set the target date and time (adjusting for CST)
    startCountdown("June 5, 2025 18:00:00 GMT-0500");
  </script>

<?php
include footer.php
?>
