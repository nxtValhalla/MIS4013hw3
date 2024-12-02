<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

<!-- Animation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

<script>
  function scrollToTop() {
    window.scrollTo({ top: 0, behavior: "smooth" });
  }
</script>

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

<script>
document.getElementById("darkModeToggle").addEventListener("click", () => {
  const body = document.body;
  const toggleButton = document.getElementById("darkModeToggle");
  
  // Toggle the dark mode class
  body.classList.toggle("dark-mode");
  
  // Update button text and icon
  if (body.classList.contains("dark-mode")) {
    toggleButton.innerHTML = '<i id="toggleLight" class="bi bi-sun"></i> Light Mode';
  } else {
    toggleButton.innerHTML = '<i id="toggleDark" class="bi bi-moon"></i> Dark Mode';
  }
});
</script>
