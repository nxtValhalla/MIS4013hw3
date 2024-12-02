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
        let img = document.querySelector("#NBATeamsimg");
        let currentHeight = img.clientHeight;
        let currentWidth = img.clientWidth;
        img.style.height = (currentHeight + 20) + 'px';
        img.style.width = (currentWidth + 20) + 'px';
    });

    document.querySelector("#minusSize").addEventListener("click", () => {
       let img = document.querySelector("#NBATeamsimg");
       let currentHeight = img.clientHeight; 
       let currentWidth = img.clientWidth;
       if (currentHeight > 20) {
       img.style.height = (currentHeight - 20) + 'px';    
       img.style.width = (currentWidth - 20) + 'px'; }
    });

    document.querySelector("#resetSize").addEventListener("click", () => {
        let img = document.querySelector("#NBATeamsimg");
        img.style.height = '500px';
        img.style.width = 'auto';
    });
</script>
