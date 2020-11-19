<!DOCTYPE html>
<html lang="en">
<head>
<?php include("include/head.php"); ?>
<?php include("include/bdd.php"); ?>
</head>
<body>

  <!-- HEADER  -->
  <?php include("include/header.php"); ?>

  <!-- START OF PAGE CONTENT  -->
  <div>

    <!-- NAV BAR  -->
    <?php include("include/breadcrumb.php"); ?>
    <!-- <ul class="nav">
      <li class="nav-item">
        <a class="nav-link active" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Board Index</a>
      </li>
    </ul> -->

    <!-- S'adapte sur tout l'écran-->
    <main class="container-fluid row align-items-start">

      <!-- CATEGORIES -->
      <?php include("include/categories.php"); ?>

      <!-- aside -->
      <?php include("include/aside.php"); ?>
    </main>

  </div>
  <!-- END OF PAGE CONTENT -->


  <!-- FOOTER  -->
  <?php include("include/footer.php"); ?>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>