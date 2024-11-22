<?php
  include "view-header.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>MIS 4013: Homework 5</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <!-- Animation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
  </head>
  <body>
    <div class="container text-center mt-4">
      <h1>Current NBA Teams</h1>

      <img id="imgNBA" src="NBATeams.png" style="height:200px; width:auto;"/>
    
  </br>

      
      <script>
        function scrollToTop() 
        {
          window.scrollTo({ top: 0, behavior: "smooth" });
        }
      </script>
      
    </div>
  </body>
</html>

<?php
  include "view-footer.php";
?>
