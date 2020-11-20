<?php
include 'bdd.php';
if(isset($_POST['validate'])){
    //Validate -- renommer avec le nom du bouton form
    /*Permet de vérifier si l'utilsateur n'a pas laisser de champs vide*/
    if(!empty($_POST['username']) AND !empty($_POST['pwd']) AND !empty($_POST['userEmail'])){
        //insérer un membre
        $username = htmlspecialchars($_POST['username']);
        $userEmail = htmlspecialchars($_POST['userEmail']);
        $pwd = sha1($_POST['pwd']);
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

    }else{
        echo "Please fill in all the blanks";
    }

}  
?>

<!DOCTYPE html>
 <html>
 <head>
  <title>Inscription</title>
  <meta charser="utf-8">
 </head>
 <body>
     <div align="center">
         <form method="POST" action="">
            <?php echo '<p>Inscription sur le forum</p>'; ?>
            <input type="text" name="username" placeholder="Username">
            </br>
            <input type="text" name="userEmail" placeholder="Mail adress">
            </br>
            <input type="password" name="pwd" placeholder="Password">
            </br>
            <input type="submit" name="validate">
         </form>
     </div>
 </body>
</html>