<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NBA Finals Countdown</title>
  <style>
    body {
      background-color: #121212;
      color: white;
      font-family: 'Arial', sans-serif;
      text-align: center;
      padding: 20px;
    }
    .countdown-container {
      margin: 50px auto;
      padding: 20px;
      max-width: 500px;
      border: 2px solid white;
      border-radius: 15px;
      background: linear-gradient(145deg, #333333, #1a1a1a);
      box-shadow: 5px 5px 15px #0f0f0f, -5px -5px 15px #262626;
    }
    .time-box {
      display: inline-block;
      margin: 10px;
      padding: 15px;
      border-radius: 10px;
      background: #222;
      box-shadow: 2px 2px 5px #0a0a0a, -2px -2px 5px #2e2e2e;
    }
    .time-box h1 {
      margin: 0;
      font-size: 3rem;
    }
    .time-box span {
      font-size: 1.2rem;
      color: #888;
    }
    .countdown-title {
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

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

</body>
</html>
