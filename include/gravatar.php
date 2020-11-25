<?php
/**
 * Fonction d'affichage d'un gravatar en fonction
 * d'une adresse e-mail
 *
 * @param string $email E-mail rattaché au gravatar
 * @param int $size Dimension du gravatar
 * @return string $out Code HTML du gravatar
 */

 // info : http://fr.gravatar.com/site/implement/images/php/
$email = $_SESSION['userEmail'];
$default = "https://cdn1.iconfinder.com/data/icons/sport-avatar-7/64/05-sports-badminton-sport-avatar-player-512.png";
$size = 120;
$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
?>

<img class="avatar" src="<?php echo $grav_url; ?>" alt="picture" />
