<?php 
/*Récupére les infos utilisateurs*/ 
if (isset($_POST['validateone'])){
   /*----------Récupère le username-----------*/
    /*vide === empty*/ 
    if (!empty($_POST['userName']) AND !empty($_POST['pass'])){
        $userName = htmlspecialchars($_POST['userName']);
        /*htmlspecialchars = permet de sécuriser*/ 
        $pass = hashPwd($_POST['pass']);
        // $pass = sha1($_POST['pass']);
        $check_presence_user = $bdd->prepare('SELECT * FROM users WHERE username = ? AND pwd = ?');
        /* "*" veut dire tous les champs*/ 
        /*Permet de vérifier si l'utilisateur existe dans la base de donnée*/ 
        /* "*" permet de trouver tout ce qui concorde avec la demande*/ 
        $check_presence_user->execute(array($userName, $pass));
        /*permet de vérifier si l'utilisateur existe*/ 

        /*-----------------PERMET A L'UTILISATEUR DE SE CONNECTER-------------------*/
        if ($check_presence_user->rowCount() > 0){
            $infoUser = $check_presence_user->fetch();
            /*Va permettre à l'utilidateur de rester connécté et de récupérer ses infos*/
        
            $_SESSION['pass'] = $infoUser['pwd'];
            $_SESSION['userIden'] = $infoUser['userId'];
            $_SESSION['userName'] = $infoUser['username'];
            $succesMessageaside = "Welcome ".$_SESSION['userName'];

          } else{
            $errorMessageaside ="Incorrect username or password";
        }
    } else{
        $errorMessageaside ="Please complete all fields";
    }
}
?> 
    <aside class="col-md-3 col-12">
                    <!-----------SEARCH-------------->
                <!-- <form action="" method="POST">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->
                  <!-----------Message-------------->
                <?php if (isset($errorMessageaside)) { ?> <p style="color: red;"><?= $errorMessageaside ?></p> <?php } ?>
                <?php if (isset($succesMessageaside)) { ?> <p style="color: green;"><?= $succesMessageaside ?></p> <?php } ?>
                    <!-----------USERNAME-------------->
                <form action="register.php" method="POST" name="aside">
                  </br>
                  <p> Login - Register</p>
                  <div class="w-100 col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">Username</label>
                    <div class="input-group mb-2">
                      <input type="text" name="userName" class="form-control" id="inlineFormInputGroup" placeholder="Username" maxlength="16">
                    </div>
                    <!-----------PASSWORD-------------->
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
              
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <button type="submit" name="validateone" class="btn btn-success">Login</button>
                  </div>
                </form>
                </br>
            <!-----------NEW MEMBER-------------->
            <h3 class="Become">Become a member</h3>
            <button type="submit" name="becomeaMembre" class="w-100 btn btn-success">
            <?php echo "<a href='register.php' target='_blank'> Sign up ! </a>" ?>
            </button>
            </br>
            </br>
            <h3 class="Become">My profile</h3>
            <button type="submit" name="myProfil" class="w-100 btn btn-success">
            <?php echo "<a href='profile.php' target='_blank'> Complete your profile ! </a>" ?>
            </button>

                  <!-----------LAST POSTS -------------->
            <div class="card bg-light mb-3 lastpost">
                <div class="card-header">Last pots
                </div>
                <div class="card-body">
                  <h5 class="card-title">Post-catogry3</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <h5 class="card-title">Post-catogry3</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <h5 class="card-title">Post-catogry3</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <h5 class="card-title">Post-catogry3</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
          </div>

                <!-----------LAST ACTIVE USERS -------------->
                <section class="card bg-light mb-3">
                  <div class="card-header">Last Active Users
                  </div>
                  <div class="card-body">
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object dp img-circle" src="https://www.flaticon.com/svg/static/icons/svg/2317/2317933.svg" style="width: 50px;height:50px;">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading">Truc muche 
                                </br>
                                <small> I love badminiton</small></h5>
                            </div>    
                     </div>

                      <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object dp img-circle" src="https://www.flaticon.com/svg/static/icons/svg/2761/2761758.svg" style="width: 50px;height:50px;">
                        </a>
                        <div class="media-body">
                            <h5 class="media-heading">Pelotte Lamie
                            </br>
                            <small>Help</small></h5>
                        </div>  
                      </div>

                      <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object dp img-circle" src="https://www.flaticon.com/svg/static/icons/svg/731/731870.svg" style="width: 50px;height:50x;">
                        </a>
                        <div class="media-body">
                            <h5 class="media-heading">Raquette Man
                            </br>
                            <small>New</small></h5>
                        </div>  
                      </div>
                </section>
    </aside>