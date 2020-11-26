<?php
$_SESSION['userId']
?>
<div class="userContainer col-12 col-md-9"> 
<div class="grid-container">
  <div class="name">Name :</div>
  <div class="mail">Email :</div>
  <div class="signature">Signature :</div>
  <div class="username"><?= $_SESSION['username'] ?></div>
  <div class="userEmail"><?= $_SESSION['userEmail'] ?></div>
  <div class="signatureTxt"><?= $_SESSION['userSignature'] ?></div>
  <div class="w-25 picGravatar"><?php include 'include/gravatar.php' ;?></div>
  <div class="modifName">modify the username</div>
  <div class="modifEmail">modify the userEmail</div>
  <div class="modfiSignature">modify the signature</div>
  <div class="ModifGravatar">
    To display your own avatar, please connect your profile with the same email address used on <a href="https://www.gravatar.com" target="_blank">gravatar.com</a><br />
    <a href="destroy_session.php">Disconnection</a>
  
  </div>
</div>
</div>