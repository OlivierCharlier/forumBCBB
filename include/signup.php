<?php
include 'bdd.php';
if(isset($_POST['validate'])){

    $username = htmlspecialchars($_POST['username']);
    $userEmail = htmlspecialchars($_POST['userEmail']);
    $pwd = sha1($_POST['pwd']);
    $pwd = sha1($_POST['pwd-confirm']);

    //date
    date_default_timezone_set('Europe/Paris');
    $date = date('d/m/Y à H:i:s');


    /*Permet de vérifier si l'utilsateur n'a pas laisser de champs vide*/
    if (!empty($_POST['username']) AND !empty($_POST['pwd']) AND !empty($_POST['pwd-confirm']) AND !empty($_POST['userEmail']) AND $_POST['pwd']){  
      
    } elseif (empty($_POST["userName"])){
        $errorMessage ="Email vide";
    } elseif (!empty($_POST["userEmail"])){
        $errorMessage ="Email vide";
    } elseif (!empty($_POST["pwd"]) OR !empty($POST["pwd-confirm"])){
        $errorMessage ="Mot de passe vide";
    } elseif (lgt($_POST["pwd"]) < 8 ) {
        $errorMessage ="Mot de passe pas assez long";
    } elseif ($_POST['pwd'] != $_POST['pwd-confirm']) {
        $errorMessage ="Mot de passe pas identique";
    }
        
            //insérer un membre
            $insert_user = $bdd->prepare('INSERT INTO users(username, userEmail, pwd)VALUES(?, ?, ?)');
            /*USERS = nom da la table sur phpMyAdmin*/
            $insert_user->execute(array($username, $userEmail, $pwd));
            /*-----SESSIONS----- */
            $check_session = $bdd->prepare('SELECT * FROM users WHERE username = ? AND userEmail = ? AND pwd = ?');
            /*Permet de récupérer les infos de l'utilisateur -> fetch*/
            $check_session->execute(array($username, $userEmail, $pwd));
            $info_user = $check_session->fetch();
            /*Va permettre à l'utilisateur de rester connécté et de récupérer ses infos*/
            $_SESSION['pwd'] = $info_user['pwd'];
            $_SESSION['userId'] = $info_user['userId'];
            $_SESSION['userEmail'] = $info_user['userEmail'];
            $_SESSION['username'] = $info_user['username'];

            $succesMessage = "You are registered. Welcome to the forum, don't forget to introduce yourself!"; 
        //Fin de l'espace utilisateur    
        //fin du premier if
    
} 
?>



<!DOCTYPE html>
 <html>
 <head>
  <title>Become a member</title>
  <meta charser="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 </head>
 <body>
    <form action="" method="POST">
        <div id="login">
            <h3 class="text-center pt-5">Form</h3>
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="" method="post">
                                <h3 class="text-center text-info">Become a member</h3>
                                <?php if (isset($errorMessage)) { ?> <p style="color: red;"><?= $errorMessage ?></p> <?php } ?>
                                <?php if (isset($succesMessage)) { ?> <p style="color: green;"><?= $succesMessage ?></p> <?php } ?>
                                <!--USERNAME*-->
                                <div class="form-group">
                                    <label for="username" class="text-info">Username:</label><br>
                                    <input type="text" name="username" id="username" class="form-control">
                                </div>
                                <!--EMAIL*-->
                                <div class="form-group">
                                    <label for="email" class="text-info">Email:</label><br>
                                    <input type="text" name="userEmail" id="email" class="form-control">
                                </div>
                                <!--PASSWORD*-->
                                <div class="form-group">
                                    <label for="password" class="text-info">Password:</label><br>
                                    <input type="password" name="pwd" id="password" class="form-control">
                                </div>
                                <!--PASSWORD CONFIRM*-->
                                <div class="form-group">
                                    <label for="password" class="text-info">Confirm Password:</label><br>
                                    <input type="password" name="pwd-confirm" id="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label>
                                    <br>
                                    <!--BUTTON CONFIRM*-->
                                    <input type="submit" name="validate" class="btn btn-info btn-md" value="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>            

</html>