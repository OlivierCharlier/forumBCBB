<div class="userContainer col-12 col-md-9">
<?php
if (! empty($_SESSION['userId']))
{
  $userQuery="SELECT * FROM users WHERE userId =?";
  $userResult=$bdd->prepare($userQuery);
  $userResult->execute([$_SESSION['userId']]);
  $user=$userResult->fetch(PDO::FETCH_ASSOC);

?>
        <div class="user-container">
          <div class="name">Name :</div>
          <div class="mail">Email :</div>
          <div class="signature">Signature :</div>
          <div class="username"><?= $user['username'] ?></div>
          <div class="userEmail"><?= $user['userEmail'] ?></div>
          <div class="signatureTxt"><?= $user['userSignature'] ?></div>
          <div class="w-25 picGravatar"><?php include 'include/gravatar.php' ;?></div>
          <div class="modifName"></div>
          <div class="modifEmail"></div>
          <div class="modfiSignature"></div>
          <div class="ModifGravatar">
            To display your own avatar, please connect your profile with the same email address used on <a href="https://www.gravatar.com" target="_blank">gravatar.com</a><br />
            <a href="destroy_session.php">Log out</a>
          </div>
        </div>

       <?php
}
else
{
  ?>
  <div class="user-container">
  <div class="name">You are not logged in. <a href="register.php">Click here to register</a> or log in on the right side of the page.</div>
  <div class="picGravatar"><?php include 'include/gravatar.php' ;?></div>

</div>

<?php
}
?>
</div>