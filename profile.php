<?php session_start() ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("include/head.php"); 
$_SESSION['id'] = 173;?>
<link rel="stylesheet" href="sass/style_user.css">
</head>
<body>

  <!-- HEADER  -->
  <?php include("include/header.php"); ?>
 
  <!-- START OF PAGE CONTENT  -->
  <main class="background">

    <!-- NAV BAR  -->
    <?php include("include/breadcrumb.php"); ?>
    <!-- S'adapte sur tout l'écran-->
    <div class="container-fluid row align-items-start">
   

      <!-- USER PROFIL -->
      <div class="userContainer col-12 col-md-9">
          <?php       
                if (! empty($_GET['id'])){
                    include("include/user_profile.php");
                }elseif (! empty($_SESSION['userId'])){
                    include("include/user.php");
                }else{ include("include/no_user.php");
                    }
          ?>
      </div>

      <!-- aside -->
      <?php include("include/aside.php"); ?>
    </div>

  </main>
  <!-- END OF PAGE CONTENT -->


  <!-- FOOTER  -->
  <?php include("include/footer.php"); ?>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
