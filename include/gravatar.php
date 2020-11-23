<?php
/**
 * Fonction d'affichage d'un gravatar en fonction
 * d'une adresse e-mail
 *
 * @param string $email E-mail rattaché au gravatar
 * @param int $size Dimension du gravatar
 * @return string $out Code HTML du gravatar
 * @author Sithran
 */
function gravatar($email, $size=60)
{
  // Définition des paramètres utiles
  $default = urlencode('https://cdn1.iconfinder.com/data/icons/sport-avatar-7/64/05-sports-badminton-sport-avatar-player-512.png');
  $email = md5($email);
  // Détermination de l'url paramétrée
  $url = 'http://www.gravatar.com/avatar.php';
  $url.= '?gravatar_id=%s';
  $url.= '&amp;size=%d';
  $url.= '&amp;default=%s';
  // Création de l'url
  $url = sprintf
  (
    $url,
    $email,
    intval($size),
    $default
  );
  // Génération de la sortie HTML
  $out = '<img src="'. $url .'" alt="Gravatar" title="Gravatar" />',
  return $out;
}

echo gravatar('olivier420@gmail.com', 55);

?>