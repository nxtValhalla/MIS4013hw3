<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

<!-- Animation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<script>
    "use strict";
    const image = document.querySelector("#NBATeamsimg");

    document.querySelector("#addSize").addEventListener("click", () => {
        let img = document.querySelector("#NBATemasimg");
        let currentWidth = img.clientWidth;
        img.style.width = (currentWidth + 15) + 'px';
    });

    document.querySelector("#minusSize").addEventListener("click", () => {
       let img = document.querySelector("#NBATemasimg");
       let currentWidth = img.clientWidth;
       if (currentWidth > 15) {
       img.style.width = (currentWidth - 15) + 'px'; }
    });

    document.querySelector("#resetSize").addEventListener("click", () => {
        let img = document.querySelector("#NBATemasimg");
        img.style.width = '400px';
    });
</script>
