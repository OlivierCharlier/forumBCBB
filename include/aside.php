
    <?php 
/*Appel le fichier database*/ 
include 'bdd.php';
/*Permet de récupérer les infos utilisateurs*/ 
if(isset($_POST['validate'])){
    /*Si ce n'est pas vide === !empty*/ 
    if(!empty($_POST['username']) AND !empty($_POST['pwd'])){
        /*----------Récupère le username-----------*/
        $username = htmlspecialchars($_POST['username']);
        /*htmlspecialchars = permet de sécuriser*/ 
        $pwd = sha1($_POST['pwd']);
        /*sha1 Permet de sécruriser le mot de passe, il le change en données*/
        $check_presence_user = $bdd->prepare('SELECT * FROM users WHERE username = ? AND pwd = ?');
        /*prepare, prépare une varible, * etoile veut dire tous les champs*/ 
        /*Permet de vérifier si l'utilisateur existe dans la base de donnée*/ 
        /* l'étoile * permet de trouver tout ce qui concorde avec la demande*/ 
        $check_presence_user->execute(array($username, $pwd));
        /*permet de vérifier si l'utilisateur existe*/ 

        /*-----------------PERMET A L'UTILISATEUR DE SE CONNECTER-------------------*/
        if($check_presence_user->rowCount() > 0){
            $info_user = $check_presence_user->fetch();
            /*Va permettre à l'utilidateur de rester connécté et de récupérer ses infos*/
            $_SESSION['pwd'] = $info_user['pwd'];
            $_SESSION['userId'] = $info_user['userId'];
            $_SESSION['username'] = $info_user['username'];
            /*Envoie l'utilsateur vers la page index si ses données d'entrées sont corrects*/
        }else{
            echo "Incorrect username or password";
        }
    }else{
        echo "Please complete all fields";
    }
}
?> 
    
    <div class="col-xs-12 col-sn-12 col-md-3 col-lg-3">

                    <!-----------SEARCH-------------->
                <form>
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                    <!-----------USERNAME-------------->
                <form>
                  </br>
                  <p> Login - Register</p>
                  <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">Username</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                      <div class="input-group-text">
                      </div>
                      </div>
                      <input type="text" name="username" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                    </div>
                </form> 
                    <!-----------PASSWORD-------------->
                <form>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="pwd" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                  </div>
                  <button type="submit" name="validate" class="btn btn-primary">Login</button>
                </form>
                </br>
         

                  <!-----------LAST POSTS -------------->
            <div class="card bg-light mb-3" style="max-width: 18rem;">
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
                <section class="card bg-light mb-3" style="max-width: 18rem;">
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
    </div>

    
